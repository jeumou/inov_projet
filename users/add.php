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
    <!--tout celui de gauche-->
   
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
                                            <h4 class="text-right">Add users</h4>
                                        </div>
                                        <div class="row mt-3">
       
                                            <div class="col-md-12"><label class="labels" >fullname</label><input type="text" class="form-control" placeholder="fullname"  name="nom"></div>
                                            <div class="col-md-12"><label class="labels" >e-mail</label><input type="email" class="form-control" placeholder="email" name="email"></div>
                                            <div class="col-md-12"><label class="labels" >password</label><input type="password" class="form-control" placeholder="password" name="password"></div>
                                            <div class="col-md-12"><label class="labels" >tel</label><input type="number" class="form-control" placeholder="tel" name="tel"></div>
                                            <div class="col-md-12"><label class="labels" >city</label><input type="text" class="form-control" placeholder="city" name="city"></div>

                                            <select name="Rule">
                                                <option>Stagiaire</option>
                                                <option>admin</option>
                                                <option>encadreur</option>
                                            </select>
                                        </div>

                                                <select name="id_equipe">
                                                    <?php
                                                        include('../inc/connexion.php');
                                                            $sql="SELECT*FROM equipe";
                                                            $result=$db->query($sql);
                                    
                                                        if($result->rowCount()>0){
                                                            while($row=$result->fetch(PDO::FETCH_ASSOC)){?>
                                                            <option value="<?php echo $row["id_equipe"]?>"><?php echo $row["nom_equipe"]?></option>
                                        
                                                    <?php
                                                        }
                                                    }else{
                                                            echo "0 resultats";
                                                    }
                                                    ?>
                                    
                                                </select>
                                                    <div class="mt-5 text-center">
                                                        <button class="btn btn-primary profile-button" type="submit" name="login">inserer</button>
                                                    </div>
                                    </div>
                                </div>
                        
                    <!-- </div> -->

                    </form>
</body>
</html>
