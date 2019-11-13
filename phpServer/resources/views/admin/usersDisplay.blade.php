@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Administration
@endsection

@section('head-meta-description')
    Listes des utilisateurs par évènement !
@endsection

@push('head-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="route-name" content="/api/espace-admin/events/users/all">
@endpush

@push('stylesheet')
    <link href="{{ asset('css/project-css/events.css') }}" rel="stylesheet">
    <link href="{{ asset('css/project-css/lightbox/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/project-css/adminPanel.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/b-flash-1.6.1/datatables.min.css"/>
@endpush


@section('content')


    <a href="{{ route('admin-panel') }}" class="btn btn-light backToEvents">Retour au panel administration</a>

    <hr>
    <h1>Utilisateurs inscrits pour chaque évènement !</h1>
    <hr>

    <select name="eventChoice" id="eventChoice" class="form-control">
        <option value="">Choisir un évènement</option>
        @foreach($events as $event)
            <option value="event{{$event->id}}">{{$event->name}}</option>
        @endforeach
    </select>

    <hr>

    <table id="usersParticipation" class="d-none" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Id de l'utilisateur</th>
            <th>Prénom de l'utilisateur</th>
            <th>Nom de l'utilisateur</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Id de l'utilisateur</th>
            <th>Prénom de l'utilisateur</th>
            <th>Nom de l'utilisateur</th>
        </tr>
        </tfoot>
    </table>

@endsection

@push('script')
    <script src="{{ asset('js/project-js/preview-image.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/b-flash-1.6.1/datatables.min.js"></script>
    <script src="{{ asset('js/project-js/adminTable.js') }}"></script>
    <script src="{{ asset('js/project-js/loadUsersParticipation.js') }}"></script>
@endpush
