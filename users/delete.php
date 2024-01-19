<?php
include("../inc/connexion.php");
$id=$_GET["id"];
try {
    $sql="DELETE FROM membres WHERE id='$id'";
    $stmt=$db->prepare($sql);
    $stmt->execute();
        header('location: index.php');

    
}catch(PDOException $e){
    echo" suppression echouee: ".$e->getMessage();
    exit;
}
?>


