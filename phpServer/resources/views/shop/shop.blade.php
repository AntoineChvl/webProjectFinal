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
@if(!isset($category))
<div class="container">
    <div class="row">
        <div class="col">
            <div class="top-block-image">
                <p>Vente - Top 2</p>
                <p>{{ $bestSeller[1]->name }}</p>
                <a href="{{route('shop.product.show',$bestSeller[1])}}"><img src="{{ asset('storage/imagesUploaded/'.$bestSeller[1]->image->path) }}" alt="top2"></a>
            </div>
        </div>

        <div class="col">
            <div class="top-block-image">
                <p>Vente - Top 1</p>
                <p>{{ $bestSeller[0]->name }}</p>
                <a href="{{route('shop.product.show',$bestSeller[0])}}"><img src="{{ asset('storage/imagesUploaded/'.$bestSeller[0]->image->path) }}" alt="top1"></a>
            </div>
        </div>

        <div class="col">
            <div class="top-block-image">
                <p>Vente - Top 3</p>
                <p>{{ $bestSeller[2]->name }}</p>
                <a href="{{route('shop.product.show',$bestSeller[2])}}"><img src="{{ asset('storage/imagesUploaded/'.$bestSeller[2]->image->path) }}" alt="top3"></a>
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







