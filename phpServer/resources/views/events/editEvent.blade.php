@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Modifier un évènement !
@endsection

@section('head-meta-description')
    Au bureau des élèves on est relax... tu peux modifier tes évènements si t'as fais une boulette !
@endsection

@push('stylesheet')
    <link href="{{ asset('css/project-css/events.css') }}" rel="stylesheet">
@endpush


@section('content')


    <section>
        <h1 class="createEvent">Modifier l'évènement {{ $event->name }}</h1>


        <form action="{{route('events.update', $event->id)}}" method="POST" enctype="multipart/form-data">

            @csrf

            @method('PUT')

            @include('partials.events._form')

            <button type="submit" class="btn submit-button">Modifier l'évènement !</button>


        </form>

    </section>

@endsection

@push('script')
    <script src="{{ asset('js/project-js/images/preview-image.js') }}"></script>
@endpush
