<?php
// On démarre une session
session_start();

if($_POST){
    if(isset($_POST['id']) && !empty($_POST['id'])
    && isset($_POST['DateCotis']) && !empty($_POST['DateCotis'])
    && isset($_POST['Mois']) && !empty($_POST['Mois'])
    && isset($_POST['Montant']) && !empty($_POST['Montant'])
    && isset($_POST['Motif']) && !empty($_POST['Motif'])
    && isset($_POST['Matricule']) && !empty($_POST['Matricule'])){
        // On inclut la connexion à la base
        require_once('Bdd.php');

        // On nettoie les données envoyées
        $id = strip_tags($_POST['id']);
        $DateCotis = strip_tags($_POST['DateCotis']);
        $Mois = strip_tags($_POST['Mois']);
        $Montant = strip_tags($_POST['Montant']);
        $Motif = strip_tags($_POST['Motif']);
        $Matricule = strip_tags($_POST['Matricule']);

        $sql = 'UPDATE `Cotisation` SET `DateCotis`=:DateCotis, `Mois`=:Mois, `Montant`=:Montant, `Motif`=:Motif, `Matricule`=:Matricule WHERE `id`=:id;';

        $query = $db->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':DateCotis', $DateCotis, PDO::PARAM_STR);
        $query->bindValue(':Mois', $Mois, PDO::PARAM_STR);
        $query->bindValue(':Montant', $Montant, PDO::PARAM_STR);
        $query->bindValue(':Motif', $Motif, PDO::PARAM_STR);
        $query->bindValue(':Matricule', $Matricule, PDO::PARAM_STR);

        $query->execute();

        $_SESSION['message'] = "Cotisation modifié";
        require_once('closeBase.php');

        header('Location: listeCotisation.php');
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('Bdd.php');

    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `Cotisation` WHERE `id` = :id;';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On récupère le produit
    $produit = $query->fetch();

    // On vérifie si le produit existe
    if(!$produit){
        $_SESSION['erreur'] = "Cet numero de cotisation n'existe pas";
        header('Location: listeCotisation.php');
    }
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: listeCotisation.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<?php    
         require_once('haut.php');
?>
<body class="bg-light">
 
    <main class="container-dark bg-light text-center text-dark">
        <div class="row">
            <section class="col-12">
                <?php
                    if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert alert-success" role="alert">
                                '. $_SESSION['erreur'].'
                            </div>';
                        $_SESSION['erreur'] = "";
                    }
                ?>
                <h1 style="margin-left: 4.3%;">Modifier un produit</h1>
                 <form method="post" class="mx-5 px-5">
                  <div class="form-group">
                        <label for="DateCotis">DateCotis</label>
                        <input type="date" id="DateCotis" name="DateCotis" class="form-control" value="<?= $produit['DateCotis']?>">
                  </div>
                    <div class="form-group">
                    <label for="Mois">Mois</label>
                        <select class="form-control"  name="Mois" id="Mois" value="<?= $produit['Mois']?>">
                        
                            <option value="JANVIER">JANVIER</option>
                            <option value="FEVRIER">FEVRIER</option>
                            <option value="MARS">MARS</option>
                            <option value="AVRIL">AVRIL</option>
                            <option value="MAI">MAI</option>
                            <option value="JUIN">JUIN</option>
                            <option value="JUILLET">JUILLET</option>
                            <option value="AOUT">AOUT</option>
                            <option value="SEPTEMBRE">SEPTEMBRE</option>
                            <option value="OCTOBRE">OCTOBRE</option>
                            <option value="NOVEMBRE">NOVEMBRE</option>
                            <option value="DECEMBRE">DECEMBRE</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="DateCotis">Motif</label>
                            <select class="form-control"  name="Motif" id="Motif" value="<?= $produit['Motif']?>">
                                <option value="Inscription">Inscription</option>
                                <option value="Mensualite">Mensualite</option>
                            </select>
                    </div>

                    <div class="form-group">
                    <label for="Montant">Montant</label>
                        <input type="number" id="Montant" name="Montant" class="form-control" value="<?= $produit['Montant']?>">
                    </div>
                    <div class="form-group">
                        <label for="Matricule">Matricule</label>
                        <input type="text" id="Matricule" name="Matricule" class="form-control" value="<?= $produit['Matricule']?>">
                    </div>
                      <input type="hidden" value="<?= $produit['id']?>" name="id">
                    <button class="btn-lg btn-success" style="float:left;" name="">Envoyer</button>
                    <button class="btn btn-info " style="float:right;" name=""><a href="listeCotisation.php" class="text-white">Retour</a></button>
                   
                </form> 

            </section>
        </div>
    </main>
</body>
</html>