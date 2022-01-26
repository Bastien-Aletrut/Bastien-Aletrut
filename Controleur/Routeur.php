<?php
require_once 'Controleur/ControleurCategorie.php';
require_once 'Controleur/ControleurProduit.php';
require_once 'Controleur/ControleurConnexion.php';
require_once 'Controleur/ControleurAcc.php';
session_start();


class Routeur {
    public function routerRequete() {
        
        $ctrlCon = new ControleurConnexion();
        if (!$ctrlCon->isConnected()){
          $ctrlCon->connexion();
        }
		    if (!empty($_GET['route'])) {
				switch($_GET['route']) {
				case 'produitCreate' : 
										  $ctrlProd = new ControleurProduit();
											$ctrlProd->addProduit();
                      break;
										  
				case 'produitRead' :     if (!empty($_GET['id'])) {
											$ctrlProd = new ControleurProduit();
											$ctrlProd->getProduit($_GET['id']);
										  }
										  else { 
											$ctrlProd = new ControleurProduit();
											$ctrlProd->getListeProduits();
										  }
									      break;
										  
				case 'produitUpdate' :   
									      if (!empty($_GET['idP'])) {
                											$ctrlProd = new ControleurProduit();
                											$ctrlProd->UpdateProduit($_GET['idP']);
                										  }  
									      break;
											
				case 'produitDelete' :  
									      if (!empty($_GET['idP'])) {
                											$ctrlProd = new ControleurProduit();
                											$ctrlProd->DeleteProduit($_GET['idP']);
                										  }  
									      break;
		
				case 'categorieCreate' :  
		                  $ctrlGrp = new Controleurcategorie();
											$ctrlGrp->addCategories();
                        break;
				
				case 'categorieRead' : 	  if (!empty($_GET['id'])) {
											$ctrlGrp = new Controleurcategorie();
											$ctrlGrp->getListeProduitsBycategorie($_GET['id']);
										  }
										  else { 
											$ctrlGrp = new Controleurcategorie();
											$ctrlGrp->getListeCategories();
										  }
										  break;

				case 'categorieUpdate' : 
                        if (!empty($_GET['id'])) {
                											$ctrlGrp = new Controleurcategorie();
                											$ctrlGrp->UpdateCategories($_GET['id']);
                										  }  
									      break;
										  
				case 'categorieDelete' :
                        if (!empty($_GET['id'])) {
                											$ctrlGrp = new Controleurcategorie();
                											$ctrlGrp->DeleteCategories($_GET['id']);
                										  }  
									      break;
        case 'deconnexion' :
                      $ctrlCon->deconnexion();  	
									      break;
        case 'killcookie' :
                      $ctrlCon->cookie();  	
									      break; 
                                                                                               
										  
				default: 	              
										  $ctrlGrp = new ControleurCategorie();
									      $ctrlGrp->getListeCategories();
									      break;			
			}
      }
      else{
      $ctrlAcc = new ControleurAcc();
			$ctrlAcc->getAcc();
    }
    
  }
}
