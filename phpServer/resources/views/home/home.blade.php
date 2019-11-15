@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - accueil
@endsection

@section('head-meta-description')
    Le bureau des élèves de Saint-Nazaire est dynamique, attractif et propose de nouvelles activités toutes les semaines !
    Composé dix membres, notre BDE du campus CESI Saint-Nazaire est très dynamique, rejoins-nous vite !
@endsection

@push('stylesheet')
    <link href="{{ asset('css/project-css/home.css') }}" rel="stylesheet">
@endpush

@section('content')
        <div id="box" class="row mt-5">
            <div class="element col-6">
                <h3>DECOUVREZ LES DIFFERENTES ACTIVITES DE NOTRE BDE</h3>
                <p>Nos BDE proposent plusieurs activités et événements correspondant aux différentes envies de chacun</p>
                <p><a href="{{ route('events.index') }}"><img src="{{asset('assets/imgs/activites.jpg')}}" class="imageActivites" alt="Activités"></a></p><br>
                <p>Les BDE offrent la possibilité de faire de nouvelles rencontres avec des personnes qui partagent vos passions.</p>
                <p><a href="{{ route('events.index') }}">Cliquez pour découvrir nos activités proposés.</a></p>
            </div>
            <div class="element col-6">
                <h3>NOTRE BOUTIQUE</h3>
                <p>Notre boutique propose de nombreux articles représentant notre BDE</p>
                <p><a href="{{ route('shop') }}"><img src="{{asset('assets/imgs/cadis.jpg')}}" class="imageShop" alt="Shop"></a></p><br>
                <p><a href="{{ route('shop') }}">Cliquez pour découvrir les différents articles de notre boutique.</a></p>
            </div>
        </div>
@endsection
