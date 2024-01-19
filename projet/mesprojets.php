<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recuperer les infos</title>
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <!-- <link rel="stylesheet" href="../bs5/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/dash.css">
    <link rel="stylesheet" href="../css/bell.css">
    <link rel="icon" href="../img/logo.png">
    
    <?php
    include("action.php");
    if (isset($_POST['modifier'])){
        $ID_TACHE = $_POST['ID_PROJET'];
        $DESCRIPTION = $_POST['DESCRIPTION'];
        $LIBELLE = $_POST['LIBELLE'];
        $STATUT = $_POST['STATUT'];
        $DATE_DEBUT = $_POST['DATE_DEBUT'];
        $DATE_FIN = $_POST['DATE_FIN'];
       
    try{
        $sql=("UPDATE projet SET DESCRIPTION = :DESCRIPTION, LIBELLE = :LIBELLE , STATUT = :STATUT ,DATE_DEBUT = :DATE_DEBUT, DATE_FIN = :DATE_FIN WHERE ID_PROJET= :ID_PROJET");
        $stmt=$db->prepare($sql);
        $stmt->bindParam(":DESCRIPTION", $DESCRIPTION);
        $stmt->bindParam(":LIBELLE", $LIBELLE);
        $stmt->bindParam(":DATE_DEBUT", $DATE_DEBUT);
        $stmt->bindParam(":STATUT", $STATUT);
        $stmt->bindParam(":ID_PROJET", $ID_PROJET);
        $stmt->execute();
            header('location: mesprojets.php');
    }catch(PDOException $e){
            echo" suppression echouee: ".$e->getMessage();
    exit;
    }
}
    
?>

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
            <a class="breadcrumb-item" href="../taches/mestaches.php">Tasks</a>
            <span class="breadcrumb-item active" aria-current="page">projects</span>
        </nav>
            <!------row second---->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card row" style="min-height: 485px;">
                    <div class="card-header card-header-text">
                        <span class="card-title">projects list</span>


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

                                    <th>DESCRIPTION</th>
                                    <th>LIBELLE</th>
                                    <th>STATUT</th>
                                    <th>DATE_DEBUT</th>
                                    <th>DATE_FIN</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                          
                                <?php
                                    include('../inc/connexion.php');
                                    $id=$_SESSION['user_id'];
                                    $ide=$_SESSION['id_equipe'];
                                    $sql2="SELECT * FROM equipe,projet WHERE projet.id_equipe=equipe.id_equipe AND projet.id_equipe='$ide'";
                                    $result2=$db->query($sql2);
                                    if($result2->rowCount()>0){
                                    while($row2=$result2->fetch(PDO::FETCH_ASSOC)){?>
                                
                                            <tbody>
                                            <tr>
                                                <td></td> 
                                                <td><?php echo $row2["DESCRIPTION"]?></td> 
                                                <td><?php echo $row2["NOM_PROJET"]?></td> 
                                                <td><?php echo $row2["STATUT"]?></td> 
                                                <td><?php echo $row2["DATE_DEBUT"]?></td> 
                                                <td><?php echo $row2["DATE_FIN"]?></td> 
                                                <th>
                                                    <a href="view.php?id=<?php echo $row2["ID_PROJET"]?>" class="m-2" data-bs-toggle="modal" data-bs-target="#projet<?php echo $row2["ID_PROJET"]?>"><i class="fa fa-eye text-warning" aria-hidden="true"></i>
                                                </th>
                                            </tr>

                                            
                            <div class="modal fade" id="projet<?php echo $row2["ID_PROJET"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">PROJET: <span class="text-primary"><?php echo $row2["NOM_PROJET"]?></span></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="" >
                                            <div class="modal-body">
                                                    <div class="col-md-12 border-right">
                                                            <div class="row mt-3">
                                                                <input type="hidden" class="form-control" name="ID_PROJET" value="<?php echo $row2["ID_PROJET"]?>">
                                                                <div class="col-md-12"><label class="labels" >description</label><input type="text" class="form-control" name="DESCRIPTION" value="<?php echo $row2["DESCRIPTION"]?>"></div>
                                                                <div class="col-md-12"><label class="labels" >libelle</label><input type="text" class="form-control" name="NOM_PROJET" value="<?php echo $row2["NOM_PROJET"]?>"></div>
                                                                <div class="col-md-12"><label class="labels" >statut</label><input type="text" class="form-control" placeholder="STATUT" value="<?php echo $row2["STATUT"]?>" name="STATUT"></div>
                                                                <div class="col-md-12"><label class="labels" >date_debut</label><textarea class="form-control" placeholder="DATE_DEBUT"  name="DATE_DEBUT"><?php echo $row2["DATE_DEBUT"]?></textarea></div>
                                                                <div class="col-md-12"><label class="labels" >date_fin</label><input type="datetime-local" class="form-control" name="DATE_FIN" id=""></div>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                <button class="btn btn-primary profile-button" type="submit" name="modifier">modifier</button>
                                            </div>
                                        </form>
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
<!-- <script src="bs5/js/bootstrap.min.js"></script> -->
<script src="../js/jquery.js"></script>
<!-- <script src="../js/popper.js"></script> -->
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
