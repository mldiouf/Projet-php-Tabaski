<?php

if(isset($_GET['id']) && !empty($_GET['id'])){
    
// On inclut la connexion à la base
require_once('Bdd.php');

   // on nettoie l id envoyé
   $id = strip_tags($_GET['id']);

$sql = 'SELECT  `Mois`,  `Montant` FROM `cotisation` WHERE `id` = :id;';

// On prépare la requête
$query = $db->prepare($sql);
  // on "accroche" les parametres
  $query->bindValue(':id', $id, PDO::PARAM_INT);

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
}
?>

<body class="bg-light mx-5">
      

    <main class="container-light bg-light text-center text-dark">
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
                <table class="table text-dark text-center mx-5">
                    <thead>
                      
                        <th>MOIS</th>
                        <th>MONTANT</th>
                    </thead>
                    <tbody>
                        <?php
                        // On boucle sur la variable result
                        foreach($result as $produit){
                        ?>
                            <tr>
                                <td><?= $produit['Mois'] ?></td>
                                <td><?= $produit['Montant'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="listeCotisation.php" class="btn btn-success " style="float:right;">RETOUR</a>

            </section>
        </div>
    </main>
   
</body>
</html>