<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/css/core.css?id=fdb5cd3f802d37d094730acf8fdcb33a" />
    <link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/css/theme-default.css?id=da9b9645b9e4f480d38ea81168db36b7" />
    <link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/css/demo.css?id=0f3ae65b84f44dbd4971231c5d97ac3b" />
    <link rel="stylesheet" href="{{ asset('css/AgentLogin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/brands.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/solid.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}" />
    <title>Document</title>
    @notifyCss
    @livewireStyles
</head>

<body>
    <style>
        .forms-wrap {
            overflow-y: scroll;
            position: absolute;
            height: 100%;
            width: 75%;
            top: 0;
            left: 0;
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 1fr;
            transition: 0.8s ease-in-out;
        }

        .carousel {
            position: absolute;
            height: 100%;
            width: 25%;
            left: 75%;
            top: 0;
            background-color: #ffe0d2;
            border-radius: 2rem;
            display: grid;
            overflow: hidden;
            transition: 0.8s ease-in-out;
        }

        /* Style général de la barre de défilement */
        ::-webkit-scrollbar {
            width: 10px;
            /* Largeur de la barre de défilement */
            height: 10px;
            /* Hauteur de la barre de défilement pour les scrollbars horizontaux */
        }

        /* Style du chemin (track) de la barre de défilement */
        ::-webkit-scrollbar-track {
            background: whitesmoke;
            /* Couleur de fond du chemin */
            border-radius: 10px;
            /* Arrondissement des angles */
        }

        /* Style du bouton de défilement (thumb) */
        ::-webkit-scrollbar-thumb {
            background-color: green;
            /* Couleur de fond du bouton de défilement */
            border-radius: 10px;
            /* Arrondissement des angles */
            border: 2px solid gray;
            /* Bordure autour du bouton, optionnel */
        }

        /* Style du bouton de défilement au survol */
        ::-webkit-scrollbar-thumb:hover {
            background-color: # darker green;
            /* Couleur au survol */
        }
        
    </style>
    <div id="loader">
        <div class="spinner"></div>
    </div>

    @include('notify::components.notify')

    <main>
        <div class="box" style="margin:auto;">

            <h4 style="color: red; font-weight: bold; font-size: 15px; margin-left: 39px;"> <br>&nbsp;&nbsp;<i style="color: green;" class="fa-solid fa-address-card"></i> &nbsp; Pré-enrôlement: veuillez entrer vos données démographiques.<br> </h4>

            <div class="inner-box">

                <div class="forms-wrap">

                    <form method="POST" action="{{route('Pre_Enrôlement.store')}}">
                        @csrf
                        <div class="actual-form" style="max-width: auto">
                            <br><br>
                            <div class="input-wrap m-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="toggleable form-control @error('nom') is-invalid @enderror" id="nom" name="nom" placeholder="Nom" value="{{ old('nom') }}" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="nom">Nom *</label>
                                    @error('nom')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-wrap m-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="toggleable form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" placeholder="Prénom" value="{{ old('prenom') }}" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="prenom">Prénom *</label>
                                    @error('prenom')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-wrap m-12">
                                <div class="form-floating form-floating-outline">
                                    <select class="form-control @error('sexe') is-invalid @enderror" id="sexe" name="sexe">
                                        <option value="">Sélectionner le sexe</option>
                                        <option value="Masculin" {{ old('sexe') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                                        <option value="Féminin" {{ old('sexe') == 'Féminin' ? 'selected' : '' }}>Féminin</option>
                                    </select>
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="sexe">Sexe *</label>
                                    @error('sexe')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Champ Nom de jeune fille, caché initialement -->
                            <div class="input-wrap m-12" id="nomJeuneFilleDiv" style="display: none;">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="toggleable form-control @error('nomJeuneFille') is-invalid @enderror" id="nomJeuneFille" name="nomJeuneFille" placeholder="Nom de jeune fille" value="{{ old('nomJeuneFille') }}" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="nomJeuneFille">Nom de jeune fille</label>
                                    @error('nomJeuneFille')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="input-wrap m-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="date" class="toggleable form-control @error('dateNaissance') is-invalid @enderror" id="dateNaissance" name="dateNaissance" value="{{ old('dateNaissance') }}" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="dateNaissance">Date de naissance *</label>
                                    @error('dateNaissance')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-wrap m-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="toggleable form-control @error('paysVilleNaissance') is-invalid @enderror" id="paysVilleNaissance" name="paysVilleNaissance" placeholder="Pays/Ville de naissance" value="{{ old('paysVilleNaissance') }}" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="paysVilleNaissance">Pays-Ville de naissance *</label>
                                    @error('paysVilleNaissance')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-wrap m-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="toggleable form-control @error('paysVilleResidence') is-invalid @enderror" id="paysVilleResidence" name="paysVilleResidence" placeholder="Pays/Ville de résidence" value="{{ old('paysVilleResidence') }}"/>
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="paysVilleResidence">Pays-Ville de résidence *</label>
                                    @error('paysVilleResidence')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-wrap m-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="toggleable form-control @error('quartierResidence') is-invalid @enderror" id="quartierResidence" name="quartierResidence" placeholder="Quartier de résidence" value="{{ old('quartierResidence') }}" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="quartierResidence">Quartier de résidence *</label>
                                    @error('quartierResidence')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-wrap m-12">
                                <div class="form-floating form-floating-outline">
                                    <select class="form-control @error('statutMatrimonial') is-invalid @enderror" id="statutMatrimonial" name="statutMatrimonial">
                                        <option value="">Sélectionner le statut matrimonial</option>
                                        <option value="Célibataire" {{ old('statutMatrimonial') == 'Célibataire' ? 'selected' : '' }}>Célibataire</option>
                                        <option value="Marié(e)" {{ old('statutMatrimonial') == 'Marié(e)' ? 'selected' : '' }}>Marié(e)</option>
                                        <option value="Divorcé(e)" {{ old('statutMatrimonial') == 'Divorcé(e)' ? 'selected' : '' }}>Divorcé(e)</option>
                                        <option value="Veuf(ve)" {{ old('statutMatrimonial') == 'Veuf(ve)' ? 'selected' : '' }}>Veuf(ve)</option>
                                    </select>
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="statutMatrimonial">Statut matrimonial *</label>
                                    @error('statutMatrimonial')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Champ Nom & Prénoms du conjoint, caché initialement -->
                            <div class="input-wrap m-12" id="nomPrenomsConjointDiv" style="display: none;">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="toggleable form-control @error('nomPrenomsConjoint') is-invalid @enderror" id="nomPrenomsConjoint" name="nomPrenomsConjoint" placeholder="Nom & Prénoms du conjoint" value="{{ old('nomPrenomsConjoint') }}" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="nomPrenomsConjoint">Nom & Prénoms du conjoint</label>
                                    @error('nomPrenomsConjoint')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-wrap m-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="tel" class="toggleable form-control @error('tel1') is-invalid @enderror" id="tel1" name="tel1" placeholder="Téléphone 1" value="{{ old('tel1') }}" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="tel1">N° de téléphone 1</label>
                                    @error('tel1')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-wrap m-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="tel" class="toggleable form-control @error('tel2') is-invalid @enderror" id="tel2" name="tel2" placeholder="Téléphone 2" value="{{ old('tel2') }}" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="tel2">N° de téléphone 2</label>
                                    @error('tel2')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-wrap m-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="email" class="toggleable form-control @error('mail') is-invalid @enderror" id="mail" name="mail" placeholder="Email" value="{{ old('mail') }}" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="mail">Mail</label>
                                    @error('mail')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-wrap m-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="toggleable form-control @error('nomPersonnePrevenir1') is-invalid @enderror" id="nomPersonnePrevenir1" name="nomPersonnePrevenir1" placeholder="Nom de la personne à prévenir 1" value="{{ old('nomPersonnePrevenir1') }}" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="nomPersonnePrevenir1">Nom personne à prévenir 1 </label>
                                    @error('nomPersonnePrevenir1')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="input-wrap m-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="tel" class="toggleable form-control @error('numPersonnePrevenir1') is-invalid @enderror" id="numPersonnePrevenir1" name="numPersonnePrevenir1" placeholder="N° de la personne à prévenir 1 "  value="{{ old('numPersonnePrevenir1') }}"/>
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="numPersonnePrevenir1">Numéro personne à prévenir 1</label>
                                    @error('numPersonnePrevenir1')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-wrap m-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="toggleable form-control @error('nomPersonnePrevenir2') is-invalid @enderror" id="nomPersonnePrevenir2" name="nomPersonnePrevenir2" placeholder="Nom de la personne à prévenir 2" value="{{ old('nomPersonnePrevenir2') }}"/>
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="nomPersonnePrevenir2">Nom personne à prévenir 2</label>
                                    @error('nomPersonnePrevenir2')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-wrap m-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="tel" class="toggleable form-control @error('numPersonnePrevenir2') is-invalid @enderror" id="numPersonnePrevenir2" name="numPersonnePrevenir2" placeholder="N° de la personne à prévenir 2" value="{{ old('numPersonnePrevenir2') }}"/>
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="numPersonnePrevenir2">Numéro personne à prévenir 2</label>
                                    @error('numPersonnePrevenir2')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-wrap m-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="toggleable form-control @error('profession') is-invalid @enderror" id="profession" name="profession" placeholder="Profession" value="{{ old('profession') }}"/>
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="profession">Profession *</label>
                                    @error('profession')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="input-wrap m-12">
                                <div class="form-floating form-floating-outline">
                                    <select class="form-control @error('secteurEmploi') is-invalid @enderror" id="secteurEmploi" name="secteurEmploi">
                                        <option value="">Sélectionner un secteur</option>
                                        <option value="Primaire" {{ old('secteurEmploi') == 'Primaire' ? 'selected' : '' }}>Secteur Primaire (Agriculture, Mines, etc.)</option>
                                        <option value="Secondaire" {{ old('secteurEmploi') == 'Secondaire' ? 'selected' : '' }}>Secteur Secondaire (Manufacture, Construction, etc.)</option>
                                        <option value="Tertiaire" {{ old('secteurEmploi') == 'Tertiaire' ? 'selected' : '' }}>Secteur Tertiaire (Services, Éducation, Santé, etc.)</option>
                                        <option value="Quaternaire" {{ old('secteurEmploi') == 'Quaternaire' ? 'selected' : '' }}>Secteur Quaternaire (Information, Recherche, etc.)</option>
                                        <option value="Autre" {{ old('secteurEmploi') == 'Autre' ? 'selected' : '' }}>Autres</option>
                                    </select>
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="secteurEmploi">Secteur d'emploi *</label>
                                    @error('secteurEmploi')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Champ caché qui s'affiche seulement si "Autre" est sélectionné -->
                            <div class="input-wrap m-12" id="autreSecteurDiv" style="display: none;">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="toggleable form-control @error('autreSecteur') is-invalid @enderror" id="autreSecteur" name="autreSecteur" placeholder="Précisez le secteur" value="{{ old('autreSecteur') }}"/>
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="autreSecteur">Précisez le secteur *</label>
                                    @error('autreSecteur')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-wrap m-12">
                                <div class="form-floating form-floating-outline">
                                    <select class="form-control @error('groupeSanguin') is-invalid @enderror" id="groupeSanguin" name="groupeSanguin">
                                        <option value="">Sélectionner un groupe sanguin</option>
                                        <option value="A+" {{ old('groupeSanguin') == 'A+' ? 'selected' : '' }}>A+</option>
                                        <option value="A-" {{ old('groupeSanguin') == 'A-' ? 'selected' : '' }}>A-</option>
                                        <option value="B+" {{ old('groupeSanguin') == 'B+' ? 'selected' : '' }}>B+</option>
                                        <option value="B-" {{ old('groupeSanguin') == 'B-' ? 'selected' : '' }}>B-</option>
                                        <option value="AB+" {{ old('groupeSanguin') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                        <option value="AB-" {{ old('groupeSanguin') == 'AB-' ? 'selected' : '' }}>AB-</option>
                                        <option value="O+" {{ old('groupeSanguin') == 'O+' ? 'selected' : '' }}>O+</option>
                                        <option value="O-" {{ old('groupeSanguin') == 'O-' ? 'selected' : '' }}>O-</option>
                                    </select>
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="groupeSanguin">Groupe sanguin *</label>
                                    @error('groupeSanguin')
                                    <div class="invalid-feedback position-absolute top-0 end-0" data-toggle="tooltip" data-placement="top" title="{{ $message }}">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                    @enderror
                                </div>
                            </div>


                            <button style="background-color: green;" type="submit" value="Sign In" class="sign-btn" onclick="return confirm('1 - SI VOUS AVEZ SOUMIS UN MAIL: Vous allez soumettre vos données et recevoir un mail contenant un numéro de référence\n 2 - Le numéro de référence est obligatoire à présenter pour vous faire enrôler\nUn aperçu vous sera montré sur la page qui va suivre.\nContinuer ?');">Soumettre le formulaire de pré-enrôlement</button>
                            <!-- 
                <p class="text">
                  Forgotten your password or you login datails?
                  <a href="#">Get help</a> signing in
                </p> -->
                        </div>
                    </form>


                </div>

                <div class="carousel">

                    <div>
                        <img id="imageLogin" src="{{ asset('img/fing.jpg') }}">
                    </div>

                </div>
            </div>
        </div>
    </main>

    <!-- Javascript file -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sexeSelect = document.getElementById('sexe');
            const nomJeuneFilleDiv = document.getElementById('nomJeuneFilleDiv');
            const statutMatrimonialSelect = document.getElementById('statutMatrimonial');
            const nomPrenomsConjointDiv = document.getElementById('nomPrenomsConjointDiv');

            // Écouteur d'événements pour le champ Sexe
            sexeSelect.addEventListener('change', function() {
                nomJeuneFilleDiv.style.display = (this.value === 'Féminin') ? 'block' : 'none';
            });

            // Écouteur d'événements pour le champ Statut Matrimonial
            statutMatrimonialSelect.addEventListener('change', function() {
                nomPrenomsConjointDiv.style.display = (this.value === 'Marié(e)' || this.value === 'Divorcé(e)' || this.value === 'Veuf(ve)') ? 'block' : 'none';
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const secteurSelect = document.getElementById('secteurEmploi');
            const autreSecteurDiv = document.getElementById('autreSecteurDiv');

            secteurSelect.addEventListener('change', function() {
                if (this.value === 'Autre') {
                    autreSecteurDiv.style.display = 'block'; // Afficher le champ
                } else {
                    autreSecteurDiv.style.display = 'none'; // Cacher le champ
                }
            });
        });
    </script>

    <script src="{{ asset('js/AgentLogin.js') }}"></script>
    <script src="{{ asset('js/loading.js') }}"></script>
    <x-notify::notify />
    @notifyJs
</body>

</html>