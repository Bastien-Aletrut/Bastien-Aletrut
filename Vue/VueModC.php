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
        
        <h1>Modifier une catégorie</h1><br><br>
        
        <?php
         if($err != ''){
         echo $err;
         }
        
        echo "<form method='post'>";
    		echo "<p>";
    		echo "Id categorie : <input disabled='text' name='idCat' value='".$idCat."'/><br><br>";
    		echo "Nom categorie : <input type='text' name='nomCat' value='".$nameC."'/><br><br>";
    		echo "<input type='submit' name='confirmerMC' value='Confirmer'>";
    		echo "</p>";
    		echo "</form>";
        ?>
        
        </div>
	</div>
	<?php include("./Modele/include/footer.php"); ?>
</body>
</html>