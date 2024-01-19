<?php
include('../inc/connexion.php');
// Vérification des informations de connexion
//gestion de mon formulaire de profil
if (isset($_POST['valider'])) {
    $ID_STAGIAIRE = $_POST['id'];
    $ECOLE=$_POST['ECOLE'];
    $DIPLOME= $_POST['DIPLOME'];
    $NIVEAU = $_POST['NIVEAU'];
    $DATE_DEBUT = $_POST['DATE_DEBUT'];
    $DATE_FIN = $_POST['DATE_FIN'];
    //inserer un cv dans ma bd
    $cv= $_FILES["CV"];
    $dir = "cv/".time().$cv["name"];
    move_uploaded_file($cv["tmp_name"],$dir); //deplacer mon fichier cv vers users

    //inserer une PHOTO dans notre base de donnee
    $img= $_FILES["PHOTO"];
    $dir1 = "photo/".time().$img["name"];
    move_uploaded_file($img["tmp_name"],$dir1);
    try{

        $stmt=$db->prepare("INSERT INTO profil (ID_STAGIAIRE, PHOTO, NIVEAU, ECOLE, DIPLOME, CV, DATE_DEBUT, DATE_FIN) VALUES(:ID_STAGIAIRE, :PHOTO, :NIVEAU, :ECOLE, :DIPLOME, :CV, :DATE_DEBUT, :DATE_FIN)");
        $stmt->bindParam(':ID_STAGIAIRE', $ID_STAGIAIRE);
        $stmt->bindParam(':ECOLE', $ECOLE);
        $stmt->bindParam(':DIPLOME', $DIPLOME);
        $stmt->bindParam(':NIVEAU', $NIVEAU);
        $stmt->bindParam(':DATE_DEBUT', $DATE_DEBUT);
        $stmt->bindParam(':DATE_FIN', $DATE_FIN);
        $stmt->bindParam(':CV', $dir);
        $stmt->bindParam(':PHOTO', $dir1);
        $stmt->execute();
            header('location: ../users/index.php');
   }catch (PDOException $e){
        echo" insertion echouee: ".$e->getMessage();

}
}


// modifier le profil

if (isset($_POST['modifier'])) {
    $ID_STAGIAIRE = $_POST['id'];
    $ECOLE=$_POST['ECOLE'];
    $DIPLOME= $_POST['DIPLOME'];
    $NIVEAU = $_POST['NIVEAU'];
    $DATE_DEBUT = $_POST['DATE_DEBUT'];
    $DATE_FIN = $_POST['DATE_FIN'];

    $cv= $_FILES["CV"];
    $dir = "cv/".time().$cv["name"];
    move_uploaded_file($cv["tmp_name"],$dir); //deplacer mon fichier cv vers users

    $img= $_FILES["PHOTO"];
    $dir1 = "photo/".time().$img["name"];
    move_uploaded_file($img["tmp_name"],$dir1); 

    try{
            $stmt=$db->prepare("UPDATE profil SET NIVEAU=:NIVEAU, ECOLE=:ECOLE, DIPLOME=:DIPLOME, DATE_DEBUT=:DATE_DEBUT, DATE_FIN=:DATE_FIN WHERE ID_STAGIAIRE=:ID_STAGIAIRE");
            $stmt->bindParam(':ID_STAGIAIRE', $ID_STAGIAIRE);
            $stmt->bindParam(':ECOLE', $ECOLE);
            $stmt->bindParam(':DIPLOME', $DIPLOME);
            $stmt->bindParam(':NIVEAU', $NIVEAU);
            $stmt->bindParam(':DATE_DEBUT', $DATE_DEBUT);
            $stmt->bindParam(':DATE_FIN', $DATE_FIN);
           
            $stmt->execute();
            header('location: ../users/profil.php?id='.$ID_STAGIAIRE);
        }catch (PDOException $e){
            echo" insertion echouee: ".$e->getMessage();
        exit;
    }
}
?>