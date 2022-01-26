<?php
// ModeleCategorie.php
include_once("Categorie.php"); 
include_once("connect.inc.php");

class ModeleCategorie {
	// methode qui renvoie un tableau d'objets Categories
	// ce tableau est construit à partir d'une requête SQL sur la table Categories de la BD
    
	public function getListeCategories() {
		global $conn;
		$res = $conn->prepare("Select * from Categories");
		$res->execute();			
		foreach($res as $cat) {
		    $ListeCat[] = new Categorie($cat["idCategorie"], $cat["nomCategorie"]);
 		}
		return $ListeCat; 
    }
    
	public function addCategorie($idCat,$nomCat) {
		global $conn;
		 $req = $conn->prepare("INSERT INTO Categories values(:P_idCat,:P_nomCat)");
     $req->execute(array('P_idCat'=>$idCat,'P_nomCat'=>$nomCat));   
  }
  
  public function modCategorie($idCat,$nomCat) {
		global $conn;
		 $req = $conn->prepare("UPDATE Categories SET nomCategorie = :P_nomCat WHERE idCategorie = :P_idCat");
     $req->execute(array('P_idCat'=>$idCat,'P_nomCat'=>$nomCat));
  }
  
  public function delCategorie($idCat) {
		global $conn;
     $req = $conn->prepare("Delete FROM Produits WHERE idCategorie = :P_idCat");
     $req->execute(array('P_idCat'=>$idCat));
		 $req = $conn->prepare("Delete FROM Categories WHERE idCategorie = :P_idCat");
     $req->execute(array('P_idCat'=>$idCat));
  }

}

?>
