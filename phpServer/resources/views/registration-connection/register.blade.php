@extends('layouts.master')

@push('stylesheet')
    <link href="{{ asset('css/project-css/registration.css') }}" rel="stylesheet">
@endpush

@section('content')
    {{ $errors }}
    <div class="container" id="loginForm">

        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Se connecter au bureau des élèves</h5>
                    <form class="form-signin" method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="form-label-group ">
                            <label for="emailLogin">Adresse mail :</label>
                            <input type="email" id="emailLogin" name="email" class="form-control"
                                   placeholder="robert.dupont@orange.fr" required>
                        </div>

                        <div class="form-label-group ">
                            <label for="passwordLogin">Mot de passe : </label>
                            <input type="password" id="passwordLogin" name="password" class="form-control"
                                   placeholder="xihfdofhAIHfhd154" required>
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" disabled>
                            <label class="custom-control-label" for="customCheck1">Se rappeller du mot de
                                passe</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase rounded-0" type="submit">Connexion
                        </button>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">S'inscrire</h5>

                    <form class="form-signin" method="post" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="form-label-group col-6">
                                <label for="firstName">Prénom :</label>
                                <input type="text" id="firstName" name="firstName" class="form-control"
                                       placeholder="Robert" value="{{old('firstName')}}" required>
                            </div>

                            <div class="form-label-group col-6">
                                <label for="lastName">Nom :</label>
                                <input type="text" id="lastName" name="lastName" class="form-control"
                                       placeholder="Dupont" value="{{old('lastName')}}" required>
                            </div>
                        </div>


                        <div class="form-label-group ">
                            <label for="emailInscription">Adresse mail :</label>
                            <input type="email" id="emailInscription" name="email" class="form-control"
                                   placeholder="robert.dupont@orange.fr" value="{{old('email')}}" required>
                        </div>

                        <div class="form-label-group ">
                            <label for="campusList">Campus :</label>
                            <select id="campusList" class="custom-select" name="campus">
                                <option {{ old('campus')? '' : 'selected' }} value=""  disabled>Choisir un campus...</option>
                                <option {{ old('campus')=="Saint-Nazaire"? 'selected' : '' }} value="Saint-Nazaire">Saint-Nazaire</option>
                                <option {{ old('campus')=="Rouen"? 'selected' : '' }} value="Rouen">Rouen</option>
                            </select>
                        </div>

                        <div class="form-label-group ">
                            <label for="passwordInscription">Mot de passe : </label>
                            <input type="password" id="passwordInscription" name="password"
                                   class="form-control champ" placeholder="qodpfjsdjgAJjfd!45" required>
                        </div>

                        <div class="form-label-group ">
                            <label for="passwordConfirmation">Confirmation mot de passe : </label>
                            <input type="password" id="passwordConfirmation" name="password_confirmation"
                                   class="form-control champ" placeholder="qodpfjsdjgAJjfd!45" required>
                            <p  id="passwordMismatch">Les mots de passe ne correspondent pas.</p>
                            <p  id="passwordMatch">Les mots de passe correspondent.</p>
                        </div>

                        <div class="form-label-group ">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="legalIssuesConsent">
                                <label class="custom-control-label" for="legalIssuesConsent">J'accepte les mentions légales</label>
                            </div>
                        </div>

                        <div class="form-label-group " id="inscriptionButton">
                            <button class="btn btn-lg btn-primary btn-block text-uppercase rounded-0" type="submit">
                                Inscription
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection


@push('script')
    <script src="{{ asset('js/project-js/registration.js') }}"></script>
@endpush
