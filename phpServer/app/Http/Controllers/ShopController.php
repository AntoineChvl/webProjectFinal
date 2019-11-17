<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contain;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Image;
use App\Mail\OrderConfirmMail;
use App\User;
use Illuminate\Support\Facades\Cookie;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use stdClass;

class ShopController extends Controller
{
    public function apiProductIndex()
    {
        $response = [];
        foreach (Product::all() as $product) {
            $obj = new stdClass;
            $obj->name = $product->name;
            $obj->productLink = route('shop.product.show', $product);
            $response[] = $obj;
        }
        return $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bestSeller = Product::all();
        foreach ($bestSeller as $product) {
            $sellCount = 0;
            foreach ($product->contained as $order) {
                $sellCount += $order->quantity;
            }
            $product->sellCount = $sellCount;
        }
        $bestSeller = $bestSeller->sort(function ($a, $b) {
            return $b->sellCount - $a->sellCount;
        });

        if($request->has('price_min','price_max')){
            $products = Product::where('price','>=',$request->price_min)->where('price','<=',$request->price_max)->get();
        }else{
            $products = Product::all();
        }

        return view('shop.shop')->withProducts($products)->withBestSeller($bestSeller->values());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("shop/createProduct")->withAction('create')->withCategories(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        $image = Image::storeImage($request->image);
        $product = Product::create($request->only('name', 'description', 'price') + ['user_id' => User::auth()->id] + ['image_id' => $image]);
        //$product->categories()->detach();
        foreach ($request->except(['name', 'description', 'price', '_token', 'image']) as $key => $value) {
            $category = Category::find($key);
            if ($category && $value == 'on') {
                $product->categories()->attach($category);
            }
        }
        session()->flash('message flash', ['type' => 'success', 'content' => "L'article a bien été ajouté"]);
        return redirect(route('shop.product.show', $product->id));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return view('shop.product', ['product' => Product::find($id)]);
        } else {
            return '<p>Le produit que vous recherchez n\'existe pas !</p>';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if ($product) {
            return view("shop/editProduct")->withAction('edit')->withProduct($product)->withCategories(Category::all());
        } else {
            return '<p>Le produit que vous recherchez n\'existe pas !</p>';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->update($request->only('name', 'description', 'price'));
            session()->flash('message flash', ['type' => 'success', 'content' => "L'article a bien été modifié"]);
            if ($request->image) {
                $image = Image::storeImage($request->image);
                $product->update(['image_id' => $image]);
            }
            $product->categories()->detach();
            foreach ($request->except(['name', 'description', 'price', '_token', 'image']) as $key => $value) {
                $category = Category::find($key);
                if ($category && $value == 'on') {
                    $product->categories()->attach($category);
                }
            }
            return redirect(route('shop.product.show', $product->id));
        } else {
            return '<p>Le produit que vous recherchez n\'existe pas !</p>';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->categories()->detach();
            $product->delete();
        }
    }

    public function indexCart()
    {
        //
        $cart = json_decode(Cookie::get('cart'));
        $totalPrice = 0;
        $products = [];

        if (!$cart) {
            $cart = [];
        }

        foreach ($cart as $product) {
            $product->product = Product::find($product->id);
            $totalPrice += $product->product->price * $product->quantity;
            $products[] = $product;
        }

        return view('shop.cart', compact('products', 'totalPrice'));
    }

    public function addToCart(Request $request, $id)
    {
        $isInCart = false;
        $cart = json_decode($request->cookie('cart'));

        if (!$cart) {
            $cart = [];
        }

        foreach ($cart as $product) {
            if ($product->id == $id) {
                $product->quantity += $request->input('quantity');
                $isInCart = true;
            }
        }

        if (!$isInCart) {
            $obj = new stdClass();
            $obj->id = $id;
            $obj->quantity = $request->input('quantity');
            $cart[] = $obj;
        }
        return redirect('shop')->cookie('cart', json_encode($cart), 24 * 60 * 2);
    }

    public function delToCart(Request $request, $id)
    {
        $cart = json_decode($request->cookie('cart'));
        $newCart = [];

        if (!$cart) {
            $cart = [];
        }

        foreach ($cart as $product) {
            if ($product->id != $id) {
                $newCart[] = $product;
            }
        }

        return redirect('/shop/cart')->cookie('cart', json_encode($newCart), 24 * 60 * 2);
    }

    public function order()
    {
        return redirect(route('shop.buy'));
    }

    public function buy()
    {
        $cart = json_decode(Cookie::get('cart'));
        $totalPrice = 0;

        if (!$cart) {
            $cart = [];
        }
        $products = [];
        foreach ($cart as $key => $cartProduct) {
            $products[$key] = Product::find($cartProduct->id);
            $totalPrice += $products[$key]->price * $cartProduct->quantity;
        }

        if (count($cart) > 0) {
            $order = Order::create(['price' => $totalPrice, 'user_id' => User::auth()->id]);
            foreach ($products as $key => $product) {
                Contain::create(['order_id' => $order->id, 'product_id' => $product->id, 'quantity' => $cart[$key]->quantity]);
            }

            Mail::to(User::auth()->email)->send(new OrderConfirmMail($order));
        }

        return redirect('shop')->cookie('cart', json_encode([]));
    }

    public function allFormatted()
    {
        $products = Product::all();
        $productsDetails = [];

        for ($i = 0; $i < $products->count(); $i++) {
            $productsDetails[$i] = array('product_name' => $products[$i]->name, 'product_image' => $products[$i]->image->path, 'product_price' => $products[$i]->price, 'product_id' => $products[$i]->id);

        }
        return Response::json(array('data' => $productsDetails));
    }


}
