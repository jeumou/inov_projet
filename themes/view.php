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
    $ID_THEME = $_POST['ID_THEME'];
    $nom_theme = $_POST['nom_theme'];
    $des_themes = $_POST['des_themes'];
try{
    $sql=("UPDATE themes SET  nom_theme=:nom_theme, des_themes= :des_themes WHERE ID_THEME= :ID_THEME");
    $stmt=$db->prepare($sql);
    $stmt->bindParam(":nom_theme", $nom_theme);
    $stmt->bindParam(":des_themes", $des_themes);
    $stmt->bindParam(":ID_THEME", $ID_THEME);
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
     $ID_THEME = $_GET['id'];
     $sql="SELECT * FROM membres,themes WHERE themes.id_stagiaire=membres.id AND themes.ID_THEME= '$ID_THEME'";
     $result=$db->query($sql);
     if($result->rowCount()>0){
        while($row=$result->fetch(PDO::FETCH_ASSOC)){?>

<form method="POST" action=" " >
<div class="col-md-5 border-right">
    <div class="p-3 py-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">Votre theme</h4>
        </div>
        <div class="row mt-3">
            <div class="col-md-12"><label class="labels" >nom_theme</label><input type="text" class="form-control" placeholder="nom_theme" name="nom_theme" value="<?php echo $row["nom_theme"]?>"></div>
                <div class="col-md-12"><label class="labels" >des_themes</label><input type="text" class="form-control" placeholder="des_themes" name="des_themes" value="<?php echo $row["des_themes"]?>"></div>
            </div>
        <div class="mt-5 text-center">
            <!-- <button class="btn btn-primary profile-button" type="submit" name="modifier">modifier</button> -->
                <?php }} ?> 
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