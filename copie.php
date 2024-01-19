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

