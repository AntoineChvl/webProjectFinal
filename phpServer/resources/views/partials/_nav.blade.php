<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark sticky-top navbar-expand-lg">
    <img src="{{ asset('assets/imgs/cesi_logo.png') }}" alt="Logo de l'école d'ingénieurs CESI" id="school_logo">
    <a class="navbar-brand" href="/" id="navTitle">Bureau des élèves - Saint-Nazaire</a>
    <button class="navbar-toggler" id="toggle_button" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto" id="navbarUl">
            <li class="nav-item active">
                <a class="nav-link" href="#">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Boutique</a>
            </li>
            <li class="nav-item dropdown">

                <button class="btn dropdown-toggle eventsDropdown rounded-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Évènements
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="navbarEventDropdown">
                    <a class="dropdown-item" href="#">Tous les évènements</a>
                    <a class="dropdown-item" href="#">Évènements à venir</a>
                    <a class="dropdown-item" href="#">Évènements passés</a>
                </div>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Espace membre</a>
            </li>
        </ul>
    </div>
</nav>
