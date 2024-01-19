<?php
include('../inc/connexion.php');
// Vérification des informations de connexion

if (isset($_POST['valider'])) {
    $id_stagiaire=$_POST['ID_STAGIAIRE'];
    $statut=$_POST['statut'];
    $date= date('Y-m-d');
   
//inserer nos donnees dans notre bd
// echo $date; 
    for ($i=0; $i < count($id_stagiaire); $i++) { 
        $id=$id_stagiaire[$i];
        $statut1=$statut[$i];

        $stmt=$db->prepare("INSERT INTO presence(ID_STAGIAIRE, STATUT, DATE) VALUES(:id_stagiaire, :statut, :date)");
        $stmt->execute(array(
        ':id_stagiaire'=> $id,
        ':statut'=> $statut1,
        ':date'=> $date
));
}

header('location: index.php');
exit;
}

?>