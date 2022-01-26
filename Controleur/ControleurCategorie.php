<?php
// ControleurCategorie.php
include_once("Modele/ModeleCategorie.php");
include_once("Modele/ModeleProduit.php");

class ControleurCategorie {  
	private $modeleCat;
	private $modeleProd;
    
	public function __construct() {
        $this->modeleCat = new ModeleCategorie();
		$this->modeleProd = new ModeleProduit();  
    }
	
	public function getlisteCategories() {
        $vListeCategories = $this->modeleCat->getListeCategories();
        include 'Vue/VueListeCategories.php';
    }
	
	public function getListeProduitsByCategorie($idCat) {
		$vListeProduits = $this->modeleProd->getListeProduitsByCategorie($idCat);
        $id=1;
        include 'Vue/VueListeProduits.php';
    }
  
	public function addCategories() {
       if(!isset($_POST['confirmer'])){
         $err = '';
         include 'Vue/VueAddC.php';
       }
       else{
                    $motifIdCat='#^[1-9]0{2}$#';
                    $motifNomCat='#^[a-z\s]{3,25}$#i';
                if(isset($_POST['confirmer'])&&isset($_POST['idCat'])&&isset($_POST['nomCat'])){
                    $err = '';
                    if(!preg_match($motifIdCat,$_POST['idCat'])){
                       $err .= " Id pas bon "; 
                    }
                    $vListeCategories = $this->modeleCat->getListeCategories();
                    foreach ($vListeCategories as $vCat) {               
                         if($vCat->idCategorie==$_POST['idCat']){
                           $err .= " Id deja utilisé ";
                         }   
                    } 
                    /*if(!preg_match($motifNomCat,$_POST['nomCat'])){
                        $err .= " Categorie pas bon "; 
                    }*/
                    
                    if($err != ''){
                        include 'Vue/VueAddC.php';
                        exit();
                    }
                    $this->modeleCat->addCategorie($_POST['idCat'],$_POST['nomCat']);
                    header('location: index.php?route=categorieRead');
                    
                }

          }    
    }
    	public function UpdateCategories($idCat) {
     
       if(!isset($_POST['confirmerMC'])){
         $err = '';
         $nameC='';
         $vListeCategories = $this->modeleCat->getListeCategories();
         foreach ($vListeCategories as $vCat) {               
              if($vCat->idCategorie==$idCat){
                   $nameC=$vCat->nomCategorie;
              }   
         }
         include 'Vue/VueModC.php';
       }
       else{
                    $motifNomCat='#^[a-z\s]{3,25}$#i';
                if(isset($_POST['confirmerMC'])&&isset($_POST['nomCat'])){
                    $err = ''; 
                    /*if(!preg_match($motifNomCat,$_POST['nomCat'])){
                        $err .= " Categorie pas bon "; 
                    }*/
                    if($err != ''){
                        $nameC=$_POST['nomCat'];
                        include 'Vue/VueModC.php';
                        exit();
                    }
                    $this->modeleCat->modCategorie($idCat,$_POST['nomCat']);
                    header('location: index.php?route=categorieRead');
                    
                }

          }    
    }
    public function DeleteCategories($idCat) {
                    
                    $vListeProduits = $this->modeleProd->getListeProduitsByCategorie($idCat);
                    if($vListeProduits!=null){
                      //echo '<script>alert("Suppression impossible, il y a des produits liés à ce type !");return false;</script>';
                      echo '<script>
                alert("Suppression impossible, il y a des produits liés à cette categorie !");
                document.location.href = "index.php?route=categorieRead";
            </script>';
                    }else{
                    
                    foreach ($vListeProduits as $vProd) {
                       $this->modeleProd->delProduit($vProd->idProduit);
                    }  
                    $this->modeleCat->delCategorie($idCat);
                    header('location: index.php?route=categorieRead');
                    }
    }
}
?>
