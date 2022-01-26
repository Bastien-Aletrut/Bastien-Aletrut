<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
    <link rel="stylesheet" href="./Modele/include/bootstrap.min.css">
    <link rel="stylesheet" href="./Modele/include/styles.css">
	<title>Mon site PWS en PHP!</title>
</head>
<body>
    <?php include("./Modele/include/header.php"); ?>
    <?php include("./Modele/include/menus.php"); ?>
    <div style="padding-top: 30px" id="main">
        <div style="text-align: center" class="col-md-12">
        
        <h1>Ajouter un produit</h1><br><br>
        
        <?php
         if($err != ''){
         echo $err;
         }
        ?>
        
        <form method='POST' enctype="multipart/form-data">
        Id produit : <input type='text' name='idProd' placeholder='---'/><br><br>
        Id categorie : <input type='text' name='idCat' placeholder='---'/><br><br>
        Nom produit : <input type='text' name='nomProd' placeholder='---'/><br><br>
        Prix : <input type='number' name='prix' placeholder='---'/><br><br>
        <label for="fileUpload">Fichier:</label>
        <input type="file" name="photo" id="fileUpload" accept='image/gif'>
        <p><strong>Note:</strong> Seuls le format .gif est autorisé.</p>
        <input type="submit" name="confirmer" value="Confirmer">
        </form>
        
        </div>
	</div>
	<?php include("./Modele/include/footer.php"); ?>
</body>
</html>