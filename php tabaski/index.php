
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Feuille de style -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
    ></script>
    
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
    rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <title>ListeMembre</title>
</head>
<body class="bg-light">
  <div class="container bg-light">
    <div class="row" style="height: 330px">
         <div class="col-6  bg-light">
            <button class="btn btn-dark pt-5 bg-success"  style="margin-left:35%; margin-top:15%"><a href="listeMembre.php" class="text-white text-center pt-5" style="text-decoration:none; " ><h2 >Liste Membres</h2></a></button><br>
        </div>
        <div class="col-6  bg-light">
            <button class="btn  btn-lg pt-5 bg-dark" style="margin-left:35%; margin-top:15%"><a href="listeCotisation.php" class="text-white" style="text-decoration:none; " ><h2>Liste Cotisation</h2></a></button><br>
        </div>  
    </div>

    <div class="row" style="height: 330px">
         <div class="col-6 bg-lights">
            <button class="btn  btn-lg pt-5 bg-dark" style="margin-left:25%; margin-top:15%"><a href="saisieMembre.php" class="text-white text-center" style="text-decoration:none; " ><h2>Ajouter des Membres</h2></a></button><br>
        </div>
        <div class="col-6 bg-light">
        <button class="btn  btn-lg pt-5 bg-success" style="margin-left:25%; margin-top:15%"><a href="listeCotisationMois.php" class="text-white text-center" style="text-decoration:none; " ><h2>Recherche COTISATION</h2></a></button><br>
 
        </div>  
    </div>
    <?php    
         require_once('bas.php');
?>
</body>
</html>