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
        $ID_PROJET = $_POST['ID_PROJET'];
        $DESCRIPTION = $_POST['DESCRIPTION'];
        $NOM_PROJET = $_POST['NOM_PROJET'];
        $STATUT = $_POST['STATUT'];
        $DATE_DEBUT = $_POST['DATE_DEBUT'];
        $DATE_FIN = $_POST['DATE_FIN'];
    try{
    $sql=("UPDATE projet SET  DESCRIPTION = :DESCRIPTION, NOM_PROJET = :NOM_PROJET, STATUT = :STATUT, DATE_DEBUT = :DATE_DEBUT, DATE_FIN = :DATE_FIN WHERE ID_PROJET= :ID_PROJET");
    $stmt=$db->prepare($sql);
    $stmt->bindParam(":DESCRIPTION", $DESCRIPTION);
    $stmt->bindParam(":NOM_PROJET", $NOM_PROJET);
    $stmt->bindParam(":STATUT", $STATUT);
    $stmt->bindParam(":DATE_DEBUT", $DATE_DEBUT);
    $stmt->bindParam(":DATE_FIN", $DATE_FIN);
    $stmt->bindParam(":ID_PROJET", $ID_PROJET);
    $stmt->execute();
    header('location: index.php');
    }catch(PDOException $e){
        echo "modification echouee: ".$e->getMessage();
    exit;
    }
    }
    
?>
<form method="POST" action="" >
    <?php
    include('../inc/connexion.php');
    $ID_PROJET = $_GET['id'];
    $sql="SELECT * FROM equipe, projet WHERE projet.id_equipe=equipe.id_equipe AND projet.ID_PROJET= '$ID_PROJET'";
    $result=$db->query($sql);
    if($result->rowCount()>0){
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
    ?>

        
<form method="POST" action="" >
<div class="col-md-5 border-right">
    <div class="p-3 py-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">Modifier les projets </h4>
        </div>
    <div class="row mt-3">
        <div class="col-md-12"><label class="labels" ></label><input type="hidden" class="form-control" name="ID_PROJET" value="<?php echo $row["ID_PROJET"]?>"></div>
            <div class="col-md-12"><label class="labels" >description</label><input type="text" class="form-control" name="DESCRIPTION" value="<?php echo $row["DESCRIPTION"]?>"></div>
                <div class="col-md-12"><label class="labels" >nom_projet</label><input type="text" class="form-control" placeholder="nom_projet"  name="NOM_PROJET" value="<?php echo $row["NOM_PROJET"]?>"></div>
                    <div class="col-md-12"><label class="labels" >date_debut</label><input type="date" class="form-control" placeholder="DATE_DEBUT" name="DATE_DEBUT" value="<?php echo $row["DATE_DEBUT"]?>"></div>
                        <div class="col-md-12"><label class="labels" >date_fin</label><input type="datetime-local" class="form-control" placeholder="DATE_FIN" name="DATE_FIN" value="<?php echo $row["DATE_FIN"]?>"></div>
                            <div class="col-md-12"><label class="labels" >statut</label><input type="text" class="form-control" placeholder="STATUT" name="STATUT" value="<?php echo $row["STATUT"]?>"></div>

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







