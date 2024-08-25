<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" as="style" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/remixicon-CHNy0vJf.css" />
    <link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/remixicon-CHNy0vJf.css" /><!-- Core CSS -->
    <link rel="preload" as="style" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/core-DYhY3VUC.css" />
    <link rel="preload" as="style" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/theme-default-D81zB6qC.css" />
    <link rel="preload" as="style" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/demo-BPAVJiNP.css" />
    <link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/core-DYhY3VUC.css" />
    <link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/theme-default-D81zB6qC.css" />
    <link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/demo-BPAVJiNP.css" />
    <!-- Vendor Styles -->
    <link rel="preload" as="style" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/perfect-scrollbar-urn4H3N7.css" />
    <link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/perfect-scrollbar-urn4H3N7.css" />
    <!-- Page Styles -->
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
                <span class="flex-shrink-0 badge badge-center rounded-pill {{$dircount!=0 ? 'bg-danger' : ''}} w-px-25 h-px-25" style="position: absolute; top: 5px; right: 5px;">{{$dircount}}</span>
                <div class="card-body">
                    <form id="uploadForm" action="@if(cache('google_access_token')) {{ route('upload.drive') }} @else {{ url('/google/auth') }} @endif" method="POST">
                        @csrf
                        <button type="submit" {{$dircount==0 ? 'disabled':''}}>
                            <i class="fa-solid fa-arrows-rotate" style="margin-right: 25px; margin-left: -145px; color: green;"></i>Synchroniser les données
                        </button>
                    </form>
                </div>
            </div>

            <a href="{{$count_dossier_pre_enr!=0 ? route('Session_Pre_Enrollement.index') : '#'}}">
                <div class="card mb-4" style="background-color: {{ $count_dossier_pre_enr!=0 ? 'white' : '#E5E5E5' }};">
                    <span class="flex-shrink-0 badge badge-center rounded-pill {{$count_dossier_pre_enr!=0 ? 'bg-danger' : ''}} w-px-25 h-px-25" style="position: absolute; top: 5px; right: 5px;">{{$count_dossier_pre_enr}}</span>
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

            @if (auth()->user()->isAdmin == true)
            <a href="{{route('DedoublonageView')}}">
                <div class="card mb-4">
                    <div class="card-body">
                        <i class="fa-solid fa-people-arrows fa-lg" style="margin-right: 25px; color: green;"></i>Dédoublonnage
                    </div>
                </div>
            </a>
            @endif

            <a href="{{$count!=0 ? route('dvForm.create') : '#'}}">
                <div class="card mb-4" style="background-color: {{ $count!=0 ? 'white' : '#E5E5E5' }};">
                    <span class="flex-shrink-0 badge badge-center rounded-pill {{$count!=0 ? 'bg-danger' : '' }} w-px-25 h-px-25" style="position: absolute; top: 5px; right: 5px;">{{$count}}</span>
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
            <span style="font-size: 12px;" class="badge rounded-pill bg-label-danger me-1">CE: {{auth()->user()->centreEnrolement->nom}}</span>
            <span style="font-size: 12px;" class="badge rounded-pill bg-label-danger me-1">Commune: {{auth()->user()->centreEnrolement->commune}}</span>
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

    <!-- Include Scripts -->
    <!-- $isFront is used to append the front layout scripts only on the front layout otherwise the variable will be blank -->
    <!-- BEGIN: Vendor JS-->

    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/jquery-CbdDuLi-.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/jquery-CED9k22g.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/_commonjsHelpers-BosuxZz1.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/jquery-Czc5UB_B.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/popper-DNZnuk_L.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/bootstrap-B-W6M1Y3.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/node-waves-XDuO7R8f.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/perfect-scrollbar-CLUWhEAQ.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/hammer-36U3igM9.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/typeahead-BKwBoP4T.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/menu-CY9lYqyY.js" />
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/jquery-CbdDuLi-.js"></script>
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/popper-DNZnuk_L.js"></script>
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/bootstrap-B-W6M1Y3.js"></script>
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/node-waves-XDuO7R8f.js"></script>
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/perfect-scrollbar-CLUWhEAQ.js"></script>
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/hammer-36U3igM9.js"></script>
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/typeahead-BKwBoP4T.js"></script>
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/menu-CY9lYqyY.js"></script>
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/moment-C2dq_Ep4.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/_commonjsHelpers-BosuxZz1.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/_commonjs-dynamic-modules-TDtrdbi3.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/datatables-bootstrap5-DVZaE8TT.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/jquery-CED9k22g.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/jquery-Czc5UB_B.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/select2-Cg3gXliv.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/popular-BiiL9sLA.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/bootstrap5-COKFI6zn.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/index-CrI7K4FP.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/auto-focus-DSygTglc.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/cleave-C6wy96Im.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/cleave-phone-DRZWSJE_.js" />
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/sweetalert2-DnyLP1RS.js" />
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/moment-C2dq_Ep4.js"></script>
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/datatables-bootstrap5-DVZaE8TT.js"></script>
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/select2-Cg3gXliv.js"></script>
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/popular-BiiL9sLA.js"></script>
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/bootstrap5-COKFI6zn.js"></script>
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/auto-focus-DSygTglc.js"></script>
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/cleave-C6wy96Im.js"></script>
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/cleave-phone-DRZWSJE_.js"></script>
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/sweetalert2-DnyLP1RS.js"></script><!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/main-DRGn0ueN.js" />
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/main-DRGn0ueN.js"></script>
    <!-- END: Theme JS-->
    <!-- Pricing Modal JS-->
    <!-- END: Pricing Modal JS-->
    <!-- BEGIN: Page JS-->
    <link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/laravel-user-management-CgiBSgLM.js" />
    <script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/laravel-user-management-CgiBSgLM.js"></script><!-- END: Page JS-->
    <script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/bootstrap-B-W6M1Y3.js"></script>
    @notifyJs
</body>

</html>