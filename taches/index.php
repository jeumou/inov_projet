<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recuperer les infos</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <link rel="stylesheet" href="../bs5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dash.css">
    <link rel="stylesheet" href="../css/bell.css">
    <link rel="icon" href="../img/logo.png">
    
</head>
<body>
  
<div class="wrapper">
        <div class="body-overlay"></div>
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
        <nav class="breadcrumb">
            <a class="breadcrumb-item" href="../">dasboard</a>
            <span class="breadcrumb-item active" aria-current="page">tasks</span>
        </nav>
               <!------row second---->
               <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card row" style="min-height: 485px;">
                    <div class="card-header card-header-text">
                        <span class="card-title">tasks list</span>
                        <a href="add.php" class="btn btn-warning" style="float: right;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a>

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

                                    <th>SUJET</th>
                                    <th>DATE_REMISE</th>
                                    <th>DATE_DEBUT</th>
                                    <th>STAGIAIRE</th>
                                    <th>STATUT</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                          
                <?php
                    include('../inc/connexion.php');
                    $sql2="SELECT * FROM membres,taches WHERE taches.ID_STAGIAIRE=membres.id";
                    $result2=$db->query($sql2);
                    if($result2->rowCount()>0){
                    while($row2=$result2->fetch(PDO::FETCH_ASSOC)){?>
                
                            <tbody>
                            <tr>
                                <td></td> 
                                <td><?php echo $row2["SUJET"]?></td> 
                                <td><?php echo $row2["DATE_REMISE"]?></td> 
                                <td><?php echo $row2["DATE_DEBUT"]?></td> 
                                <td><?php echo $row2["username"]?></td> 
                                <td><?php echo $row2["STATUT"]?></td> 

                                <th>
                          
                                <a href="edit.php?id=<?php echo $row2["ID_TACHE"]?>" class="m-2"><i class="fa fa-pencil text-primary" aria-hidden="true"></i></a>
                                <a href="delete.php?id=<?php echo $row2["ID_TACHE"]?>" class="m-2"><i class="fa fa-archive text-danger" aria-hidden="true"></i></a>
                               
                                </th>
                                
                            </tr>  
                <?php }} ?>  
            </table>
        </th>
</tr> 

            <table>

                            </tbody>
    </table>
         </div>
                </main>
            </div>
        </div>
    
    

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
