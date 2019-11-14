@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Création de produit
@endsection

@section('head-meta-description')
    Page de création/modification des produits directement disponibles
@endsection

@push('stylesheet')
    <link href="{{ asset('css/project-css/shop/createProduct.css') }}" rel="stylesheet">
@endpush

@section('content')

    <section>
        <a href="{{URL::previous()}}" class="btn btn-light back" id="back">Retour</a>

        <form method="POST" action="{{ $action=='create'? route('shop.product.store') : route('shop.product.update',$product)}}" enctype="multipart/form-data">
            @if($action!='create')
                @method('PATCH')
            @endif
            @csrf

            <h1>Création d'un produit</h1>
            <hr>
                <p class="selectCat">Sélectionnez une ou plusieurs catégorie(s)</p>
                <div class="category-list row">
                    @foreach($categories as $category)
                        <article class="col-2">
                            <label for="{{ $category->id }}">{{ $category->name }}</label>
                        </article>
                            <article class="col-2">
                            <input id="{{ $category->id }}" type="checkbox" name="{{ $category->id }}"
                                {{isset($product) ? $product->categories->contains($category)? 'Checked' : '' : ''}}>
                        </article>
                    @endforeach
                </div>

                <p class="propArt">Propriétés de l'article</p>
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <label>Nom : </label>
                        </div>
                        <div class="col-2">
                            <input class="form-control" type="text" name="name" value="{{old('name')?? (isset($product) ? $product->name : '')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label>Prix : </label>
                        </div>
                        <div class="col-2">
                            <input class="form-control" type="number" step="0.01" name="price" value="{{old('price')?? isset($product) ? $product->price : ''}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label>Description : </label>
                        </div>
                        <div class="col-2">
                            <textarea class="form-control" name="description">{{old('description')?? isset($product) ? $product->description : ''}}</textarea>
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
                            <img id="imagePreview" src="{{ isset($product)?asset('storage/imagesUploaded/'.$product->image->path):''}}">
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn submit-button" id="sub" type="submit">Valider</button>
                    </div>
                    </div>
                </div>
        </form>
    </section>

@endsection

@push('script')
    <script src="{{ asset('js/project-js/images/preview-image.js') }}"></script>
@endpush
