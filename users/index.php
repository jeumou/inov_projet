<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <link rel="stylesheet" href="../bs5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bell.css">
    <link rel="stylesheet" href="../css/dash.css">
    <link rel="icon" href="../img/logo.png">
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

        <!------main content-les tables du bas---->
        <div class="main-content">
        
        <!---</div>-->
        <nav class="breadcrumb">
            <a class="breadcrumb-item" href="../">dasboard</a>
            <span class="breadcrumb-item active" aria-current="page">users</span>
        </nav>
            <!------row second---->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card row" style="min-height: 485px;">
                    <div class="card-header card-header-text">
                        <span class="card-title">users list</span>
                        <a href="add.php" class="btn btn-warning" style="float: right;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a>

                    </div>
                    <div class="card-content table responsive">
                            <div class="table-responsive">

                            <form action="delall.php" method="POST">


                                <table class="table table-striped
                                table-hover	
                                table-borderless
                                table-light
                                align-middle">
                                    <thead class="text-primary">
                                        <caption>Table Name</caption>
                                        <tr class="text-center">
                                            <th><span class="custom-checkbox"><div id="selectAll"></div>
                                            <label for="selectAll"></label>
                                            </th>
                                            <th>USERNAME</th>
                                            <th>EMAIL</th>
                                            <th>TEL</th>
                                            <th>CITY</th>
                                            <th>ROLE</th>
                                            <th>EQUIPE</th>
                                            <th>ACTION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                include('../inc/connexion.php');
                                                //$sql="SELECT*FROM membres";
                                                $sql="SELECT id, username, email, tel, city, Rule,nom_equipe FROM membres, equipe WHERE membres.id_equipe=equipe.id_equipe";
                                                $result=$db->query($sql);
                                                
                                                if($result->rowCount()>0){
                                                    while($row=$result->fetch(PDO::FETCH_ASSOC)){?> 

                                                        <tr>
                                                            <th><span class="custom-checkbox"><input type="checkbox" id="checkbox[]" name="checkbox" value="<?php echo $row["id"]?>"></span>
                                                            </th>
                                                                <th><?php echo $row["username"]?></th>
                                                                <th><?php echo $row["email"]?></th>
                                                                <th><?php echo $row["tel"]?></th>
                                                                <th><?php echo $row["city"]?></th>
                                                                <th><?php echo $row["Rule"]?></th>
                                                                <th><?php echo $row["nom_equipe"]?></th>
                                                                <th>
                                                                    <a href="profil.php?id=<?php echo $row["id"]?>" class="m-2"><i class="fa fa-eye text-warning" aria-hidden="true"></i></a>
                                                                    <a href="edit.php?id=<?php echo $row["id"]?>" class="m-2"><i class="fa fa-pencil text-primary" aria-hidden="true"></i></a>
                                                                    <a href="delete.php?id=<?php echo $row["id"]?>" class="m-2"><i class="fa fa-archive text-danger" aria-hidden="true"></i></a>
                                                                    <a href="attestation.php?id=<?php echo $row["id"]?>" class="m-2"> <i class="fa fa-graduation-cap text-success" aria-hidden="true"></i></a>
                                    
                                                                
                                                                </th>
                                                                
                                                        </tr> 
                                                    <?php
                                                        }
                                                    }else{
                                                        echo "0 resultats";
                                                    }
                                                    ?>
                                            
                                        </tbody>
                                </table>
                                    <button type="submit" class="btn btn-danger bg-danger" name="delall"><a href="delall.php?id=<?php echo $row["id"]?>" class="m-2"></a>del</button>
                            </form>
                            </div>
                    </div>
                </div>

        </div>
        </div>
        </div>
     </div>
    </div>


    <!-----html code compleate--->
    <script src="bs5/js/bootstrap.min.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){
        $("#sidebar-collapse").on('click', function(){
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
    });
        $(".more-button, .body-overlay").on('click', function(){
        $('#sidebar, .body-overlay').toggleClass('show-nav');

    });
});

    </script>
</body>
</html>




