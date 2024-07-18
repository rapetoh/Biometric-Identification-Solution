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
    border-top: 3px solid var(--highlight-color);
    margin: 5px 0;
  }
  
  header {
    background-color: var(--header-bg-color);
    padding: 15px;
    text-align: center;
    border-bottom: 5px solid var(--highlight-color);
  }
  
  footer {
    background-color: var(--footer-bg-color);
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
    background-color: var(--table-header-bg-color);
    color: var(--highlight-color);
    padding: 10px;
    text-align: left;
  }
  
  td {
    border: 1px solid var(--table-border-color);
    padding: 8px;
    text-align: left;
  }
  
  .notes, aside {
    margin-top: 10px;
    padding: 10px;
    background-color: #FFFFFF;
    border-left: 5px solid var(--highlight-color);
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
    <p>Nom Prénom : {{$nom}} {{$prenom}}</p>
    <p>NIU : {{$NIU}}</p>
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
          <td>Date de naissance</td>
          <td>{{$DOB}}</td>
        </tr>
        <tr>
          <td>Sexe</td>
          <td>{{$sexe}}</td>
        </tr>
        <tr>
          <td>Nom de jeune fille</td>
          <td>{{$njf}}</td>
        </tr>
        <tr>
          <td>Groupe sanguin</td>
          <td>{{$GS}}</td>
        </tr>
        <tr>
          <td>Adresse de résidence</td>
          <td>{{$adresse_residence}}</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>{{$mail}}</td>
        </tr>
        <tr>
          <td>Téléphone</td>
          <td>{{$tel1}}</td>
        </tr>
        <tr>
          <td>Personne à prévenir 1</td>
          <td>{{$PAP1}}</td>
        </tr>
        <tr>
          <td>Personne à prévenir 2</td>
          <td>{{$PAP2}}</td>
        </tr>
        <tr>
          <td>Pièces Justificatives</td>
          <td>{{$pj}}</td>
        </tr>
        <tr>
          <td>Statut Matrimonial</td>
          <td>{{$statut_matrimonial}}</td>
        </tr>
        <tr>
          <td>Nom prenom Conjoint</td>
          <td>{{$npconjoint}}</td>
        </tr>
        <tr>
          <td>Profession</td>
          <td>{{$profession}}</td>
        </tr>
        <!-- Other rows omitted for brevity -->
      </tbody>
    </table>
  
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