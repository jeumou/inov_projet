<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <link rel="stylesheet" href="../bs5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bell.css">
    <link rel="stylesheet" href="../css/dash.css">
    <link rel="stylesheet" href="../css/table.css">
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
       <?php
       include('../layouts/sidebar1.php');
       ?>
        <!--fin gauche-->
        <div id="content">
            <!--top--navbar--design-->
        <div class="top-navbar">
            <?php
       include('../layouts/nav2.php');
       ?>

        <!------main content-les tables du bas---->
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-starts">
                        <!-- paste template here !!!!   -->
                        
<?php
    include("action.php");
    if (isset($_POST['modifier'])){
        $ID_TACHE = $_POST['ID_TACHE'];
        $DATETIME_T = $_POST['DATETIME_T'];
        $OBSERVATION_T = $_POST['OBSERVATION_T'];
        $STATUT = $_POST['STATUT'];
    try{
        $sql=("UPDATE taches SET DATETIME_T = :DATETIME_T, OBSERVATION_T = :OBSERVATION_T, STATUT = :STATUT WHERE ID_TACHE= :ID_TACHE");
        $stmt=$db->prepare($sql);
        $stmt->bindParam(":DATETIME_T", $DATETIME_T);
        $stmt->bindParam(":OBSERVATION_T", $OBSERVATION_T);
        $stmt->bindParam(":STATUT", $STATUT);
        $stmt->bindParam(":ID_TACHE", $ID_TACHE);
        $stmt->execute();
            header('location: index.php');
    }catch(PDOException $e){
            echo" suppression echouee: ".$e->getMessage();
    exit;
    }
}
    
?>
<form method="POST" action="" >
    <?php
     include('../inc/connexion.php');
     $ID_TACHE = $_GET['id'];
     $sql="SELECT * FROM membres,taches WHERE taches.ID_STAGIAIRE=membres.id AND taches.ID_TACHE= '$ID_TACHE'";
     $result=$db->query($sql);
     if($result->rowCount()>0){
     while($row=$result->fetch(PDO::FETCH_ASSOC)){?>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">MODIFIER</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels" >sujet</label><input type="text" class="form-control" name="ID_TACHE" value="<?php echo $row["ID_TACHE"]?>"></div>
                    <div class="col-md-12"><label class="labels" >statut</label><input type="text" class="form-control" placeholder="statut" name="STATUT"></div>
                    <div class="col-md-12"><label class="labels" >observation</label><textarea class="form-control" placeholder="OBSERVATION"  name="OBSERVATION_T"></textarea></div>
                    <div class="col-md-12"><label class="labels" >date</label><input type="datetime-local" name="DATETIME_T" id=""></div>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit" name="modifier">modifier</button>
            <?php }} ?> 
                </div>
            </div>
        </div>
</form>
                    </div>
                
                </div>
            </div>
       </div>
    
    

</div>
                </div>
            </div>
        </div>
     </div>
    </div>


    <!-----html code compleate--->
    <script src="../bs5/js/bootstrap.min.js"></script>
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