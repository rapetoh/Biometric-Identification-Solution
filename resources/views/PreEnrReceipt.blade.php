<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            justify-content: center;
            align-items: center;
        }

        .numero {
            font-size: 48px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="recipiant">
            <div class="numero">{{$receipt}}</div>
            <div class="indication" style="text-align: center; font-size: 13px; color: green;">Ce numéro est personnel et doît être jalousement gardé. Il vous sera demandé lors de votre enrôlement dans un centre. Sans celui-ci, l'enrôlement risque dêtre infaisable.</div>
        </div>
        
    </div>
</body>
</html>