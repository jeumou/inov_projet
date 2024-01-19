


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recuperer les infos</title>
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <link rel="stylesheet" href="../bs5/css/bootstrap.min.css">
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
            <a class="breadcrumb-item" href="../themes/mesthemes.php">Themes</a>
            <span class="breadcrumb-item active" aria-current="page">teams</span>
        </nav>
            <!------row second---->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card row" style="min-height: 485px;">
                    <div class="card-header card-header-text">
                        <span class="card-title">teams list</span>
      

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
                                    <th>NOM_EQUIPE</th>
                                    <th>MEMBRES</th>
                                </tr>
                            </thead>
                            <tbody>
                                    

        <?php
        include('../inc/connexion.php');
        $id=$_SESSION['user_id'];
       
        $sql="SELECT * FROM membres WHERE membres.id='$id'";
     
        $result=$db->query($sql); 
        if($result->rowCount()>0){
            while($row=$result->fetch(PDO::FETCH_ASSOC)){?> 

                <?php 
                $equipe = $row["id_equipe"];
                $sql2="SELECT * FROM equipe, membres  WHERE equipe.id_equipe = membres.id_equipe AND  membres.id_equipe='$equipe'";
                $result2=$db->query($sql2); 
                if($result2->rowCount()>0){
                while($row2=$result2->fetch(PDO::FETCH_ASSOC)){?> 
                
                
<tr>
    <th><span class="custom-checkbox"><input type="checkbox" id="checkbox1" name="option[]" value="1"></span>
        <label for="checkbox1"></label>
    </th>
    
        <th><?php echo $row2["nom_equipe"]?></th>
        <th><?php echo $row2["username"]?></th>
</tr> 
                
    <?php
    }}}
}else{
    echo "0 resultats";
}
?>
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
