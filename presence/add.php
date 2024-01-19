



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
            <nav class="breadcrumb">
                <a class="breadcrumb-item" href="../">dashboard</a>
                <span class="breadcrumb-item active" aria-current="page">presences</span>
            </nav>
            <!------row second---->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        
                        <form action="action.php" method="POST">
                            <div class="card row" style="min-height: 485px;">
                                <div class="card-header card-header-text">
                                    <span class="card-title">users list</span>
                                    <button type="submit" class="btn btn-warning" style="float: right;" name="valider"><i class="fa fa-plus-circle" aria-hidden="true"></i> valider</button>

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
                                                        
                                                        <!-- <th>EQUIPE</th> -->
                                                        <th>PRESENCE</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                            <?php
                                                            include('../inc/connexion.php');
                                                            
                                                            $sql="SELECT * FROM membres WHERE Rule='stagiaire'";
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
                                                        
                                                            <!-- <th><?php echo $row["nom_equipe"]?></th> -->
                                                            <th> 
                                                                <input type="hidden" name="ID_STAGIAIRE[]" value="<?php echo $row['id']?>">
                                                                <select name="statut[]" class="form-select">
                                                                    <option value="present">present</option>
                                                                    <option value="absent">absent</option>
                                                                    <option value="permissionnaire">permissionnaire</option>
                                                                </select>
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
                                        
                                        
                                        </div>
                            </div>
                        </form>
                    </div>

                </div>
        </div>
        </div>

    <!---------footer---->
    <footer class="footer">
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

    </footer>
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
