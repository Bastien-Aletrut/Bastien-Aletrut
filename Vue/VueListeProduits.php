<html>
<head>
	<meta charset="utf-8"/>
  <meta name="Pragma" content="no-cache" />
  <link rel="stylesheet" href="./Modele/include/bootstrap.min.css">
  <link rel="stylesheet" href="./Modele/include/styles.css">
  <title>Mon site PWS en PHP!</title>
  <script>
        function confirmSuppr(idProd) {
            if (confirm("Etes vous sur de vouloir supprimer ce produit ?")) {
                document.location.href = "index.php?route=produitDelete&idP=" + idProd;
            } else {
                alert("Suppression annulée");
                return false;
            }
        }
    </script>
</head>
<body>  
	  <?php include("./Modele/include/header.php"); ?>
    <?php include("./Modele/include/menus.php"); ?>
        <div style="padding-top: 30px" id="main">
          <div style="text-align: center" class="col-md-12">
    <?php
    
			// s'il y a des étudiants à afficher
            if ($vListeProduits != NULL) {	
				echo ' <table border="2">';
				echo '<tbody>';
				echo '<tr><th>id Produit</th><th>id Categorie</th><th>nom Produit</th><th>Prix</th><th>Image</th><th>Modifier</th><th>Supprimer</th></tr>';
				echo '</tbody>';
				foreach ($vListeProduits as $vProd) { 
					// on génère une URL dynamique afin de pouvoir visualiser le  
					//  détail d'un étudiant
					 echo '<tr><td><a href="index.php?route=produitRead&id='.$vProd->idProduit.'">'.$vProd->idProduit.'</a></td>';
					 echo '<td>'.$vProd->idCategorie.'</td><td>'.$vProd->nomProduit.'</td><td>'.$vProd->prixProduit.'</td>';
           echo "<td><a href='index.php?route=produitRead&id=".$vProd->idProduit."'><img src='./Vue/images/prod".$vProd->idProduit.".gif' height='60' alt='img' /></a></td>";
           echo "<td><a href='index.php?route=produitUpdate&idP=".$vProd->idProduit."'><img src='./Vue/images/modifier.jpg' height='60' alt='Modifier' /></a></td>";
           echo "<td><a href='javascript:confirmSuppr($vProd->idProduit)'><img src='./Vue/images/supprimer.jpg' height='60' alt='Supprimer' /></a></td></tr>";                                                                                                             
        }
				echo "</table>";
			}
			else {
				echo "Pas de produits...<BR>";
			}
      
         echo "<BR>";
         echo "<a href='index.php?route=produitCreate'><img src='./Vue/images/ajouter.jpg' height='80' alt='Ajouter' /></a>";
        
        
        ?>
    
    
    
    </div>
	</div>
	<?php include("./Modele/include/footer.php"); ?>
</body>
</html>