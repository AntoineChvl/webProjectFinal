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

        <a class="btn submit-button col-3" id="listUsers" href="{{ route('admin-images') }}">
            Accéder à la liste des inscrits par évènement
        </a>

        <button class="btn submit-button col-3" id="checkPastEvents">
            Gérer les photos et commentaires des évènements passés
        </button>

        <button class="btn submit-button col-3" id="seeNotifications">
            Voir les notifications des membres du personnel CESI
        </button>

    </div>

    <hr>



    @for($i = 0; $i < $pastEventsNumber; $i++)


        <div class="row flex-column d-none"  id="tablePE{{$i}}">
            <h5>Évènement {{ $events[$i]->name }} </h5>
            <table>
                <thead>
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                </tr>
                </tfoot>
            </table>
        </div>



    @endfor



    <table id="table_id" class="d-none">
        <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
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
