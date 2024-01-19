


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
    <style>
        input[type="date"]{
            width: 150px;
            height: 50px;
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

        <div class="main-content">
        
        
        <nav class="breadcrumb">
            <a class="breadcrumb-item" href="../">dashboard</a>
            <span class="breadcrumb-item active" aria-current="page">presences</span>
        </nav>
            <!------row second---->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card row" style="min-height: 485px;">
                    <div class="card-header card-header-text">
                       
                        <form method="POST">
                            <div class="row"> 
                                <div class="col-lg-3">
                                    <span>User list</span>
                                </div>
                                <div class="col-lg-3">
                                    <input type="date" class="form-control" name="date" value="" >
                                    
                                </div>
                                <div class="col-lg-3">
                                    <button class="btn btn-warning profile-button" type="submit" name="valider">Afficher</button>  
                                </div>
                                <div class="col-lg-3">
                                    <a href="add.php" class="btn btn-warning" style="float: right;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-content table responsive">
                            <div class="table-responsive">
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
                                            <th>RULE</th>
                                            <!-- <th>EQUIPE</th> -->
                                            <th>ACTION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            
                                                <?php
                                                include('../inc/connexion.php');
                                                if(isset($_POST['valider'])){
                                                    $now=$_POST['date'];
                                                }else{
                                                   $now=date('Y-m-d'); 
                                                };
                                                // recuperr la date du jour pour la presence du jour
                                                $sql="SELECT * FROM membres, presence WHERE Rule='stagiaire' AND membres.id=presence.ID_STAGIAIRE AND presence.DATE='$now'";
                                                $result=$db->query($sql);
                                                
                                                if($result->rowCount()>0){
                                                    while($row=$result->fetch(PDO::FETCH_ASSOC)){?> 


                                        <tr>
                                            <th><span class="custom-checkbox"><input type="checkbox" id="checkbox1" name="option[]" value="1"></span>
                                                <label for="checkbox1"></label>
                                            </th>
                                                <th><?php echo $row["username"]?></th>
                                                <th><?php echo $row["email"]?></th>
                                                <th><?php echo $row["tel"]?></th>
                                                <th><?php echo $row["city"]?></th>
                                                <th><?php echo $row["Rule"]?></th>
                                                <!-- <th><?php echo $row["nom_equipe"]?></th> -->
                                                <th>
                                                    
                                                    <?php
                                                    if($row["STATUT"]=='present'){
                                                        echo '<span class="badge bg-success" >'.$row["STATUT"].'</span>';
                                                    }elseif($row["STATUT"]=='absent'){
                                                        echo '<span class="badge bg-danger" >'.$row["STATUT"].'</span>';
                                                    }else{
                                                        echo '<span class="badge bg-warning" >'.$row["STATUT"].'</span>';
                                                    }
                                                    ?>
                    
                                                   
                                                </th>
                                                
                                        </tr> 
                                                <?php
                                                    }
                                                    }else{
                                                    // echo "0 resultats";
                                                    }
                                                ?>
                                        </tbody>
                                </table>
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