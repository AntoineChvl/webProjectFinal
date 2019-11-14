@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Créer un évènement !
@endsection

@section('head-meta-description')
    Le bureau des élèves de Saint-Nazaire organise une nouvelle activité, à toi de créer ton évènement !
@endsection

@push('stylesheet')
    <link href="{{ asset('css/project-css/events.css') }}" rel="stylesheet">
@endpush


@section('content')



    <section>
        <h1 class="createEvent">Créer un évènement pour le BDE</h1>


        <form action="{{route('events.store')}}" method="POST" enctype="multipart/form-data">

            @csrf

            @include('partials.events._form')

            <button type="submit" class="btn submit-button">Créer l'évènement !</button>


        </form>

    </section>

@endsection

@push('script')
    <script src="{{ asset('js/project-js/images/preview-image.js') }}"></script>
@endpush
