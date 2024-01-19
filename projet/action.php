
<?php
include('../inc/connexion.php');
// insertion de projets

if (isset($_POST['login'])) {
    $id_equipe = $_POST['id_equipe'];
    $DESCRIPTION = $_POST['DESCRIPTION'];
    $NOM_PROJET = $_POST['NOM_PROJET'];
    $STATUT = $_POST['STATUT'];
    $DATE_DEBUT = date('y-m-d');
    $DATE_FIN = $_POST['DATE_FIN'];

    $sql="INSERT INTO projet (id_equipe, DESCRIPTION, NOM_PROJET, STATUT, DATE_DEBUT, DATE_FIN) VALUES(:id_equipe, :DESCRIPTION, :NOM_PROJET, :STATUT, :DATE_DEBUT, :DATE_FIN )";
    $stmt=$db->prepare($sql);
    $stmt->bindParam(':id_equipe', $id_equipe);
    $stmt->bindParam(':DESCRIPTION', $DESCRIPTION);
    $stmt->bindParam(':NOM_PROJET', $NOM_PROJET);
    $stmt->bindParam(':STATUT', $STATUT);
    $stmt->bindParam(':DATE_DEBUT', $DATE_DEBUT);
    $stmt->bindParam(':DATE_FIN', $DATE_FIN);
    $stmt->execute();
        
        header('location: ../projet/index.php');
        exit;


 }
?>

