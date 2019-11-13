<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('shop.shop')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
        dd(Cookie::get('cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function indexCart()
    {
        //
        $idProd = Cookie::get('cart');
        $cart = json_decode($idProd);
        $totalPrice = 0;

        if(! $cart) {
            $cart = [];
        }

        foreach($cart as $product) {
            $product = array('productDetails' => Product::find($product->productId), 'quantity' => $product->quantity);
            $totalPrice += $product['productDetails']['price'] * $product['quantity'];
            $products[] = $product;
        }

        return view('shop.cart', compact('products','totalPrice'));
    }

    public function addToCart(Request $request, $id)
    {
        $isInCart = false;
        $cart = json_decode($request->cookie('cart'));

        if(! $cart) {
            $cart = [];
        }

        foreach($cart as $product) {
            if(in_array($id, (array)$product)) {
                $product->quantity += $request->input('quantity');
                $isInCart = true;
            }
        }

        if(!$isInCart) {
            $cart[] = array('productId' => $id, 'quantity' => $request->input('quantity'));
        }
        return redirect('shop')->cookie('cart', json_encode($cart), 24*60);
    }
}
