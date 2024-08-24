<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" as="style" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/remixicon-CHNy0vJf.css" /><link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/remixicon-CHNy0vJf.css" /><!-- Core CSS -->
<link rel="preload" as="style" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/core-DYhY3VUC.css" /><link rel="preload" as="style" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/theme-default-D81zB6qC.css" /><link rel="preload" as="style" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/demo-BPAVJiNP.css" /><link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/core-DYhY3VUC.css" /><link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/theme-default-D81zB6qC.css" /><link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/demo-BPAVJiNP.css" />
<!-- Vendor Styles -->
<link rel="preload" as="style" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/perfect-scrollbar-urn4H3N7.css" /><link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/perfect-scrollbar-urn4H3N7.css" />
<!-- Page Styles -->    <link rel="stylesheet" href="{{ asset('css/AgentLogin.css') }}" />
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
                <h4 class="card-header" style="color: red; font-weight: 600; font-size: 15px; margin-left: 39px;"><span style="color: green; font-weight: 600; font-size: 15px; margin-left: 39px;">STEP</span> <span class="flex-shrink-0 badge badge-center rounded-pill bg-success w-px-20 h-px-20">2</span> sur <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">3</span> - Données Biométriques de l'individu &nbsp;<i style="color: green;" class="fa-solid fa-fingerprint fa-lg  "></i></h4>
                <div style="margin: auto;">
                    @if(session('refEnr'))
                    <span class="badge rounded-pill bg-label-info me-3">{{session('refEnr')}}</span>
                    @endif
                    @if(session('nom'))
                    <span class="badge rounded-pill bg-label-info me-3">Nom de l'individu: {{session('nom')}}</span>
                    @endif
                    @if(session('prenom'))
                    <span class="badge rounded-pill bg-label-info me-3">Prénom de l'individu: {{session('prenom')}}</span>
                    @endif
                </div>
                <!-- Account -->
                <div class="card-body pt-2">
                    <form id="fingerprintForm" style="max-width: 80%;" class="p-4" method="POST" action="{{ route('dbForm.store', ['pouce' => 'pouce','index' => 'index', 'majeur' => 'majeur', 'annulaire' => 'annulaire', 'auriculaire' => 'auriculaire']) }}">
                        @csrf

                        <div class="container">
                            <div style="margin-right: 90px;" class="columns-1">
                                Statut
                                <br><br>
                                <div class="row">
                                    <!-- Pouce -->
                                    <div style="max-width: 130px;" class="card m-4 carte">
                                        <div class="card-body">
                                            <img id="pouce" src="{{ asset('img/pouce.png') }}" style="max-width: 60px;" class="h-auto rounded-circle">
                                            <p style="text-align: center; font-size:12px">Pouce</p>
                                            <i class="fa-solid fa-circle-check validate-icon" id="pouceIcone" style="display:none;"></i>
                                        </div>
                                    </div>
                                    <!-- Index -->
                                    <div style="max-width: 130px;" class="card m-4 carte">
                                        <div class="card-body">
                                            <img id="index" src="{{ asset('img/index.png') }}" style="max-width: 60px;" class="h-auto rounded-circle">
                                            <p style="text-align: center;  font-size:12px">Index</p>
                                            <i class="fa-solid fa-circle-check validate-icon" id="indexIcone" style="display:none;"></i>
                                        </div>
                                    </div>
                                    <!-- Majeur -->
                                    <div style="max-width: 130px;" class="card m-4 carte">
                                        <div class="card-body">
                                            <img id="majeur" src="{{ asset('img/majeur.png') }}" style="max-width: 60px;" class="h-auto rounded-circle">
                                            <p style="text-align: center;  font-size:12px">Majeur</p>
                                            <i class="fa-solid fa-circle-check validate-icon" id="majeurIcone" style="display:none;"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Annulaire -->
                                    <div style="max-width: 130px;" class="card m-4 carte">
                                        <div class="card-body">
                                            <img id="annulaire" src="{{ asset('img/annulaire.png') }}" style="max-width: 60px;" class="h-auto rounded-circle">
                                            <or style="text-align: center; font-size:12px">Annulaire</p>
                                            <i class="fa-solid fa-circle-check validate-icon" id="annulaireIcone" style="display:none;"></i>
                                        </div>
                                    </div>
                                    <!-- Auriculaire -->
                                    <div style="max-width: 130px;" class="card m-4 carte">
                                        <div class="card-body">
                                            <img id="auriculaire" src="{{ asset('img/auriculaire.png') }}" style="max-width: 60px;" class="h-auto rounded-circle">
                                            <p style="text-align: center; font-size:11px">Auriculaire</p>
                                            <i class="fa-solid fa-circle-check validate-icon" id="auriculaireIcone" style="display:none;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="column" style="margin: auto;">
                                <!-- Contenu de la deuxième colonne -->
                                <span style="font-size: 17px;">Biométrie</span>
                                <br>
                                <br>

                                <div class="center">
                                    <div class="container1">
                                        <div id="scanning" class="scanning"></div>
                                    </div>
                                </div>


                                <div id="messages" style="border: 1px solid green; text-align:center; border-radius: 10px; padding: 15px;">
                                    <p></p>
                                </div>

                                <div class="mt-4">
                                    <div class="mt-4 button-container">
                                        <button type="button" id="triggerButton" style="background-color: green" class="btn btn-primary mb-2">DEMARRER LE SCAN</button>
                                        <button type="submit" id="submitButton" style="background-color: green" class="btn btn-primary mt-2">SOUMETTRE LES DONNEES BIOMETRIQUES</button>
                                    </div>

                                </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>




    <script>
        // Declare the variable in the global scope
        let selectedFinger = null;

        document.addEventListener('DOMContentLoaded', () => {
            setupFingerSelection();
            monitorNetworkStatus();
            configureSocketConnection();
        });

        function checkAllIconsVisible() {
            const icons = document.querySelectorAll('.validate-icon');
            const submitButton = document.getElementById('submitButton');
            let allVisible = true;

            icons.forEach(icon => {
                if (window.getComputedStyle(icon).display != 'block') {
                    allVisible = false;
                    console.log(icon.id)
                    console.log(window.getComputedStyle(icon).display)
                    console.log("allv: " + allVisible);
                }
            });

            submitButton.disabled = !allVisible;
            console.log("sb.d: " + submitButton.disabled)
        }



        function setupFingerSelection() {
            const cards = document.querySelectorAll('.carte');

            cards.forEach(card => {
                card.addEventListener('click', () => {
                    cards.forEach(c => c.classList.remove('selected'));
                    card.classList.add('selected');
                    selectedFinger = card.querySelector('img').id;
                    console.log('Doigt sélectionné:', selectedFinger);
                });
            });

            const postButton = document.getElementById('submitButton');

            checkAllIconsVisible();


        }

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

        function configureSocketConnection() {
            const scanningElement = document.querySelector('.scanning');
            const socket = io.connect('http://127.0.0.1:5000');
            const triggerButton = document.getElementById('triggerButton');
            const niu = "{{ session('niu') }}";
            console.log(niu);

            triggerButton.addEventListener('click', (event) => {
                console.log('Formulaire soumis, envoi du message au serveur Python');
                socket.emit('enrollFingerprint', {
                    message: selectedFinger,
                    niu: niu
                });
            });

            socket.on('connect', () => {
                console.log('Connecté au serveur Python');
            });

            socket.on('disconnect', () => {
                console.log('Déconnecté du serveur Python');
            });

            socket.on('server_message', (msg) => {
                const elem = document.getElementById('messages');
                console.log(typeof msg);
                console.log(msg);

                if (msg == "Démarrage de l'enrôlement...") {
                    scanningElement.classList.toggle('animate');
                }

                elem.textContent = msg;

                if (!isNaN(msg.substr(-2)) && parseInt(msg.substr(-2)) < 2) {
                    console.log(msg);
                    elem.textContent = 'Mauvaise qualité de l\'empreinte OU Scanner introuvable ! Reprenez'
                    scanningElement.classList.toggle('animate');
                } else if (msg.startsWith(selectedFinger + " enregistré, qualité")) {
                    scanningElement.classList.toggle('animate');
                    const a = document.getElementById(selectedFinger + "Icone")
                    a.style.display = 'initial';

                    checkAllIconsVisible();
                }

            });
        }
    </script>
    <script src="{{ asset('js/empreinte.js') }}"></script>
    <script src="{{ asset('js/loading.js') }}"></script>
    <script src="{{ asset('js/socket.io.min.js') }}"></script>
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