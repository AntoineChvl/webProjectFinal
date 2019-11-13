@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Votre panier
@endsection

@section('head-meta-description')
    Votre panier vous permet de conserver une trace des articles que vous avez choisi d'acheter sur notre site
@endsection

@push('stylesheet')
    <link href="{{ asset('css/project-css/shop/cart.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="top-center">
        <h1>Votre panier</h1>
        <div class="cart">Panier : <b>{{ $totalPrice }}€</b></div>
    </div>

    @foreach($products as $product)
         <article class="container">
             <div class="row title">
                 <div class="col"></div>
                 <div class="col-4"><span class="full-text">Article</span><span class="short-text">Art</span></div>
                 <div class="col"><span class="full-text">Quantité</span><span class="short-text">Qté</span></div>
                 <div class="col"><span class="full-text">Prix Unitaire</span><span class="short-text">P. Uni</span></div>
                 <div class="col"><span class="full-text">Prix TTC</span><span class="short-text">P. TTC</span></div>
                 <div class="col"><span class="full-text">Référence</span><span class="short-text">Réf</span></div>
             </div>

             <hr>

             <div class="row">
                 <div class="col">
                     <img src={{ asset('storage/imagesUploaded/'.$product['productDetails']->image->path) }} alt="product">
                 </div>
                 <div class="col-4">
                     <p class="product-name">{{ $product['productDetails']['name'] }}</p>
                     <div class="description">{{ substr($product['productDetails']['description'], 0, 100) }}...</div>
                 </div>
                 <div class="col">
                     <div class="product-quantity">{{ $quantity = $product['quantity'] }}</div>
                 </div>
                 <div class="col">
                     <div class="product-price">{{ $price = $product['productDetails']['price'] }}€</div>
                 </div>
                 <div class="col">
                     <div class="product-price">{{ $price * $quantity }}€</div>
                 </div>
                 <div class="col">
                     <a href={{ route('shop.product.show', $product['productDetails']['id']) }}>
                         <span class="full-text">Voir dans la boutique</span>
                         <span class="short-text">Voir</span>
                     </a>
                 </div>
             </div>

             <hr class="hr-bottom">
         </article>
    @endforeach

    <a href="{{ route('shop') }}" class="btn btn-light" id="shop">Retour à la boutique</a>
    <a href="{{ route('shop.order') }}" class="btn btn-light">HT</a>

@endsection
