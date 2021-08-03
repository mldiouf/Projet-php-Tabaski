<?php 

require('Bdd.php'); // on appelle la basse de données

 if(isset($_POST['Mois']) AND !empty($_POST['Mois'])){
     $Mois = htmlspecialchars($_POST['Mois']);
     $trouve = $db->query('SELECT * FROM cotisation WHERE Mois LIKE "%'.$Mois.'%" ORDER BY Mois ASC');

 }


?>
<!DOCTYPE html>
<html lang="en">
<?php    
         require_once('haut.php');
?>
<body class="bg-light">
<main class="container-dark bg-light text-center text-dark">
<!-- <?php include_once 'haut.php'; ?> -->

        <div class="row">
            <section class=" col-12">
         
                <form action="" method="POST" class="mt-5 text-dark  style=" font-size: 14px;"
                 
                    <div class="form-group mx-5" style=" font-size: 14px;">
                                <label > <h1>RECHERCHE COTISATION</h1></label>
                                <select class="form-control" name="Mois" >
                                    <option selected>Selectionnez le mois de la Cotisation</option>
                                   <option value="JANVIER">JANVIER</option>
                                   <option value="MARS">MARS</option>
                                   <option value="FEVRIER">FEVRIER</option>
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
                            <button class="btn btn-success">RECHERCHE</button>
                   

                </form><br><br>
            </section>
            <div class="section text-white">
               
                <table class="table text-dark" style=" font-size: 14px;">
                    <thead>
                        <th>NUMERO COTISATION</th>
                        <th>DATE COTISATION</th>
                        <th>MOIS</th>
                        <th>MOTIF</th>
                        <th>MONTANT</th>
                        <th>MATRICULE</th>
                    </thead>
                    <tbody>

                        <tr>
                        <?php 
                    if($trouve->rowCount()> 0){
                        while($produit = $trouve->fetch()){  
                    ?>  
                                <td><?= $produit['id'] ?></td>
                                <td><?= $produit['DateCotis'] ?></td>
                                <td><?= $produit['Mois'] ?></td>
                                <td><?= $produit['Motif'] ?></td>
                                <td><?= $produit['Montant'] ?></td>
                                <td><?= $produit['Matricule'] ?></td>
                            
                        </tr>
                    <?php
                    }
                    ?>

                    </tbody>
                </table>
                            <?php 
                        }
                    else{
                       
                        echo '<div class="alert alert-danger" role="alert">
                                      '.'AUCUN COTISATION TROUVE'.'
                              </div>';
                        ?>
                         <?php 
                    }
                ?>
            </div>
        </div>
        </main>

       
</body>
</html>