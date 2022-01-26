<html>
<head>
	<meta charset="utf-8"/>
  <link rel="stylesheet" href="./Modele/include/bootstrap.min.css">
  <link rel="stylesheet" href="./Modele/include/styles.css">
  <title>Mon site PWS en PHP!</title>
  <script>
        function confirmSuppr(idCat) {
            if (confirm("Etes vous sur de vouloir supprimer cette categorie ?")) {
                document.location.href = "index.php?route=categorieDelete&id=" + idCat;
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
    <table border="2">
        <tbody>
          <tr><th>Id Categorie</th><th>Nom Categorie</th><th>Modifier</th><th>Supprimer</th></tr>
        </tbody>
        <?php
            foreach ($vListeCategories as $vCat) {               
                 echo '<tr><td><a href="index.php?route=categorieRead&id='.$vCat->idCategorie.'">'.$vCat->idCategorie.'</a></td>';
				         echo '<td>'.$vCat->nomCategorie.'</td>';
                 echo "<td><a href='index.php?route=categorieUpdate&id=".$vCat->idCategorie."'><img src='./Vue/images/modifier.jpg' height='60' alt='Modifier' /></a></td>";
                 echo "<td><a href='javascript:confirmSuppr($vCat->idCategorie)'><img src='./Vue/images/supprimer.jpg' height='60' alt='Supprimer' /></a></td></tr>";
            }
        ?>
        
    </table>
    </BR>
    <a href='index.php?route=categorieCreate'>
					 <img src='./Vue/images/ajouter.jpg' height='80' alt='Ajouter' />
				  </a>
    </div>
	</div>
	<?php include("./Modele/include/footer.php"); ?>
</body>
</html>

