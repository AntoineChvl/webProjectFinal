@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Création d'un produit
@endsection

@section('head-meta-description')
    Page de création des produits directement disponibles
@endsection

@push('stylesheet')
    <link href="{{ asset('css/project-css/shop/createProduct.css') }}" rel="stylesheet">
@endpush

@section('content')

    <!-- Create a product with categories or properties -->
    <div>
        <a href="{{URL::previous()}}" class="btn btn-light back" id="back">Retour</a>

        <form method="POST" action="{{route('shop.product.store')}}" enctype="multipart/form-data">
            @csrf
            <h1>Création d'un produit</h1>
            <hr>

                <!-- Choosing the categories of an article -->
                <p class="selectCat">Sélectionnez une ou plusieurs catégorie(s)</p>
                <div class="category-list row">
                    @foreach($categories as $category)
                        <div class="col-md-2 col-sm-6">
                            <label for="{{ $category->id }}">{{ $category->name }}</label>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <input id="{{ $category->id }}" type="checkbox" name="{{ $category->id }}">
                        </div>
                    @endforeach
                </div>

                <!-- Choosing the properties of an article -->
                <p class="propArt">Propriétés de l'article</p>
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <label>Nom : </label>
                        </div>
                        <div class="col-2">
                            <input class="form-control" type="text" name="name" value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label>Prix : </label>
                        </div>
                        <div class="col-2">
                            <input class="form-control" type="number" step="0.01" name="price" value="{{old('price')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label>Description : </label>
                        </div>
                        <div class="col-2">
                            <textarea class="form-control" name="description">{{old('description')}}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label>Image : </label>
                        </div>
                        <div class="col-2">
                            <input type="file" name="image" id="imageReadyToUpload">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <img id="imagePreview" src="https://www.commerce-pontarlier.com/assets/images/masque_commercant.png" alt="apercu">
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn submit-button" id="sub" type="submit">Valider</button>
                    </div>
                </div>
        </form>
    </div>

@endsection

@push('script')
    <script src="{{ asset('js/project-js/images/preview-image.js') }}"></script>
@endpush
