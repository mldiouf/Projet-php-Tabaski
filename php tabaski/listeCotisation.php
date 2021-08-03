<?php
// On démarre une session
session_start();

// On inclut la connexion à la base
require_once('Bdd.php');

$sql = 'SELECT `id`,`DateCotis`, `Mois`, `Motif`, `Montant`, `nom`, `prenom` FROM `cotisation` INNER JOIN `membre` ON cotisation.Matricule=membre.matricule
';

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

<body class="container-fluid bg-light text-center text-dark">
      

    <main class="container-dark bg-light text-center text-dark" id="liste">
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
                <h1 class="text-dark my-4">Liste Des cotisations</h1>
                <table class="table table-bordered border-info " style=" font-size: 14px;">
                    <thead>
                        <th>ID COTIS</th>
                        <th>PRENOM</th>
                        <th>NOM</th>
                        <th>MOIS</th>
                        <th>MOTIF</th>
                        <th>MONTANT</th>
                        <th>date</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php
                        // On boucle sur la variable result
                        foreach($result as $produit){
                        ?>
                            <tr>
                                <td style="width:75px;"><?= $produit['id'] ?></td>
                                <td style="width:175px;"><?= $produit['prenom'] ?></td>
                                <td style="width:95px;"><?= $produit['nom'] ?></td>
                                <td style="width:75px;"><?= $produit['Mois'] ?></td>
                                <td style="width:75px;"><?= $produit['Motif'] ?></td>
                                <td style="width:75px;"><?= $produit['Montant'] ?></td>
                                <td style="width: 95px;"><?= $produit['DateCotis'] ?></td>
                                <td style="width: 100px;"> 
                                     <a class="glyphicon glyphicon-eye-open fw-6 mx-2 " href="details.php?id=<?= $produit['id'] ?>"></a>     
                                     <a class="glyphicon glyphicon-edit fw-5 mx-2 text-warning" href="Modifier.php?id=<?= $produit['id'] ?>"></a>    
                                     <a class="glyphicon glyphicon-trash fw-5 mx-2 text-danger" href="delete.php?id=<?= $produit['id'] ?>" onclick="return confirm('voulez vous vraiment supprimer cette enregistrement')"></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="index.php" class="btn btn-primary " style="float:right;">RETOUR</a>
                
            </section>
        </div>
    </main>
   
</body>
</html>