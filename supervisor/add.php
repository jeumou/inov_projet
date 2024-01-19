
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard2</title>
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <link rel="stylesheet" href="../bs5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dash.css">
    <link rel="stylesheet" href="../css/bell.css">
    <link rel="icon" href="../img/logo.png">
   
    
</head>
<body>
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

    <form action="action.php" method="POST">

        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-right">Add supervisors</h4>
            </div>
            <div class="row mt-3">
       
            <div class="col-md-12"><label class="labels" name="id_sup" >superviseur</label>
                <select name="id_sup">
                    <?php
                        include('../inc/connexion.php');
                        $sql="SELECT*FROM membres WHERE Rule='encadreur'";

                        $result=$db->query($sql);
                        if($result->rowCount()>0){
                            while($row=$result->fetch(PDO::FETCH_ASSOC)){?>
                            <option value="<?php echo $row["id"]?>"><?php echo $row["username"]?></option>
                                  
                    <?php
                         }
                        }else{
                            echo "0 resultats";
                        }
                    ?>
               </select>
            </div>
            <div class="col-md-12"><label class="labels" name="id_stag" >stagiaire:</label>
                <select name="id_stag">
                    <?php
                        include('../inc/connexion.php');
                        $sql2="SELECT*FROM membres WHERE Rule='stagiaire'";
                        $result2=$db->query($sql2);

                        if($result2->rowCount()>0){
                            while($row2=$result2->fetch(PDO::FETCH_ASSOC)){?>
                            <option value="<?php echo $row2["id"]?>"><?php echo $row2["username"]?></option>
                                  
                    <?php
                        }
                         }else{
                            echo "0 resultats";
                        }
                    ?>
               </select>
             </div>
             <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit" name="ajouter" value="ajouter">inserer</button>
            </div>
    </form>
                                          