<?php
ob_start(); // Placer cette ligne au début du script

// Votre code PHP continue ici
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard2</title>
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <link rel="stylesheet" href="../bs5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bell.css">
    <link rel="stylesheet" href="../css/dash.css">
    <link rel="icon" href="../img/logo.png">

   <style>
        
        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }
        
        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }
        
        .profile-button:hover {
            background: #682773
        }
        
        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }
        
        .profile-button:active {
            background: #682773;
            box-shadow: none
        }
        
        .back:hover {
            color: #682773;
            cursor: pointer
        }
        
        .labels {
            font-size: 11px
        }
        
        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
            
           </style>  
</head>

<body>
 
<div class="wrapper">
        <div class="body-overlay"></div>
        <!-------sidebar---->
        <?php
            include("../layouts/sidebar1.php");
        ?>

        <!--page content--->
        <div id="content">
            <!--top--navbar--design-->
        <?php
            include("../layouts/nav1.php");
        ?>

<?php
include("action.php");
if (isset($_POST['modifier'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $city = $_POST['city'];
    $Rule = $_POST['Rule'];

    try {
        $sql=("UPDATE membres SET username=:username, email = :email, tel = :tel, city = :city, Rule = :Rule WHERE id= :id");
        $stmt=$db->prepare($sql); 
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":tel", $tel);
        $stmt->bindParam(":city", $city);
        $stmt->bindParam(":Rule", $Rule);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header('location:index.php');
    } catch(PDOException $e) {
        echo "suppression echouee: ".$e->getMessage();
        exit;
    }
}
?>


<?php
include("../inc/connexion.php");
$id=$_GET["id"];
$sql="SELECT * FROM membres WHERE id='$id'";
$result=$db->query($sql);
if($result->rowCount()>0){
    while($row=$result->fetch(PDO::FETCH_ASSOC)){?>

<form method="POST" action=" " >
                                
     <!--<div class="d-flex flex-column align-items-center text-center p-3 py-5"><span class="text-black-50"><?php echo $row["email"]?></span><span> </span></div>
        </div>-->
    <div class="col-md-5 border-right">
        <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-right">Modifier vos informations</h4>
            </div>
        <div class="row mt-3">
        <div class="col-md-12"><label class="labels" ></label><input type="hidden" class="form-control" name="id" value="<?php echo $row["id"]?>"></div>
            <div class="col-md-12"><label class="labels" >username</label><input type="text" class="form-control" placeholder="username"  name="username" value="<?php echo $row["username"]?>"></div>
            <div class="col-md-12"><label class="labels" >e-mail</label><input type="email" class="form-control" placeholder="email" name="email" value="<?php echo $row["email"]?>"></div>
            <div class="col-md-12"><label class="labels" >tel</label><input type="number" class="form-control" placeholder="tel" name="tel" value="<?php echo $row["tel"]?>"></div>
            <div class="col-md-12"><label class="labels" >city</label><input type="text" class="form-control" placeholder="city" name="city" value="<?php echo $row["city"]?>"></div>
            <div class="col-md-12"><label class="labels" >Rule</label><input type="text" class="form-control" placeholder="Rule" name="Rule" value="<?php echo $row["Rule"]?>"></div>
            <div class="col-md-12"><label class="labels" >password</label><input type="text" class="form-control" placeholder="password" name="password" value="<?php echo $row["password"]?>"></div>
        </div>

                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit" name="modifier">modifier</button>
                            <?php }} ?> 
                        </div>


                
        </div>
    </div>
 </form>
</body>
</html>
<?php
ob_end_flush(); // Utilisez ob_end_flush() à la fin pour vider le tampon et envoyer la sortie
?>