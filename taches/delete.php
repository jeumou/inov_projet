<?php
include("../inc/connexion.php");
    $ID_TACHE = $_GET['id'];
try{
$sql= "DELETE FROM taches WHERE ID_TACHE = '$ID_TACHE'"; 
$stmt=$db->prepare($sql);
$stmt->execute();
    header('location: index.php');
}catch(PDOException $e){
    echo" suppression echouee: ".$e->getMessage();
exit;
}

?>