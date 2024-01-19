<?php
include("../inc/connexion.php");
    $ID_PRESENCE = $_GET['id'];
try{
$sql= "DELETE FROM membres WHERE id = '$ID_STAGIAIRE'"; 
$stmt=$db->prepare($sql);
$stmt->execute();
    header('location: index.php');
}catch(PDOException $e){
    echo" une erreur est survenue lors de la suppression de la presence: ".$e->getMessage();
exit;
}

?>