<?php
// On démarre une session
require_once('Bdd.php');
session_start();
$idm= isset($_GET['matricule']) ? $_GET['matricule'] : null;
 $requet= "SELECT * FROM membre WHERE matricule=$idm";
 $result= $db->query($requet);
 $membre=$result->fetch();


 $matricule=$membre['matricule'];
 $nom=$membre['nom'];
 $prenom=$membre['prenom'];
 $adresse=$membre['adresse'];
 $telephone=$membre['telephone'];
 

if($_POST){
    if(isset($_POST['DateCotis']) && !empty($_POST['DateCotis'])
    && isset($_POST['Mois']) && !empty($_POST['Mois'])
    && isset($_POST['Motif']) && !empty($_POST['Motif'])
    && isset($_POST['Montant']) && !empty($_POST['Montant'])
    && isset($_POST['Matricule']) && !empty($_POST['Matricule'])){
       
        // On inclut la connexion à la base
        require_once('Bdd.php');

        // On nettoie les données envoyées
        $DateCotis = strip_tags($_POST['DateCotis']);
        $Mois = strip_tags($_POST['Mois']);
        $Motif = strip_tags($_POST['Motif']);
        $Montant = strip_tags($_POST['Montant']);
        $Matricule = strip_tags($_POST['Matricule']);

        $sql = 'INSERT INTO `cotisation` (`DateCotis`, `Mois`, `Motif`,`Montant`,`Matricule`) VALUES (:DateCotis, :Mois, :Motif, :Montant, :Matricule);';

        $query = $db->prepare($sql);

          $query->bindValue(':DateCotis', $DateCotis, PDO::PARAM_STR);
          $query->bindValue(':Mois', $Mois, PDO::PARAM_STR);
          $query->bindValue(':Motif', $Motif, PDO::PARAM_STR);
          $query->bindValue(':Montant', $Montant, PDO::PARAM_STR);
          $query->bindValue(':Matricule', $Matricule, PDO::PARAM_STR);

        $query->execute();

         $_SESSION['message'] = "cotisation ajouté";
         require_once('closeBase.php');

         header('Location: listeCotisation.php');
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
                <h1 class="text-dark ml-5">Ajouter une cotisation</h1>
                <form method="post" class="mx-5 px-5 text-dark">
                    <div class="form-group">
                        <label for="Montant">  MATRICULE :</label>
                        <label for="Montant"><?= $matricule?></label>
                    </div>
                    <div class="form-group">
                        <label for="Montant">NOM :</label>
                        <label for="Montant"><?= $nom?></label>
                    </div>
                    <div class="form-group">
                        <label for="Montant">PRENOM :</label>
                        <label for="Montant"><?= $prenom?></label>
                    </div>
                    <div class="form-group">
                        <label for="Montant">ADRESSE :</label>
                        <label for="Montant"><?= $adresse?></label>
                    </div>
                    <div class="form-group">
                        <label for="Montant">TELEPHONE :</label>
                        <label for="Montant"><?= $telephone?></label>
                    </div>

                    <div class="form-group">
                        <label for="DateCotis">Date Cotisation</label>
                        <input type="date" id="DateCotis" name="DateCotis" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="Montant">Mois</label>
                        <select class="form-control" name="Mois" id="Mois">
                            <option selected>MOIS</option>
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
                    <label for="Montant">Motif</label>
                       <select class="form-control" name="Motif" id="Motif">
                        <option selected>Motif</option>
                           <option value="Inscription">Inscription</option>
                           <option value="Mensualite">Mensualite</option>
                       </select>
                    </div>
                    <div class="form-group">
                        <label for="Montant">Montant</label>
                        <input type="number" id="Montant" name="Montant" class="form-control">
                    </div>
                    
                    <div class="form-group">
                          <!-- <label for="Matricule">Matricule</label>  -->
                         <input type="hidden" id="Matricule" name="Matricule" value="<?= $matricule?>" class="form-control"> 
                        
                    </div>
                    
                    <button class="btn-lg btn-success" style="float:left;">Enregistrer</button>
                    <a href="listeMembre.php" style="float:right" class="btn btn-info">Retour</a>
                </form>
            </section>
        </div>
    </main>
</body>
</html>