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
        
        <h1>Modifier un Produit</h1><br><br>
        
        <?php
         if($err != ''){
         echo $err;
         }
        
        echo "<form method='post' enctype='multipart/form-data'>";
    		echo "<p>";
    		echo "Id produit : <input disabled='text' name='idProd' value='".$idProd."'/><br><br>";
    		echo "Id categorie : <input type='text' name='idCat' value='".$idCat."'/><br><br>";
        echo "Nom categorie : <input type='text' name='nomProd' value='".$nameP."'/><br><br>";
        echo "Prix : <input type='number' name='prix' value='".$prix."'/><br><br><label for='fileUpload'>Fichier:</label>
        <input type='file' name='photo' id='fileUpload' accept='image/gif'>
        <p><img src='./Vue/images/prod".$idProd.".gif' height='60' alt='img' /><strong>   Note:</strong> Seuls le format .gif est autorisé.</p>";
    		echo "<input type='submit' name='confirmerMP' value='Confirmer'>";
    		echo "</p>";
    		echo "</form>";
        ?>
        
        </div>
	</div>
	<?php include("./Modele/include/footer.php"); ?>
</body>
</html>