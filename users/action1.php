<?php
include('../inc/connexion.php');
// insertion de taches

if (isset($_POST['login'])) {
    $ID_STAGIAIRE = $_POST['ID_STAGIAIRE'];
    $SUJET = $_POST['SUJET'];
    $DATE_REMISE = $_POST['DATE_REMISE'];
    $DATE_DEBUT = date('y-m-d');
    $STATUT = $_POST['STATUT'];
    $id=$_GET["id"];

//inserer nos donnees dans notre bd
//gestion de taches insertion d'une nouvelle tache
//try{
 $sql= "SELECT * FROM membres,profil WHERE profil.ID_STAGIAIRE=membres.id AND membres.id='$id'";
 $sql2= "SELECT * FROM membres,themes WHERE themes.id_stagiaire=membres.id AND membres.id='$id'";
$stmt=$db->prepare($sql);
$stmt->bindParam(':ID_STAGIAIRE', $ID_STAGIAIRE);
$stmt->bindParam(':SUJET', $SUJET);
$stmt->bindParam(':DATE_REMISE', $DATE_REMISE);
$stmt->bindParam(':DATE_DEBUT', $DATE_DEBUT);
$stmt->bindParam(':STATUT', $STATUT);
$stmt->execute();
//echo "insertion reussie";
header('location: ../taches/index.php');

//}catch(PDOException $e){
    //echo" insertion echouee: ".$e->getMessage();
exit;
}


  
?>

