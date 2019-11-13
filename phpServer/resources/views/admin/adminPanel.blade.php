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

    <h1>Partie administration</h1>
    <hr>

    <div class="container row d-flex flex-row justify-content-around">

        <a class="btn submit-button col-3" id="listUsers" href="#">
            Accéder à la liste des inscrits par évènement
        </a>

        <a class="btn submit-button col-3" id="checkPastEvents" href="{{ route('admin-images') }}">
            Gérer les photos et commentaires des évènements passés
        </a>

        <a class="btn submit-button col-3" id="seeNotifications" href="#">
            Voir les notifications des membres du personnel CESI
        </a>

    </div>

    <hr>


@endsection

@push('script')
    <script src="https://kit.fontawesome.com/1d7bafa102.js" crossorigin="anonymous"></script>
@endpush
