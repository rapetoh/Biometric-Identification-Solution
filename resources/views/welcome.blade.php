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
</head>

<body>

    <div id="loader">
        <div class="spinner"></div>
    </div>
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

                <!-- <li class="nav-item lh-1 me-3">
                    <button style=" border-radius: 13px; padding: 7px;">
                        <i class="fa-solid fa-file-invoice fa-beat fa-lg" style="color: green;"></i>
                    </button>
                </li> -->

                <li class="nav-item lh-1 me-3 online-message" id="online-message">
                    <div style=" border-radius: 13px; padding: 7px;">
                        <p style="font-weight: bold; ">Service en ligne</p>
                    </div>

                </li>
                &nbsp;&nbsp;

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

    <div class="container">
        <div class="column">
            <!-- Contenu de la première colonne -->
            Tâches opérationnelles
            <br>
            <br>

            <div class="card mb-4" style="background-color: {{ $dircount!=0 ? 'white' : '#E5E5E5' }};">
                <span class="flex-shrink-0 badge badge-center rounded-pill {{$dircount!=0 ? 'bg-danger' : ''}} w-px-20 h-px-20" style="position: absolute; top: 5px; right: 5px;">{{$dircount}}</span>
                <div class="card-body">
                    <form id="uploadForm" action="@if(session('google_access_token')) {{ route('upload.drive') }} @else {{ url('/google/auth') }} @endif" method="POST">
                        @csrf
                        <button type="submit" {{$dircount==0 ? 'disabled':''}}>
                            <i class="fa-solid fa-arrows-rotate" style="margin-right: 25px; margin-left: -145px; color: green;"></i>Synchroniser les données
                        </button>
                    </form>
                </div>
            </div>

            <a href="{{$count_dossier_pre_enr!=0 ? route('Session_Pre_Enrollement.index') : '#'}}">
                <div class="card mb-4" style="background-color: {{ $count_dossier_pre_enr!=0 ? 'white' : '#E5E5E5' }};">
                    <span class="flex-shrink-0 badge badge-center rounded-pill {{$count_dossier_pre_enr!=0 ? 'bg-danger' : ''}} w-px-20 h-px-20" style="position: absolute; top: 5px; right: 5px;">{{$count_dossier_pre_enr}}</span>
                    <div class="card-body">
                        <i class="fa-solid fa-folder-closed" style="margin-right: 25px; color: green;"></i>Dossiers de pré-enrôlement
                    </div>
                </div>
            </a>

            <a href="{{route('id.create')}}">
                <div class="card mb-4">
                    <div class="card-body">
                        <i class="fa-solid fa-fingerprint fa-lg" style="margin-right: 25px; color: green;"></i>Reconnaissance d'empreintes
                    </div>
                </div>
            </a>

            <a href="{{route('faceID')}}">
                <div class="card mb-4">
                    <div class="card-body">
                        <i class="fa-solid fa-face-smile fa-lg" style="margin-right: 25px; color: green;"></i>Reconnaissance faciale
                    </div>
                </div>
            </a>

            @if (auth()->user()->isAdmin == true)
            <a href="{{route('individu.index')}}">
                <div class="card mb-4">
                    <div class="card-body">
                        <i class="fa-solid fa-person fa-lg" style="margin-right: 25px; color: green;"></i>Individus enrôlés
                    </div>
                </div>
            </a>
            @endif

            @if (auth()->user()->isAdmin == true)
            <a href="{{route('id.index')}}">
                <div class="card mb-4">
                    <div class="card-body">
                        <i class="fa-solid fa-newspaper fa-lg" style="margin-right: 25px; color: green;"></i>Journal des identifications
                    </div>
                </div>
            </a>
            @endif

            @if (auth()->user()->isAdmin == true)
            <a href="{{route('displayStat')}}">
                <div class="card mb-4">
                    <div class="card-body">
                        <i class="fa-solid fa-chart-simple" style="margin-right: 25px; color: green;"></i>Statistiques
                    </div>
                </div>
            </a>
            @endif

        </div>
        <div class="column">
            <!-- Contenu de la deuxième colonne -->
            Tâches d'inscription
            <br>
            <br>
            <a href="{{ route('ddForm.create') }}">
                <div class="card mb-4">
                    <div class="card-body">
                        <i class="fa-solid fa-address-card" style="margin-right: 25px; color: green;"></i>Nouvelle inscription
                    </div>
                </div>
            </a>
            <a href="{{ route('IdentifyForModification') }}">
                <div class="card mb-4">
                    <div class="card-body">
                        <i class="fa-solid fa-pen" style="margin-right: 25px; color: green;"></i>Modifier Identité
                    </div>
                </div>
            </a>
            <a href="{{route('DedoublonageView')}}">
                <div class="card mb-4">
                    <div class="card-body">
                        <i class="fa-solid fa-people-arrows fa-lg" style="margin-right: 25px; color: green;"></i>Dédoublonage
                    </div>
                </div>
            </a>
            <a href="{{$count!=0 ? route('dvForm.create') : '#'}}">
                <div class="card mb-4" style="background-color: {{ $count!=0 ? 'white' : '#E5E5E5' }};">
                    <span class="flex-shrink-0 badge badge-center rounded-pill {{$count!=0 ? 'bg-danger' : '' }} w-px-20 h-px-20" style="position: absolute; top: 5px; right: 5px;">{{$count}}</span>
                    <div class="card-body">
                        <i class="fa-solid fa-hourglass-start" style="margin-right: 25px; color: green;"></i>Dossiers en attente de validation
                    </div>

                </div>
            </a>
            
        </div>
        <div class="column">
            <hr style="margin: 20px;">
            Informations
            <!-- <br>
            <br> -->
            <span style="font-size: 13px;" class="badge rounded-pill bg-label-danger me-1">CE: {{auth()->user()->centreEnrolement->nom}}</span>
            <span style="font-size: 13px;" class="badge rounded-pill bg-label-danger me-1">Commune: {{auth()->user()->centreEnrolement->commune}}</span>
            <hr style="margin: 20px;">Contacts Administrateurs - Région: <span style="font-size: 13px;" class="badge rounded-pill bg-label-danger me-1">{{ auth()->user()->region->nom }}</span> <br>
            <br>
            <div class="row">
                @foreach ($adminAgents as $adminAgent)
                <H5 style="font-size: 10px;">{{ $loop->index+1 }} -- Nom: <span style="font-size: 12.5px;" class="badge rounded-pill bg-label-danger me-1">{{$adminAgent->nom}} </span> Prénom: <span style="font-size: 12.5px;" class="badge rounded-pill bg-label-danger me-1">{{$adminAgent->prenom}} </span>Contact: <span style="font-size: 12.5px;" class="badge rounded-pill bg-label-danger me-1">{{$adminAgent->telephone}}</span></H5>
                <H5 style="font-size: 10px;"></H5>
                <H5 style="font-size: 10px;"></H5><br><br>
                @endforeach
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



    </script>
    <script src="{{ asset('js/loading.js') }}"></script>
    <script src="https://kit.fontawesome.com/e00702b042.js" crossorigin="anonymous"></script>
    <script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/libs/jquery/jquery.js?id=fbe6a96815d9e8795a3b5ea1d0f39782"></script>
    <script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/libs/popper/popper.js?id=bd2c3acedf00f48d6ee99997ba90f1d8"></script>
    <script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/js/bootstrap.js?id=0a1f83aa0a6a7fd382c37453e3f11128"></script>
    <script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/libs/node-waves/node-waves.js?id=0ca80150f23789eaa9840778ce45fc5c"></script>
    <script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js?id=f4192eb35ed7bdba94dcb820a77d9e47"></script>
    <script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/js/menu.js?id=201bb3c555bc0ff219dec4dfd098c916"></script>
    @notifyJs
</body>

</html>