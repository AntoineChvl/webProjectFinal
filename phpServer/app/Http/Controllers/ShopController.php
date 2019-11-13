<?php

namespace App\Http\Controllers;

use App\Contain;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Mail\OrderConfirmMail;
use App\User;
use Illuminate\Support\Facades\Cookie;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.shop')->with('products', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("shop/createProduct")->withAction('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        $product = Product::create($request->only('name', 'description', 'price') + ['user_id' => User::auth()->id] + ['image_id' => 1]);
        return redirect('shop.product.show', $product->id);
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
            session()->flash('message flash', ['type' => 'success', 'content' => "L'article a bien été ajouté"]);
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
            return view("shop/createProduct")->withAction('edit')->withProduct($product);
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
            $product->update([$request->only('name', 'description', 'price')]);
            session()->flash('message flash', ['type' => 'success', 'content' => "L'article a bien été modifié"]);
            if ($request->image) {
                //TODO ajout image
                //$product->image()->associate($image);
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
            $product->delete();
            session()->flash('message flash', ['type' => 'success', 'content' => "L'article a bien été supprimé"]);
            return redirect('shop.product.index');
        } else {
            return '<p>Le produit que vous recherchez n\'existe pas !</p>';
        }
    }

    public function indexCart()
    {
        //
        $idProd = Cookie::get('cart');
        $cart = json_decode($idProd);
        $totalPrice = 0;

        if (!$cart) {
            $cart = [];
        }

        foreach ($cart as $product) {
            $product = array('productDetails' => Product::find($product->productId), 'quantity' => $product->quantity);
            $totalPrice += $product['productDetails']['price'] * $product['quantity'];
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
            if (in_array($id, (array)$product)) {
                $product->quantity += $request->input('quantity');
                $isInCart = true;
            }
        }

        if (!$isInCart) {
            $cart[] = array('productId' => $id, 'quantity' => $request->input('quantity'));
        }
        return redirect('shop')->cookie('cart', json_encode($cart), 24 * 60);
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
        foreach ($cart as $key => $product) {
            $products[$key] = Product::find($product->productId);
            $totalPrice += $products[$key]->price * $product->quantity;
        }

        $order = Order::create(['price'=>$totalPrice,'user_id'=>User::auth()->id]);
        foreach ($products as $key => $product){
            Contain::create(['order_id'=>$order->id,'product_id'=>$product->id,'quantity'=>$cart[$key]->quantity]);
        }

        Mail::to(User::auth()->email)->send(new OrderConfirmMail($order));
        //return redirect('home');
    }
}
