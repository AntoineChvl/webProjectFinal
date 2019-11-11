@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Image
@endsection

@section('head-meta-description')
    Commente les photos les plus dingues des évènements auxquels tu as participé !
@endsection

@push('head-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('stylesheet')
    <link href="{{ asset('css/project-css/events.css') }}" rel="stylesheet">
    <link href="{{ asset('css/project-css/lightbox/lightbox.css') }}" rel="stylesheet">
@endpush

@section('content')

    <a href="{{URL::previous()}}" class="btn btn-light backToEvents">Retour à l'évènement</a>

    <section>



        <h1 class="d-flex justify-content-center">{{$event->name}}</h1>
        <hr>

        <div class="container">



            <div class="row col-12 justify-content-center imageInteraction">

                <div class="col-6">
                    <img src="{{ asset('storage/imagesUploaded/'.$image->image->path) }}" alt="Image décrivant l'évènement organisé par le BDE !">
                    <div class="row col-12 flex-row">
                        <p><i class="@if($image->likes->where('user_id', '=', 1)->count() >0) fas @else far @endif fa-heart heartLike" id="like"></i></p>
                    </div>
                </div>

                <div class="col-6 flex-column justify-content-end">
                    <div class="row d-flex flex-row align-items-center justify-content-around">
                        <div class="form-group">
                            <h6>Espace commentaires :</h6>
                            <textarea name="" id="" cols="30" rows="1" class="form-control commentValue" placeholder="Votre commentaire..."></textarea>
                        </div>
                        <button type="button" class="btn submit-button addComment">Ajouter le commentaire</button>
                    </div>

                    <div class="row comments">
                    </div>

                </div>
            </div>







        </div>







    </section>


@endsection

@push('script')
    <script src="https://kit.fontawesome.com/1d7bafa102.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/project-js/like.js') }}"></script>
    <script src="{{ asset('js/project-js/interact-image.js') }}"></script>
@endpush
