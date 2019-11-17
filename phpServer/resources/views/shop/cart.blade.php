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

@push('head-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')

    <div class="top-center">
        <h1>Votre panier</h1>
        <div class="cart">Panier : <b>{{ $totalPrice }}€</b></div>
    </div>

    @foreach($products as $product)
         <div class="container">
             <div class="row title">
                 <div class="col">
                     <form action="{{ route('shop.delToCart', $product->product->id) }}" method="post">
                         @csrf
                         <button class="yellow" type="submit"><img src="{{ asset('assets/imgs/close.png') }}" class="del" alt="supprimer"></button>
                     </form>
                </div>
                 <div class="col-4"><span class="full-text">Article</span><span class="short-text">Art</span></div>
                 <div class="col"><span class="full-text">Quantité</span><span class="short-text">Qté</span></div>
                 <div class="col"><span class="full-text">Prix Unitaire</span><span class="short-text">P. Uni</span></div>
                 <div class="col"><span class="full-text">Prix TTC</span><span class="short-text">P. TTC</span></div>
                 <div class="col"><span class="full-text">Référence</span><span class="short-text">Réf</span></div>
             </div>

             <hr>

             <div class="row">
                 <div class="col">
                     <img src={{ asset('storage/imagesUploaded/'.$product->product->image->path) }} alt="produit">
                 </div>
                 <div class="col-4">
                     <p class="product-name">{{ $product->product->name }}</p>
                     <div class="description">{{ substr($product->product->description, 0, 100) }}...</div>
                 </div>
                 <div class="col">
                     <div class="product-quantity">{{ $product->quantity }}</div>
                 </div>
                 <div class="col">
                     <div class="product-price">{{ $product->product->price }}€</div>
                 </div>
                 <div class="col">
                     <div class="product-price">{{ $product->product->price * $product->quantity }}€</div>
                 </div>
                 <div class="col">
                     <a href={{ route('shop.product.show', $product->product->id) }}>
                         <span class="full-text">Voir dans la boutique</span>
                         <span class="short-text">Voir</span>
                     </a>
                 </div>
             </div>

             <hr class="hr-bottom">
         </div>
    @endforeach

    <a href="{{ route('shop') }}" class="btn btn-light" id="shop">Retour à la boutique</a>
    <a href="{{ route('shop.order') }}" class="btn submit-button" id="order">Valider la commande</a>

@endsection
