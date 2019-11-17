@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Administration
@endsection

@section('head-meta-description')
    Administration des activités et autres !
@endsection

@push('head-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="route-name" content="/shop/categories/all">
@endpush

@push('stylesheet')
    <link href="{{ asset('css/project-css/events.css') }}" rel="stylesheet">
    <link href="{{ asset('css/project-css/adminPanel.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/b-html5-1.6.1/r-2.2.3/datatables.min.css"/>
@endpush

<!-- Manage existing categories -->

@section('content')


    <a href="{{ route('admin-panel') }}" class="btn btn-light back">Retour au panel administration</a>
    <hr>
    <h1>Catégories existantes pour les articles</h1>
    <hr>


    <table id="categoriesList" class="d-none" >
        <thead>
        <tr>
            <th>Nom de la catégorie</th>
            <th class="not-tablet">Gérer la catégorie</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Nom de la catégorie</th>
            <th>Gérer la catégorie</th>
        </tr>
        </tfoot>
    </table>

@endsection

@push('script')
    <script src="https://kit.fontawesome.com/1d7bafa102.js" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/b-html5-1.6.1/r-2.2.3/datatables.min.js"></script>

    <script src="{{ asset('js/project-js/admin/adminTable.js') }}"></script>
    <script src="{{ asset('js/project-js/admin/loadCategories.js') }}"></script>
@endpush
