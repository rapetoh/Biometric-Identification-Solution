<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/css/core.css?id=fdb5cd3f802d37d094730acf8fdcb33a" />
    <link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/css/theme-default.css?id=da9b9645b9e4f480d38ea81168db36b7" />
    <link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/css/demo.css?id=0f3ae65b84f44dbd4971231c5d97ac3b" />
    <link rel="stylesheet" href="{{ asset('css/AgentLogin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/css/bootstrap.min.css') }}" />
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


    <div class="modal fade" style="max-width: 70%; max-height: 95%; margin:auto;" data-backdrop="static" data-keyboard="false" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: fit-content; max-height: 95%; margin:auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Individu identifié <i class="fa-solid fa-circle-check" style="color: green;"></i></h5>
                </div>
                <div class="modal-body">

                    <div class="container">

                        <div class="column">

                            @if(session()->has('identified'))
                            <h1>hhhhh</h1>
                            @php
                            $front = session('identified')->NIU . '/idCard-front.png';
                            $back = session('identified')->NIU . '/idCard-back.png';
                            @endphp

                            <h1></h1>
                            @if (Storage::disk('val')->exists( $front ))
                            <h2>exist</h2>
                            <img style="" src="{{ Storage::disk('val')->url( $front) }}" alt="Description de l'image"><br><br>

                            @else
                            @endif

                            @if (Storage::disk('val')->exists($back))
                            <img style="" src="{{ Storage::disk('val')->url($back) }}" alt="Description de l'image">
                            @else
                            @endif
                            @endif

                        </div>

                        <div class="column">



                        </div>

                    </div>
                    <!-- Inclure la vue Blade ici -->
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="background-color: red" data-dismiss="modal">FERMER</button>
                </div> -->
            </div>
        </div>
    </div>


    <div class="row m-5">
        <div class="col-md-12">
            <div class="card mb-4">
                <h4 class="card-header" style="color: red; font-weight: 600; font-size: 15px; margin-left: 39px;"><span style="color: green; font-weight: 600; font-size: 15px; margin-left: 39px;"></span> <span class="flex-shrink-0 badge badge-center rounded-pill bg-success w-px-20 h-px-20"></span><span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20"></span> Identification &nbsp;<i style="color: green;" class="fa-solid fa-fingerprint fa-lg  "></i></h4>
                <!-- <div style="margin: auto;">
                    @if(session('refEnr'))
                    <span class="badge rounded-pill bg-label-info me-3">{{session('refEnr')}}</span>
                    @endif
                    @if(session('nom'))
                    <span class="badge rounded-pill bg-label-info me-3">Nom de l'individu: {{session('nom')}}</span>
                    @endif
                    @if(session('prenom'))
                    <span class="badge rounded-pill bg-label-info me-3">Prénom de l'individu: {{session('prenom')}}</span>
                    @endif
                </div> -->
                <!-- Account -->
                <div class="card-body pt-2">

                    @csrf
                    <!-- 
                        <div class="container">
                            <div class="column" style="margin:auto;">
                                Statut
                                <br><br>
                                <div class="row">
                                    <div style="width: 200px; height: 200px; " class="card m-4 carte">
                                        <div class="card-body" style="margin: auto;">
                                            <img id="auriculaire" src="{{ asset('img/doigt.png') }}" style="width: fit-content; margin: auto;" class="h-auto rounded-circle">
                                            <i class="fa-solid fa-circle-check validate-icon" id="auriculaireIcone" style="display:none;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div> -->


                    <div class="column">
                        <!-- Contenu de la deuxième colonne -->
                        <span style="font-size: 17px;">Biométrie</span>
                        <br>
                        <br>

                        <div class="center">
                            <div class="container1">
                                <div id="scanning" class="scanning"></div>
                            </div>
                        </div>


                        <div id="messages" style="border: 1px solid green; text-align:center; border-radius: 10px; padding: 15px; margin:auto; max-width: 400px;">
                            <p id="mess"></p>
                            <p style="color: red; font-weight: bold;" id="niu"></p><br>
                            <img style="border-radius: 1000px; width: 150px; margin: auto;" id="identifiedPhoto" src=""><br>
                            <p style="color: darkblue; font-weight: bold;" id="nom"></p>
                            <p style="color: darkblue; font-weight: bold;" id="prenom"></p>
                            <p style="color: darkblue; font-weight: bold;" id="sexe"></p>
                            <p style="color: darkblue; font-weight: bold;" id="DOB"></p>

                        </div>

                        <div class="mt-4">
                            <div class="mt-4 button-container">
                                <button type="button" id="trigerButton" style="background-color: green" class="btn btn-primary mb-2">DEMARRER L'IDENTFICATION</button>
                            </div>

                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>




        <script>
            let longitude;
            let latitude;

            window.onload = function() {
                navigator.geolocation.getCurrentPosition(success, error,{ enableHighAccuracy: true });
            };

            function success(position) {
                // L'utilisateur a accordé la permission, continuez avec votre logique
                console.log("Latitude:", position.coords.latitude, "Longitude:", position.coords.longitude);
                longitude = position.coords.longitude.toString(); // Conversion correcte en chaîne
                latitude = position.coords.latitude.toString(); // Conversion correcte en chaîne

                // Maintenant, les valeurs sont prêtes, on peut les afficher
                console.log('eee' + longitude);
                console.log('iiii' + latitude);
            }

            function error(err) {
                console.warn(`ERREUR (${err.code}): ${err.message}`);
                // Gérer l'erreur, par exemple en affichant un message d'erreur à l'utilisateur
            }


            function error(err) {
                // L'utilisateur a refusé la permission ou une erreur s'est produite
                console.warn(`ERREUR (${err.code}): ${err.message}`);
                // Rediriger vers la page précédente
                window.history.back();
            }
            // Declare the variable in the global scope
            let selectedFinger = null;

            document.addEventListener('DOMContentLoaded', () => {
                configureSocketConnection();
            });

            function typeWriter(elementId, text, speed) {
                let i = 0;
                const elem = document.getElementById(elementId);

                function typing() {
                    if (i < text.length) {
                        elem.textContent += text.charAt(i);
                        i++;
                        setTimeout(typing, speed);
                    }
                }
                typing();
            }


            const elem = document.getElementById('mess');
            const niuelm = document.getElementById('niu');
            const nom = document.getElementById('nom');
            const prenom = document.getElementById('prenom');
            const sexe = document.getElementById('sexe');
            const DOB = document.getElementById('DOB');
            const pht = document.getElementById('identifiedPhoto');

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
                const trigerButton = document.getElementById('trigerButton');


                trigerButton.addEventListener('click', (event) => {
                    console.log('Formulaire d\'identification soumis, envoi du message au serveur Python');
                    socket.emit('identifyFingerprint');
                    pht.src = "";
                    niuelm.textContent = "";
                    nom.textContent = "";
                    prenom.textContent = "";
                    sexe.textContent = "";
                    DOB.textContent = "";
                    scanningElement.classList.toggle('animate');
                });


                socket.on('connect', () => {
                    console.log('Connecté au serveur Python');
                });

                socket.on('disconnect', () => {
                    console.log('Déconnecté du serveur Python');
                });

                socket.on('server_message', (msg) => {


                    pht.src = "";
                    niuelm.textContent = "";
                    nom.textContent = "";
                    prenom.textContent = "";
                    sexe.textContent = "";
                    DOB.textContent = "";

                    console.log(typeof msg);
                    console.log(msg);

                    console.log(msg);

                    if (msg.startsWith("Résultat d'identification")) {
                        scanningElement.classList.toggle('animate');


                        var last21Chars = msg.slice(-21);
                        console.log('Les 21 derniers caractères sont :', last21Chars);

                        var niu = last21Chars.slice(0, 17);
                        console.log('Le niu :', niu);

                        fetch("{{ route('id.find') }}", {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    le_niu: niu
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                console.log(data.message);
                                console.log(data.realNIU);
                                console.log(data.identity);
                                //location.reload();
                                //$('#myModal').modal('show');
                                if (data.message === "L'individu identifié doit d'abord être validé pour pouvoir apparaitre ici") {
                                    elem.textContent = data.message;
                                } else {
                                    const n = data.realNIU.toString();
                                    var ni = "NIU: " + n.substring(0, 4) + " - " + n.substring(4, 8) + " - " + n.substring(8, 12) + " - " + n.substring(12, 18);
                                    // nom.textContent = "NOM:  " + data.identity.nom;
                                    // prenom.textContent = "PRENOM: " + data.identity.prenom;
                                    // sexe.textContent = "SEXE: " + data.identity.sexe;
                                    DOB.textContent = "Date de naissance: " + data.identity.DOB;


                                    typeWriter('niu', ni, 75);
                                    typeWriter('nom', "NOM: " + data.identity.nom, 75);
                                    typeWriter('prenom', "PRENOM: " + data.identity.prenom, 75);
                                    typeWriter('sexe', "SEXE: " + data.identity.sexe, 75);
                                    //typeWriter('Date de naissance', "DOB: " + data.identity.DOB, 75);

                                    const url = "{{ Storage::disk('val')->url('/') }}";
                                    const newUrl = url + data.realNIU + '/photo' + data.realNIU + '.png';
                                    pht.src = newUrl;

                                    console.log(longitude);
                                    console.log(latitude);
                                    console.log(data.identity.nom);
                                    console.log(data.identity.prenom);
                                    console.log(n);
                                    console.log(data.identity.sexe);
                                    console.log(data.identity.tel1);
                                    console.log((data.identity.pays_ville_residence + ' , ' + data.identity.quartier_residence));

                                    const postData = {
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                                            'Content-Type': 'application/json'
                                        },
                                        body: JSON.stringify({
                                            nom: data.identity.nom,
                                            prenom: data.identity.prenom,
                                            NIU: n,
                                            sexe: data.identity.sexe,
                                            telephone: data.identity.tel1,
                                            domicile: (data.identity.pays_ville_residence + ' , ' + data.identity.quartier_residence),
                                            longitude: longitude,
                                            latitude: latitude,
                                        }) // Remplacez par les données nécessaires
                                    };
                                    fetch("{{route('logID')}}", postData)
                                        .then(secondresponse => {
                                            if (!secondresponse.ok) {
                                                throw new Error(`HTTP error, status = ${secondresponse.status}`);
                                            }
                                            console.log(secondresponse); // Vérifiez l'objet Response complet
                                            return secondresponse.text();
                                        })

                                        .then(secondresponseData => {
                                            console.log('Success:', secondresponseData);
                                            // Gérer la réponse ici
                                        })
                                        .catch((error) => {
                                            console.error('Error:', error);
                                        });

                                }
                            })

                            .catch((error) => {
                                // if (msg == 'Erreur dans la restitution des info identifiées') {
                                //     msg = 'L\individu identifié doit d\'abord être validé pour pouvoir apparaitre ici';
                                //     elem.textContent = msg;
                                // }
                                console.error('Error:', error);
                            });

                        msg = 'Individu identifié. NIU: ' + niu;
                        elem.textContent = msg;

                    } else {
                        if (msg == 'Individu NON identifié !') {
                            scanningElement.classList.toggle('animate');
                        }
                        elem.textContent = msg;
                    }



                    // if (msg == "Identification") {
                    //     scanningElement.classList.toggle('animate');
                    //     elem.textContent = msg;
                    // }else if (msg.startsWith("Résultat d'identification")) {
                    //     scanningElement.classList.toggle('animate');
                    //     elem.textContent = msg;
                    // }else if (msg.startsWith("Individu NON")) {
                    //     scanningElement.classList.toggle('animate');
                    //     elem.textContent = msg;
                    // }

                });
            }
        </script>
        <script src="{{ asset('js/empreinte.js') }}"></script>
        <script src="{{ asset('js/loading.js') }}"></script>
        <script src="{{ asset('js/socket.io.min.js') }}"></script>
        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
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