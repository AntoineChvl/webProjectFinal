<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Sections to put the title and meta description tags -->
    <title>@yield('head-title',env('APP_NAME'))</title>
    <meta name="description" content="@yield('head-meta-description','')">
    @stack('head-meta')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/project-css/master-layout.css') }}"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//wpcc.io/lib/1.0.2/cookieconsent.min.css"/>

    @stack('script.head')

    @stack('stylesheet')
</head>



<body>

@include('partials._nav')
<main>

        <div id="main-wrapper" class="container">
@include('partials._flash')
            @yield('content')
        </div>




</main>
@include('partials._footer')





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="//wpcc.io/lib/1.0.2/cookieconsent.min.js"></script>
<script>window.addEventListener("load", function(){window.wpcc.init({"border":"normal","corners":"large","colors":{"popup":{"background":"#222222","text":"#ffffff","border":"#fde296"},"button":{"background":"#fde296","text":"#000000"}},"position":"bottom","padding":"large","margin":"none","fontsize":"large","transparency": "10","content":{"href":"http://127.0.0.1:8000/privacy_politicy","message":"En naviguant sur notre site internet, vous acceptez notre politique d'utilisation des cookies, ainsi que nos directives sur la protection de vos données personnelles.","button":"Je comprends","link":"En savoir plus"}})});</script>

@stack('script')
</body>
</html>
