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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/project-css/master-layout.css') }}"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    @stack('script.head')

    @yield('stylesheet')
</head>

@include('partials._nav')

<body>


<main>

        <div id="main-wrapper" class="container">
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
@stack('script')
</body>
</html>
