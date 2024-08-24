<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" as="style" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/remixicon-CHNy0vJf.css" /><link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/remixicon-CHNy0vJf.css" /><!-- Core CSS -->
<link rel="preload" as="style" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/core-DYhY3VUC.css" /><link rel="preload" as="style" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/theme-default-D81zB6qC.css" /><link rel="preload" as="style" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/demo-BPAVJiNP.css" /><link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/core-DYhY3VUC.css" /><link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/theme-default-D81zB6qC.css" /><link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/demo-BPAVJiNP.css" />
<!-- Vendor Styles -->
<link rel="preload" as="style" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/perfect-scrollbar-urn4H3N7.css" /><link rel="stylesheet" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template-free/demo/build/assets/perfect-scrollbar-urn4H3N7.css" />
<!-- Page Styles -->
    <link rel="stylesheet" href="{{ asset('css/AgentLogin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/brands.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/solid.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/empreinte.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}" />
    <title>Document</title>
    @notifyCss
    @livewireStyles
</head>

<body>
    <style>
        body {}

        .material-icons-outlined {
            vertical-align: middle;
            line-height: 1px;
            font-size: 35px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 260px 1fr 1fr 1fr;
            grid-template-rows: 0.2fr 3fr;
            grid-template-areas:
                'sidebar header header header'
                'sidebar main main main';
            height: 100vh;
        }

        /* ---------- HEADER ---------- */
        .header {
            grid-area: header;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px 0 30px;
            box-shadow: 0 6px 7px -3px rgba(0, 0, 0, 0.35);
        }

        .menu-icon {
            display: none;
        }

        /* ---------- SIDEBAR ---------- */

        #sidebar {
            grid-area: sidebar;
            height: 100%;
            background-color: whitesmoke;
            overflow-y: auto;
            transition: all 0.5s;
            -webkit-transition: all 0.5s;
        }

        .sidebar-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 30px 30px 30px;
            margin-bottom: 30px;
        }

        .sidebar-title>span {
            display: none;
        }

        .sidebar-brand {
            margin-top: 15px;
            font-size: 20px;
            font-weight: 700;
        }

        .sidebar-list {
            padding: 0;
            margin-top: 15px;
            list-style-type: none;
        }

        .sidebar-list-item {
            padding: 20px 20px 20px 20px;
            font-size: 18px;
        }

        .sidebar-list-item:hover {
            background-color: rgba(255, 255, 255, 0.2);
            cursor: pointer;
        }

        .sidebar-list-item>a {
            text-decoration: none;
            color: #9e9ea4;
        }

        .sidebar-responsive {
            display: inline !important;
            position: absolute;
            /*
    the z-index of the ApexCharts is 11
    we want the z-index of the sidebar higher so that
    the charts are not showing over the sidebar 
    on small screens
  */
            z-index: 12 !important;
        }

        /* ---------- MAIN ---------- */

        .main-container {
            grid-area: main;
            overflow-y: auto;
            padding: 20px 20px;
            color: rgba(255, 255, 255, 0.95);
        }

        .main-title {
            display: flex;
            justify-content: space-between;
        }

        .thegroup {
            display: flex;
            flex-direction: column;
        }

        .subgroup {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .main-cards {
            display: flex;
            justify-content: space-evenly;
            margin: 20px 0;
            margin: 40px;

        }

        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 25px;
            border-radius: 5px;
        }

        .card:first-child {
            background-color: #2962ff;
        }

        .card:nth-child(2) {
            background-color: #ff6d00;
        }

        .card:nth-child(3) {
            background-color: #2e7d32;
        }

        .card:nth-child(4) {
            background-color: #d50000;
        }

        .card-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-inner>.material-icons-outlined {
            font-size: 45px;
        }

        .charts {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 60px;
            margin: 40px;

        }

        .charts-card {
            background-color: whitesmoke;
            margin-bottom: 20px;
            padding: 25px;
            box-sizing: border-box;
            -webkit-column-break-inside: avoid;
            border-radius: 5px;
            box-shadow: 6px 6px 7px -4px rgba(0.2, 0, 0, 0.2);
        }

        .chart-title {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ---------- MEDIA QUERIES ---------- */

        /* Medium <= 992px */

        @media screen and (max-width: 992px) {
            .grid-container {
                grid-template-columns: 1fr;
                grid-template-rows: 0.2fr 3fr;
                grid-template-areas:
                    'header'
                    'main';
            }

            #sidebar {
                display: none;
            }

            .menu-icon {
                display: inline;
            }

            .sidebar-title>span {
                display: inline;
            }
        }

        /* Small <= 768px */

        @media screen and (max-width: 768px) {
            .main-cards {
                grid-template-columns: 1fr;
                gap: 10px;
                margin-bottom: 0;
            }

            .charts {
                grid-template-columns: 1fr;
                margin-top: 30px;
            }
        }

        /* Extra Small <= 576px */

        @media screen and (max-width: 576px) {
            .hedaer-left {
                display: none;
            }
        }

        h3,
        h1 {
            color: white
        }

        .degrade {
            background: linear-gradient(45deg, #008000, #FF0000);
        }
    </style>
    <!-- <div id="loader">
        <div class="spinner"></div>
    </div> -->
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


    <div class="main-cards" style="width: 94%;" style="color: white">



        <div class="thegroup">

<!-- <ul>
    @foreach($regions as $region)
        <li>
            {{ $region }} :
            <ul>
                <li>Adultes : {{ $adultesPerRegion[$region] }}</li>
                <li>Mineurs : {{ $mineursPerRegion[$region] }}</li>
            </ul>
        </li>
    @endforeach
</ul> -->
            <div class="subgroup" style="margin-bottom:18px;">
                <div class="card degrade" data-aos="fade-up" data-aos-delay="100" style=" margin-right:18px; height:120px; background-color: green ;border-radius: 15px; color: white">
                    <div class="card-inner">
                        <h6 style="color: white; font-size: 11.5px; ">Enrôlements validés</h6>
                        <span class=""></span>
                    </div>
                    <h1 style="font-size: 40px; font-weight: 500;">{{$nbre_enr?$nbre_enr:'Error'}} <i class="fa-solid fa-id-card fa-sm" style="color: #ffffff;"></i></h1>
                </div>

                <div class="card degrade" data-aos="fade-up" data-aos-delay="200" style=" margin-right:18px; height:120px; background-color: red ; border-radius: 15px; color: white">
                    <div class="card-inner">
                        <h6 style="color: white; font-size: 11.5px;">Total Agents</h6>
                        <span class=""></span>
                    </div>
                    <h1 style="font-size: 40px; font-weight: 500;">{{$nbre_agts?$nbre_agts:'Error'}} <i class="fa-solid fa-users fa-sm" style="color: #ffffff;"></i></h1>
                </div>

                <div class="card degrade" data-aos="fade-up" data-aos-delay="300" style=" margin-right:18px; height:120px; border-radius: 15px; color: white">
                    <div class="card-inner">
                        <h6 style="color: white; font-size: 11.5px;">Total CE</h6>
                        <span class=""></span>
                    </div>
                    <h1 style="font-size: 40px; font-weight: 500;">{{$nbre_CE?$nbre_CE:'Error'}} <i class="fa-solid fa-building fa-sm" style="color: #ffffff;"></i></h1>
                </div>

                <div class="card degrade" data-aos="fade-up" data-aos-delay="400" style=" height:120px; border-radius: 15px; color: white">
                    <div class="card-inner">
                        <h6 style="color: white; font-size: 11.5px;">Total dossiers de Pré-enrôlement</h6>
                        <span class=""></span>
                    </div>
                    <h1 style="font-size: 40px; font-weight: 500;">{{$nbre_SPE?$nbre_SPE:'Error'}} <i class="fa-regular fa-folder-open fa-sm" style="color: #ffffff;"></i></h1>
                </div>

            </div>
            <div class="charts-card" style="min-width: 70%;border-radius: 15px;">
                <h2 class="chart-title">Evolution des enrôlements et pré-enrôlement par mois</h2>
                <div id="area-chart"></div>
            </div>

        </div>



        <div class="charts-card" style=" min-width: 34%; ;border-radius: 15px;">
            <div id="enrollmentRadarChart" style="width: 100%; height:100% margin:auto;"></div>
        </div>

    </div>
<div style="margin:auto; display:flex; flex-direction:column; justify-content: center;">
    <hr style="width: 80%; margin: auto;">
    <p style="text-align:center; margin-top: 10px; margin-bottom: 10px; color: green">Statut Matrimonial - Sexe - Secteur d'activité</p>
    <hr style="width: 80%; margin: auto;">
    </div>
    <div class="charts" style="max-width: 94%" style="color: green;">
    
    

        <div class="charts-card" style=" background-color:#F9F9F9; border-radius: 15px;" data-aos="fade-up">
            <h2 class="chart-title">Répartition en fonction du Statut Matrimonial</h2>
            <div id="bar-chart"></div>
        </div>

        <div class="charts-card" style="border-radius: 15px;" data-aos="fade-up" data-aos-delay="100">
            <h2 class="chart-title">Répartition en fonction du sexe</h2>
            <div id="pie-chart"></div>
        </div>

        <div class="charts-card" style="border-radius: 15px;" data-aos="fade-up" data-aos-delay="200">
            <h2 class="chart-title">Répartition par Secteur d'activité</h2>
            <div id="progress-bar"></div>
        </div>





        <div class="charts-card" style="border-radius: 15px;" data-aos="fade-up" data-aos-delay="300">
            <h2 class="chart-title">Répartition par Groupe Sanguin</h2><br>
            <div id="doughnut-chart"></div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
        <!-- Custom JS -->
        <script>
            // SIDEBAR TOGGLE
            
            let sidebarOpen = false;
            const sidebar = document.getElementById('sidebar');

            function openSidebar() {
                if (!sidebarOpen) {
                    sidebar.classList.add('sidebar-responsive');
                    sidebarOpen = true;
                }
            }

            function closeSidebar() {
                if (sidebarOpen) {
                    sidebar.classList.remove('sidebar-responsive');
                    sidebarOpen = false;
                }
            }

            // ---------- CHARTS ----------

            // BAR CHART
            const barChartOptions = {
                series: [{
                    data: ["{{isset($st_matri['Célibataire'])?$st_matri['Célibataire']:0}}"+'%', "{{isset($st_matri['Marié(e)'])?$st_matri['Marié(e)']:0}}"+'%', "{{isset($st_matri['Veuf(ve)'])?$st_matri['Veuf(ve)']:0}}"+'%', "{{isset($st_matri['Divorcé(e)'])?$st_matri['Divorcé(e)']:0}}"+'%'],
                    name: 'Pourcentage',
                }, ],
                chart: {
                    type: 'bar',
                    background: 'transparent',
                    height: 350,
                    toolbar: {
                        show: true,
                    },
                },
                colors: ['#008000', '#499f21'],
                plotOptions: {
                    bar: {
                        distributed: true,
                        borderRadius: 4,
                        horizontal: false,
                        columnWidth: '40%',
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: 1,
                },
                grid: {
                    borderColor: '#55596e',
                    yaxis: {
                        lines: {
                            show: false,
                        },
                    },
                    xaxis: {
                        lines: {
                            show: false,
                        },
                    },
                },
                legend: {
                    labels: {
                        colors: 'green',
                    },
                    show: true,
                    position: 'top',
                },
                stroke: {
                    colors: ['transparent'],
                    show: true,
                    width: 2,
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    theme: 'dark',
                },
                xaxis: {
                    categories: ['Célibataire', 'Marié(e)', 'Veuf(ve)', 'Divorcé(e)'],
                    title: {
                        style: {
                            color: 'green',
                        },
                    },
                    axisBorder: {
                        show: true,
                        color: '#e7e7e7',
                    },
                    axisTicks: {
                        show: true,
                        color: '#e7e7e7',
                    },
                    labels: {
                        style: {
                            colors: 'green',
                        },
                    },
                },
                yaxis: {
                    title: {
                        text: 'Pourcentage',
                        style: {
                            color: 'green',
                        },
                    },
                    axisBorder: {
                        color: 'green',
                        show: true,
                    },
                    axisTicks: {
                        color: 'green',
                        show: true,
                    },
                    labels: {
                        style: {
                            colors: 'green',
                        },
                    },
                },
            };

            const barChart = new ApexCharts(
                document.querySelector('#bar-chart'),
                barChartOptions
            );
            barChart.render();

            // AREA CHART
            const areaChartOptions = {
                series: [{
                        name: 'Enrôlements',
                        data: [
    "{{isset($sessionsParMois[1])?$sessionsParMois[1]['nombre']:0}}",
    "{{isset($sessionsParMois[2])?$sessionsParMois[2]['nombre']:0}}",
    "{{isset($sessionsParMois[3])?$sessionsParMois[3]['nombre']:0}}",
    "{{isset($sessionsParMois[4])?$sessionsParMois[4]['nombre']:0}}",
    "{{isset($sessionsParMois[5])?$sessionsParMois[5]['nombre']:0}}",
    "{{isset($sessionsParMois[6])?$sessionsParMois[6]['nombre']:0}}",
    "{{isset($sessionsParMois[7])?$sessionsParMois[7]['nombre']:0}}",
    "{{isset($sessionsParMois[8])?$sessionsParMois[8]['nombre']:0}}",
    "{{isset($sessionsParMois[9])?$sessionsParMois[9]['nombre']:0}}",
    "{{isset($sessionsParMois[10])?$sessionsParMois[10]['nombre']:0}}",
    "{{isset($sessionsParMois[11])?$sessionsParMois[11]['nombre']:0}}",
    "{{isset($sessionsParMois[12])?$sessionsParMois[12]['nombre']:0}}"
]
                    },
                    {
                        name: 'Pré-enrôlements',
                        data: [
                            "{{isset($sessionsParMois[1])?$sessionsParMois[1]['nombre']:0}}",
    "{{isset($sessionsPreEnrParMois[2])?$sessionsPreEnrParMois[2]['nombre']:0}}",
    "{{isset($sessionsPreEnrParMois[3])?$sessionsPreEnrParMois[3]['nombre']:0}}",
    "{{isset($sessionsPreEnrParMois[4])?$sessionsPreEnrParMois[4]['nombre']:0}}",
    "{{isset($sessionsPreEnrParMois[5])?$sessionsPreEnrParMois[5]['nombre']:0}}",
    "{{isset($sessionsPreEnrParMois[6])?$sessionsPreEnrParMois[6]['nombre']:0}}",
    "{{isset($sessionsPreEnrParMois[7])?$sessionsPreEnrParMois[7]['nombre']:0}}",
    "{{isset($sessionsPreEnrParMois[8])?$sessionsPreEnrParMois[8]['nombre']:0}}",
    "{{isset($sessionsPreEnrParMois[9])?$sessionsPreEnrParMois[9]['nombre']:0}}",
    "{{isset($sessionsPreEnrParMois[10])?$sessionsPreEnrParMois[10]['nombre']:0}}",
    "{{isset($sessionsPreEnrParMois[11])?$sessionsPreEnrParMois[11]['nombre']:0}}",
    "{{isset($sessionsPreEnrParMois[12])?$sessionsPreEnrParMois[12]['nombre']:0}}"
                        ], // Exemple de données mensuelles pour les pré-enrôlements
                    },
                ],
                chart: {
                    type: 'area',
                    background: 'transparent',
                    height: 350,
                    stacked: false,
                    toolbar: {
                        show: true,
                        tools: {
                            download: true,
                            selection: true,
                            zoom: false,
                            zoomin: false,
                            zoomout: false,
                            pan: false,
                            reset: false | '<img src="/static/icons/reset.png" width="20">',
                            customIcons: []
                        },
                        autoSelected: 'zoom'
                    },
                },
                colors: ['#FF0000', '#00FF00'], // Couleurs bleu pour les enrôlements, jaune pour les pré-enrôlements
                labels: ['Janv', 'Fev', 'Mars', 'Avr', 'Mai', 'Juin', 'Jllt', 'Août','Sept','Oct','Nov', 'Dec'],
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    gradient: {
                        opacityFrom: 0.4,
                        opacityTo: 0.1,
                        shadeIntensity: 1,
                        stops: [0, 100],
                        type: 'vertical',
                    },
                    type: 'gradient',
                },
                grid: {
                    borderColor: '#e7e7e7',
                    yaxis: {
                        lines: {
                            show: false,
                        },
                    },
                    xaxis: {
                        lines: {
                            show: true,
                        },
                    },
                },
                legend: {
                    labels: {
                        colors: ['black'],
                    },
                    show: true,
                    position: 'top',
                },
                markers: {
                    size: 6,
                    strokeColors: '#1b2635',
                    strokeWidth: 3,
                },
                stroke: {
                    curve: 'smooth',
                },
                xaxis: {
                    title: {
                        text: 'Mois',
                        style: {
                            color: 'black',
                        },
                    },
                    axisBorder: {
                        color: '#55596e',
                        show: true,
                    },
                    axisTicks: {
                        color: '#55596e',
                        show: true,
                    },
                    labels: {
                        offsetY: 5,
                        style: {
                            colors: 'black',
                        },
                    },
                },
                yaxis: {
                    title: {
                        text: 'Nombre',
                        style: {
                            color: 'black',
                        },
                    },
                    labels: {
                        style: {
                            colors: 'black',
                        },
                    },
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    theme: 'dark',
                },
            };

            const areaChart = new ApexCharts(document.querySelector('#area-chart'), areaChartOptions);
            areaChart.render();



            const progressBarOptions = {
                series: [{
                    data: ["{{isset($PSA['Primaire'])?$PSA['Primaire']:0}}", "{{isset($PSA['Secondaire'])?$PSA['Secondaire']:0}}", "{{isset($PSA['Tertiaire'])?$PSA['Tertiaire']:0}}", "{{isset($PSA['Quaternaire'])?$PSA['Quaternaire']:0}}", "{{ array_sum(array_diff_key($PSA, array_flip(['Primaire', 'Secondaire', 'Tertiaire', 'Quaternaire']))) }}"] // Exemple de pourcentage de participation par secteur
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: true
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return val + "%"; // Ajouter le signe de pourcentage
                    }
                },
                xaxis: {
                    categories: ['Secteur Primaire', 'Secteur Secondaire', 'Secteur Tertiaire', 'Secteur Quaternaire', 'Autre'], // Noms des secteurs d'activité
                    labels: {
                        formatter: function(val) {
                            return val + "%";
                        }
                    }
                },
                colors: ['#FEB019', '#00E396', '#008FFB', '#FF4560', '#00E396'], // Couleurs pour chaque secteur
                grid: {
                    borderColor: '#f1f1f1',
                },
                tooltip: {
                    theme: 'dark',
                    y: {
                        formatter: function(val) {
                            return val + "% de participation"; // Informations supplémentaires sur l'infobulle
                        }
                    }
                }
            };

            const progressBar = new ApexCharts(document.querySelector("#progress-bar"), progressBarOptions);
            progressBar.render();


            const pieChartOptions = {
                series: [parseInt("{{$pHommes}}") , parseInt("{{$pFemmes}}")], // Remplacer par les valeurs réelles du nombre d'hommes et de femmes
                chart: {
                    toolbar: {
                        show: true,
                        tools: {
                            download: true,
                            selection: true,
                            zoom: false,
                            zoomin: false,
                            zoomout: false,
                            pan: false,
                            reset: false | '<img src="/static/icons/reset.png" width="20">',
                            customIcons: []
                        },
                        autoSelected: 'zoom'
                    },
                    type: 'pie',
                    height: 350
                },
                labels: ['Masculin', 'Féminin'], // Labels adaptés aux deux catégories de sexe
                colors: ['#008000', '#d50000'], // Couleurs distinctes pour chaque sexe
                dataLabels: {
                    enabled: true,
                    formatter: function(val, opts) {
                        return opts.w.globals.labels[opts.seriesIndex] + ': ' + Math.round(val) + '%';
                    }
                },
                legend: {
                    show: true,
                    position: 'bottom'
                }
            };

            const pieChart = new ApexCharts(document.querySelector('#pie-chart'), pieChartOptions);
            pieChart.render();


            console.log()

            // Data for the chart
            const regions = ['Maritime','Plateaux', 'Centrale','Kara','Savanes'];
            const adultsEnrolled = ["{{isset($adultesPerRegion['Maritime'])?$adultesPerRegion['Maritime']:0}}","{{isset($adultesPerRegion['Plateaux'])?$adultesPerRegion['Plateaux']:0}}","{{isset($adultesPerRegion['Centrale'])?$adultesPerRegion['Centrale']:0}}","{{isset($adultesPerRegion['Kara'])?$adultesPerRegion['Kara']:0}}","{{isset($adultesPerRegion['Savanes'])?$adultesPerRegion['Savanes']:0}}"]; // Remplacer par les vraies données
            const minorsEnrolled = ["{{isset($mineursPerRegion['Maritime'])?$mineursPerRegion['Maritime']:0}}","{{isset($adultesPerRegion['Plateaux'])?$adultesPerRegion['Plateaux']:0}}","{{isset($adultesPerRegion['Centrale'])?$adultesPerRegion['Centrale']:0}}","{{isset($adultesPerRegion['Kara'])?$adultesPerRegion['Kara']:0}}","{{isset($adultesPerRegion['Savanes'])?$adultesPerRegion['Savanes']:0}}"]; // Remplacer par les vraies données

            // Combined Radar Chart for Adults and Minors Enrolled
            const enrollmentRadarOptions = {
                series: [{
                    name: 'Adultes Enrôlés',
                    data: adultsEnrolled
                }, {
                    name: 'Mineurs Enrôlés',
                    data: minorsEnrolled
                }],
                chart: {
                    height: 450,
                    type: 'radar',
                    toolbar: {
                        show: true,
                        tools: {
                            download: true,
                            selection: true,
                            zoom: true,
                            zoomin: true,
                            zoomout: true,
                            pan: true,
                            reset: true | '<img src="/static/icons/reset.png" width="20">',
                            customIcons: []
                        },
                        autoSelected: 'zoom'
                    },
                },
                xaxis: {
                    categories: regions
                },
                title: {
                    text: 'Enrôlements par Région',
                    align: 'center'
                },
                colors: ['#007BFF', '#FFC107'],
                markers: {
                    size: 5
                },
                tooltip: {
                    theme: 'dark',
                    y: {
                        formatter: function(val) {
                            return val + " enrôlés"
                        }
                    }
                },
                yaxis: {
                    tickAmount: 5
                },
                legend: {
                    position: 'bottom',
                    horizontalAlign: 'center',
                    align: 'center'
                }
            };

            const enrollmentRadarChart = new ApexCharts(document.querySelector("#enrollmentRadarChart"), enrollmentRadarOptions);
            enrollmentRadarChart.render();




            const doughnutChartOptions = {
                series: [parseInt("{{isset($pourcentagesGroupesSanguins['A+'])?$pourcentagesGroupesSanguins['A+']:0}}"), parseInt("{{isset($pourcentagesGroupesSanguins['A-'])?$pourcentagesGroupesSanguins['A-']:0}}"), parseInt("{{isset($pourcentagesGroupesSanguins['B+'])?$pourcentagesGroupesSanguins['B+']:0}}"), parseInt("{{isset($pourcentagesGroupesSanguins['B-'])?$pourcentagesGroupesSanguins['B-']:0}}"), parseInt("{{isset($pourcentagesGroupesSanguins['AB+'])?$pourcentagesGroupesSanguins['AB+']:0}}"),parseInt("{{isset($pourcentagesGroupesSanguins['AB-'])?$pourcentagesGroupesSanguins['AB-']:0}}"), parseInt("{{isset($pourcentagesGroupesSanguins['O+'])?$pourcentagesGroupesSanguins['O+']:0}}"), parseInt("{{isset($pourcentagesGroupesSanguins['O-'])?$pourcentagesGroupesSanguins['O-']:0}}")], // Exemple de données pour chaque groupe sanguin
                chart: {
                    toolbar: {
                        show: true,
                        tools: {
                            download: true,
                            selection: true,
                            zoom: false,
                            zoomin: false,
                            zoomout: false,
                            pan: false,
                            reset: false | '<img src="/static/icons/reset.png" width="20">',
                            customIcons: []
                        },
                        autoSelected: 'zoom'
                    },
                    type: 'donut',
                    height: 350
                },
                labels: ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'], // Noms des groupes sanguins avec facteurs Rh
                colors: ['#FF4560', '#004BFF', '#FFC300', '#23C4ED', '#AB63FA', '#00E396', '#FF6900', '#FEB019'], // Couleurs distinctes pour chaque groupe sanguin
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                legend: {
                    position: 'left',
                    offsetY: 0,
                    height: 230,
                }
            };

            const doughnutChart = new ApexCharts(document.querySelector("#doughnut-chart"), doughnutChartOptions);
            doughnutChart.render();

    

            const candlestickChartOptions = {
                series: [{
                    name: 'Series 1',
                    data: [
                        [10, 20, 30, 40],
                        [20, 30, 40, 50],
                        [30, 40, 50, 60],
                        [40, 50, 60, 70],
                        [50, 60, 70, 80]
                    ]
                }],
                chart: {
                    type: 'candlestick',
                    height: 350
                },
                xaxis: {
                    title: {
                        text: 'X Axis'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Y Axis'
                    }
                },
                colors: ['#2962ff'],
                candlestick: {
                    wick: {
                        radius: 2
                    }
                }
            };

            const candlestickChart = new ApexCharts(
                document.querySelector('#candlestick-chart'),
                candlestickChartOptions
            );
            candlestickChart.render();
        </script>
        <script src="{{ asset('js/empreinte.js') }}"></script>
        <script src="{{ asset('js/socket.io.min.js') }}"></script>
        <script src="{{ asset('js/loading.js') }}"></script>
        <script src="{{ asset('js/aos.js') }}"></script>
        <script src="https://kit.fontawesome.com/e00702b042.js" crossorigin="anonymous"></script>
          <!-- Include Scripts -->
  <!-- $isFront is used to append the front layout scripts only on the front layout otherwise the variable will be blank -->
  <!-- BEGIN: Vendor JS-->

<link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/jquery-CbdDuLi-.js" /><link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/jquery-CED9k22g.js" /><link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/_commonjsHelpers-BosuxZz1.js" /><link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/jquery-Czc5UB_B.js" /><link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/popper-DNZnuk_L.js" /><link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/bootstrap-B-W6M1Y3.js" /><link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/node-waves-XDuO7R8f.js" /><link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/perfect-scrollbar-CLUWhEAQ.js" /><link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/hammer-36U3igM9.js" /><link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/typeahead-BKwBoP4T.js" /><link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/menu-CY9lYqyY.js" /><script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/jquery-CbdDuLi-.js"></script><script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/popper-DNZnuk_L.js"></script><script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/bootstrap-B-W6M1Y3.js"></script><script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/node-waves-XDuO7R8f.js"></script><script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/perfect-scrollbar-CLUWhEAQ.js"></script><script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/hammer-36U3igM9.js"></script><script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/typeahead-BKwBoP4T.js"></script><script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/menu-CY9lYqyY.js"></script>
<link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/apexcharts-ZYWXGMLC.js" /><link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/_commonjsHelpers-BosuxZz1.js" /><script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/apexcharts-ZYWXGMLC.js"></script><!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/main-DRGn0ueN.js" /><script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/main-DRGn0ueN.js"></script>
<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<link rel="modulepreload" href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/dashboards-analytics-BHlcqxn4.js" /><script type="module" src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/dashboards-analytics-BHlcqxn4.js"></script><!-- END: Page JS-->
        @notifyJs
        @livewireScripts
        <script>
  AOS.init();
</script>
<script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/bootstrap-B-W6M1Y3.js"></script>    

</body>

</html>