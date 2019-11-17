@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Espace membre
@endsection

@push('stylesheet')
    <link href="{{ asset('css/project-css/member_space.css') }}" rel="stylesheet">
@endpush

@section('content')
        <div id="boxEspaceMembre">
            <div class="elementEspaceMembre">
                <!-- Display informations about the users -->
                <div id="boxInfo">
                    <div class="elementInfo">
                        <p>Nom</p>
                    </div>
                    <div class="elementInfo">
{{ $user->lastname }}
                    </div>
                    <div class="elementInfo">
                        <p>Prénom</p>
                    </div>
                    <div class="elementInfo">
{{ $user->firstname }}
                    </div>
                    <div class="elementInfo">
                        <p>Adresse mail</p>
                    </div>
                    <div class="elementInfo">
{{ $user->email }}
                    </div>
                    <div class="elementInfo">
                        <p>Campus</p>
                    </div>
                    <div class="elementInfo">
{{ $user->campus }}
                    </div>
                </div>
            </div>
            <div class="elementEspaceMembre">
                <!-- Display the button to disconnect the user -->
                <p><a href="{{route('logout')}}"><button  type="button" class="boutonDeconnexion">Se déconnecter</button></a></p><br><br>
                <div id="boxActivitesInscrits">
                    <div class="elementActivitesInscrits">
                        Activités inscrits
                    </div>
                    <!-- Display every events where the user is registered -->
                    @foreach($user->futureEvents() as $event)
                    <div class="elementActivitesInscrits">
                        <button type="button" class="boutonActivites"><a href="{{route('events.show',$event)}}">{{$event->name}}</a></button>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
@endsection
