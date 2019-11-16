@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Administration
@endsection

@section('head-meta-description')
    Administration des activités et autres !
@endsection

@push('head-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="route-name" content="/events/all">
@endpush

@push('stylesheet')
    <link href="{{ asset('css/project-css/events.css') }}" rel="stylesheet">
    <link href="{{ asset('css/project-css/adminPanel.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css"/>
@endpush


@section('content')


    <a href="{{ route('admin-panel') }}" class="btn btn-light back">Retour au panel administration</a>
    <hr>
    <h1>Tous les évènements</h1>
    <hr>

    <div class="mb-5">
        <table id="eventsList" class="d-none dt-reponsive">
            <thead>
            <tr>
                <th>Nom de l'évènement</th>
                <th>Image de l'évènement</th>
                <th>Description de l'évènement</th>
                <th>Lieu de l'évènement</th>
                <th>Prix de l'évènement</th>
                <th>Gérer l'évènement</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Nom de l'évènement</th>
                <th>Image de l'évènement</th>
                <th>Description de l'évènement</th>
                <th>Lieu de l'évènement</th>
                <th>Prix de l'évènement</th>
                <th>Gérer l'évènement</th>
            </tr>
            </tfoot>
        </table>
    </div>


@endsection

@push('script')
    <script src="https://kit.fontawesome.com/1d7bafa102.js" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

    <script src="{{ asset('js/project-js/admin/adminTable.js') }}"></script>
    <script src="{{ asset('js/project-js/admin/loadEvents.js') }}"></script>
@endpush
