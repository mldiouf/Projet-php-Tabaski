

 <?php

if(isset($_GET['telephone']) && !empty($_GET['telephone'])){
    
// On inclut la connexion à la base
require_once('Bdd.php');

   // on nettoie l id envoyé
$telephone = strip_tags($_GET['telephone']);

$sql = 'SELECT `Mois`, `Montant` FROM `cotisation` INNER JOIN `membre` ON cotisation.Matricule=membre.matricule WHERE telephone = :telephone
;';

// On prépare la requête
$query = $db->prepare($sql);
  // on "accroche" les parametres
  $query->bindValue(':telephone', $telephone, PDO::PARAM_INT);

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
      

    <main class="container-dark bg-light text-center text-dark mx-5">
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
                <table  class="table table-bordered border-info" style=" font-size: 14px;">
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
                <a href="listeMembre.php" class="btn btn-success " style="float:right;">RETOUR</a>

            </section>
        </div>
    </main>
   
</body>
</html>