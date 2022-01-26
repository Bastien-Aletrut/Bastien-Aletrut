<?php
include_once("Modele/ModeleProduit.php");
class ControleurProduit {
	
    	private $modeleCat;
	    private $modeleProd;
    public function __construct() {
          $this->modeleCat = new ModeleCategorie();
		      $this->modeleProd = new ModeleProduit();  
    }
	
	public function getListeProduits() {
        $vListeProduits = $this->modeleProd->getListeProduits();
        $id=0;
        include 'Vue/VueListeProduits.php';
	} 
	
    public function getProduit($idProd) {
		$vProd = $this->modeleProd->getProduit($idProd);
        include 'Vue/VueProduit.php';
    }
	
  public function addProduit() {
        
        
       if(!isset($_POST['confirmer'])){
         $err = '';
         include 'Vue/VueAddP.php';
       }
       else{
                    
                    
                    $motifNomCat='#^[a-z\s]{3,25}$#i';
                if(isset($_POST['confirmer'])&&isset($_POST['idProd'])&&isset($_POST['idCat'])&&isset($_POST['nomProd'])&&isset($_POST['prix'])){
                    $err = '';
                    $motifIdCat="#^[1-9]0{2}$#";
                    
                    $motifNomProd='#^[a-z||0-9]{3,25}$#';
                    if(!preg_match($motifIdCat,$_POST['idCat'])){
                       $err .= " Id Cat pas bon "; 
                    }
                    $vListeCategories = $this->modeleCat->getListeCategories();
                    $n=0;
                    foreach ($vListeCategories as $vCat) {               
                         if($vCat->idCategorie==$_POST['idCat']){
                           $n=1;
                         }   
                    }
                    if($n==0){
                          $err .= " Id Cat inexistant ";
                         } 
                    
                    if($err == ''){
                    
                        
                        $nb=$_POST['idCat']/100;
                        $motifIdProd="#^[0-9][0-9][1-9]$#";
                        if(!preg_match($motifIdProd,$_POST['idProd'])){
                           $err .= " Id Prod pas bon "; 
                        }
                        
                        $vListeProduits = $this->modeleProd->getListeProduits();
                        foreach ($vListeProduits as $vProd) { 
                                           
                             if($vProd->idProduit==$_POST['idProd']){
                               $err .= " Id deja utilisé ";
                             }
                               
                        } 
                        /*if(!preg_match($motifNomProd,$_POST['nomProd'])){
                            $err .= " Nom produit pas bon "; 
                        }*/
                        
                        
                        if($_FILES['photo']['size']>0){
                        
                          if ($_FILES['photo']['type'] != 'image/gif') { // Si le type de l'image est bon
                           $err .= " Le fichier doit être une image en .gif "; // On affiche un message d'erreur
                                  }
                        
                        if($err != ''){
                            include 'Vue/VueAddP.php';
                            exit();
                        }
                         
                         $this->modeleProd->addProduit($_POST['idProd'],$_POST['idCat'],$_POST['nomProd'],$_POST['prix'],$_FILES['photo']);
                        header('location: index.php?route=produitRead');
                        }else{
                        if($err != ''){
                            include 'Vue/VueAddP.php';
                            exit();
                        }
                         
                         $this->modeleProd->addProduit2($_POST['idProd'],$_POST['idCat'],$_POST['nomProd'],$_POST['prix']);
                        header('location: index.php?route=produitRead');
                        
                        }
                    }else{
                        include 'Vue/VueAddP.php';
                        exit();
                    }
                }

          }
    }
    
    public function UpdateProduit($idProd) {
     
       if(!isset($_POST['confirmerMP'])){
         $err = '';
         $nameP='';
         $vProduits = $this->modeleProd->getProduit($idProd);
         $nameP=$vProduits->nomProduit;
         $idCat=$vProduits->idCategorie;
         $prix=$vProduits->prixProduit;
         include 'Vue/VueModP.php';
       }
       else{
                     $nameP='';
                     $vProduits = $this->modeleProd->getProduit($idProd);
                     $nameP=$vProduits->nomProduit;
                     $idCat=$vProduits->idCategorie;
                     $prix=$vProduits->prixProduit;
                    $motifNomCat='#^[a-z\s]{3,25}$#i';
                if(isset($_POST['confirmerMP'])&&isset($_POST['idCat'])&&isset($_POST['nomProd'])&&isset($_POST['prix'])){
                    $err = '';
                    $motifIdCat="#^[1-9]0{2}$#";
                    
                    $motifNomProd='#^[a-z||0-9]{3,25}$#';
                    if(!preg_match($motifIdCat,$_POST['idCat'])){
                       $err .= " Id Cat pas bon "; 
                    }
                    $vListeCategories = $this->modeleCat->getListeCategories();
                    $n=0;
                    foreach ($vListeCategories as $vCat) {               
                         if($vCat->idCategorie==$_POST['idCat']){
                           $n=1;
                         }   
                    }
                    if($n==0){
                          $err .= " Id Cat inexistant ";
                         } 
                    
                    if($err == ''){
                    
                        /*
                        if(!preg_match($motifNomProd,$_POST['nomProd'])){
                            $err .= " Nom produit pas bon "; 
                        }*/
                        
                        
                        if($_FILES['photo']['size']>0){
                        
                          if ($_FILES['photo']['type'] != 'image/gif') { // Si le type de l'image est bon
                           $err .= " Le fichier doit être une image en .gif "; // On affiche un message d'erreur
                                  }
                        
                        if($err != ''){
                            include 'Vue/VueModP.php';
                            exit();
                        }
                         
                         $this->modeleProd->modProduit($idProd,$_POST['idCat'],$_POST['nomProd'],$_POST['prix'],$_FILES['photo']);
                        header('location: index.php?route=produitRead');
                        }else{
                        if($err != ''){
                            include 'Vue/VueModP.php';
                            exit();
                        }
                         
                         $this->modeleProd->modProduit2($idProd,$_POST['idCat'],$_POST['nomProd'],$_POST['prix']);
                        header('location: index.php?route=produitRead');
                        
                        }
                        
                        
                        
                    }else{
                        include 'Vue/VueModP.php';
                        exit();
                    }
                    
                }

          }    
    }
    
    public function DeleteProduit($idProd) {
                    $this->modeleProd->delProduit($idProd);
                    header('location: index.php?route=produitRead');
    }
         
	   
}
?>
