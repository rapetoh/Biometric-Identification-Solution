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
    <link rel="stylesheet" href="{{ asset('css/empreinte.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}" />
    <title>Document</title>
    @notifyCss
    @livewireStyles
</head>

<body>
    <style>
        .card-custom {
            min-width: 300px;
            /* Largeur minimale pour chaque carte */
            min-height: 200px;
            margin: 20px;
            /* Hauteur minimale pour chaque carte */
        }

        .container {
            width: 100%;
            /* or a specific width as needed */
            overflow-x: auto;
            /* Enables horizontal scrolling */
            box-sizing: border-box;
            /* Includes padding and border in the element's total width */
        }

        @media (max-width: 768px) {
            .container {
                width: 100%;
                overflow-x: scroll;
                /* Ensures scrollability on smaller devices */
            }

            .container .column {
                flex: 1 0 50%;
                /* Adjusts the basis to allow two items per row on smaller screens */
            }
        }

        ::-webkit-scrollbar {
            width: 10px;
            /* Largeur de la barre de défilement */
            height: 10px;
            /* Hauteur de la barre de défilement pour les scrollbars horizontaux */
        }

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
                <h4 class="card-header" style="color: red; font-weight: 600; font-size: 15px; margin-left: 39px;">Dédoublonage &nbsp;<i style="color: green;" class="fa-solid fa-people-arrows fa-lg  "></i></h4>

                <!-- Account -->
                <div class="card-body pt-2">
                    <div class="container-fluid mt-5">
                        @foreach ($clusters as $index => $cluster)
                        @if (count($cluster) >= 2) <!-- Affiche seulement les clusters avec au moins deux personnes -->
                        <div class="container mb-4">
                            <div class="card card-custom mx-2" style="border: green solid 1px;">
                                <div class="card-header">
                                    Doublons
                                </div>
                                <div class="card-body">
                                    <div class="row g-0 flex-nowrap" style="overflow-x: auto;">
                                        @foreach ($cluster as $person)
                                        <div class="col-md-6">
                                            <!-- Ajout de classes pour les marges -->
                                            <div class="card text-center mb-3 card-custom mx-2">
                                                <div class="card-body">
                                                    @php
                                                    $photoPath = $person->NIU . '/photo' . $person->NIU . '.png';

                                                    @endphp
                                                    <circle style="" cx="50%" cy="50%" r="40%" stroke="black" stroke-width="3" fill="black">
                                                        @if (Storage::disk('val')->exists($photoPath))
                                                        <img style=" margin: auto ;border-radius: 1000px; width: 140px; height:100px;" src="{{ Storage::disk('val')->url($photoPath) }}" alt="Description de l'image">
                                                        @else
                                                        <i class="fa-solid fa-user fa-2xl" style="color:green; width: 140px;"></i><br>
                                                        @endif
                                                    </circle>
                                                    <br>
                                                    <h5 class="card-title" style="font-weight: 700;">{{ $person->nom }} {{ $person->prenom }}</h5>
                                                    <p class="card-text"><span style="font-weight: 500; color: green;">Profession: </span> {{ $person->profession }}</p>
                                                    <br>
                                                    <p class="card-text"> <span style="font-weight: 500; color: green;">Secteur d'emploi: </span>{{ $person->secteur_emploi }}</p>
                                                    <br>
                                                    <p class="card-text"> <span style="font-weight: 500; color: green;">Mail: </span>{{ $person->mail }}</p>
                                                    <br>
                                                    <p class="card-text"> <span style="font-weight: 500; color: green;">Sexe: </span>{{ $person->sexe }}</p>
                                                    <br>
                                                    <p class="card-text"> <span style="font-weight: 500; color: green;">Date de naissance: </span>{{ $person->DOB }}</p>
                                                    <br>
                                                    <p class="card-text"> <span style="font-weight: 500; color: green;">Pays-Ville de naissance: </span>{{ $person->pays_ville_naissance }}</p>
                                                    <br>
                                                    <p class="card-text"> <span style="font-weight: 500; color: green;">Quartier de residence: </span>{{ $person->quartier_residence }}</p>
                                                    <br><a href="javascript:void(0);" style="background-color: red;" class="btn btn-primary">Supprimer le doublon</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>

                    <!-- /Account -->
                </div>
            </div>
        </div>




        <script>
            // Declare the variable in the global scope

            document.addEventListener('DOMContentLoaded', () => {
                monitorNetworkStatus();
            });



            function monitorNetworkStatus() {
                const updateOnlineStatus = () => {
                    const onlineMessage = document.getElementById('online-message');
                    const offlineMessage = document.getElementById('offline-message');

                    if (navigator.onLine) {
                        onlineMessage.style.display = 'block';
                        offlineMessage.style.display = 'none';
                    } else {
                        onlineMessage.style.display = 'none';
                        offlineMessage.style.display = 'block';
                    }
                };

                window.addEventListener('online', updateOnlineStatus);
                window.addEventListener('offline', updateOnlineStatus);
                updateOnlineStatus();
            }
        </script>
        <script src="{{ asset('js/empreinte.js') }}"></script>
        <script src="{{ asset('js/socket.io.min.js') }}"></script>
        <script src="{{ asset('js/loading.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
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