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
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}" />
    <title>Document</title>
    @notifyCss
    @livewireStyles
</head>

<body>
    @include('notify::components.notify')

    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">

        <!--  Brand demo (display only for navbar-full and hide on below xl) -->

        <!-- ! Not required for layout-without-menu -->
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0  d-xl-none ">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="mdi mdi-menu mdi-24px"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
            <a href="{{ route('home') }}">
                    <div class="nav-item d-flex align-items-center heading">
                        <img src="{{ asset('img/empreinte-digitale.png') }}" class="w-px-20 h-auto rounded-circle">
                        <h4 style="color: red; font-weight: bold;">&nbsp;&nbsp;&nbspID</h4>
                        <h4 style="color: green; font-weight: bold;">Togo</h4>
                    </div>
                </a>
            </div>
            <!-- /Search -->
            <ul class="navbar-nav flex-row align-items-center ms-auto">


                <li class="nav-item lh-1 me-3 online-message" id="online-message">
                    <div style=" border-radius: 13px; padding: 7px;">
                        <p style="font-weight: bold; ">Service en ligne</p>
                    </div>

                </li>

                <li class="nav-item lh-1 me-3 offline-message" id="offline-message">
                    <div style="border-radius: 13px; padding: 7px;">
                        <p style="font-weight: bold; ">Service hors Ligne</p>
                    </div>

                </li>

                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                    <div style=" background-color: rgb(198, 198, 198); border-radius: 13px; padding: 7px;">
                        <p style="font-weight: bold; ">ID: {{ auth()->user()->idAgent }}</p>
                    </div>

                </li>

                <li class="nav-item lh-1 me-3">
                    <div style=" background-color: rgb(198, 198, 198); border-radius: 13px; padding: 7px;">
                        <p style="font-weight: bold; ">Mail: {{ auth()->user()->mail }}</p>
                    </div>

                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/img/avatars/7.png" alt class="w-px-40 h-auto rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
                        <li>
                            <a class="dropdown-item pb-2 mb-1" href="javascript:void(0);">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-2 pe-1">
                                        <div class="avatar avatar-online">
                                            <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/img/avatars/7.png" alt class="w-px-40 h-auto rounded-circle">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</h6>
                                        <small class="text-muted">Agent d'enrôlement</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider my-1"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('home') }}">
                                <i class="mdi mdi-account-outline me-1 mdi-20px"></i>
                                <span class="align-middle">Acceuil</span>
                            </a>
                        </li>
                        <!-- @if (auth()->user()->isAdmin == true)
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);">
                                <i class="mdi mdi-account-outline me-1 mdi-20px"></i>
                                <span class="align-middle">Ajouter un agent</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('agents.index') }}">
                                <i class="mdi mdi-account-outline me-1 mdi-20px"></i>
                                <span class="align-middle">Liste des agents</span>
                            </a>
                        </li>
                        @endif -->

                        <!-- <li>
                            <a class="dropdown-item" href="javascript:void(0);">
                                <i class='mdi mdi-cog-outline me-1 mdi-20px'></i>
                                <span class="align-middle">Settings</span>
                            </a>
                        </li> -->
                        <!-- <li>
                            <a class="dropdown-item" href="javascript:void(0);">
                                <span class="d-flex align-items-center align-middle">
                                    <i class="flex-shrink-0 mdi mdi-credit-card-outline me-1 mdi-20px"></i>
                                    <span class="flex-grow-1 align-middle ms-1">Billing</span>
                                    <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                                </span>
                            </a>
                        </li> -->
                        <li>
                            <div class="dropdown-divider my-1"></div>
                        </li>
                        <li>
                            <form id="post-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">
                                    <i class='mdi mdi-power me-1 mdi-20px'></i>
                                    <span class="align-middle">Se déconnecter</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>
    </nav>


    <div class="row m-5">
        <div class="col-md-12">
            <div class="card mb-4">
                <h4 class="card-header" style="color: red; font-weight: 600; font-size: 15px; margin-left: 39px;"><span style="color: green; font-weight: 600; font-size: 15px; margin-left: 39px;">STEP</span> <span class="flex-shrink-0 badge badge-center rounded-pill bg-success w-px-20 h-px-20">1</span> sur <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">2</span> - Données Démographiques du citoyen</h4>
                <!-- Account -->
                <div class="card-body pt-2">
                    <form id="formAccountSettings" style="max-width: 80%;" class="p-4" method="POST" onsubmit="return false">
                        <div class="row mt-2 gy-4">
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="nom">Nom</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="prenom">Prénom</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <select class="form-control" id="sexe" name="sexe">
                                        <option value="">Sélectionner le sexe</option>
                                        <option value="Masculin">Masculin</option>
                                        <option value="Féminin">Féminin</option>
                                    </select>
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="sexe">Sexe</label>
                                </div>
                            </div>

                            <!-- Champ Nom de jeune fille, caché initialement -->
                            <div class="col-md-4" id="nomJeuneFilleDiv" style="display: none;">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="nomJeuneFille" name="nomJeuneFille" placeholder="Nom de jeune fille" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="nomJeuneFille">Nom de jeune fille (facultatif)</label>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="dateNaissance">Date de naissance</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="paysVilleNaissance" name="paysVilleNaissance" placeholder="Pays/Ville de naissance" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="paysVilleNaissance">Pays/Ville de naissance</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="paysVilleResidence" name="paysVilleResidence" placeholder="Pays/Ville de résidence" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="paysVilleResidence">Pays/Ville de résidence</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="quartierResidence" name="quartierResidence" placeholder="Quartier de résidence" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="quartierResidence">Quartier de résidence</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <select class="form-control" id="statutMatrimonial" name="statutMatrimonial">
                                        <option value="">Sélectionner le statut matrimonial</option>
                                        <option value="Célibataire">Célibataire</option>
                                        <option value="Marié(e)">Marié(e)</option>
                                        <option value="Divorcé(e)">Divorcé(e)</option>
                                        <option value="Veuf(ve)">Veuf(ve)</option>
                                    </select>
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="statutMatrimonial">Statut matrimonial</label>
                                </div>
                            </div>

                            <!-- Champ Nom & Prénoms du conjoint, caché initialement -->
                            <div class="col-md-4" id="nomPrenomsConjointDiv" style="display: none;">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="nomPrenomsConjoint" name="nomPrenomsConjoint" placeholder="Nom & Prénoms du conjoint" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="nomPrenomsConjoint">Nom & Prénoms du conjoint (facultatif)</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input type="tel" class="form-control" id="tel1" name="tel1" placeholder="Téléphone 1" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="tel1">TEL1</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input type="tel" class="form-control" id="tel2" name="tel2" placeholder="Téléphone 2" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="tel2">TEL2</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input type="email" class="form-control" id="mail" name="mail" placeholder="Email" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="mail">Mail</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input type="tel" class="form-control" id="numPersonnePrevenir1" name="numPersonnePrevenir1" placeholder="Numéro de la personne à prévenir 1" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="numPersonnePrevenir1">Numéro personne à prévenir 1</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="nomPersonnePrevenir2" name="nomPersonnePrevenir2" placeholder="Nom de la personne à prévenir 2" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="nomPersonnePrevenir2">Nom personne à prévenir 2</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="profession" name="profession" placeholder="Profession" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="profession">Profession</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <select class="form-control" id="secteurEmploi" name="secteurEmploi">
                                        <option value="">Sélectionner un secteur</option>
                                        <option value="Primaire">Secteur Primaire (Agriculture, Mines, etc.)</option>
                                        <option value="Secondaire">Secteur Secondaire (Manufacture, Construction, etc.)</option>
                                        <option value="Tertiaire">Secteur Tertiaire (Services, Éducation, Santé, etc.)</option>
                                        <option value="Quaternaire">Secteur Quaternaire (Information, Recherche, etc.)</option>
                                        <option value="Autre">Autres</option>
                                    </select>
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="secteurEmploi">Secteur d'emploi</label>
                                </div>
                            </div>

                            <!-- Champ caché qui s'affiche seulement si "Autre" est sélectionné -->
                            <div class="col-md-4" id="autreSecteurDiv" style="display: none;">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="autreSecteur" name="autreSecteur" placeholder="Précisez le secteur" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="autreSecteur">Précisez le secteur</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating form-floating-outline">
                                    <select class="form-control" id="groupeSanguin" name="groupeSanguin">
                                        <option value="">Sélectionner un groupe sanguin</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="groupeSanguin">Groupe sanguin</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h6 style="font-weight: 600; font-size: 13.5px; color: green;">Pièces Justificatives</h6><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="cniCheckbox" value="CNI">
                                    <label style="margin-left: 20px;" class="form-check-label" for="cniCheckbox">CNI</label>
                                </div>
                                <div class="form-floating form-floating-outline" id="cniUploadDiv" style="display: none;">
                                    <input style="margin-top: 15px; margin-bottom: 15px;" type="file" class="form-control" id="cniFile" name="cniFile">
                                    <label for="cniFile">Téléchargez votre CNI</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="passportCheckbox" value="Passeport">
                                    <label style="margin-left: 20px;" class="form-check-label" for="passportCheckbox">Passeport</label>
                                </div>
                                <div class="form-floating form-floating-outline" id="passportUploadDiv" style="display: none;">
                                    <input style="margin-top: 15px; margin-bottom: 15px;" type="file" class="form-control" id="passportFile" name="passportFile">
                                    <label for="passportFile">Téléchargez votre passeport</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="birthCertCheckbox" value="Acte de Naissance">
                                    <label style="margin-left: 20px;" class="form-check-label" for="birthCertCheckbox">Acte de naissance</label>
                                </div>
                                <div class="form-floating form-floating-outline" id="birthCertUploadDiv" style="display: none;">
                                    <input style="margin-top: 15px; margin-bottom: 15px;" type="file" class="form-control" id="birthCertFile" name="birthCertFile">
                                    <label for="birthCertFile">Téléchargez votre acte de naissance</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="marriageCertCheckbox" value="Certificat de mariage">
                                    <label style="margin-left: 20px;" class="form-check-label" for="marriageCertCheckbox">Certificat de mariage</label>
                                </div>
                                <div class="form-floating form-floating-outline" id="marriageCertUploadDiv" style="display: none;">
                                    <input style="margin-top: 15px; margin-bottom: 15px;" type="file" class="form-control" id="marriageCertFile" name="marriageCertFile">
                                    <label for="marriageCertFile">Téléchargez votre certificat de mariage</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="nationalityCertCheckbox" value="Certificat de nationalité">
                                    <label style="margin-left: 20px;" class="form-check-label" for="nationalityCertCheckbox">Certificat de nationalité</label>
                                </div>
                                <div class="form-floating form-floating-outline" id="nationalityCertUploadDiv" style="display: none;">
                                    <input style="margin-top: 15px; margin-bottom: 15px;" type="file" class="form-control" id="nationalityCertFile" name="nationalityCertFile">
                                    <label for="nationalityCertFile">Téléchargez votre certificat de nationalité</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="divorceCertCheckbox" value="Certificat de divorce">
                                    <label style="margin-left: 20px;" class="form-check-label" for="divorceCertCheckbox">Certificat de divorce</label>
                                </div>
                                <div class="form-floating form-floating-outline" id="divorceCertUploadDiv" style="display: none;">
                                    <input style="margin-top: 15px; margin-bottom: 15px;" type="file" class="form-control" id="divorceCertFile" name="divorceCertFile">
                                    <label for="divorceCertFile">Téléchargez votre certificat de divorce</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="deathCertCheckbox" value="Certificat de décès du conjoint">
                                    <label style="margin-left: 20px;" class="form-check-label" for="deathCertCheckbox">Certificat de décès du conjoint</label>
                                </div>
                                <div class="form-floating form-floating-outline" id="deathCertUploadDiv" style="display: none;">
                                    <input style="margin-top: 15px; margin-bottom: 15px;" type="file" class="form-control" id="deathCertFile" name="deathCertFile">
                                    <label  for="deathCertFile">Téléchargez le certificat de décès du conjoint</label>
                                </div>
                            </div>


                        </div>
                        <div class="mt-4">
                            <button type="submit" style="background-color: green" class="btn btn-primary me-2">SUIVANT</button>
                            <button type="reset" class="btn btn-outline-secondary">EFFACER</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>




    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function updateOnlineStatus() {
                if (navigator.onLine) {
                    document.getElementById('online-message').style.display = 'block';
                    document.getElementById('offline-message').style.display = 'none';
                } else {
                    document.getElementById('online-message').style.display = 'none';
                    document.getElementById('offline-message').style.display = 'block';
                }
            }

            window.addEventListener('online', updateOnlineStatus);
            window.addEventListener('offline', updateOnlineStatus);

            // Initial check
            updateOnlineStatus();
        });

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
        document.addEventListener('DOMContentLoaded', function() {
            function toggleUploadDiv(checkboxId, divId) {
                const checkbox = document.getElementById(checkboxId);
                const div = document.getElementById(divId);
                checkbox.addEventListener('change', function() {
                    div.style.display = this.checked ? 'block' : 'none';
                });
            }

            toggleUploadDiv('cniCheckbox', 'cniUploadDiv');
            toggleUploadDiv('passportCheckbox', 'passportUploadDiv');
            toggleUploadDiv('birthCertCheckbox', 'birthCertUploadDiv');
            toggleUploadDiv('marriageCertCheckbox', 'marriageCertUploadDiv');
            toggleUploadDiv('nationalityCertCheckbox', 'nationalityCertUploadDiv');
            toggleUploadDiv('divorceCertCheckbox', 'divorceCertUploadDiv');
            toggleUploadDiv('deathCertCheckbox', 'deathCertUploadDiv');
        });
    </script>
    <script src="https://kit.fontawesome.com/e00702b042.js" crossorigin="anonymous"></script>
    <script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/libs/jquery/jquery.js?id=fbe6a96815d9e8795a3b5ea1d0f39782"></script>
    <script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/libs/popper/popper.js?id=bd2c3acedf00f48d6ee99997ba90f1d8"></script>
    <script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/js/bootstrap.js?id=0a1f83aa0a6a7fd382c37453e3f11128"></script>
    <script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/libs/node-waves/node-waves.js?id=0ca80150f23789eaa9840778ce45fc5c"></script>
    <script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js?id=f4192eb35ed7bdba94dcb820a77d9e47"></script>
    <script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/js/menu.js?id=201bb3c555bc0ff219dec4dfd098c916"></script>
    @notifyJs
    @livewireScripts
</body>

</html>