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
                <h4 class="card-header" style="color: red; font-weight: 600; font-size: 15px; margin-left: 39px;">Completer le dossier de pré-enrôlement -- Pièces Justificatives &nbsp;<i style="color: green;" class="fa-solid fa-file-invoice fa-lg  "></i></h4>
                <div style="margin: auto;">
                    @if(session('refEnr'))
                    <span class="badge rounded-pill bg-label-danger me-3">{{session('refEnr')}}</span>
                    @endif
                    @if(session('nom'))
                    <span class="badge rounded-pill bg-label-info me-3">Nom de l'individu: {{session('nom')}}</span>
                    @endif
                    @if(session('prenom'))
                    <span class="badge rounded-pill bg-label-info me-3">Prénom de l'individu: {{session('prenom')}}</span>
                    @endif
                    @if(session('sexe'))
                    <span class="badge rounded-pill bg-label-info me-3">Sexe: {{session('prenom')}}</span>
                    @endif
                    @if(session('statutMatrimonial'))
                    <span class="badge rounded-pill bg-label-info me-3">Statut matrimonial: {{session('statutMatrimonial')}}</span>
                    @endif
                </div>
                <!-- Account -->
                <div class="card-body pt-2">
                    @csrf


                    <div class="container">
                        <div class="column" style="margin: auto;">
                            <form method="POST" action="{{route('Session_Pre_Enrollement.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <h6 style="font-weight: 600; font-size: 13.5px; color: green;">Pièces Justificatives *</h6><br><br><br>
                                    
                                    <!-- CNI -->
                                    <div class="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="cniCheckbox" name="cniCheckbox" value="checked">
                                            <label style="margin-left: 20px;" class="form-check-label" for="cniCheckbox">CNI</label>
                                        </div>
                                        <div class="form-floating form-floating-outline" id="cniUploadDiv">
                                            <input type="file" class="form-control @error('cniFile') is-invalid @enderror"  id="cniFile" name="cniFile">
                                            <label for="cniFile">Téléchargez votre CNI</label>
                                            @error('cniFile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Passeport -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="passportCheckbox" name="passportCheckbox" value="checked">
                                            <label style="margin-left: 20px;" class="form-check-label" for="passportCheckbox">Passeport</label>
                                        </div>
                                        <div class="form-floating form-floating-outline" id="passportUploadDiv">
                                            <input type="file" class="form-control @error('passportFile') is-invalid @enderror" id="passportFile" name="passportFile">
                                            <label for="passportFile">Téléchargez votre passeport</label>
                                            @error('passportFile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Acte de Naissance -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="birthCertCheckbox" name="birthCertCheckbox" value="checked">
                                            <label style="margin-left: 20px;" class="form-check-label" for="birthCertCheckbox">Acte de naissance</label>
                                        </div>
                                        <div class="form-floating form-floating-outline" id="birthCertUploadDiv">
                                            <input type="file" class="form-control @error('birthCertFile') is-invalid @enderror" id="birthCertFile" name="birthCertFile">
                                            <label for="birthCertFile">Téléchargez votre acte de naissance</label>
                                            @error('birthCertFile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Certificat de Mariage -->
                                        @if(session('statutMatrimonial')=='Marié(e)')
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="marriageCertCheckbox" name="marriageCertCheckbox" value="checked">
                                            <label style="margin-left: 20px;" class="form-check-label" for="marriageCertCheckbox">Certificat de mariage</label>
                                        </div>
                                        <div class="form-floating form-floating-outline" id="marriageCertUploadDiv">
                                            <input type="file" class="form-control @error('marriageCertFile') is-invalid @enderror" id="marriageCertFile" name="marriageCertFile">
                                            <label for="marriageCertFile">Téléchargez votre certificat de mariage</label>
                                            @error('marriageCertFile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @endif

                                        <!-- Certificat de Nationalité -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="nationalityCertCheckbox" name="nationalityCertCheckbox" value="checked" >
                                            <label style="margin-left: 20px;" class="form-check-label" for="nationalityCertCheckbox">Certificat de nationalité</label>
                                        </div>
                                        <div class="form-floating form-floating-outline" id="nationalityCertUploadDiv">
                                            <input type="file" class="form-control @error('nationalityCertFile') is-invalid @enderror" id="nationalityCertFile" name="nationalityCertFile">
                                            <label for="nationalityCertFile">Téléchargez votre certificat de nationalité</label>
                                            @error('nationalityCertFile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Certificat de Divorce -->
                                        @if(session('statutMatrimonial')=='Divorcé(e)')
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="divorceCertCheckbox" name="divorceCertCheckbox" value="checked">
                                            <label style="margin-left: 20px;" class="form-check-label" for="divorceCertCheckbox">Certificat de divorce</label>
                                        </div>
                                        <div class="form-floating form-floating-outline" id="divorceCertUploadDiv">
                                            <input type="file" class="form-control @error('divorceCertFile') is-invalid @enderror" id="divorceCertFile" name="divorceCertFile">
                                            <label for="divorceCertFile">Téléchargez votre certificat de divorce</label>
                                            @error('divorceCertFile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @endif

                                        <!-- Certificat de Décès du Conjoint -->
                                        @if(session('statutMatrimonial')=='Veuf(ve)')
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="deathCertCheckbox" name="deathCertCheckbox" value="checked" >
                                            <label style="margin-left: 20px;" class="form-check-label" for="deathCertCheckbox">Certificat de décès du conjoint</label>
                                        </div>
                                        <div class="form-floating form-floating-outline" id="deathCertUploadDiv" >
                                            <input type="file" class="form-control @error('deathCertFile') is-invalid @enderror" id="deathCertFile" name="deathCertFile">
                                            <label for="deathCertFile">Téléchargez le certificat de décès du conjoint</label>
                                            @error('deathCertFile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <br><br>
                                <button type="submit" style="background-color: green;" class="btn btn-primary me-2">VALIDER</button>
                            </form>
                        </div>
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
            document.addEventListener('DOMContentLoaded', function() {
    function toggleUploadDiv(checkboxId, divId) {
        const checkbox = document.getElementById(checkboxId);
        const div = document.getElementById(divId);

        // Vérifiez que les éléments existent
        if (!checkbox || !div) {
            console.error(`Éléments introuvables pour les IDs : ${checkboxId}, ${divId}`);
            return;
        }

        console.log(`Initial state for ${checkboxId}: ${checkbox.checked}`);

        // Gestion de l'événement de changement
        checkbox.addEventListener('change', function() {
            div.style.display = this.checked ? 'block' : 'none';
            console.log(`Changed state for ${checkboxId}: ${this.checked}`);
        });

        // Réglage initial de l'état d'affichage sur le chargement de la page
        div.style.display = checkbox.checked ? 'block' : 'none';
    }

    // Appel de la fonction pour chaque case à cocher et div associée
    toggleUploadDiv('cniCheckbox', 'cniUploadDiv');
    toggleUploadDiv('passportCheckbox', 'passportUploadDiv');
    toggleUploadDiv('birthCertCheckbox', 'birthCertUploadDiv');
    toggleUploadDiv('marriageCertCheckbox', 'marriageCertUploadDiv');
    toggleUploadDiv('nationalityCertCheckbox', 'nationalityCertUploadDiv');
    toggleUploadDiv('divorceCertCheckbox', 'divorceCertUploadDiv');
    toggleUploadDiv('deathCertCheckbox', 'deathCertUploadDiv');
});

        </script>
        <script src="{{ asset('js/empreinte.js') }}"></script>
        <script src="{{ asset('js/socket.io.min.js') }}"></script>
        <script src="{{ asset('js/loading.js') }}"></script>
        <script src="https://kit.fontawesome.com/e00702b042.js" crossorigin="anonymous"></script>
        <script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/bootstrap-B-W6M1Y3.js"></script>    
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