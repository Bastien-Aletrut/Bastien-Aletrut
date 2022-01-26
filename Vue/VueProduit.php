<html>
<head>
	<meta charset="utf-8"/>
  <meta name="Pragma" content="no-cache" />
  <link rel="stylesheet" href="./Modele/include/bootstrap.min.css">
  <link rel="stylesheet" href="./Modele/include/styles.css">
  <title>Mon site PWS en PHP!</title>
</head>
<body>  
	  <?php include("./Modele/include/header.php"); ?>
    <?php include("./Modele/include/menus.php"); ?>
        <div style="padding-top: 30px" id="main">
          <div style="text-align: center" class="col-md-12">
    <?php
        echo 'id Produit : ' . $vProd->idProduit. '<br>';
		echo 'id Categorie : ' . $vProd->idCategorie. '<br>';
		echo 'nom Produit : ' . $vProd->nomProduit. '<br>';
		echo 'Prix : ' . $vProd->prixProduit. '<br>';
   echo "<img src='./Vue/images/prod".$vProd->idProduit.".gif' height='60' alt='img' />";
   echo "<BR>";
   echo "<BR>";
    ?>
    <from>
    <input type="button" value="Retour" onclick="history.back()">
    </from>
    </div>
	</div>
	<?php include("./Modele/include/footer.php"); ?>
</body>
</html>