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
                <h4 class="card-header" style="color: red; font-weight: 600; font-size: 15px; margin-left: 39px;"><span style="color: red; font-weight: 600; font-size: 15px; margin-left: 39px;">STEP</span> <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">3</span> sur <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">3</span> - Données Biométriques du citoyen &nbsp;<i style="color: green;" class="fa-solid fa-camera fa-lg  "></i></h4>
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
                    @if(session('sexe'))
                    <span class="badge rounded-pill bg-label-info me-3">Sexe: {{session('prenom')}}</span>
                    @endif
                    @if(session('statutMatrimonial'))
                    <span class="badge rounded-pill bg-label-info me-3">Statut matrimonial: {{session('prenom')}}</span>
                    @endif
                </div>
                <!-- Account -->
                <div class="card-body pt-2">
                    @csrf


                    <div class="container">
                        <div class="column" style="margin: auto;">
                            <form method="POST" action="">
                                @csrf
                                <div class="col-md-4">
                                    <h6 style="font-weight: 600; font-size: 13.5px; color: green;">Pièces Justificatives *</h6><br>
                                    <!-- CNI -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="cniCheckbox" name="cniCheckbox" value="checked" {{ old('cniCheckbox') == 'checked' ? 'checked' : '' }}>
                                        <label style="margin-left: 20px;" class="form-check-label" for="cniCheckbox">CNI</label>
                                    </div>
                                    <div class="form-floating form-floating-outline" id="cniUploadDiv" style="{{ old('cniCheckbox') == 'checked' ? 'display: block;' : 'display: none;' }}">
                                        <input type="file" class="form-control" id="cniFile" name="cniFile">
                                        <label for="cniFile">Téléchargez votre CNI</label>
                                        @error('cniFile')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Passeport -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="passportCheckbox" name="passportCheckbox" value="checked" {{ old('passportCheckbox') == 'checked' ? 'checked' : '' }}>
                                        <label style="margin-left: 20px;" class="form-check-label" for="passportCheckbox">Passeport</label>
                                    </div>
                                    <div class="form-floating form-floating-outline" id="passportUploadDiv" style="{{ old('passportCheckbox') == 'checked' ? 'display: block;' : 'display: none;' }}">
                                        <input type="file" class="form-control" id="passportFile" name="passportFile">
                                        <label for="passportFile">Téléchargez votre passeport</label>
                                        @error('passportFile')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Acte de Naissance -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="birthCertCheckbox" name="birthCertCheckbox" value="checked" {{ old('birthCertCheckbox') == 'checked' ? 'checked' : '' }}>
                                        <label style="margin-left: 20px;" class="form-check-label" for="birthCertCheckbox">Acte de naissance</label>
                                    </div>
                                    <div class="form-floating form-floating-outline" id="birthCertUploadDiv" style="{{ old('birthCertCheckbox') == 'checked' ? 'display: block;' : 'display: none;' }}">
                                        <input type="file" class="form-control" id="birthCertFile" name="birthCertFile">
                                        <label for="birthCertFile">Téléchargez votre acte de naissance</label>
                                        @error('birthCertFile')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Certificat de Mariage -->
                                    @if(session('statutMatrimonial')=='Marié(e)')
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="marriageCertCheckbox" name="marriageCertCheckbox" value="checked" {{ old('marriageCertCheckbox') == 'checked' ? 'checked' : '' }}>
                                        <label style="margin-left: 20px;" class="form-check-label" for="marriageCertCheckbox">Certificat de mariage</label>
                                    </div>
                                    <div class="form-floating form-floating-outline" id="marriageCertUploadDiv" style="{{ old('marriageCertCheckbox') == 'checked' ? 'display: block;' : 'display: none;' }}">
                                        <input type="file" class="form-control" id="marriageCertFile" name="marriageCertFile">
                                        <label for="marriageCertFile">Téléchargez votre certificat de mariage</label>
                                        @error('marriageCertFile')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @endif

                                    <!-- Certificat de Nationalité -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="nationalityCertCheckbox" name="nationalityCertCheckbox" value="checked" {{ old('nationalityCertCheckbox') == 'checked' ? 'checked' : '' }}>
                                        <label style="margin-left: 20px;" class="form-check-label" for="nationalityCertCheckbox">Certificat de nationalité</label>
                                    </div>
                                    <div class="form-floating form-floating-outline" id="nationalityCertUploadDiv" style="{{ old('nationalityCertCheckbox') == 'checked' ? 'display: block;' : 'display: none;' }}">
                                        <input type="file" class="form-control" id="nationalityCertFile" name="nationalityCertFile">
                                        <label for="nationalityCertFile">Téléchargez votre certificat de nationalité</label>
                                        @error('nationalityCertFile')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Certificat de Divorce -->
                                    @if(session('statutMatrimonial')=='Divorcé(e)')
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="divorceCertCheckbox" name="divorceCertCheckbox" value="checked" {{ old('divorceCertCheckbox') == 'checked' ? 'checked' : '' }}>
                                        <label style="margin-left: 20px;" class="form-check-label" for="divorceCertCheckbox">Certificat de divorce</label>
                                    </div>
                                    <div class="form-floating form-floating-outline" id="divorceCertUploadDiv" style="{{ old('divorceCertCheckbox') == 'checked' ? 'display: block;' : 'display: none;' }}">
                                        <input type="file" class="form-control" id="divorceCertFile" name="divorceCertFile">
                                        <label for="divorceCertFile">Téléchargez votre certificat de divorce</label>
                                        @error('divorceCertFile')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @endif

                                    <!-- Certificat de Décès du Conjoint -->
                                    @if(session('statutMatrimonial')=='Veuf(ve)')
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="deathCertCheckbox" name="deathCertCheckbox" value="checked" {{ old('deathCertCheckbox') == 'checked' ? 'checked' : '' }}>
                                        <label style="margin-left: 20px;" class="form-check-label" for="deathCertCheckbox">Certificat de décès du conjoint</label>
                                    </div>
                                    <div class="form-floating form-floating-outline" id="deathCertUploadDiv" style="{{ old('deathCertCheckbox') == 'checked' ? 'display: block;' : 'display: none;' }}">
                                        <input type="file" class="form-control" id="deathCertFile" name="deathCertFile">
                                        <label for="deathCertFile">Téléchargez le certificat de décès du conjoint</label>
                                        @error('deathCertFile')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @endif
                                </div>
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
        <script src="{{ asset('js/empreinte.js') }}"></script>
        <script src="{{ asset('js/socket.io.min.js') }}"></script>
        <script src="{{ asset('js/loading.js') }}"></script>
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