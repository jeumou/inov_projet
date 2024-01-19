<?php
include('../inc/connexion.php');
// Vérification des informations de connexion

if (isset($_POST['login'])) {
    $description= $_POST['description'];
    $nom_equipe = $_POST['nom_equipe'];
   
    
//inserer nos donnees dans notre bd
//gestion de personnels*/


$stmt=$db->prepare("INSERT INTO equipe(description, nom_equipe) VALUES( :description, :nom_equipe)");
$stmt->bindParam(':description', $description);
$stmt->bindParam(':nom_equipe', $nom_equipe);
$stmt->execute();
header('location: index.php');
echo("votre nom est: " .$nom);
exit;
}
?>