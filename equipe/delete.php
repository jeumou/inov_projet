<?php
include("../inc/connexion.php");
$id_equipe = $_GET["id"];
try{
$sql="DELETE FROM equipe WHERE id_equipe='$id_equipe'";
$stmt=$db->prepare($sql);
$stmt->execute();
header('location: index.php');
}catch(PDOException $e){
    echo" suppression echouee: ".$e->getMessage();
exit;
}

?>

