<?php
try{
    $conn = new PDO('mysql:host=localhost;dbname=myPws2053','myPws2053','cmjQ3mMF7OeJG7jS',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}  catch(PDOEXCEPTION $e){
    echo "Erreur : ".$e -> getMessage()."<br>";
    die();
}
?>
   