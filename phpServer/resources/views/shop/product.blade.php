@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - {{ $product->name }}
@endsection

@section('head-meta-description')
    Le bureau des élèves de Saint-Nazaire a mit en vente un nouveau produit, c'est {{ $product->name }}, soit {{ $product->description }}
@endsection

@push('stylesheet')
    <link href="{{ asset('css/project-css/shop/product.css') }}" rel="stylesheet">
@endpush

@section('content')

    <!-- Return to the shop or add to the cart with a quantity -->
    <div class="navigation">
        <a href="{{ route('shop') }}" class="btn btn-light" id="shop">Retour à la boutique</a>

        <form action="{{ route('shop.addToCart', $product->id) }}" method="post">
            @csrf
            <div class="container flex-column">
                <input  class="btn submit-button quantity" type="number" name="quantity" value="1" min="1" required>
                <button class="btn submit-button" id="cart" type="submit">Ajouter au panier</button>
            </div>
        </form>

        <hr class="hr-top">
    </div>

    <!-- Display a box containing all the information of a single product -->
    <article class="container">
        <div class="row">
            <div class="col">
                <img src="{{ asset('storage/imagesUploaded/'.$product->image->path) }}" alt="produit">
            </div>

            <div class="col">
                <h1>{{ $product->name }}</h1>

                <p>Prix du produit : {{ $product->price }} €</p>
                <hr class="hr-desc">
                <div class="description">{{ $product->description }}</div>
            </div>
        </div>
    </article>

    @if(App\User::auth() && App\User::auth()->statusLvl == 2)
        <div class="update">
            <a class="row btn submit-button col-12" href="/shop/product/{{ $product->id }}/edit">
                Modifier l'article
            </a>
        </div>
    @endif

@endsection

