<?php
    // session_start();

if(isset($_SESSION['user_id'])){
         include 'app/http/db_conn.php';
         include 'app/helpers/users.php';
         include 'app/helpers/chat.php';
         include 'app/helpers/opened.php';
         include 'app/helpers/timeAgo.php';

         if(!isset($_GET['user'])){
            header("location: home.php");
            exit;
         }

         $chatWith = getUser($_GET['user'], $conn);

         if(empty($chatWith)){
            header("location: home.php");
            exit;
         }

         $chats = getChats($_SESSION['user_id'], $chatWith['id'], $conn);

         opened($chatWith['id'], $conn, $chats);
       
    
?>      
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat-app home</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="icon/css/all.min.css">
    <link rel="stylesheet" href="bs5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bell.css">
    <link rel="stylesheet" href="../css/dash.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../img/logo.png">
</head>
<body class="">

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
                include('../layouts/nav1.php');
            ?>

            <div class="w-400 shadow p-4 rounded">
               <a href="home.php" class="fs-4 link-dark">&#8592;</a>
                    <div class="d-flex align-items-center">
                        <img src="uploads/<?=$chatWith['p_p']?>"
                                class="w-15 rounded-circle" alt="">

                                <h3 class="display-4 fs-sm m-2"><?=$chatWith['username']?> <br> 
                                    <div class="d-flex align-items-center"
                                                title="online">
                                                <?php
                                                    if(last_seen($chatWith['last_seen']) == "Active"){
                                                ?>
                                                    <div class="online"></div>
                                                    <small class="d-block p-1">Online</small>
                                                <?php }else{ ?>
                                                    <small class="d-block p-1">
                                                        Last Seen:
                                                        <?=last_seen($chatWith['last_seen'])?></small> 
                                                <?php } ?>
                                    </div>
                                </h3>
                    </div>
                    <div class="shadow p-4 rounded
                                d-flex flex-column
                                mt-2 chat-box"
                                id="chatBox">
                                <?php 
                                    if(!empty ($chats)){
                                        foreach($chats as $chat){
                                            if($chat['from_id'] == $_SESSION['user_id']){?>
                                            <p class="rtext align-self-end
                                                border rounded p-2 mb-1">
                                                    <?=$chat['message']?>
                                                <small class="d-block"><?=$chat['created_at']?></small>
                                            </p>
                                            <?php }else{?>
                                            <p class="ltext 
                                                border rounded p-2 mb-1">
                                                <?=$chat['message']?>
                                                <small class="d-block"><?=$chat['created_at']?></small>
                                            </p>
                                            <?php }
                                        }
                                 }else{?>
                                        <div class="alert alert-info">
                                            <i class="fa fa-comment d-block fs-big" aria-hidden="true"></i>
                                        A simple info alert—check it out!
                                        </div>

                            <?php } ?>
                    </div>
                    <div class="input-group mb-3">
                        <textarea cols="3" id="message" class="form-control"></textarea>
                        <button class="btn btn-primary"
                                        id="sendBtn">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        </button>
                    </div>
            </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        var scrollDown = function(){
            let chatBox = document.getElementById('chatBox');
            chatBox.scrollTop = chatBox.scrollHeight;   
        }
        scrollDown();
        $(document).ready(function(){
            $("#sendBtn").on('click', function(){
                message = $("#message").val();
                if(message == "") return;

                $.post("app/ajax/insert.php", 
                {
                    message: message,
                    to_id: <?=$chatWith['id']?>

                },
                    function(data, status){
                        $("#message").val("");
                        $("#chatBox").append(data);
                        scrollDown();
                    });
            });

            let lastSeenUpdate = function(){
                $.get("app/ajax/update_last_seen.php");
            }

            
            lastSeenUpdate();

            setInterval(lastSeenUpdate, 10000);

            let fechData = function(){
                $.post("app/ajax/getMessage.php",
                {
                    id_2: <?=$chatWith['id']?>
                },
                    function(data, status){
                        $("#chatBox").append(data);
                            if (data != " ") scrollDown();
                       
                    });
            }
            fechData();
            setInterval(fechData, 500);


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