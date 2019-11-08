@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Nos évènements
@endsection

@section('head-meta-description')
    Le bureau des élèves de Saint-Nazaire organise de nombreux évènements !
@endsection

@section('stylesheet')
    <link href="{{ asset('css/project-css/events.css') }}" rel="stylesheet">
@endsection


@section('content')

    <h1 class="d-flex justify-content-center">Tous les évènements</h1>

    @foreach($eventsGroup as $oneGroup)
        <section class="eventsGroup">

            <h2 class="eventsTitle">Évènements {{$oneGroup}} :</h2>
            <div class="eventsList row">

                @if($oneGroup === 'du mois')
                    @foreach($events as $event)
                        <article class="singleEvent col-md-4">
                            <h3>{{$event->name}}</h3>
                            <!-- Event image to manage -->
                            <img src="https://via.placeholder.com/150">
                            <a href="{{route('events.show', $event->id )}}" class="btn btn-dark">Visiter l'évènement</a>
                        </article>
                    @endforeach
                @else
                    @foreach($past_events as $past_event)
                        <article class="singleEvent col-md-4">
                            <h3>{{$past_event->name}}</h3>
                            <img src="https://via.placeholder.com/150">
                            <a href="{{route('events.show', $past_event->id )}}" class="btn btn-dark">Visiter
                                l'évènement</a>
                        </article>
                    @endforeach

                @endif
            </div>

        </section>
    @endforeach

@endsection
