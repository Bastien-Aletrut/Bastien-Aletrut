<?php
include_once("Produit.php");
include_once("connect.inc.php");

class ModeleProduit {
	// methode qui renvoie un tableau d'objets Produits
	// ce tableau est construit à partir d'une requête SQL sur la table Produits de la BD
    public function getListeProduits() {
		// cette instruction permet d'utiliser dans cette fonction la variable $conn 
		// qui a été initialisée dans le script connect.inc.php
		global $conn;
		$res = $conn->prepare("Select * from Produits");
		$res->execute();			
		foreach($res as $prod) {
		    $ListeProd[] = new Produit($prod["idProduit"], $prod["idCategorie"], $prod["nomProduit"], $prod["prixProduit"]);
 		}
		return $ListeProd; 
    }
	
    public function getProduit($idProduit) {
		global $conn;
		$res = $conn->prepare("Select * from Produits where idProduit = :pIdProduit");
		$res->execute(array('pIdProduit' => $idProduit));
		$prod = $res->fetch();
		$unProduit = new Produit($prod["idProduit"], $prod["idCategorie"], $prod["nomProduit"],$prod["prixProduit"]);
        return $unProduit;
    }	
	
	public function getListeProduitsByCategorie($idCategorie) {
		global $conn;
		$res = $conn->prepare("Select * from Produits where idCategorie = :pIdCategorie");
		$res->execute( array ('pIdCategorie' => $idCategorie) );	
		$ListeProdCat = NULL;
		foreach($res as $prod) {
		    $ListeProdCat[] = new Produit($prod["idProduit"], $prod["idCategorie"], $prod["nomProduit"], $prod["prixProduit"]);
 		}
		return $ListeProdCat; 
    }	
    
  public function addProduit($idProd,$idCat,$nomProd,$prix,$img) {
		global $conn;
		 $req = $conn->prepare("INSERT INTO Produits values(:P_idProd,:P_idCat,:P_nomProd,:P_prix)");
     $req->execute(array('P_idProd'=>$idProd,'P_idCat'=>$idCat,'P_nomProd'=>$nomProd,'P_prix'=>$prix)); 
     
     $dossierDestination = './Vue/images/'; // Dossier de destination
     $nomFichier = "prod" . $idProd . ".gif"; // Nom du fichier
     move_uploaded_file($img['tmp_name'], $dossierDestination . $nomFichier);  
  }
  public function addProduit2($idProd,$idCat,$nomProd,$prix) {
		global $conn;
		 $req = $conn->prepare("INSERT INTO Produits values(:P_idProd,:P_idCat,:P_nomProd,:P_prix)");
     $req->execute(array('P_idProd'=>$idProd,'P_idCat'=>$idCat,'P_nomProd'=>$nomProd,'P_prix'=>$prix)); 
      
  }

  public function modProduit($idProd,$idCat,$nomProd,$prix,$img) {
		global $conn;
		 $req = $conn->prepare("UPDATE Produits SET idCategorie = :P_idCat, nomProduit = :P_nomProd, prixProduit = :P_prix WHERE idProduit = :P_idProd");
     $req->execute(array('P_idCat'=>$idCat,'P_nomProd'=>$nomProd,'P_prix'=>$prix,'P_idProd'=>$idProd));
     $imgAsupprimer = "./Vue/images/prod" . $idProd . ".gif"; // Chemin de l'image à supprimer
     unlink($imgAsupprimer); //supprime l'image
     $dossierDestination = './Vue/images/'; // Dossier de destination
     $nomFichier = "prod" . $idProd . ".gif"; // Nom du fichier
     move_uploaded_file($img['tmp_name'], $dossierDestination . $nomFichier);  
  }
  public function modProduit2($idProd,$idCat,$nomProd,$prix) {
		global $conn;
		 $req = $conn->prepare("UPDATE Produits SET idCategorie = :P_idCat, nomProduit = :P_nomProd, prixProduit = :P_prix WHERE idProduit = :P_idProd");
     $req->execute(array('P_idCat'=>$idCat,'P_nomProd'=>$nomProd,'P_prix'=>$prix,'P_idProd'=>$idProd));
  }
  
  public function delProduit($idProd) {
		global $conn;
     $req = $conn->prepare("Delete FROM Produits WHERE idProduit = :P_idProd");
     $req->execute(array('P_idProd'=>$idProd));
     $imgAsupprimer = "./Vue/images/prod" . $idProd . ".gif"; // Chemin de l'image à supprimer
     unlink($imgAsupprimer); //supprime l'image
  }  	
}
?>
