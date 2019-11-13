@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Administration
@endsection

@section('head-meta-description')
    Administration des activités et autres !
@endsection

@push('head-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="route-name" content="/api/events/images/all">
@endpush

@push('stylesheet')
    <link href="{{ asset('css/project-css/events.css') }}" rel="stylesheet">
    <link href="{{ asset('css/project-css/lightbox/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/project-css/adminPanel.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endpush


@section('content')

    <h1>Images postées sur les évènements passés</h1>
    <hr>

    <select name="eventChoice" id="eventChoice" class="form-control">

        <option value="">Choisir un évènement</option>
        @foreach($events as $event)
            <option value="event{{$event->id}}">{{$event->name}} -- {{ $event->imagesPostedByUsers->count() }}</option>
        @endforeach
    </select>

    <hr>

    <table id="eventImages" class="d-none" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Image</th>
            <th>Nom de l'évènement</th>
            <th>Id de l'image</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Image</th>
            <th>Nom de l'évènement</th>
            <th>Id de l'image</th>
        </tr>
        </tfoot>
    </table>

@endsection

@push('script')
    <script src="{{ asset('js/project-js/preview-image.js') }}"></script>
    <script src="{{ asset('js/project-js/lightbox/lightbox.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/1d7bafa102.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/project-js/like.js') }}"></script>
    <script src="{{ asset('js/project-js/interact-image.js') }}"></script>
    <script src="{{ asset('js/project-js/participateEvent.js') }}"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>


    <script src="{{ asset('js/project-js/load-admin-data.js') }}"></script>
@endpush
