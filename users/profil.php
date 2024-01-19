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
                <div class="container rounded bg-white mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 border-right">
                        <?php
                            include("../inc/connexion.php");
                                $id=$_GET["id"];

                                $sql="SELECT * FROM membres WHERE id='$id'";
                                $result=$db->query($sql);
                                $row=$result->fetch(PDO::FETCH_ASSOC);

                                $sql2="SELECT * FROM profil WHERE ID_STAGIAIRE='$id'";
                                $result2=$db->query($sql2);
                                if($result2->rowCount()>0){
                                    while($row2=$result2->fetch(PDO::FETCH_ASSOC)){?>
                                     
                                        <form action="act.php" method="POST" enctype="multipart/form-data">
                                
                                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="<?php echo $row2['PHOTO'];?>"><span class="font-weight-bold"><?php echo $row["username"]?></span><span class="text-black-50"><?php echo $row["email"]?></span><span> </span></div>
                                            </div>
                                            <div class="col-md-5 border-right">
                                                <div class="p-3 py-5">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <h4 class="text-right">Ajouter un profil</h4>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-12"><label class="labels"></label><input type="hidden" class="form-control" name="id" value="<?php echo $row2["id"]?>"></div>
                                                        <div class="col-md-12"><label class="labels" >ecole frequente</label><input type="text" class="form-control" placeholder="enter your school" value="<?php echo $row2["ECOLE"]?>" name="ECOLE"></div>
                                                        <div class="col-md-12"><label class="labels" >diplome a obtenir</label><input type="text" class="form-control" placeholder="enter your degree" value="<?php echo $row2["DIPLOME"]?>" name="DIPLOME"></div>
                                                        <div class="col-md-12"><label class="labels" >niveau</label><input type="text" class="form-control" placeholder="level+ filiere" value="<?php echo $row2["NIVEAU"]?>" name="NIVEAU"></div>
                                                        <div class="col-md-12"><label class="labels" >date d'entree</label><input type="date" class="form-control" placeholder="date d'entree" value="<?php echo $row2["DATE_DEBUT"]?>" name="DATE_DEBUT"></div>
                                                        <div class="col-md-12"><label class="labels" >date de sortir</label><input type="date" class="form-control" placeholder="date de sortir" value="<?php echo $row2["DATE_FIN"]?>" name="DATE_FIN"></div>
                                                    </div>
                                                         

                                                    <div class="mt-5 text-center">
                                                        <button class="btn btn-primary profile-button" type="submit" name="modifier">Save Profile</button>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="p-3 py-5">
                                                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                                                    
                                                    <div class="col-md-12"><label class="labels" >
                                                        <iframe src="<?php echo $row2['CV']?>" frameborder="0"></iframe> 
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- Modal trigger button -->
                                        <!-- <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
                                          modifier vos fichiers
                                        </button> -->
                                        
                                        <!-- Modal Body -->
                                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                        <!-- <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="act.php" method="POST">
                                                        <div class="modal-body">
                                                            <div class="col-md-12"><label class="labels" >photo de profil</label><input type="file" class="form-control" placeholder="photo" name="PHOTO"></div> <br>
                                                            <div class="col-md-12"><label class="labels" >votre CV</label><input type="file" class="form-control" placeholder="CV" name="CV"></div>
                                                        
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save</button>
                                                        </div> 
                                                   </form>
                                                </div>
                                            </div>
                                        </div> -->
                                        
                                        
                                        

                                    <?php
                                }
                                }else{?>
                            
                                <form action="act.php" method="POST" enctype="multipart/form-data">
                        
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $row["username"]?></span><span class="text-black-50"><?php echo $row["email"]?></span><span> </span></div>
                                    </div>
                                    <div class="col-md-5 border-right">
                                        <div class="p-3 py-5">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h4 class="text-right">Profile Settings</h4>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12"><label class="labels"></label><input type="text" class="form-control" name="id" value="<?php echo $row["id"]?>"></div>
                                                <div class="col-md-12"><label class="labels" >ecole frequente</label><input type="text" class="form-control" placeholder="enter your school" value="" name="ECOLE"></div>
                                                <div class="col-md-12"><label class="labels" >diplome a obtenir</label><input type="text" class="form-control" placeholder="enter your degree" value="" name="DIPLOME"></div>
                                                <div class="col-md-12"><label class="labels" >niveau</label><input type="text" class="form-control" placeholder="level+ filiere" value="" name="NIVEAU"></div>
                                            </div>
                                            
                                            <div class="mt-5 text-center">
                                                <button class="btn btn-primary profile-button" type="submit" name="valider">Save Profile</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-3 py-5">
                                        <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                                            <div class="col-md-12"><label class="labels" >Date d'entrer</label><input type="date" class="form-control" placeholder="photo" value="" name="DATE_DEBUT"></div> <br>
                                            <div class="col-md-12"><label class="labels" >Date de sortir</label><input type="date" class="form-control" placeholder="CV" value="" name="DATE_FIN"></div>
                                            <div class="col-md-12"><label class="labels" >photo de profil</label><input type="file" class="form-control" placeholder="photo" value="" name="PHOTO"></div> <br>
                                            <div class="col-md-12"><label class="labels" >votre CV</label><input type="file" class="form-control" placeholder="CV" value="" name="CV"></div>
                                        </div>
                                    </div>
                                </form>
                                <?php   
                                }
                                ?>

                    
                    </div>
                
                </div>
            </div>
        </div>
        

    <!---------footer---->
    <!-- <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <nav class="d-flex">
                        <ul class="m-0 p-0">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">compagny</a></li>
                        <li><a href="#">portfolio</a></li>
                        <li><a href="#">blogs</a></li>
                        <li><a href="#">Home</a></li>
                        </ul>

                    </nav>
                </div>

                <div class="col-md-6">
                    <p class="copyright d-flex justify-content-end">&copy 2023 Design By
                    <a href="#"> vishweb Design</a>bootstrap template</p>
                </div>
            </div>
        </div>

    </footer> -->
     </div>
    </div>


    <!-----html code compleate--->
    <script src="../bs5/js/bootstrap.min.js"></script>
    <script src="../bs5/js/bootstrap.js"></script>
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
    <!-- Optional: Place to the bottom of scripts -->
    <script>
            const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
        
        </script>
</body>
</html>

