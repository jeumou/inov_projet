<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recuperer les infos</title>
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <link rel="stylesheet" href="../bs5/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/dash.css">
    <link rel="stylesheet" href="../css/bell.css">
    <link rel="icon" href="../img/logo.png">
    
    <?php
    include("action.php");
    if (isset($_POST['modifier'])){
        $ID_TACHE = $_POST['ID_TACHE'];
        $SUJET = $_POST['SUJET'];
        $DATETIME_T = $_POST['DATETIME_T'];
        $OBSERVATION_T = $_POST['OBSERVATION_T'];
        $STATUT = $_POST['STATUT'];
    try{
        $sql=("UPDATE taches SET SUJET = :SUJET, DATETIME_T = :DATETIME_T, OBSERVATION_T = :OBSERVATION_T, STATUT = :STATUT WHERE ID_TACHE= :ID_TACHE");
        $stmt=$db->prepare($sql);
        $stmt->bindParam(":SUJET", $SUJET);
        $stmt->bindParam(":DATETIME_T", $DATETIME_T);
        $stmt->bindParam(":OBSERVATION_T", $OBSERVATION_T);
        $stmt->bindParam(":STATUT", $STATUT);
        $stmt->bindParam(":ID_TACHE", $ID_TACHE);
        $stmt->execute();
            header('location: mestaches.php');
    }catch(PDOException $e){
            echo" suppression echouee: ".$e->getMessage();
    exit;
    }
}
    
?>
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
            <!-- <a class="breadcrumb-item" href="../">dasboard</a> -->
            <span class="breadcrumb-item active" aria-current="page">tasks</span>
        </nav>
               <!------row second---->
               <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card row" style="min-height: 485px;">
                    <div class="card-header card-header-text">
                        <span class="card-title">tasks list</span>


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
                    $id=$_SESSION['user_id'];
                    $sql2="SELECT * FROM membres,taches WHERE  taches.ID_STAGIAIRE=membres.id AND membres.id='$id'";
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
                                <a href="view.php?id=<?php echo $row2["ID_TACHE"]?>" class="m-2" data-bs-toggle="modal" data-bs-target="#tache<?php echo $row2["ID_TACHE"]?>"><i class="fa fa-eye text-warning" aria-hidden="true"></i>
                                </th>
                            </tr>  

                            <div class="modal fade" id="tache<?php echo $row2["ID_TACHE"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">TACHE: <span class="text-primary"><?php echo $row2["SUJET"]?></span></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="" >
                                            <div class="modal-body">
                                                    <div class="col-md-12 border-right">
                                                            <div class="row mt-3">
                                                                <input type="hidden" class="form-control" name="ID_TACHE" value="<?php echo $row2["ID_TACHE"]?>">
                                                                <div class="col-md-12"><label class="labels" >sujet</label><input type="text" class="form-control" name="SUJET" value="<?php echo $row2["SUJET"]?>"></div>
                                                                <!-- <div class="col-md-12"><label class="labels" >statut</label><input type="text" class="form-control" placeholder="statut" value="<?php echo $row2["STATUT"]?>" name="STATUT"></div> -->
                                                                <label class="labels" >statut</label>
                                                                <select name="STATUT" id="">
                                                                    <option value="en cours">en cours</option>
                                                                    <option value="terminee">terminee</option>
                                                                    <option value="annulee">annulee</option>
                                                                </select>
                                                                <div class="col-md-12"><label class="labels" >observation</label><textarea class="form-control" placeholder="OBSERVATION"  name="OBSERVATION_T"><?php echo $row2["OBSERVATION_T"]?></textarea></div>
                                                                <div class="col-md-12"><label class="labels" >date</label><input type="datetime-local" class="form-control" name="DATETIME_T" id=""></div>
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

</body>
</html>
