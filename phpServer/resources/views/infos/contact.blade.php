@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Contact
@endsection

@push('stylesheet')
    <link href="{{ asset('css/project-css/contact.css') }}" rel="stylesheet">
@endpush

@section('content')
        <div id="boxContact">
            <div class="elementContact">
                <h2 class="titreContact">Nous contacter</h2>
            </div>
            <div class="elementContact">
                <h2><i class="fas fa-phone"></i>  Par téléphone</h2>
                <p>02 40 74 58 89 </p>
                <h2><i class="fas fa-envelope"></i>  Par mail</h2>
                <p>Une question précise ? Ecrivez au BDE à l'adresse suivante : <br> <em>adresse.bde@viacesi.fr</em></p>
            </div>
        </div>
@endsection


