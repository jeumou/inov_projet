<?php
include('../inc/connexion.php');
// Vérification des informations de connexion

if (isset($_POST['ajouter'])) {

    $nom_theme= $_POST['nom_theme'];
    $des_themes = $_POST['des_themes'];
    $id_stagiaire= $_POST['id_stagiaire'];


$sql="INSERT INTO themes ( nom_theme, des_themes,id_stagiaire) VALUES(  :nom_theme,:des_themes, :id_stagiaire,)";
    $stmt=$db->prepare($sql);
    $stmt->bindParam(':nom_theme', $nom_theme);
    $stmt->bindParam(':des_themes', $des_themes);
    $stmt->bindParam(':id_stagiaire', $id_stagiaire);
    $stmt->execute();

        header('location: ../themes/index.php');
        exit;

}

?>

