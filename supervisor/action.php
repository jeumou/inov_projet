<?php
    include('../inc/connexion.php');
// Vérification des informations de connexion

if (isset($_POST['ajouter'])) {
    $id_sup= $_POST['id_sup'];
    $id_stag = $_POST['id_stag'];
   
    
//inserer nos donnees dans notre bd
//gestion de personnels*/
try{
        $sql="INSERT INTO supervisor (id_sup, id_stag) VALUES( :id_sup, :id_stag)";
        $stmt=$db->prepare($sql);
        $stmt->bindParam(':id_sup', $id_sup);
        $stmt->bindParam(':id_stag', $id_stag);
        $stmt->execute();
        echo "insertion reussie";
        header('location: index.php');

}catch(PDOException $e){
    echo" insertion echouee: ".$e->getMessage();
exit;
}
}
?>