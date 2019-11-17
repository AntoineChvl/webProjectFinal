<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark sticky-top navbar-expand-lg mainNavbar">
    <img src="{{ asset('assets/imgs/cesi_logo.png') }}" alt="Logo de l'école d'ingénieurs CESI" id="school_logo">
    <a class="navbar-brand" href="/" id="navTitle"><span class="full-text">Bureau des élèves</span><span class="short-text">BDE</span> - {{ substr(env('APP_NAME'), 4) }}</a>
    <button class="navbar-toggler" id="toggle_button" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto" id="navbarUl">
            <li class="nav-item active">
                <!-- Link to the home page -->
                <a class="nav-link padd" href="{{ route('home') }}">Accueil</a>
            </li>
            <li class="nav-item">
                <!-- Link to the shop -->
                <a class="nav-link padd" href="{{ route('shop') }}">Boutique</a>
            </li>
            <li class="nav-item">
                <!-- Link to the event page -->
                <a class="nav-link padd" href="{{ route('events.index') }}">Évènements</a>
            </li>
            @if(App\User::auth() && (App\User::auth()->statusLvl == 2 || App\User::auth()->statusLvl == 3))
                <li class="nav-item">
                    <!-- Link to the member space page -->
                    <a class="nav-link padd" href="{{ route('admin-panel') }}">Espace membre</a>
                </li>
            @endif
            @if(!App\User::auth())
                <li class="nav-item">
                    <!-- Link to the login page -->
                    <a class="nav-link padd" href="{{ route('login') }}">Connexion</a>
                </li>
            @endif
            @if(App\User::auth())
                <li class="nav-item">
                    <!-- Link to disconnect the user -->
                    <a class="nav-link padd" href="{{ route('logout') }}">Déconnexion</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
