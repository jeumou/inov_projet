<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Formulaire de connexion</title>
      <link rel="stylesheet" href="icon/css/all.min.css">
      <link rel="stylesheet" href="css/formulaire.css">
      <link rel="icon" href="img/logo.png">
   </head>
<body>
   <div class="wrapper">
        <section class="form login">
            <header>Connectez-vous</header>
            <form action="" method="POST" autocomplete="off">
                <div class="error-text"></div>
                <div class="field input">
                    <div class="field">
                        <label> email address</label>
                        <input type="email" name="email" placeholder="enter your email">
                    </div>
                    <div class="field input">
                        <label> password</label>
                        <input type="password" name="password" placeholder=" enter your password">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </div>
                    <div class="field button">
                        <input type="submit" name="login" value="login">
                    </div>
                </div>
            </form>
            <!-- <div class="link">not yet signup? <a href="signup.php"></a></div> -->
        </section>
    </div>
    <script src="js/password.js"></script>
</body>
</html>
<?php
include('inc/connexion.php');
// Vérification des informations de connexion

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $email = $_POST['email'];
    $password=$_POST['password'];
    //inserer nos donnees dans notre bd

$stmt=$db->prepare("SELECT*FROM membres WHERE email=:email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$user=$stmt->fetch(PDO::FETCH_ASSOC);
if($user && password_verify($password, $user['password'])){
    //l'utilisateur est authentifie avec succes
   

    session_start();
    $_SESSION['user_id']=$user['id'];
    $_SESSION['username']= $user['username'];
    $_SESSION['Rule']= $user['Rule'];
    $_SESSION['id_equipe']= $user['id_equipe'];
    
    if ($_SESSION['Rule']!= 'stagiaire') {
        header('location:index.php');  
    }else {
        header('location:taches/mestaches.php');
    }
    
    exit;
}else{
    //l'utilisateur a echoue
    $error_message="Adresse email ou mot de passe incorrect";

}
}
?>