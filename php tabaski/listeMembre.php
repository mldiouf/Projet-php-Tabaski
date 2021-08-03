<?php
// On démarre une session
session_start();

// On inclut la connexion à la base
require_once('Bdd.php');

$sql = 'SELECT * FROM `membre` ORDER BY nom ASC';

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
<?php    
         require_once('haut.php');
?>
<body class="bg-light">
 
    <main class="container-dark bg-light text-center text-dark mx-5">
        <div class="row">
            <div class="col-lg-12 col">
            
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
                <h1 class="my-4">Liste Des Membres</h1>
                <table class="table table-bordered border-info" style=" font-size: 10px;">
                    <thead>
                
                        <th>ID</th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Action</th>
             
                       
                    </thead>
                    <tbody>
                        <?php
                        // On boucle sur la variable result
                        foreach($result as $produit){
                        ?>
                            <tr>
                  
                                <td><?= $produit['matricule'] ?></td>
                                <td><?= $produit['prenom'] ?></td>
                                <td><?= $produit['nom'] ?></td>
                                <td><?= $produit['adresse'] ?></td>
                                <td><?= $produit['telephone'] ?></td>
                                <td> 
                                <a class="glyphicon glyphicon-eye-open fw-6 mx-2 text-success" href="details.php?telephone=<?= $produit['telephone'] ?>"></a>     
                                <a  href="SaisieCotisation.php?matricule=<?= $produit['matricule'] ?>" class="glyphicon glyphicon-eur"></a></td>
                             
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="index.php" class="btn btn-primary" style="float:right">RETOUR</a>
               
            </section>
        </div>
    </main>
    <script>
        $(document).ready(function() {
    $('.table').DataTable( {
        "scrollY":        "300px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );
    </script>
</body>
</html>