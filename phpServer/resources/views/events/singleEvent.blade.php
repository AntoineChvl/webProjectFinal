@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - {{ $event->name }}
@endsection

@section('head-meta-description')
    Le bureau des élèves de Saint-Nazaire organise une nouvelle activité, c'est {{ $event->name }}, qui consiste à {{ $event->description }}
@endsection

@push('head-meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('stylesheet')
    <link href="{{ asset('css/project-css/events.css') }}" rel="stylesheet">
    <link href="{{ asset('css/project-css/lightbox/lightbox.css') }}" rel="stylesheet">
@endpush


@section('content')

    <a href="{{route('events.index')}}" class="btn btn-light backToEvents">Retour aux évènements</a>

    <h1 id="singleEventTitle">{{$event->name}}</h1>

    <article class="eventPresentation row mx-auto">

        <div class="col-md eventImageAndParticipate">
            <img src="{{ asset('storage/imagesUploaded/'.$event->image->path) }}" class="eventMainImage"
                 alt="Image décrivant l'évènement organisé par le BDE !">
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

    <div class="row">
        @if($event->date < now())

            <div class="container">
                @if($isConnected)
                <div class="row col-12">
                    <button type="button" class="btn submit-button" data-toggle="modal" data-target="#exampleModal">
                        Ajouter une photo
                    </button>
                </div>
                @endif

                <div class="row col-12 justify-content-center" id="pastEventImagesTitle">
                    <h4>Images postées par les utilisateurs ayant participé à l'évènement</h4>
                </div>
            </div>


            <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ajouter une photo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('imagePastEvent') }}" method="post" enctype="multipart/form-data"
                                  id="uploadImageForm">
                                @csrf
                                <div class="form-group col-md-12">
                                    <input type="file" name="image" id="imageReadyToUpload">
                                    <img id="imagePreview"
                                         src="@isset($event) {{ asset('storage/imagesUploaded/'.$event->image->path) }} @endisset">
                                    @error('image')
                                    <p>{{ $errors->first('image') }}</p>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn submit-button col-md-6">Envoyer l'image</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Display images posted by users that have participated -->
            <div class="row">
            @foreach($event->imagesPostedByUsers as $pastImage)
                <!-- Display only validated images -->
                    @if($pastImage->is_validated)
                        <div class="flex-column col-md-3 col-lg-3 col-4 imagePastEvent">
                            <a href="{{route('events.images.show', ['event' => $event, 'image' => $pastImage])}}"
                               class="imageModal">
                                <img src="{{ asset('storage/imagesUploaded/'.$pastImage->image->path) }}"
                                     alt="Image décrivant l'évènement organisé par le BDE !">
                            </a>
                            <div class="flex-row">
                                <a href="{{route('events.images.show', ['event' => $event, 'image' => $pastImage])}}">Commenter...</a>
                            </div>

                        </div>
                    @endif

                @endforeach
            </div>

        @else
            @if($isConnected)
                <div class="container">
                    <div class="row col-12">
                        <button type="button"
                                class="btn  @if(\App\Participate::where('user_id', '=', $userId)->where('event_id', '=', $event->id)->count() >0) confirm-button @else submit-button @endif"
                                id="participateToEvent">@if(\App\Participate::where('user_id', '=', $userId)->where('event_id', '=', $event->id)->count() >0) Inscris ! @else Participer à l'évènement @endif
                        </button>
                    </div>
                </div>

            @else
                <a href="{{ route('login') }}" class="btn submit-button">Participer à l'évènement</a>
            @endif
        @endif
    </div>

@endsection

@push('script')
    <script src="{{ asset('js/project-js/images/preview-image.js') }}"></script>
    <script src="https://kit.fontawesome.com/1d7bafa102.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/project-js/events/like.js') }}"></script>
    <script src="{{ asset('js/project-js/events/interact-image.js') }}"></script>
    <script src="{{ asset('js/project-js/events/participate.js') }}"></script>
@endpush
