@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Espace membre
@endsection

@push('stylesheet')
    <link href="{{ asset('css/project-css/member_space.css') }}" rel="stylesheet">
@endpush

@section('content')
    <main>
        <div id="boxEspaceMembre">
            <div class="elementEspaceMembre">
                <p>
                    <figure>
                        <img src="{{asset('assets/imgs/Tom.jpg')}}" class="photoProfil">
                    </figure>
                </p>
                <button type="button" class="boutonModification">Modifier les informations personnelles</button>
            </div>
            <div class="elementEspaceMembre">
                <div id="boxInfo">
                    <div class="elementInfo">
                        <p>Nom</p>
                    </div>
                    <div class="elementInfo">
                        Ban
                    </div>
                    <div class="elementInfo">
                        <p>Prénom</p>
                    </div>
                    <div class="elementInfo">
                        Tom
                    </div>
                    <div class="elementInfo">
                        <p>Adresse mail</p>
                    </div>
                    <div class="elementInfo">
                        k.pop@gmail.com
                    </div>
                    <div class="elementInfo">
                        <p>Téléphone</p>
                    </div>
                    <div class="elementInfo">
                        0700000000
                    </div>
                    <div class="elementInfo">
                        <p>Rôle</p>
                    </div>
                    <div class="elementInfo">
                        Carry sur CS
                    </div>
                </div>
            </div>
            <div class="elementEspaceMembre">
                <p><button type="button" class="boutonDeconnexion">Se déconnecter</button></p><br><br>
                <div id="boxActivitesInscrits">
                    <div class="elementActivitesInscrits">
                        Activités inscrits
                    </div>
                    <div class="elementActivitesInscrits">
                        <button type="button" class="boutonActivites">Activités 1</button>
                    </div>
                    <div class="elementActivitesInscrits">
                        <button type="button" class="boutonActivites">Activités 2</button>
                    </div>
                    <div class="elementActivitesInscrits">
                        <button type="button" class="boutonActivites">Activités 3</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection