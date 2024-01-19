<?php
include('../inc/connexion.php');
// insertion de taches

if (isset($_POST['login'])) {
    $ID_STAGIAIRE = $_POST['ID_STAGIAIRE'];
    $SUJET = $_POST['SUJET'];
    $DATE_REMISE = $_POST['DATE_REMISE'];
    $DATE_DEBUT = date('y-m-d');
    $STATUT = $_POST['STATUT'];

//inserer nos donnees dans notre bd
//gestion de taches insertion d'une nouvelle tache

$sql="INSERT INTO taches (ID_STAGIAIRE, SUJET, DATE_REMISE, DATE_DEBUT, STATUT) VALUES(:ID_STAGIAIRE, :SUJET, :DATE_REMISE, :DATE_DEBUT, :STATUT)";
$stmt=$db->prepare($sql);
$stmt->bindParam(':ID_STAGIAIRE', $ID_STAGIAIRE);
$stmt->bindParam(':SUJET', $SUJET);
$stmt->bindParam(':DATE_REMISE', $DATE_REMISE);
$stmt->bindParam(':DATE_DEBUT', $DATE_DEBUT);
$stmt->bindParam(':STATUT', $STATUT);
$stmt->execute();

    header('location: ../taches/index.php');

exit;
}

?>

