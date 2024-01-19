<?php
   session_start();

   if(isset($_POST['username'])&&
   isset($_POST['password']))
   {

    include 'db_conn.php';

    $password = $_POST['password'];
    $username = $_POST['username'];

   
 if(empty($username)){
    $em = "username is required";

    header("location: ../../index.php?error=$em");

 }else if(empty($password)){
    $em = "password is required";

    header("location: ../../index.php?error=$em");
 }else{
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);

    if($stmt->rowCount() === 1){
        $user = $stmt->fetch();
        if($user['username']=== $username){
            if(password_verify($password, $user['password'])){
                //ma session

                $_SESSION['username'] = $user['username'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['user_id'] = $user['user_id'];

                header("location: ../../home.php");
                
            }else{
                $em = "incorrect username or password";
                header("location: ../../index.php?error=$em");
            }

        }else{
            $em = "incorrect username or password";

            header("location: ../../index.php?error=$em");  
        }
    }
 }
    

}else{
    header("location: ../../index.php");
    
}
?>