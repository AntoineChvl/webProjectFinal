@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - {{ $event->name }}
@endsection

@section('head-meta-description')
    Le bureau des élèves de Saint-Nazaire organise une nouvelle activité, c'est {{ $event->name }}, qui consiste à {{ $event->description }}
@endsection

@section('stylesheet')
    <link href="{{ asset('css/project-css/events.css') }}" rel="stylesheet">
@endsection


@section('content')

    <h1 id="singleEventTitle">{{$event->name}}</h1>

    <article class="eventPresentation row mx-auto">

        <div class="col-md eventImageAndParticipate">
            <img src="https://via.placeholder.com/300" class="eventMainImage">
            <div class="row justify-content-center">

                @if($event->date < now())
                    <a href="#" class="btn btn-danger" id="participateToEvent">Poster des photos</a>
                @else
                    <a href="#" class="btn btn-danger" id="participateToEvent">Participer à l'évènement</a>
                @endif

            </div>
        </div>

        <div class="col-md">
            <div class="row">
                <p class="col-md ">Date de l'évènement : {{$event->date}}</p>
                <p class="col-md ">Lieu : {{$event->location}}</p>
            </div>

            <div class="row">
                <div clas="eventInformations">
                    <p id="eventDescription" class="col-md">{{$event->description}}</p>
                </div>
            </div>
        </div>
    </article>

@endsection
