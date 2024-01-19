<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recuperer les infos</title>
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <!-- <link rel="stylesheet" href="../bs5/css/bootstrap.min.css"> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/dash.css">
    <link rel="stylesheet" href="../css/bell.css">
    <link rel="icon" href="../img/logo.png">
    
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

        <!------main content-les tables du bas---->
        <div class="main-content">
     <!------main content-les tables du bas---->
     <div class="main-content">
        
        <!---</div>-->
        <nav class="breadcrumb">
            <a class="breadcrumb-item" href="../projet/mesprojets.php">projects</a>
            <span class="breadcrumb-item active" aria-current="page">themes</span>
        </nav>
            <!------row second---->
        <div class="row">
            <div class="col-lg-12 col-md-12">
        
                <div class="card row" style="min-height: 485px;">
                    <div class="card-header card-header-text">
                        <span class="card-title">themes list</span>

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

                                    <th>NOM_THEMES</th>
                                    <th>DESCRIPTION</th>
                                    <th>STAGIAIRES</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                <?php
                    include('../inc/connexion.php');
                    $id=$_SESSION['user_id'];
                    $sql2="SELECT * FROM membres, themes WHERE themes.ID_stagiaire=membres.id AND membres.id='$id'";
                    $result2=$db->query($sql2);
                    if($result2->rowCount()>0){
                    while($row2=$result2->fetch(PDO::FETCH_ASSOC)){?>
                
                            <tbody>
                            <tr>
                                <td></td> 
                                <td><?php echo $row2["nom_theme"]?></td> 
                                <td><?php echo $row2["des_themes"]?></td> 
                                <td><?php echo $row2["username"]?></td> 
                            
                            <th>
                            <a href="view.php?id=<?php echo $row2["ID_THEME"]?>" class="m-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye text-warning" aria-hidden="true"></i></a>
                            </th>    

                            </tr>
                            
                          <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">THEME: <span class="text-primary"><?php echo $row2["nom_theme"]?></span></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                           "<em><?php echo $row2["des_themes"]?></em>"
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>

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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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