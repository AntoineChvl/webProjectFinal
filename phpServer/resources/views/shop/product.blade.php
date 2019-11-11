@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - {{ $product->name }}
@endsection

@section('head-meta-description')
    Le bureau des élèves de Saint-Nazaire a mit en vente un nouveau produit, c'est {{ $product->name }}, soit {{ $product->description }}
@endsection

@push('stylesheet')
    <link href="{{ asset('css/project-css/product.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="navigation">
        <a href="{{route('shop')}}" class="btn btn-light" id="shop">Retour à la boutique</a>
        <a href="{{route('shop')}}" class="btn submit-button" id="cart">Ajouter au panier</a>
        <hr class="hr-top">
    </div>

    <article class="container">
        <div class="row">
            <div class="col">
                <img src="{{ asset('storage/imagesUploaded/'.$product->image->path) }}" alt="product">
            </div>

            <div class="col">
                <h1>{{$product->name}}</h1>

                <p>Prix du produit : {{$product->price}} €</p>
                <hr class="hr-desc">
                <div class="description">{{$product->description}}</div>
            </div>
        </div>
    </article>

@endsection
