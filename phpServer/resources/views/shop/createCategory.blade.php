@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Création de produit
@endsection

@section('head-title')
    BDE Saint-Nazaire - Création de catégories
@endsection

@section('head-meta-description')
    Page de création/modification des catégories directement disponibles
@endsection

@push('stylesheet')
    <link href="{{ asset('css/project-css/shop/createCategory.css') }}" rel="stylesheet">
@endpush

@section('content')

    <!-- Create a category -->
    <section>
        <a href="{{URL::previous()}}" class="btn btn-light back" id="back">Retour</a>

        <form method="POST" action="{{route('shop.category.store')}}">
            @csrf
            <h1>Création d'une catégorie</h1>
            <hr>
            <div class="add">
                <input class="form-control" type="text" name="name" value="{{old('name')??''}}" placeholder="Nom...">
                <button class="btn submit-button" id="sub" type="submit">Valider</button>
            </div>
        </form>
    </section>

@endsection
