<?php

 class ControleurConnexion {  
     
     
     public function isConnected() {
               return (!empty($_SESSION['SaletrutBastien']) && $_SESSION['SaletrutBastien']=='OK');  
     }

    public function connexion() {
    
  	    // Le formulaire a été soumis
       if (isset($_POST['login'])) {
  		
  		  if (!isset($_POST['login']) OR !isset($_POST['motPasse']) OR ($_POST['login']) != "Achille" OR ($_POST['motPasse']) != "Talon") {
     
          $msg='Erreur d\'identification... Recommencez';
    			include('Vue/VueConnexion.php');
          exit();
  		  }
  		// Les identifiants sont remplis et corrects 
  		  else {
    			$_SESSION['SaletrutBastien']='OK';
    			// si l'utilisateur a cliqué sur la case à cocher "se souvenir de moi" alors on lui envoie un cookie 
    			// qui permettra de pré-remplir le login la prochaine fois
    			if (isset($_POST['cb_souvenirMoi'])) {
    				$valCookie='Achille';
    				// on met 600 sec de vie pour ce cookie afin de tester sa disparation
    				setcookie('CaletrutBastien', $valCookie, time()+600);
  			}
  			//eader('location: index.php');
  			//exit(0);
        //affichage norma
  		}
  	}
  	// le formulaire n'a pas été soumis
  	else {
  	    $msg='';
  			include('Vue/VueConnexion.php');
        exit();
  	}	
    
   }
	
	public function deconnexion() {
    	session_destroy();
    	header('location: index.php');
      exit();
      
    }	
  public function cookie() {  
    	$valCookie='Contenu d\'identification';
      setcookie('CaletrutBastien', $valCookie, time()-60);
      header('location: index.php');
      exit();
      
    }  
    
    
    
    
    
    
}