

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <link rel="stylesheet" href="../bs5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bell.css">
    <link rel="stylesheet" href="../css/dash.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../img/logo.png">
    
</head>
<body>
     <!--tout celui de gauche-->
     <div class="wrapper">
        <div class="body-overlay"></div>
       <?php
       include('../layouts/sidebar1.php');
       ?>
<?php

if(isset($_SESSION['user_id'])){
    include 'app/http/db_conn.php';
    include 'app/helpers/users.php';
    include 'app/helpers/conversations.php';
    include 'app/helpers/timeAgo.php';
    include 'app/helpers/last_chat.php';
   

    $user = getUser($_SESSION['user_id'], $conn);
    $conversations = getConversation($user['id'], $conn);

    // print_r($conversations);
    include('../inc/connexion.php');  
     foreach($conversations as $conversation){
        $ID=$conversation['id'];

     }
    $sql = "SELECT * FROM profil WHERE ID_STAGIAIRE='$ID'";
    $result=$db->query($sql);
    $row=$result->fetch(PDO::FETCH_ASSOC);
    
    $url_actuel = dirname($_SERVER['PHP_SELF']);
?>




        <!--fin gauche-->
        <div id="content">
            <!--top--navbar--design-->
        <div class="top-navbar">
            <?php
       include('../layouts/nav1.php');
       ?>

        <!------main content-les tables du bas---->
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-starts">
                        <!-- paste template here !!!!   -->
                        <div class="m-5 w-400 rounded shadow">
                            <div>    
                                <div class="d-flex mb-3 p-3 bg-light justify-content-between align-items-center">
                                    <!-- <div class="d-flex align-items-center">
                                    <img src="../users/<?php echo $row["PHOTO"];?>" class=" w-10 rounded-circle">
                                        
                                                <h3 class="fs-xs m-2"><?=$user['username']?></h3> 
                                    </div> -->
                                    <!-- <a href="logout.php" class="btn btn-dark">logout</a> -->
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" placeholder="search..."
                                                        id="searchText"
                                                        class="form-control">
                                    <button class="btn btn-primary"
                                            id="searchBtn">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <ul id="chatList" class="list-group mvh-50 overflow-auto">
                                    <?php if(!empty($conversations)){?>
                                        <?php foreach($conversations as $conversation){?>
                                            <li class="list-group-item">
                                            <a href="chat.php?user=<?=$conversation['id']?>"
                                                class="d-flex
                                                    justify-content-between
                                                    align-items-center p-2">
                                                <div class="d-flex
                                                            align-items-center">
                      
                                                            <img src="../users/<?php echo $row["PHOTO"];?>" class="img-thumbnail w-10 rounded-circle">
                                                            <h3 class="fs-xs m-2"><?=$conversation['username']?><br>
                                                                <small>
                                                                <?php
                                                                    echo lastChat($_SESSION['user_id'], $conversation['id'], $conn);
                                                                ?>
                                                                </small>
                                                            </h3>
                                                </div>
                                                    <?php if(last_seen($conversation['last_seen']) == "Active"){?>
                                                            <div class="title">
                                                                <div class="online"></div>
                                                            </div>
                                                    <?php } ?>
                                            </a>
                                            </li>
                                    
                                    <?php } ?>
                                    <?php }else{ ?>
                                        <div class="alert alert-info text-center">
                                            <i class="fa fa-comments d-block fs-big" aria-hidden="true"></i>
                                            no message yet start
                                        </div>
                                    <?php } ?>
                                </ul>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/jquery.min.js"></script>
    

    <script>
      $(document).ready(function(){

            //pour la barre de recherche
            $("#searchText").on("input", function(){
                var searchText = $(this).val();

                if(searchText == "") return;
                
                $.post('app/ajax/search.php', {
                    key: searchText
                }, 
                function(data, status){
                    $("#chatList").html(data);
                });
            });
            //button

            $("#searchBtn").on("click", function(){
                var searchText = $("#searchText").val();
                if(searchText == "") return;
                
                $.post('app/ajax/search.php', {
                    key: searchText
                }, 
                function(data, status){
                    $("#chatList").html(data);
                });
            });
            
            let lastSeenUpdate = function(){
                $.get("app/ajax/update_last_seen.php");
            }

            
            lastSeenUpdate();

            setInterval(lastSeenUpdate, 10000);

});
    </script>



</body>
</html>

<?php
}else{

    header("location: index.php");
    exit;

}
?>

</body>
</html>