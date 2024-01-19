<?php
    session_start();

    if(!isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat-app-login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="icon/css/all.min.css">
    <link rel="stylesheet" href="bs5/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../img/logo.png">
</head>
<body class="d-flex
            justify-content-center
            align-items-center
            vh-100">
    <div class="w-400 p-5 shadow rounded">
        <form method="POST" action="app/http/auth.php">
            <div class="d-flex
                        justify-content-center
                        align-items-center
                        flex-column">
                    <i class="fa fa-user" aria-hidden="true" class="w-50"></i>
                <h3 class="display-4 fs-1 text-center">LOGIN</h3>
            </div>

            <?php if(isset($_GET['error'])){?>
            <div class="alert alert-warning" role="alert">
              <?php echo htmlspecialchars($_GET['error']);?>
            </div>
            <?php } ?>
            
            <?php if(isset($_GET['success'])){?>
            <div class="alert alert-warning" role="alert">
              <?php echo htmlspecialchars($_GET['success']);?>
            </div>
            <?php } ?>
                <div class="mb-3">
                    <label for="" class="form-label">user name</label>
                    <input type="text" class="form-control" name="username">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">password</label>
                    <input type="password" class="form-control" name="password">
                   
                </div>

                <button type="submit" class="btn btn-primary">LOGIN</button>
                <a href="signup.php">sign up</a>
        </form>
    </div>
</body>
</html>

<?php
}else{

    header("location: home.php");
    // exit;

}
?>