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

                            <a class="dropdown-item pb-2 mb-1" href="{{ route('agents.editPass') }}">
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
                        @if (auth()->user()->isAdmin == true)
                        <li>
                            <a class="dropdown-item" href="{{ route('agents.create') }}">
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
                        <li>
                            <a class="dropdown-item" href="{{ route('ce.index') }}">
                                <i class="mdi mdi-account-outline me-1 mdi-20px"></i>
                                <span class="align-middle">Liste des CE</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('ce.create') }}">
                                <i class="mdi mdi-account-outline me-1 mdi-20px"></i>
                                <span class="align-middle">Ajouter un CE</span>
                            </a>
                        </li>
                        @endif

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


    <div class="row m-auto mt-3" style="max-width: 60%;">
        <div class="col-md-12">
            <div class="card mb-4">
                <br>
                <h4 class="card-header m-auto" style="color: red; font-weight: 600; font-size: 20px;"> <img style="margin: auto;" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/img/avatars/7.png" alt class="w-px-40 h-auto rounded-circle"><br>Renseigner les informations du nouvel Agent</h4>
                <!-- Account -->
                <div class="card-body pt-2">
                    <form id="formAccountSettings" style="max-width: 80%;" class="p-4" method="POST" action="{{ route('agents.store') }}">
                        @csrf
                        <div class="row mt-2 gy-4">
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="nom">Nom</label>
                                    @error('nom')
                                    <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="prenom">Prénom</label>
                                    @error('prenom')
                                    <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="tel" class="form-control" id="tel1" name="tel1" placeholder="Téléphone 1" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="tel1">Telephone</label>
                                    @error('tel1')
                                    <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="email" class="form-control" id="mail" name="mail" placeholder="Email" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="mail">Mail</label>
                                    @error('mail')
                                    <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="mail">Adresse</label>
                                    @error('adresse')
                                    <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="region" name="region" placeholder="{{ auth()->user()->region->nom }}" value="{{ auth()->user()->region->nom }}" disabled />
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="region">Region</label>
                                    @error('region')
                                    <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select class="form-control" id="centreEnrolement" name="centreEnrolement">
                                        <option value="">Sélectionner le centre d'enrôlement</option>
                                        @foreach ($centresEnrolement as $CE )
                                        <option value="{{ $CE->nom }}"> {{$CE->nom }}</option>
                                        @endforeach
                                        <!-- <option value="{{ $centresEnrolement[0] }}">{{ $centresEnrolement[0] }}</option>
                                        <option value="{{ $centresEnrolement[0] }}">{{ $centresEnrolement[0] }}</option>
                                         -->
                                    </select>
                                    <label style="font-weight: 600; font-size: 13.5px; color: green;" for="centreEnrolement">Centre d'enrôlement</label>
                                    @error('centreEnrolement')
                                    <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="Admin" name="Admin" value="1">
                                    <label style="margin-left: 30px;" class="form-check-label" for="deathCertCheckbox">Admin</label>
                                    @error('Admin')
                                    <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>


                </div>
                <div class="ml-6 mb-4">
                    <button type="submit" style="background-color: green" class="btn btn-primary me-2">VALIDER</button>
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