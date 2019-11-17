@extends('layouts.master')

@section('head-title')
    BDE Saint-Nazaire - Administration
@endsection

@section('head-meta-description')
    404, le BDE y travaille !
@endsection

@push('head-meta')
@endpush

@push('stylesheet')
    <link href="{{ asset('css/project-css/errors/404.css') }}" rel="stylesheet">
@endpush

<!-- Our 404 page -->

@section('content')

    <div class="ag-page-404">
        <div class="ag-toaster-wrap">
            <div class="ag-toaster">
                <div class="ag-toaster_back"></div>
                <div class="ag-toaster_front">
                    <div class="js-toaster_lever ag-toaster_lever"></div>
                </div>
                <div class="ag-toaster_toast-handler">
                    <div class="js-toaster_toast ag-toaster_toast js-ag-hide"></div>
                </div>
            </div>

            <canvas id="canvas-404" class="ag-canvas-404"></canvas>
            <img class="ag-canvas-404_img" src="https://raw.githubusercontent.com/SochavaAG/example-mycode/master/pens/404-error-smoke-from-toaster/images/smoke.png">
        </div>
    </div>

    <div class="container flex-row">
        <p id="breadChange">Oops... Le BDE était parti se faire une tartine au lieu de coder cette page. On dirait que ça a cramé...</p>
    </div>


@endsection

@push('script')
    <script src="https://kit.fontawesome.com/1d7bafa102.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/project-js/errors/404.js') }}"></script>
@endpush
