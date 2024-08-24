<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/AgentLogin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/brands.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/solid.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}" />
    <title>Modal Page</title>
</head>

<body>
    @php
    $photoPath = $item->NIU . '/photo' . $item->NIU . '.png'
    @endphp
    <style>
        .card {
            width: 500px;
            height: 300px;
            color: #fff;
            cursor: pointer;
            perspective: 1000px;
        }

        .card-inner {
            width: 100%;
            height: 100%;
            position: relative;
            transition: transform 1s;
            transform-style: preserve-3d;
        }

        .front,
        .back {
            width: 100%;
            height: 100%;
            background-image: linear-gradient(45deg, green, red, white);
            position: absolute;
            top: 0;
            left: 0;
            padding: 20px 30px;
            border-radius: 15px;
            overflow: hidden;
            z-index: 1;
            backface-visibility: hidden;
        }

        .row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .map-img {
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0.3;
            z-index: -1;
        }

        .card-no {
            font-size: 35px;
            margin-top: 60px;
        }

        .card-holder {
            font-size: 12px;
            margin-top: 40px;
        }

        .name {
            font-size: 22px;
            margin-top: 20px;
        }

        .bar {
            background: #222;
            margin-left: -30px;
            margin-right: -30px;
            height: 60px;
            margin-top: 10px;
        }

        .card-cvv {
            margin-top: 20px;
        }

        .card-cvv div {
            flex: 1;
        }

        .card-cvv img {
            width: 100%;
            display: block;
            line-height: 0;
        }

        .card-cvv p {
            background: #fff;
            color: #000;
            font-size: 22px;
            padding: 10px 20px;
        }

        .card-text {
            margin-top: 30px;
            font-size: 14px;
        }

        .signature {
            margin-top: 30px;
        }

        .back {
            transform: rotateY(180deg);
        }

        .card:hover .card-inner {
            transform: rotateY(-180deg);
        }

        .pdf-container {
            width: 80%;
            /* ou la taille que vous désirez */
            height: 500px;
            /* ajustez à la hauteur désirée */
            border-radius: 15px;
            /* bords arrondis */
            background-color: green;
            /* couleur de fond verte */
            padding: 10px;
            /* espacement interne pour ne pas coller aux bords */
            box-sizing: border-box;
            overflow: hidden;
            /* cache les débordements */
            margin: auto;
            /* centre la div sur la page */
        }

        .pdf-container embed {
            width: 100%;
            /* prend toute la largeur de la div */
            height: 100%;
            /* prend toute la hauteur de la div */
        }
    </style>
    <!-- Modal -->
   
    <div class="modal fade show" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block; overflow:scroll">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><img src="{{ asset('img/idtogo.png') }}" style="width: 100px"></h5>
                    <form style="margin-right: 40px;" action="{{ route('dvForm.create') }}">
                    <span style="font-size:11px; text-align: center;">Télécharger la Carte générée et le Récépissé avant de pouvoir continuer</span>    
                    <button id="downloadedVerificator" type="submit" class="close" aria-label="Close" onclick="return confirm('Assurez vous d\'avoir imprimer et capturer le nécessaire avant de continuer.');">
                        <i class="fa-solid fa-circle-check fa-xl" style="color: green;"></i>
                        </button>
                    </form>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="column">
                            Aperçu de la carte
                            <br><br><br><br><br>
                            <button style="border: none;" type="button" id="captureButton"><i class="fa-solid fa-download fa-2xl" style="color: green;"></i></button>
                            <br><br>
                            <div class="card" id="idcard">
                                <div class="card-inner">
                                    <div class="front">

                                        <img src="{{ asset('img/ind.png') }}" style="height: fit-content;" class="map-img">
                                        <div style="display: inline-flex; justify-content: space-between; align-items: center;">
                                            <p style="font-size: 12px; margin-right: 130px; font-weight: bold;">CARTE D'IDENTIFICATION UNIQUE</p>
                                            <img src="{{ asset('img/idtogo.png') }}" style="width: 100px">
                                        </div>
                                        <div class="row card-no">
                                            <circle style="margin-top: -60px;" cx="50%" cy="50%" r="40%" stroke="black" stroke-width="3" fill="black">
                                                @if (Storage::disk('val')->exists($photoPath))
                                                <img style="border-radius: 1000px; width: 90px;" src="{{ Storage::disk('val')->url($photoPath) }}" alt="Description de l'image">
                                                @else
                                                <img style="border-radius: 1000px; width: 30px" src="{{ asset('img/empreinte-digitale.png') }}" alt="Description de l'image">
                                                @endif
                                            </circle>
                                            <div>
                                                <h6 style="font-size: 12px; margin-top: 5px">TITULAIRE : <span style="font-size: 12px; font-weight: bold;">{{ $item->nom }} {{ $item->prenom }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Né le : <span style="font-size: 12px; font-weight: bold;">{{ $item->DOB }}</span></h6>
                                                
                                            </div>
                                            <p style="font-weight:500; font-size: 32px">{{substr( $item->NIU ,0, 4).'  -  '}}{{substr( $item->NIU, 4 , 4).'  -  '}}{{substr( $item->NIU, 8, 4).'  -  '}}{{substr( $item->NIU, 12, 5)}}</p>

                                        </div>
                                        <div style="display: inline-flex; justify-content: space-between; align-items: center;">
                                            <div style="margin-right: 0px;">
                                                <h6 style="font-size: 12px;">TELEPHONE</h>
                                                    <p style="font-size: 12px; width: 200px; font-weight: bold;">{{ $item->tel1 }}</p>
                                            </div>
                                            <div>
                                                <h6 style="font-size: 12px;">PROFESSION</h6>
                                                <p style="font-size: 12px; font-weight: bold;">{{ $item->profession }}</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="back">
                                        <img src="{{ asset('img/ind.png') }}" class="map-img">
                                        <div class="bar"></div>
                                        <div class="row card-text">
                                            <p style="font-size: 12px;">ATTENTION: Cette carte est strictement personnelle et ne doit en aucun cas être remise à un tiers. Veuillez garder votre NIU confidentiel, car il vous identifie et vous êtes le seul responsable de son utilisation. En cas de perte, veuillez contacter un centre d'enrôlement dans les plus brefs délais.</p>
                                        </div>
                                        <br>
                                        <div style="display: inline-flex; justify-content: space-between; align-items: center;">
                                            <p style="font-size: 12px;  margin-right: 230px; font-weight: bold;">SIGNATURE DU TITULAIRE</p>

                                            <img src="{{ asset('img/idtogo.png') }}" style="width: 100px">
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <canvas id="canvas"></canvas>
                        </div>
                        <div class="column">
                            Récépissé
                            <br><br>
                            <div class="pdf-container">
                                <embed width="100%" height="85%" src="{{ url('/pdf/' . $item->idDDemo) }}" type="application/pdf">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <script>
        var formAvailability = document.getElementById('downloadedVerificator');
        formAvailability.disabled = true;


        document.addEventListener('DOMContentLoaded', function() {
            var captureButton = document.getElementById('captureButton');
            captureButton.addEventListener('click', function() {
                captureAndSaveCard();
            });
        });

        function captureAndSaveCard() {
            // Capture de la face avant
            html2canvas(document.querySelector("#idcard .front")).then(canvas => {
                saveAsImage(canvas, 'idCard-front.png');
                sendImageToServer(canvas, 'idCard-front.png'); // Envoyer au serveur
            });

            const backCard = document.querySelector("#idcard .back");
            backCard.style.transform = 'rotateY(0deg)';

            // Capture de la face arrière
            html2canvas(document.querySelector("#idcard .back")).then(canvas => {
                saveAsImage(canvas, 'idCard-back.png');
                sendImageToServer(canvas, 'idCard-back.png'); // Envoyer au serveur
            });

            backCard.style.transform = 'rotateY(-180deg)';
        }

        function saveAsImage(canvas, filename) {
            var image = canvas.toDataURL("image/png");
            var link = document.createElement('a');
            link.download = filename;
            link.href = image;
            document.body.appendChild(link); // Ajouter le lien au corps du document pour Firefox
            link.click(); // Déclencher le téléchargement
            document.body.removeChild(link); // Supprimer le lien une fois terminé
        }

        function sendImageToServer(canvas, filename) {
            canvas.toBlob(function(blob) {
                var formData = new FormData();
                formData.append('image', blob, filename);

                // Mettez ici l'URL de votre endpoint Laravel
                fetch("{{route('carte.store')}}", {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        formAvailability.disabled = false;
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
            }, 'image/png');
        }


        function closeModal() {
            window.history.back();
        }

        // Pour afficher le modal immédiatement
        $(document).ready(function() {
            $('#myModal').modal('show');
        });
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>