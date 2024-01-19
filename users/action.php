<?php
include('../inc/connexion.php');
// Vérification des informations de connexion

if (isset($_POST['login'])) {
    $username=$_POST['nom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $city= $_POST['city'];
    $Rule = $_POST['Rule'];
    $id_equipe=$_POST['id_equipe'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
//inserer nos donnees dans notre bd


$stmt=$db->prepare("INSERT INTO membres(username, email, password, tel, city, Rule, id_equipe) VALUES(:username, :email, :password, :tel, :city, :Rule, :id_equipe)");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':tel', $tel);
$stmt->bindParam(':city', $city);
$stmt->bindParam(':Rule', $Rule);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':id_equipe', $id_equipe);
$stmt->execute();
    header('location: ../users/index.php');
    echo("votre nom est: " .$nom);
exit;
}

?>

