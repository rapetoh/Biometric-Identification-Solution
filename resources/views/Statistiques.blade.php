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


    <div class="main-cards" style="width: 94%;" style="color: white">

        <div class="thegroup">
            <div class="subgroup" style="margin-bottom:18px;">
                <div class="card degrade" style=" margin-right:18px; height:100px; background-color: green ;border-radius: 15px; color: white">
                    <div class="card-inner">
                        <h6 style="color: white; font-size: 11.5px; ">Total Enrôlements </h6>
                        <span class=""></span>
                    </div>
                    <h1 style="font-size: 40px; font-weight: 500;">249 <i class="fa-solid fa-id-card fa-sm" style="color: #ffffff;"></i></h1>
                </div>

                <div class="card degrade" style=" margin-right:18px; height:100px; background-color: red ; border-radius: 15px; color: white">
                    <div class="card-inner">
                        <h3 style="color: white; font-size: 11.5px;">Total Agents</h3>
                        <span class=""></span>
                    </div>
                    <h1 style="font-size: 40px; font-weight: 500;">178 <i class="fa-solid fa-users fa-sm" style="color: #ffffff;"></i></h1>
                </div>

                <div class="card degrade" style=" margin-right:18px; height:100px; border-radius: 15px; color: white">
                    <div class="card-inner">
                        <h3 style="color: white; font-size: 11.5px;">Total CE</h3>
                        <span class=""></span>
                    </div>
                    <h1 style="font-size: 40px; font-weight: 500;">24 <i class="fa-solid fa-building fa-sm" style="color: #ffffff;"></i></h1>
                </div>

                <div class="card degrade" style=" height:100px; border-radius: 15px; color: white">
                    <div class="card-inner">
                        <h3 style="color: white; font-size: 11.5px;">Total dossiers de Pré-enrôlement</h3>
                        <span class=""></span>
                    </div>
                    <h1 style="font-size: 40px; font-weight: 500;">17 <i class="fa-regular fa-folder-open fa-sm" style="color: #ffffff;"></i></h1>
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

    <div class="charts" style="max-width: 94%" style="color: green;">

        <div class="charts-card" style=" background-color:#F9F9F9; border-radius: 15px;">
            <h2 class="chart-title">Répartition en fonction du Statut Matrimonial</h2>
            <div id="bar-chart"></div>
        </div>

        <div class="charts-card" style="border-radius: 15px;">
            <h2 class="chart-title">Répartition en fonction du sexe</h2>
            <div id="pie-chart"></div>
        </div>

        <div class="charts-card" style="border-radius: 15px;">
            <h2 class="chart-title">Répartition par Secteur d'activité</h2>
            <div id="progress-bar"></div>
        </div>





        <div class="charts-card" style="border-radius: 15px;">
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
                    data: [1000000, 2000000, 1000000, 7000000],
                    name: 'Products',
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
                        text: 'Nombre',
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
                        data: [200, 250, 300, 350, 300, 250, 300, 200], // Exemple de données mensuelles pour les enrôlements
                    },
                    {
                        name: 'Pré-enrôlements',
                        data: [150, 180, 220, 270, 260, 240, 230, 200], // Exemple de données mensuelles pour les pré-enrôlements
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
                labels: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin', 'Jul', 'Août'], // Labels des mois
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
                    data: [60, 30, 40, 70, 28] // Exemple de pourcentage de participation par secteur
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
                series: [60, 40], // Remplacer par les valeurs réelles du nombre d'hommes et de femmes
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
                        return opts.w.globals.labels[opts.seriesIndex] + ': ' + val + '%';
                    }
                },
                legend: {
                    show: true,
                    position: 'bottom'
                }
            };

            const pieChart = new ApexCharts(document.querySelector('#pie-chart'), pieChartOptions);
            pieChart.render();



            // Data for the chart
            const regions = ['MARITIME', 'KARA', 'CENTRALE', 'PLATEAUX', 'SAVANES'];
            const adultsEnrolled = [200, 150, 180, 130, 160]; // Remplacer par les vraies données
            const minorsEnrolled = [120, 100, 140, 90, 110]; // Remplacer par les vraies données

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
                series: [15, 15, 5, 5, 20, 20, 10, 10], // Exemple de données pour chaque groupe sanguin
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