<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/css/core.css?id=fdb5cd3f802d37d094730acf8fdcb33a" />
    <link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/css/theme-default.css?id=da9b9645b9e4f480d38ea81168db36b7" />
    <link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/assets/css/demo.css?id=0f3ae65b84f44dbd4971231c5d97ac3b" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/AgentLogin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/brands.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/solid.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}" />
    <title>Document</title>
    @notifyCss
</head>

<body>


    <style>
        .mydropitem:hover {
            background-color: #CCCCCC;
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

    <div class="agents-list">
        <div class="card">
            <h5 class="card-header" style="font-weight: bold;">Individus enrôlés</h5>

            <div class="table-responsive text-nowrap">
                <div class="search-box">
                    <form id="search-form" style="margin-left: 16px;" action="{{route('searchIndividuFolder')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
                        <input value="{{ isset($search)? $search : '' }}" type="text" name="search" class="input-search" placeholder="Rechercher référence ...">
                    </form>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Numéro d'Identification Unique</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Sexe</th>
                            <th>Adresse</th>
                            <th>Telephone</th>
                            <th>Adresse de localisation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($dossiers as $dossier)
                        @php
                        $photoPath = $dossier->NIU . '/photo' . $dossier->NIU . '.png';
                        $cardback = $dossier->NIU . '/idCard-back.png';
                        $cardfront = $dossier->NIU . '/idCard-front.png';
                        @endphp
                        <div class="modal fade" id="largeModal{{$dossier->NIU}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document"> <!-- modal-lg pour un grand modal -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" style="font-size: 15px; font-weight: 600"><i style="color: green;" class="fa-solid fa-folder ms-4 me-2">&nbsp;&nbsp;</i> Individu identifié -- {{$dossier->NIU}} </h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="column">
                                                Profil
                                                <br><br>
                                                <div>
                                                    <circle style="" cx="50%" cy="50%" r="40%" stroke="black" stroke-width="3" fill="black">
                                                        @if (Storage::disk('val')->exists($photoPath))
                                                        <img style=" margin: auto ;border-radius: 1000px; width: 140px; height:100px;" src="{{ Storage::disk('val')->url($photoPath) }}" alt="Description de l'image">
                                                        @else
                                                        <i class="fa-solid fa-user" style="color:green"></i>
                                                        @endif
                                                    </circle>

                                                    <br><br>

                                                    <div class="card">
                                                        <div class="front">
                                                            @if (Storage::disk('val')->exists($cardfront))
                                                            <img style="  margin: auto ;width: 300px;" src="{{ Storage::disk('val')->url($cardfront) }}" alt="Description de l'image">
                                                            @else
                                                            <i class="fa-solid fa-user m-auto" style="margin: auto ;color:green"></i>
                                                            @endif
                                                        </div>
                                                        <br><br>
                                                        <div class="back">
                                                            @if (Storage::disk('val')->exists($cardback))
                                                            <img style="  margin: auto ;width: 300px;" src="{{ Storage::disk('val')->url($cardback) }}" alt="Description de l'image">
                                                            @else
                                                            <i class="fa-solid fa-user m-auto" style="margin: auto ;color:green"></i>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <tr>

                            <td style="color: green; font-weight: 600; display: flex; flex-direction:row; justify-content:space-around">
                                <circle style="" cx="50%" cy="50%" r="40%" stroke="black" stroke-width="3" fill="black">
                                    @if (Storage::disk('val')->exists($photoPath))
                                    <img style="border-radius: 1000px; width: 40px;" src="{{ Storage::disk('val')->url($photoPath) }}" alt="Description de l'image">
                                    @else
                                    <i class="fa-solid fa-user" style="color:green"></i>
                                    @endif
                                </circle> {{ $dossier->NIU }}
                            </td>
                            <td>
                                <span class="fw-medium">{{ $dossier->nom ? $dossier->nom : 'Non spécifiée' }}</span>
                            </td>
                            <td>
                                {{ $dossier->prenom ? $dossier->prenom : 'Non spécifiée' }}
                            </td>
                            <td>
                                {{ $dossier->sexe ? $dossier->sexe : 'Non spécifiée' }}
                            </td>

                            <td>
                                {{ $dossier->domicile ? $dossier->domicile : 'Non spécifiée' }}
                            </td>
                            <td>
                                <span class="badge rounded-pill bg-label-danger me-1">{{ $dossier->telephone ? $dossier->telephone : 'Non spécifiée' }}</span>
                            </td>

                
                                <td>
                                <button type="button" onclick="redirectToAddress(this)" class="btn m-auto dropdown-toggle hide-arrow mydropitem"><i class="fa-solid fa-map-pin" style="color:green"></i>&nbsp;&nbsp;{{ $dossier->lieu_identification ? $dossier->lieu_identification : 'Non spécifiée' }}</button>
                                </td>
                           


                            <!-- <td>
                                    @if($dossier->isAdmin == 1)
                                    <span class="badge rounded-pill bg-label-info me-1">Admin</span>
                                    @else
                                    <span class="badge rounded-pill bg-label-danger me-1">Non Admin</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $dossier->centreEnrolement ? $dossier->centreEnrolement->nom : 'Non spécifiée' }}
                                </td> -->
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn m-auto dropdown-toggle hide-arrow mydropitem" data-toggle="modal" data-target="#largeModal{{$dossier->NIU}}"><i class="fa-solid fa-eye" style="color:green" data-param1="{{$dossier->NIU}}" data-param2="{{$dossier->prenom}}"></i></button>
                                    <!-- <div class="dropdown-menu ">
                                        <a class="d-flex items-start " style="margin-top: 3px;" href="{{url('pj/'.$dossier->ref_enrolement)}}"> <i style="color: green;" class="fa-solid fa-eye ms-4 me-2">&nbsp;&nbsp;VOIR PLUS</i>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                        <form action="" method="POST" class="d-flex items-start">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet agent ?');">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="color: red;" class="fa-solid fa-trash me-2"></i> Suppprimer</a></button>
                                        </form>


                                    </div> -->
                                </div>
                            </td>
                        </tr>
                        @endforeach



                    </tbody>
                </table>
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


        document.addEventListener("DOMContentLoaded", function() {
            $('.modal').on('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var param1 = button.getAttribute('data-param1');
                var param2 = button.getAttribute('data-param2');

                var modal = $(this);
                modal.find('.modal-body #param1').text(param1);
                modal.find('.modal-body #param2').text(param2);
            });
        });

        function redirectToAddress(buttonElement) {
            // Obtenez le texte du bouton.
            const buttonText = buttonElement.textContent || buttonElement.innerText;

            // Encodez le texte pour une utilisation sûre dans une URL.
            const encodedText = encodeURIComponent(buttonText);

            // Définissez l'URL de base de redirection.
            const baseURL = "https://www.google.com/maps/?q=";

            // Construisez l'URL finale avec le paramètre.
            const finalURL = baseURL+encodedText;

            // Redirigez vers l'URL.
            window.open(finalURL, '_blank');
        }
    </script>
    <script src="{{ asset('js/loading.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
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