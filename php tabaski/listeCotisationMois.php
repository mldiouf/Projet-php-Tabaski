<?php
// On démarre une session
session_start();

// On inclut la connexion à la base
require_once('Bdd.php');

$sql = 'SELECT `id`,`DateCotis`, `Mois`, `Motif`, `Montant`, `nom`, `prenom`, `telephone` FROM `cotisation` INNER JOIN `membre` ON cotisation.Matricule=membre.matricule';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('closeBase.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CDN bulma -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet"/>
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   
    <title>Espace Membre</title>
</head>

<body>
      
<nav class="navbar navbar-expand-lg navbar-light bg-light text-primary">
  <div class="container-fluid bg-light text-primary">
    <a class="navbar-brand" href="index.php"><h3>ESPACE MEMBRE</h3></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-dark" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="listeMembre.php" style="text-decoration:none; "><p>LISTE MEMBRE</p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listeCotisation.php" style="text-decoration:none;"><p>LISTE COTISATION</p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="saisieMembre.php" style="text-decoration:none; "><p>SAISSIR MEMBRE</p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listeCotisationMois.php" style="text-decoration:none; "><p>RECHERCHE COTISATION</p></a>
        </li>
       
      </ul>
    </div>
  </div>
</nav>  
    <main class="container">
        <div class="row">
            <section class="col-12">
            <?php
                    if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert alert-danger" role="alert">
                                '. $_SESSION['erreur'].'
                            </div>';
                        $_SESSION['erreur'] = "";
                    }
                ?>
                <?php
                    if(!empty($_SESSION['message'])){
                        echo '<div class="alert alert-success" role="alert">
                                '. $_SESSION['message'].'
                            </div>';
                        $_SESSION['message'] = "";
                    }
                ?>
                <h1 class="text-dark my-4">Liste Des cotisations du Mois de</h1>
                <table class="table table-bordered border-info " style=" font-size: 10px;">
                    <thead>
                        <th>NUMERO COTISATION</th>
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>DATE COTISATION</th>
                        <th>MOIS</th>
                        <th>MOTIF</th>
                        <th>MONTANT</th>
                    </thead>
                    <tbody>
                        <?php
                        // On boucle sur la variable result
                        foreach($result as $produit){
                        ?>
                            <tr>
                                <td><?= $produit['id'] ?></td>
                                <td><?= $produit['nom'] ?></td>
                                <td><?= $produit['prenom'] ?></td>
                                <td><?= $produit['DateCotis'] ?></td>
                                <td><?= $produit['Mois'] ?></td>
                                <td><?= $produit['Motif'] ?></td>
                                <td><?= $produit['Montant'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="index.php" class="btn btn-primary">RETOUR</a>
                
            </section>
        </div>
    </main>
    <script>
        $(document).ready(function() {
    $('.table').DataTable( {
        "scrollY":        "800px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );
    </script>
</body>
</html>