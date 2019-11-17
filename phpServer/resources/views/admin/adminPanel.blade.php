@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Administration
@endsection

@section('head-meta-description')
    Administration des activités et autres !
@endsection

@push('head-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('stylesheet')
    <link href="{{ asset('css/project-css/events.css') }}" rel="stylesheet">
    <link href="{{ asset('css/project-css/lightbox/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/project-css/adminPanel.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css"/>
@endpush


@section('content')

    <h1>Panel d'administration</h1>
    <hr>

    <div class="container-fluid optionsContainer">

        <h2>Évènements</h2>
        @if($user->statusLvl == 2)
            <a class="row btn submit-button col-12" href="{{ route('events.create') }}">
                Ajouter un évènement
            </a>

            <a class="row btn submit-button col-12" id="listUsers" href="{{ route('admin-event-users') }}">
                Accéder à la liste des inscrits par évènement
            </a>
        @endif

        <a class="row btn submit-button col-12"  href="{{ route('admin-events') }}">
            Gérer les évènements
        </a>

        <a class="row btn submit-button col-12" href="{{ route('admin-images') }}">
            Gérer les photos et commentaires des évènements passés
        </a>

        @if($user->statusLvl == 3)
        <a class="row btn submit-button col-12" id="downloadImages" href="{{ route('images-download') }}">
            Télécharger l'ensemble des photos postées par les étudiants et les membres du BDE
        </a>
        @endif
    </div>

    <hr>

    @if($user->statusLvl == 2)
    <div class="container-fluid optionsContainer">

        <h2>Boutique</h2>

        <a href="{{ route('shop.product.create') }}" class="row btn submit-button col-12">Ajouter un produit</a>
        <a href="{{ route('shop.category.create') }}" class="row btn submit-button col-12">Ajouter une catégorie</a>
        <a href="{{ route('admin-products') }}" class="row btn submit-button col-12">Gérer les produits</a>
        <a href="{{ route('admin-categories') }}" class="row btn submit-button col-12">Gérer les catégories</a>
    </div>

    <hr>
    @endif


@endsection

@push('script')
    <script src="https://kit.fontawesome.com/1d7bafa102.js" crossorigin="anonymous"></script>
@endpush
