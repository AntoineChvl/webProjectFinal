@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Modification Espace membre
@endsection

@push('stylesheet')
    <link href="{{ asset('css/project-css/member_space_modification.css') }}" rel="stylesheet">
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
                <button type="button" class="boutonModification">Valider les modifications personnelles</button>
            </div>
            <div class="elementEspaceMembre">
                <div id="boxInfoModification">
                    <div class="elementInfoModification">
                        Nom
                    </div>
                    <div class="elementInfoModification">
                        Ban
                    </div>
                    <div class="elementInfoModification">
                        Prénom
                    </div>
                    <div class="elementInfoModification">
                        Tom
                    </div>
                    <div class="elementInfoModification">
                        Adresse mail
                    </div>
                    <div class="elementInfoModification">
                        k.pop@gmail.com
                    </div>
                    <div class="elementInfoModification">
                        Téléphone
                    </div>
                    <div class="elementInfoModification">
                        0700000000
                    </div>
                    <div class="elementInfoModification">
                        Rôle
                    </div>
                    <div class="elementInfoModification">
                        Carry sur CS
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
