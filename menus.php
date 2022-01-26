<div id="sidebar" class="sidebar-offcanvas">
    <div style="padding-top: 30px;" class="col-md-12">
        <ul class="nav nav-pills flex-column">
            
			<?php
				// on récupère le nom du script executé sans son chemin
				$page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_BASENAME);
				// echo $page;
				echo '<li class="nav-item">';
				if ($page == ' ') {
					echo '<a class="nav-link active" href=" ">Accueil</a>';
				}
				else {
					echo '<a class="nav-link" href="index.php">Accueil</a>';
				}
				echo '</li>';
				
				
				echo '<li class="nav-item">';
				if ($page == 'ConsultPrix.php') {
					echo '<a class="nav-link active" href="index.php?route=produitRead">Consulter les produits</a>';
				}
				else {
					echo '<a class="nav-link" href="index.php?route=produitRead">Consulter les produits</a>';
				}
				echo '</li>';
				
				echo '<li class="nav-item">';
				if ($page == 'ConsultCat.php') {
					echo '<a class="nav-link active" href="index.php?route=categorieRead">Consulter les catégorie</a>';
				}
				else {
					echo '<a class="nav-link" href="index.php?route=categorieRead">Consulter les catégories</a>';
				}
				echo '</li>';
				
				echo '<li class="nav-item">';
				if ($page == 'deconnexion.php') {
					echo '<a class="nav-link active" href="index.php?route=deconnexion">Se déconnecter</a>';
				}
				else {
					echo '<a class="nav-link" href="index.php?route=deconnexion">Se déconnecter</a>';
				}
				echo '</li>';
				
				if (isset($_COOKIE['CaletrutBastien'])) {
					echo '<li class="nav-item">';
					if ($page == 'detruireCookie.php') {
						echo '<a class="nav-link active" href="index.php?route=killcookie">Détruire le cookie</a>';
					}
					else {
						echo '<a class="nav-link" href="index.php?route=killcookie">Détruire le cookie</a>';
					}
					echo '</li>';
				}
				

			?>
        </ul>
    </div>
</div>