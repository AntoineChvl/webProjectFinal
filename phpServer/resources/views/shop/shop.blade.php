@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Notre boutique
@endsection

@section('head-meta-description')
    Le bureau des élèves de Saint-Nazaire possède une boutique avec plein de produits à son effigie !
@endsection

@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/project-css/shop/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('css/project-css/transition.css') }}">
    <link rel="stylesheet" href="{{ asset('css/EasyAutocomplete/easy-autocomplete.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/EasyAutocomplete/easy-autocomplete.themes.min.css') }}">
@endpush

@section('content')

    <div class="top-center">
        <h1>Boutique du bureau des élèves</h1>
        <a href="/shop/cart" class="cart">Mon panier</a>
    </div>
    @if(!isset($category))
        <div class="container">
            <div class="row">
                @isset($bestSeller[1])
                    <div class="col">
                        <div class="top-block-image">
                            <p>Vente - Top 2</p>
                            <p>{{ $bestSeller[1]->name }}</p>
                            <a href="{{route('shop.product.show',$bestSeller[1])}}"><img
                                    src="{{ asset('storage/imagesUploaded/'.$bestSeller[1]->image->path) }}" alt="top2"></a>
                        </div>
                    </div>
                @endisset
                @isset($bestSeller[0])
                    <div class="col">
                        <div class="top-block-image">
                            <p>Vente - Top 1</p>
                            <p>{{ $bestSeller[0]->name }}</p>
                            <a href="{{route('shop.product.show',$bestSeller[0])}}"><img
                                    src="{{ asset('storage/imagesUploaded/'.$bestSeller[0]->image->path) }}" alt="top1"></a>
                        </div>
                    </div>
                @endisset
                @isset($bestSeller[2])
                    <div class="col">
                        <div class="top-block-image">
                            <p>Vente - Top 3</p>
                            <p>{{ $bestSeller[2]->name }}</p>
                            <a href="{{route('shop.product.show',$bestSeller[2])}}"><img
                                    src="{{ asset('storage/imagesUploaded/'.$bestSeller[2]->image->path) }}" alt="top3"></a>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    @endif

        <div class="transition">
            @if(!isset($category))
                <p class="p-scroll">Découvrez tous nos produits !</p>

                <a href="#" class="scroll-down"></a>
            @endif

            <div class="section-scroll"></div>

            <div>
                <div>
                    <hr class="top-bar">
                        <div class="centerCol">
                            <button class="btn submit-button" type="button" id="filter" data-toggle="collapse"
                                    data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Filtrer par catégories
                            </button>
                        </div>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <div class="row">
                                @foreach(App\Category::all() as $category)
                                    <div class="col-3">
                                        <a class="btn submit-button w-100"
                                           href="{{ route('shop.category.show', $category) }}">{{ $category->name }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <form class="centerCol">
                        <div class="centerCol">
                            <button class="btn submit-button" type="submit">Filtrer par prix</button>
                        </div>
                        <input class="form-control" type="number" name="price_min" min="0" value="{{Request::has('price_min') ? Request::input('price_min') : 0}}">
                        <input class="form-control" type="number" name="price_max" min="0" value="{{Request::has('price_max') ? Request::input('price_max') : 1000}}">
                    </form>
                    <hr>
                </div>
            </div>
        </div>

    <input type="text" placeholder="Recherchez..." id="search-bar">

    <div class="product-list row">
        @foreach($products as $product)
            <div class="product col-md-3 col-sm-6">
                <a href={{ route('shop.product.show', $product->id) }}><img src={{ asset('storage/imagesUploaded/'.$product->image->path) }} alt="produit"></a>
                <p class="product-name">{{ $product->name }}</p>
            </div>
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







