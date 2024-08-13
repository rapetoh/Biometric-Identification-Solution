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
                <h4 class="card-header" style="color: red; font-weight: 600; font-size: 15px; margin-left: 39px;">Données de l'individu <i style="color: green;" class="fa-solid fa-edit fa-lg  "></i></h4>
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
                    @csrf
                    <div class="card-body pt-2">
                        <div class="container">
                            <div class="column">
                                Pièces Justificatives -- NIU: ******{{substr($item->individu->NIU,-6)}}
                                <br>
                                <br>
                                <br>
                                @php
                                $photoPath = $item->individu->NIU . '/photo' . $item->individu->NIU . '.png';
                                $cniPath = $item->individu->NIU . '/cni.pdf';
                                $passportPath = $item->individu->NIU . '/passport.pdf';
                                $adnPath = $item->individu->NIU . '/birthCert.pdf';
                                $marriagePath = $item->individu->NIU . '/marriageCert.pdf';
                                $nationalityCertPath = $item->individu->NIU . '/nationalityCert.pdf';
                                $divorceCertPath = $item->individu->NIU . '/divorceCert.pdf';
                                $deathCertPath = $item->individu->NIU . '/deathCert.pdf';


                                @endphp

                                <circle cx="50%" cy="50%" r="40%" stroke="black" stroke-width="3" fill="black">
                                    @if (Storage::disk('val')->exists($photoPath))
                                    <a href="{{route('photoToModify')}}" style="text-decoration: none; display: flex; justify-content: flex-end;">
                                        <button class="btn btn-primary" style="background-color: green;z-index: 1; color: #ffffff; padding: 5px 10px; border: none; border-radius: 25px; cursor: pointer; margin-right: 200px">MODIFIER</button>
                                    </a>
                                    <img style="border-radius: 1000px; margin: auto; margin-top: -20px; z-index: 0;" src="{{ Storage::disk('val')->url($photoPath) }}" alt="Description de l'image">
                                    @else
                                    @endif

                                </circle>
                                <br>
                                <br>
                                @if (Storage::disk('val')->exists($cniPath))
                                <div class="pdf-container" style="width: auto; height: auto; margin: auto">
                                    <embed src="{{ Storage::disk('val')->url($cniPath) }}" style="width: auto; height: auto; margin: auto" type="application/pdf">
                                </div>
                                @else

                                @endif
                                <br><br>
                                @if (Storage::disk('val')->exists($passportPath))
                                <div class="pdf-container">
                                    <embed src="{{ Storage::disk('val')->url($passportPath) }}" style="width: auto; height: auto; margin: auto" type="application/pdf">
                                </div><br><br>
                                @else
                                @endif

                                @if (Storage::disk('val')->exists($adnPath))
                                <div class="pdf-container">
                                    <embed src="{{ Storage::disk('val')->url($adnPath) }}" style="width: auto; height: auto; margin: auto" type="application/pdf">
                                </div><br><br>
                                @else
                                @endif

                                @if (Storage::disk('val')->exists($marriagePath))
                                <div class="pdf-container">
                                    <embed src="{{ Storage::disk('val')->url($marriagePath) }}" style="width: auto; height: auto; margin: auto" type="application/pdf">
                                </div><br><br>
                                @else
                                @endif

                                @if (Storage::disk('val')->exists($nationalityCertPath))
                                <div class="pdf-container">
                                    <embed src="{{ Storage::disk('val')->url($nationalityCertPath) }}" style="width: auto; height: auto; margin: auto" type="application/pdf">
                                </div><br><br>
                                @else
                                @endif

                                @if (Storage::disk('val')->exists($divorceCertPath))
                                <div class="pdf-container">
                                    <embed src="{{ Storage::disk('val')->url($divorceCertPath) }}" style="width: auto; height: auto; margin: auto" type="application/pdf">
                                </div><br><br>
                                @else
                                @endif

                                @if (Storage::disk('val')->exists($deathCertPath))
                                <div class="pdf-container">
                                    <embed src="{{ Storage::disk('val')->url($deathCertPath) }}" style="width: auto; height: auto; margin: auto" type="application/pdf">
                                </div><br><br>
                                @else
                                @endif


                            </div>
                            <div class="column">
                                Données
                                <br>
                                <form id="dvForm" enctype="multipart/form-data" style="max-width: 80%;" class="p-4" method="POST" action="{{route('dd.modify')}}">
                                    @csrf
                                    <div class="row mt-2 gy-4">
                                        <input type="hidden" name="input_disabled" id="input_disabled" value="disabled">
                                        <input type="hidden" name="niu" value="{{ $item->individu->NIU }}">
                                        <input type="hidden" name="id" value="{{ $item->idSE }}">
                                        <input type="hidden" name="iddemo" value="{{ $item->donneesDemographiques->idDDemo }}">
                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="toggleable form-control @error('nom') is-invalid @enderror" value="{{$item->individu->nom}}" id="nom" name="nom" placeholder="Nom" />
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="nom">Nom *</label>
                                                @error('nom')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="toggleable form-control @error('prenom') is-invalid @enderror" value="{{$item->individu->prenom}}" id="prenom" name="prenom" placeholder="Prénom" />
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="prenom">Prénom *</label>
                                                @error('prenom')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <select class="toggleable form-control @error('sexe') is-invalid @enderror" id="sexe" name="sexe">
                                                    <option value="" disabled {{ is_null($item->donneesDemographiques->sexe) ? 'selected' : '' }}>Sélectionner le sexe</option>
                                                    <option value="Masculin" {{ $item->donneesDemographiques->sexe == 'M' ? 'selected' : '' }}>Masculin</option>
                                                    <option value="Féminin" {{ $item->donneesDemographiques->sexe == 'F' ? 'selected' : '' }}>Féminin</option>
                                                </select>
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="sexe">Sexe *</label>
                                                @error('sexe')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Champ Nom de jeune fille, caché initialement -->
                                        <div class="col-md-12" id="nomJeuneFilleDiv" style="display: none;">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="toggleable form-control @error('nomJeuneFille') is-invalid @enderror" value="{{$item->donneesDemographiques->nom_de_jeune_fille='NULL'?'':$item->donneesDemographiques->nom_de_jeune_fille}}" id="nomJeuneFille" name="nomJeuneFille" placeholder="Nom de jeune fille" />
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="nomJeuneFille">Nom de jeune fille</label>
                                                @error('nomJeuneFille')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="date" class="toggleable form-control @error('dateNaissance') is-invalid @enderror" value="{{$item->donneesDemographiques->DOB}}" id="dateNaissance" name="dateNaissance" />
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="dateNaissance">Date de naissance *</label>
                                                @error('dateNaissance')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="toggleable form-control @error('paysVilleNaissance') is-invalid @enderror" value="{{$item->donneesDemographiques->pays_ville_naissance}}" id="paysVilleNaissance" name="paysVilleNaissance" placeholder="Pays/Ville de naissance" />
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="paysVilleNaissance">Pays-Ville de naissance *</label>
                                                @error('paysVilleNaissance')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="toggleable form-control @error('paysVilleResidence') is-invalid @enderror" value="{{$item->donneesDemographiques->pays_ville_residence}}" id="paysVilleResidence" name="paysVilleResidence" placeholder="Pays/Ville de résidence" />
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="paysVilleResidence">Pays-Ville de résidence *</label>
                                                @error('paysVilleResidence')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="toggleable form-control @error('quartierResidence') is-invalid @enderror" value="{{$item->donneesDemographiques->quartier_residence}}" id="quartierResidence" name="quartierResidence" placeholder="Quartier de résidence" />
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="quartierResidence">Quartier de résidence *</label>
                                                @error('quartierResidence')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <select class="toggleable form-control @error('statutMatrimonial') is-invalid @enderror" id="statutMatrimonial" name="statutMatrimonial">
                                                    <option value="" disabled {{is_null($item->donneesDemographiques->statut_matrimonial)? 'selected':''}}>Sélectionner le statut matrimonial</option>
                                                    <option value="Célibataire" {{ $item->donneesDemographiques->statut_matrimonial == 'Célibataire' ? 'selected' : '' }}>Célibataire</option>
                                                    <option value="Marié(e)" {{ $item->donneesDemographiques->statut_matrimonial == 'Marié(e)' ? 'selected' : '' }}>Marié(e)</option>
                                                    <option value="Divorcé(e)" {{ $item->donneesDemographiques->statut_matrimonial == 'Divorcé(e)' ? 'selected' : '' }}>Divorcé(e)</option>
                                                    <option value="Veuf(ve)" {{ $item->donneesDemographiques->statut_matrimonial == 'Veuf(ve)' ? 'selected' : '' }}>Veuf(ve)</option>
                                                </select>
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="statutMatrimonial">Statut matrimonial *</label>
                                                @error('statutMatrimonial')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Champ Nom & Prénoms du conjoint, caché initialement -->
                                        <div class="col-md-12" id="nomPrenomsConjointDiv" style="display: none;">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="toggleable form-control @error('nomPrenomsConjoint') is-invalid @enderror" value="{{ $item->donneesDemographiques->nom_prenom_conjoint }}" id="nomPrenomsConjoint" name="nomPrenomsConjoint" placeholder="Nom & Prénoms du conjoint" />
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="nomPrenomsConjoint">Nom & Prénoms du conjoint</label>
                                                @error('nomPrenomsConjoint')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="tel" class="toggleable form-control @error('tel1') is-invalid @enderror" value="{{ $item->donneesDemographiques->tel1}}" id="tel1" name="tel1" placeholder="Téléphone 1" />
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="tel1">N° de téléphone 1</label>
                                                @error('tel1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="tel" class="toggleable form-control @error('tel2') is-invalid @enderror" value="{{$item->donneesDemographiques->tel2}}" id="tel2" name="tel2" placeholder="Téléphone 2" />
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="tel2">N° de téléphone 2</label>
                                                @error('tel2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="email" class="toggleable form-control @error('mail') is-invalid @enderror" value="{{$item->donneesDemographiques->mail}}" id="mail" name="mail" placeholder="Email" />
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="mail">Mail</label>
                                                @error('mail')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="toggleable form-control @error('nomPersonnePrevenir1') is-invalid @enderror" value="{{$item->donneesDemographiques->nom_personne_a_prevenir1}}" id="nomPersonnePrevenir1" name="nomPersonnePrevenir1" placeholder="Nom de la personne à prévenir 1" />
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="nomPersonnePrevenir1">Nom personne à prévenir 1 </label>
                                                @error('nomPersonnePrevenir1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="tel" class="toggleable form-control @error('numPersonnePrevenir1') is-invalid @enderror" value="{{ $item->donneesDemographiques->numero_personne_a_prevenir1 }}" id="numPersonnePrevenir1" name="numPersonnePrevenir1" placeholder="N° de la personne à prévenir 1 " />
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="numPersonnePrevenir1">Numéro personne à prévenir 1</label>
                                                @error('numPersonnePrevenir1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="toggleable form-control @error('nomPersonnePrevenir2') is-invalid @enderror" value="{{ $item->donneesDemographiques->nom_personne_a_prevenir2 }}" id="nomPersonnePrevenir2" name="nomPersonnePrevenir2" placeholder="Nom de la personne à prévenir 2" />
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="nomPersonnePrevenir2">Nom personne à prévenir 2</label>
                                                @error('nomPersonnePrevenir2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="tel" class="toggleable form-control @error('numPersonnePrevenir2') is-invalid @enderror" value="{{ $item->donneesDemographiques->numero_personne_a_prevenir2 }}" id="numPersonnePrevenir2" name="numPersonnePrevenir2" placeholder="N° de la personne à prévenir 2" />
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="numPersonnePrevenir2">Numéro personne à prévenir 2</label>
                                                @error('numPersonnePrevenir2')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="toggleable form-control @error('profession') is-invalid @enderror" value="{{ $item->donneesDemographiques->profession }}" id="profession" name="profession" placeholder="Profession" />
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="profession">Profession *</label>
                                                @error('profession')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <select class="toggleable form-control @error('secteurEmploi') is-invalid @enderror" id="secteurEmploi" name="secteurEmploi">
                                                    <option value="" disabled {{is_null($item->donneesDemographiques->secteur_emploi)? 'selected': ''}}>Sélectionner un secteur</option>
                                                    <option value="Primaire" {{ $item->donneesDemographiques->secteur_emploi == 'Primaire' ? 'selected' : '' }}>Secteur Primaire (Agriculture, Mines, etc.)</option>
                                                    <option value="Secondaire" {{ $item->donneesDemographiques->secteur_emploi == 'Secondaire' ? 'selected' : '' }}>Secteur Secondaire (Manufacture, Construction, etc.)</option>
                                                    <option value="Tertiaire" {{ $item->donneesDemographiques->secteur_emploi == 'Tertiaire' ? 'selected' : '' }}>Secteur Tertiaire (Services, Éducation, Santé, etc.)</option>
                                                    <option value="Quaternaire" {{ $item->donneesDemographiques->secteur_emploi == 'Quaternaire' ? 'selected' : '' }}>Secteur Quaternaire (Information, Recherche, etc.)</option>
                                                    <option value="Autre" {{ $item->donneesDemographiques->secteur_emploi == 'Autre' ? 'selected' : '' }}>Autres</option>
                                                </select>
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="secteurEmploi">Secteur d'emploi *</label>
                                                @error('secteurEmploi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Champ caché qui s'affiche seulement si "Autre" est sélectionné -->
                                        <div class="col-md-12" id="autreSecteurDiv" style="display: none;">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="toggleable form-control @error('autreSecteur') is-invalid @enderror" value="{{ $item->donneesDemographiques->secteur_emploi }}" id="autreSecteur" name="autreSecteur" placeholder="Précisez le secteur" />
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="autreSecteur">Précisez le secteur *</label>
                                                @error('autreSecteur')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating form-floating-outline">
                                                <select class="toggleable form-control @error('groupeSanguin') is-invalid @enderror" id="groupeSanguin" name="groupeSanguin">
                                                    <option value="" disabled {{is_null($item->donneesDemographiques->groupe_sanguin)?'selected':''}}>Sélectionner un groupe sanguin</option>
                                                    <option value="A+" {{ $item->donneesDemographiques->groupe_sanguin == 'A+' ? 'selected' : '' }}>A+</option>
                                                    <option value="A-" {{ $item->donneesDemographiques->groupe_sanguin == 'A-' ? 'selected' : '' }}>A-</option>
                                                    <option value="B+" {{ $item->donneesDemographiques->groupe_sanguin == 'B+' ? 'selected' : '' }}>B+</option>
                                                    <option value="B-" {{ $item->donneesDemographiques->groupe_sanguin == 'B-' ? 'selected' : '' }}>B-</option>
                                                    <option value="AB+" {{ $item->donneesDemographiques->groupe_sanguin == 'AB+' ? 'selected' : '' }}>AB+</option>
                                                    <option value="AB-" {{ $item->donneesDemographiques->groupe_sanguin == 'AB-' ? 'selected' : '' }}>AB-</option>
                                                    <option value="O+" {{ $item->donneesDemographiques->groupe_sanguin == 'O+' ? 'selected' : '' }}>O+</option>
                                                    <option value="O-" {{ $item->donneesDemographiques->groupe_sanguin == 'O-' ? 'selected' : '' }}>O-</option>
                                                </select>
                                                <label style="font-weight: 600; font-size: 13.5px; color: green;" for="groupeSanguin">Groupe sanguin *</label>
                                                @error('groupeSanguin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" style="background-color: green;" class="btn btn-primary me-2">SOUMETTRE LES MODIFICATIONS</button>
                                    </div>
                                </form>

                                <h6 style="color: gray; font-weight: 300; font-size: 10px; display: flex; align-items: center; ">* : les informations marquées de ce symbole doivent être obligatoirement fournies</h6>

                            </div>
                        </div>



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