<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap');
  :root {
    --font-color: #333;
    --highlight-color: green;
    --header-bg-color: rgb(191, 251, 191);
    --footer-bg-color: rgb(191, 251, 191);
    --table-header-bg-color: #E8F4FD;
    --table-border-color: #D1D1DF;
  }
  
  @page {
    size: A4;
    margin: 0.5cm;
  }
  
  body {
    font-family: 'Montserrat', sans-serif;
    color: var(--font-color);
    padding: 0.5cm;
    font-size: 9pt;
  }
  
  a {
    color: var(--highlight-color);
    text-decoration: none;
  }
  
  hr {
    border: none;
    border-top: 3px solid green;
    margin: 5px 0;
  }
  
  header {
    background-color: #cdffd3;
    padding: 15px;
    text-align: center;
    border-bottom: 5px solid green;
  }
  
  footer {
    background-color: #a3f6ff;
    padding: 10px;
    text-align: center;
    font-size: 8pt;
  }
  
  main {
    margin-top: 10px;
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }
  
  th {
    background-color: #cdffd3;
    color: black;
    padding: 10px;
    text-align: left;
  }
  
  td style = "font-size: 17px; margin-bottom: 10px;" {
    border: 1px solid white;
    padding: 8px;
    text-align: left;
  }
  
  .notes, aside {
    margin-top: 10px;
    padding: 10px;
    background-color: #FFFFFF;
    border-left: 5px solid green;
  }
  
  .notes b, aside b {
    font-weight: bold;
  }
  </style>
  
  <header>
    <svg>
      <circle cx="50%" cy="50%" r="40%" stroke="black" stroke-width="3" fill="black" />
    </svg>
    <h1>ID Togo - Récapitulatif d'Enregistrement</h1>
    <p>Nom Prénom : {{$nom?$nom:'--N/A--'}} {{$prenom?$prenom:'--N/A--'}}</p>
    <p>NIU : {{$NIU?$NIU:'--N/A--'}}</p>
  </header>
  
  <main>
    <h2>Informations Démographiques et Contacts</h2>
    <table>
      <thead>
        <tr>
          <th>Attribut</th>
          <th>Valeur</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style = "font-size: 17px; margin-bottom: 10px;">Date de naissance</td style = "font-size: 17px; margin-bottom: 10px;">
          <td style = "font-size: 17px; margin-bottom: 10px;">{{$DOB?$DOB:'--N/A--'}}</td style = "font-size: 17px; margin-bottom: 10px;">
        </tr>
        <tr>
          <td style = "font-size: 17px; margin-bottom: 10px;">Sexe</td style = "font-size: 17px; margin-bottom: 10px;">
          <td style = "font-size: 17px; margin-bottom: 10px;">{{$sexe?$sexe:'--N/A--'}}</td style = "font-size: 17px; margin-bottom: 10px;">
        </tr>
        <tr>
          <td style = "font-size: 17px; margin-bottom: 10px;">Nom de jeune fille</td style = "font-size: 17px; margin-bottom: 10px;">
          <td style = "font-size: 17px; margin-bottom: 10px;">{{$njf?$njf:'--N/A--'}}</td style = "font-size: 17px; margin-bottom: 10px;">
        </tr>
        <tr>
          <td style = "font-size: 17px; margin-bottom: 10px;">Groupe sanguin</td style = "font-size: 17px; margin-bottom: 10px;">
          <td style = "font-size: 17px; margin-bottom: 10px;">{{$GS?$GS:'--N/A--'}}</td style = "font-size: 17px; margin-bottom: 10px;">
        </tr>
        <tr>
          <td style = "font-size: 17px; margin-bottom: 10px;">Adresse de résidence</td style = "font-size: 17px; margin-bottom: 10px;">
          <td style = "font-size: 17px; margin-bottom: 10px;">{{$adresse_residence?$adresse_residence:'--N/A--'}}</td style = "font-size: 17px; margin-bottom: 10px;">
        </tr>
        <tr>
          <td style = "font-size: 17px; margin-bottom: 10px;">Email</td style = "font-size: 17px; margin-bottom: 10px;">
          <td style = "font-size: 17px; margin-bottom: 10px;">{{$mail?$mail:'--N/A--'}}</td style = "font-size: 17px; margin-bottom: 10px;">
        </tr>
        <tr>
          <td style = "font-size: 17px; margin-bottom: 10px;">Téléphone</td style = "font-size: 17px; margin-bottom: 10px;">
          <td style = "font-size: 17px; margin-bottom: 10px;">{{$tel1?$tel1:'--N/A--'}}</td style = "font-size: 17px; margin-bottom: 10px;">
        </tr>
        <tr>
          <td style = "font-size: 17px; margin-bottom: 10px;">Personne à prévenir 1</td style = "font-size: 17px; margin-bottom: 10px;">
          <td style = "font-size: 17px; margin-bottom: 10px;">{{$PAP1?$PAP1:'--N/A--'}}</td style = "font-size: 17px; margin-bottom: 10px;">
        </tr>
        <tr>
          <td style = "font-size: 17px; margin-bottom: 10px;">Personne à prévenir 2</td style = "font-size: 17px; margin-bottom: 10px;">
          <td style = "font-size: 17px; margin-bottom: 10px;">{{$PAP2?$PAP2:'--N/A--'}}</td style = "font-size: 17px; margin-bottom: 10px;">
        </tr>
        <tr>
          <td style = "font-size: 17px; margin-bottom: 10px;">Pièces Justificatives</td style = "font-size: 17px; margin-bottom: 10px;">
          <td style = "font-size: 17px; margin-bottom: 10px;">{{$pj?$pj:'--N/A--'}}</td style = "font-size: 17px; margin-bottom: 10px;">
        </tr>
        <tr>
          <td style = "font-size: 17px; margin-bottom: 10px;">Statut Matrimonial</td style = "font-size: 17px; margin-bottom: 10px;">
          <td style = "font-size: 17px; margin-bottom: 10px;">{{$statut_matrimonial?$statut_matrimonial:'--N/A--'}}</td style = "font-size: 17px; margin-bottom: 10px;">
        </tr>
        <tr>
          <td style = "font-size: 17px; margin-bottom: 10px;">Nom prenom Conjoint</td style = "font-size: 17px; margin-bottom: 10px;">
          <td style = "font-size: 17px; margin-bottom: 10px;">{{$npconjoint?$npconjoint:'--N/A--'}}</td style = "font-size: 17px; margin-bottom: 10px;">
        </tr>
        <tr>
          <td style = "font-size: 17px; margin-bottom: 10px;">Profession</td style = "font-size: 17px; margin-bottom: 10px;">
          <td style = "font-size: 17px; margin-bottom: 10px;">{{$profession?$profession:'--N/A--'}}</td style = "font-size: 17px; margin-bottom: 10px;">
        </tr>
        <!-- Other rows omitted for brevity -->
      </tbody>
    </table>
    <h2>Informations Biométriques: Enrégistrées</h2>
    <h2>Prise de vue: Effectuée</h2><br>
    <div class="notes">
      <b>Notes</b>
      <p>Ce document est généré automatiquement et n'a besoin d'aucune signature.</p>
    </div>
  </main>
<!--   
  <footer>
    <p>Contactez notre support pour plus d'informations.</p>
    <p>Email: support@idtogo.com | Téléphone: 90390482</p>
  </footer> -->
  
</body>
</html>