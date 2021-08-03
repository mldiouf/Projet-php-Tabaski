<?php
// On démarre une session
session_start();

if($_POST){
    if( isset($_POST['nom']) && !empty($_POST['nom'])
    && isset($_POST['prenom']) && !empty($_POST['prenom'])
    && isset($_POST['adresse']) && !empty($_POST['adresse'])
    && isset($_POST['telephone']) && !empty($_POST['telephone'])){
        // On inclut la connexion à la base
        require_once('Bdd.php');

        // On nettoie les données envoyées
        // $matricule = strip_tags($_POST['matricule']);
        $nom = strip_tags($_POST['nom']);
        $prenom = strip_tags($_POST['prenom']);
        $adresse = strip_tags($_POST['adresse']);
        $telephone = strip_tags($_POST['telephone']);

        $sql = 'INSERT INTO `membre` ( `nom`, `prenom`,`adresse`,`telephone`) VALUES ( :nom, :prenom, :adresse, :telephone);';

        $query = $db->prepare($sql);

        //   $query->bindValue(':matricule', $matricule, PDO::PARAM_STR);
          $query->bindValue(':nom', $nom, PDO::PARAM_STR);
          $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
          $query->bindValue(':adresse', $adresse, PDO::PARAM_STR);
          $query->bindValue(':telephone', $telephone, PDO::PARAM_INT);

        $query->execute();

         $_SESSION['message'] = "Membre ajouté";
         require_once('closeBase.php');

         header('Location: listeMembre.php');
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<?php    
         require_once('haut.php');
?>
<body class="bg-light">
      

    <main class="container-dark bg-light text-center text-dark">
        <div class="row bg-light">
            <section class="col-12">
                <?php
                    if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert alert-danger" role="alert">
                                '. $_SESSION['erreur'].'
                            </div>';
                        $_SESSION['erreur'] = "";
                    }
                ?>
                <h1>Ajouter des Membres</h1>
                <form method="post" class="mx-5 px-5">
                   
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" id="prenom" name="prenom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" id="adresse" name="adresse" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telephone">Telephone</label>
                        <input type="number"  id="telephone" name="telephone" class="form-control">
                    </div>
                    <button class="btn btn-primary" style="float:left;">Enregistrer</button>
                    
                    <a href="index.php" class="btn-lg btn-info" style="float:right;">RETOUR</a>
                </form>
            </section>
        </div>
    </main>
</body>
</html>