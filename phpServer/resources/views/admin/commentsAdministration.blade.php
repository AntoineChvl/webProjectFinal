@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Administration
@endsection

@section('head-meta-description')
    Administration des activités et autres !
@endsection

@push('head-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="route-name" content="/api/events/images/comments">
    <meta name="imagePastEventId" content="{{ $imagePastEventId }}">
@endpush

@push('stylesheet')
    <link href="{{ asset('css/project-css/events.css') }}" rel="stylesheet">
    <link href="{{ asset('css/project-css/lightbox/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/project-css/adminPanel.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endpush


@section('content')


    <a href="{{ URL::previous() }}" class="btn btn-light backToEvents">Retour au panel administration</a>

    <hr>
    <h1>Image postée sur l'évènement</h1>
    <hr>
    <img src="{{ asset('storage/imagesUploaded/'.$imageToCheckComments->path) }}" alt="Image avec les commentaires à vérifier !" id="imagePreview">

    <hr>


    <table id="imageComments" class="d-none" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Contenu du commentaire</th>
            <th>Nom de l'utilisateur</th>
            <th>Administration</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Contenu du commentaire</th>
            <th>Nom de l'utilisateur</th>
            <th>Administration</th>
        </tr>
        </tfoot>
    </table>

@endsection

@push('script')
    <script src="https://kit.fontawesome.com/1d7bafa102.js" crossorigin="anonymous"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

    <script src="{{ asset('js/project-js/adminTable.js') }}"></script>
    <script src="{{ asset('js/project-js/loadImagesData.js') }}"></script>
    <script src="{{ asset('js/project-js/loadAdminImageComments.js') }}"></script>
@endpush
