<?php
include("../inc/connexion.php");
    $ID_THEME = $_GET['id'];
try{
$sql= "DELETE FROM themes WHERE ID_THEME = '$ID_THEME'"; 
$stmt=$db->prepare($sql);
$stmt->execute();
    header('location: index.php');
}catch(PDOException $e){
    echo" suppression echouee: ".$e->getMessage();
exit;
}

?>