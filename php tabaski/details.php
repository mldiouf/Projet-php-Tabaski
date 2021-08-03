<?php
// ON DEMARRE L ASESIO?
session_start();
// est ce que l id existe et n est pas vide
if(isset($_GET['telephone']) && !empty($_GET['telephone'])){
    require_once('Bdd.php');

    // on nettoie l id envoyé
    $telephone = strip_tags($_GET['telephone']);


    $sql = 'SELECT `id`,`DateCotis`, `Motif`,  `nom`, `prenom` FROM `cotisation` INNER JOIN `membre` ON cotisation.Matricule=membre.matricule  WHERE `telephone` = :telephone;
';

    // on prepare la requete
    $query = $db->prepare($sql);

    // on "accroche" les parametres
    $query->bindValue(':telephone', $telephone, PDO::PARAM_INT);

    //  on excute la requete

    $query->execute();

    // on recupere le produits

    $produit = $query->fetch();
    //  on verifie si le produits existe
    if(!$produit){
        $_SESSION['erreur'] = "Cet id n existe pas";
    header(('location: index.php'));
    }

}else{
    $_SESSION['erreur'] = "URL invalide";
    header(('location: index.php'));
}


?>

<!DOCTYPE html>
<html lang="fr">
<?php    
         require_once('haut.php');
?>
<body class="bg-light text-dark">
    <main class="container-light bg-light text-center text-dark">
        <div class="row">
            <section class="col-12 text-dark">
                <p>ID <?= $produit['id'] ?></p>
                <p> NOM : <?= $produit['nom'] ?></p>
                <p> PRENOM : <?= $produit['prenom'] ?></p>
                <p> DATE DE COTISATION : <?= $produit['DateCotis'] ?></p>
                <p>MOTIF : <?= $produit['Motif'] ?></p>
            </section>
        </div>
    </main>

    <?php    
         require_once('sommes.php');
?>
    
</body>
</html>