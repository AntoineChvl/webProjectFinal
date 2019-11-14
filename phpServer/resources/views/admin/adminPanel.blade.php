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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endpush


@section('content')

    <h1>Panel d'administration</h1>
    <hr>

    <div class="container-fluid optionsContainer">

        <h2>Évènements</h2>
        @if($user->statusLvl == 2)
            <a class="row btn submit-button col-12" id="listUsers" href="{{ route('admin-event-users') }}">
                Accéder à la liste des inscrits par évènement
            </a>

            <a class="row btn submit-button col-12" id="checkPastEvents" href="{{ route('admin-images') }}">
                Gérer les photos et commentaires des évènements passés
            </a>

            <a class="row btn submit-button col-12" id="checkPastEvents" href="{{ route('events.create') }}">
                Ajouter un évènement
            </a>
        @endif

        <a class="row btn submit-button col-12" id="downloadImages" href="{{ route('images-download') }}">
            Télécharger l'ensemble des photos postées par les étudiants et les membres du BDE
        </a>


    </div>

    <hr>

    @if($user->statusLvl == 2)
    <div class="container-fluid optionsContainer">

        <h2>Boutique</h2>

        <a href="{{ route('shop.product.create') }}" class="row btn submit-button col-12">Ajouter un produit</a>
        <a href="{{ route('shop.category.create') }}" class="row btn submit-button col-12">Ajouter une catégorie</a>

    </div>

    <hr>
    @endif

@endsection

@push('script')
    <script src="https://kit.fontawesome.com/1d7bafa102.js" crossorigin="anonymous"></script>
@endpush
