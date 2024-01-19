<?php
    session_start();

if(isset($_SESSION['username'])){
    
    if($_POST['key']){

         include '../http/db_conn.php';
        $key = "%{$_POST['key']}%";

        $sql = "SELECT * FROM membres WHERE username LIKE ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$key]);

        if($stmt->rowCount()>0){
            $users = $stmt-> fetchAll();
            
            foreach($users as $user){
                if($user['id'] == $_SESSION['user_id']) continue ;
            ?>
    <li class="list-group-item">
                    <a href="chat.php?user=<?=$user['id']?>"
                        class="d-flex
                            justify-content-between
                            align-items-center p-2">
                        <div class="d-flex
                                align-items-center">
                                <img src="uploads/<?=$user['p_p']?>" alt=""
                                class="w-10 rounded-circle">
                                <h3 class="fs-xs m-2"><?=$user['username']?></h3>
                        </div>
                    </a>
                </li>
        <?php }}else{ ?>
            <div class="alert alert-info text-center">
                <i class="fa fa-user-times d-block fs-big" aria-hidden="true"></i>
                    The user "<?=htmlspecialchars($_POST['key'])?>"
                    is not found.
            </div>
        <?php }

    }
}else{
    header("location: ../../index.php");
}
?>