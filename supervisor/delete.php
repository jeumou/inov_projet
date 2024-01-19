<?php
include("../inc/connexion.php");
$id= $_GET["id"];
$sql="DELETE FROM supervisor WHERE id='$id'";

$result=$db->query($sql);


?>