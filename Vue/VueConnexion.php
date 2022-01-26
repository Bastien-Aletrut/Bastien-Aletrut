<!DOCTYPE html>
<html>
    <head>
	    <meta charset="utf-8"/>
      <link rel="stylesheet" href="./Modele/include/bootstrap.min.css">
      <link rel="stylesheet" href="./Modele/include/styles.css">
	    <title>Mon site PWS en PHP!</title>
    </head>
    <body>
    <div style="padding-top: 30px" id="main">
        <div style="text-align: center" class="col-md-12">
	<?php include("./Modele/include/header.php"); ?>
  <?php
    
			echo "<h2>".$msg."</h2><BR/>";

		echo "Veuillez entrer les identifiants :<BR/>";
		echo "<form method='post'>";
		echo "<p>";
		// si un cookie est existant on préremplit le champs login avec sa valeur
		if(isset($_COOKIE['CaletrutBastien'])) {
			echo "Login : <input type='text' name='login' value='".$_COOKIE['CaletrutBastien']."' /> <BR/><BR/>";
		}
		else {
			echo "Login : <input type='text'  name='login' /> <BR/><BR/>";
		}
		echo "Mot de passe : <input type='password' name='motPasse' /><BR/><BR/>";
		echo "Se souvenir de moi : <input type='checkbox' name='cb_souvenirMoi' /><BR/><BR/>";
		echo "<input type='submit' name='Envoyer' value='Valider' />";
		echo "</p>";
		echo "</form>";
	?>
 <?php include("./Modele/include/footer.php"); ?>
 </div>
	</div>
</body>
</html>