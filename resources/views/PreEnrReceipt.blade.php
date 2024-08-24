<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}" />
    <title>Récipient</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            width: 500px;
            height: 500px;
            margin: 50px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .recipiant {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .numero {
            margin: 10px;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }

        .indication {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 18px;
            color: #666;
        }
        #captureButton:hover{
            background-color: wheat;
        }
    </style>
</head>

<body>
    <img src="{{ asset('img/idtogo.png') }}" style="width: 90px;" class="w-px-20 h-auto rounded-circle">
    
    <div class="container" style="margin:auto">
        
        <div class="recipiant" style="margin: auto;">
            <div class="numero">{{$id}}</div><br>
            <div class="indication" style="text-align: center; font-size: 13px; color: green;">
                <div style="text-align: center; font-size: 13px; color: red; font-weight:bold;">ATTENTION :</div>Ce numéro est personnel et doît être jalousement gardé. Il vous sera demandé lors de votre enrôlement dans un centre. Sans celui-ci, l'enrôlement risque dêtre infaisable.
            </div>
        </div>
        <!-- <div style="margin-left: 45%; margin-right: 45%;">
            <a href="{{url('printPDF_Pre_enrolement/'.$id)}}"><button style="border: none;" type="button" id="captureButton"><i class="fa-solid fa-download fa-2xl" style="color: green;"></i></button></a>
        </div> -->
        

    </div>
    <script src="https://kit.fontawesome.com/e00702b042.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/build/assets/bootstrap-B-W6M1Y3.js"></script>    
</body>

</html>