@extends('layouts.master')

@push('stylesheet')
    <link href="{{ asset('css/project-css/registration.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container" id="loginForm">

        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Se connecter au bureau des élèves</h5>
                    <form class="form-signin" method="post" action="login.php">
                        <div class="form-label-group">
                            <label for="email">Adresse mail :</label>
                            <input type="email" id="email" name="email" class="form-control"
                                   placeholder="robert.dupont@orange.fr" required>
                        </div>

                        <div class="form-label-group">
                            <label for="password">Mot de passe : </label>
                            <input type="password" id="password" name="password" class="form-control"
                                   placeholder="123456789" required>
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" disabled>
                            <label class="custom-control-label" for="customCheck1">Se rappeller du mot de
                                passe</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase rounded-0" type="submit">Connexion
                        </button>
                        <hr class="my-4">
                        <a href="#" id="inscription">Pas encore inscrit ? Inscription gratuite!</a>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">S'inscrire au réseau Maserati</h5>
                    <form class="form-signin" method="post" action="inscription.php">
                        <div class="form-label-group">
                            <label for="emailInscription">Adresse mail :</label>
                            <input type="email" id="emailInscription" name="emailInscription" class="form-control"
                                   placeholder="robert.dupont@orange.fr" required>
                        </div>

                        <div class="form-label-group">
                            <label for="passwordInscription">Mot de passe : </label>
                            <input type="password" id="passwordInscription" name="passwordInscription"
                                   class="form-control champ" placeholder="123456789" required>
                        </div>

                        <div class="form-label-group">
                            <label for="passwordConfirmation">Confirmation mot de passe : </label>
                            <input type="password" id="passwordConfirmation" name="passwordConfirmation"
                                   class="form-control champ" placeholder="123456789" required>
                            <p class="" id="passwordMismatch">Les mots de passe ne correspondent pas.</p>
                            <p class="" id="passwordMatch">Les mots de passe correspondent.</p>
                        </div>
                        <div class="form-label-group" id="inscriptionButton">
                            <button class="btn btn-lg btn-primary btn-block text-uppercase rounded-0" type="submit">
                                Inscription
                            </button>
                        </div>
                        <hr class="my-4">
                        <a href="#" id="connexion">Déjà inscrit ? Connectez-vous !</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection


@push('script')
    <script src="{{ asset('js/project-js/registration.js') }}"></script>
@endpush
