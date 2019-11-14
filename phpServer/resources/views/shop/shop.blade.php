@extends('layouts.master')

@section('head-title')
BDE Saint-Nazaire - Notre boutique
@endsection

@section('head-meta-description')
Le bureau des élèves de Saint-Nazaire possède une boutique avec plein de produits à son effigie !
@endsection

@push('stylesheet')
<link rel="stylesheet" href="{{ asset('css/project-css/shop/shop.css') }}">
<link rel="stylesheet" href="{{ asset('css/EasyAutocomplete/easy-autocomplete.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/EasyAutocomplete/easy-autocomplete.themes.min.css') }}">
@endpush

@section('content')

<div class="top-center">
    <h1>Boutique du bureau de élèves</h1>
    <a href="/shop/cart" class="cart">Mon panier</a>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="top-block-image">
                <p>Vente - Top 2</p>
                <img src="https://via.placeholder.com/480/blue/fff.png" alt="top2">
            </div>
        </div>

        <div class="col">
            <div class="top-block-image">
                <p>Vente - Top 1</p>
                <img src="https://via.placeholder.com/480/blue/fff.png" alt="top1">
            </div>
        </div>

        <div class="col">
            <div class="top-block-image">
                <p>Vente - Top 3</p>
                <img src="https://via.placeholder.com/480/blue/fff.png" alt="top3">
            </div>
        </div>
    </div>
</div>

<div class="transition">
    <section>
        <p class="p-scroll">Découvrez tous nos produits !</p>
        <a href="#" class="scroll-down"></a>
    </section>

    <section class="cat-products">
        <br><br>
        <hr class="top-bar">
        <nav class="cat">
            <label><a class="yellow" href="#">T-Shirt</a></label>
            <label><a class="yellow" href="#">Casquette</a></label>
            <label><a class="yellow" href="#">Mug</a></label>
            <label><a class="yellow" href="#">Stylo</a></label>
        </nav>
        <hr>
    </section>
</div>


@if(App\User::auth() && App\User::auth()->statusLvl==2)
<a href="{{ route('shop.product.create') }}"><button class="btn submit-button bde" type="submit">Ajouter un produit</button></a>
<a href="{{ route('shop.category.create') }}"><button class="btn submit-button bde" type="submit">Ajouter une catégorie</button></a>
@endif

<input type="text" placeholder="Recherchez..." id="search-bar">

<div class="product-list row">
    @foreach($products as $product)
    <article class="product col-3">
        <a href={{ route('shop.product.show', $product->id) }}><img src={{ asset('storage/imagesUploaded/'.$product->image->path) }} alt="product"></a>
        <p class="product-name">{{ $product->name }}</p>
    </article>
    @endforeach
</div>

<div class="separate"></div>

@endsection

@push('script')
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="{{ asset('js/EasyAutocomplete/jquery.easy-autocomplete.min.js') }}"></script>
<script src="{{ asset('js/project-js/shopAutocomplete.js') }}"></script>
<script src="{{ asset('js/project-js/shop.js') }}"></script>
@endpush







