<?php
include("../inc/connexion.php");
    $ID_PROJET = $_GET['id'];
try{
$sql= "DELETE FROM projet WHERE ID_PROJET = '$ID_PROJET'"; 
$stmt=$db->prepare($sql);
$stmt->execute();
    header('location: index.php');
}catch(PDOException $e){
    echo" suppression echouee: ".$e->getMessage();
exit;
}

?>