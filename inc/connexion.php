<?php
$host="localhost";
$dbname="membres";
$username="root";
//connexion a la bd
try{
    $db=new
    PDO("mysql:host=$host;dbname=$dbname",$username);
    //echo "connexion valide";
}catch(PDOException $e){
    die("Erreur:" .$e->getMessage());
}
?>