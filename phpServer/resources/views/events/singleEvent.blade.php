@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - {{ $event->name }}
@endsection

@section('head-meta-description')
    Le bureau des élèves de Saint-Nazaire organise une nouvelle activité, c'est {{ $event->name }}, qui consiste à {{ $event->description }}
@endsection


@section('content')

    <article class="eventPresentation">
        <h1>{{$event->name}}</h1>
        <img src="https://via.placeholder.com/300">
    </article>








@endsection
