<style>
    h6{
        color: blue;
        font-size: 10px;
    }

    .active-nav{
        background-color: rgba(33, 33, 33, 0.384);
    }
</style>
 <?php
    session_start(); 
    if(isset($_SESSION['username'])){
        include('../inc/connexion.php');  
        $ID=$_SESSION['user_id'];
        $sql = "SELECT * FROM profil WHERE ID_STAGIAIRE='$ID'";
        $result=$db->query($sql);
        $row=$result->fetch(PDO::FETCH_ASSOC);
        echo $_SESSION['user_id'];

        $url_actuel = dirname($_SERVER['PHP_SELF']);
?>

<?php if($_SESSION['Rule'] == 'admin'){?>

    <nav class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3>
        <img src="../users/<?php echo $row["PHOTO"];?>" class="img-thumbnail" width="200px" height="200px"> </br> <span> <?php echo $_SESSION['username'] ." "."<h6><b> est en ligne</b> </h6>"; ?></span></h3>
        </div>
        <ul class="list-unstyled components">
            <li class="   class="<?php echo ($url_actuel == '/stage' ? 'active-nav' : '') ?>"">
                <a href="../" class="dashboard"> <i class="fa fa-dashboard" aria-hidden="true"></i>
                <span>dashboard</span></a>
            </li>
            <div class="small-screen navbar-display">
                <li class="dropdown d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#homeSubmenu0" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <ul class="collapse list-unstyled menu" id="homeSubmenu0">
                            <li> <a href="#">you have 5 messages</a></li>
                            <li> <a href="#">you have 5 messages</a></li>
                            <li> <a href="#">you have 5 messages</a></li>
                            <li> <a href="#">you have 5 messages</a></li>
                            <li> <a href="#">you have 5 messages</a></li>
                        </ul>
                    
                </li>

                <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="../"><i class="fa fa-tasks" aria-hidden="true"></i> <span>apps</span></a>
                </li>
                <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span>param</span></a>
                </li>
                <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span>settings</span></a>
                </li>
                
            </div>
            <li class="dropdown menue">
            <a href="../users/index.php" data-toggle="collapse" aria-expanded="false" class="<?php echo ($url_actuel == '/stage/users' ? 'active-nav' : '') ?>" ><i class="fa fa-user" aria-hidden="true"></i>
                <span>users</span>
                <ul class="collapse list-unstyled menu" id="#pageSubmenu1">
                <li> <a href="#">Item1</a></li>
                <li> <a href="#">Item2</a></li>
                <li> <a href="#">Item3</a></li>
                    
                </ul>
            </li>

            <li class="dropdown menue">
                <a href="../taches/index.php"  data-toggle="collapse" aria-expanded="true" class="<?php echo ($url_actuel == '/stage/taches' ? 'active-nav' : '') ?>"><i class="fa fa-tasks" aria-hidden="true"></i>
                <span>taches</span>
                <ul class="collapse list-unstyled menu" id="#pageSubmenu2">
                <li> <a href="#">Item1</a> </li>
                <li> <a href="#">Item2</a> </li>
                <li> <a href="#">Item3</a></li>
                    
                </ul>
            </li>

            <li class="dropdown menue">
                <a href="../supervisor/index.php" data-toggle="collapse" aria-expanded="true"  class="<?php echo ($url_actuel == '/stage/supervisor' ? 'active-nav' : '') ?>"><i class="fa fa-low-vision" aria-hidden="true"></i></i>
                <span> supervisors</a></span>
                <ul class="collapse list-unstyled menu" id="#pageSubmenu3">
                <li> <a href="#"></a> Item1</li>
                <li> <a href="#"></a> Item2</li>
                <li> <a href="#"></a> Item3</li>
                    
                </ul>
            </li>

            <li class="dropdown menue">
                <a href="../projet/index.php" data-toggle="collapse" aria-expanded="true"   class="<?php echo ($url_actuel == '/stage/projet' ? 'active-nav' : '') ?>"><i class="fa fa-marker" aria-hidden="true"></i>
                <span> projets</span>
                <ul class="collapse list-unstyled menu" id="#pageSubmenu4">
                <li> <a href="#"></a> Item1</li>
                <li> <a href="#"></a> Item2</li>
                <li> <a href="#"></a> Item3</li>
                    
                </ul>
            </li>

            <li class="dropdown menue">
                <a href="../themes/index.php" data-toggle="collapse" aria-expanded="true"   class="<?php echo ($url_actuel == '/stage/themes' ? 'active-nav' : '') ?>"><i class="fa fa-address-book" aria-hidden="true"></i></i>
                <span> themes</span>
                <ul class="collapse list-unstyled menu" id="#pageSubmenu6">
                <li> <a href="#"></a> Item1</li>
                <li> <a href="#"></a> Item2</li>
                <li> <a href="#"></a> Item3</li>
                    
                </ul>
            </li>

            <li class="dropdown menue">
                <a href="../equipe/index.php" data-toggle="collapse" aria-expanded="true"   class="<?php echo ($url_actuel == '/stage/equipe' ? 'active-nav' : '') ?>"><i class="fa fa-users" aria-hidden="true"></i></i>
                <span> equipe</span>
                <ul class="collapse list-unstyled menu" id="#pageSubmenu6">
                <li> <a href="#"></a> Item1</li>
                <li> <a href="#"></a> Item2</li>
                <li> <a href="#"></a> Item3</li>
                    
                </ul>
            </li>

            <li class="dropdown menue">
                <a href="../presence/index.php" data-toggle="collapse" aria-expanded="true"  class="<?php echo ($url_actuel == '/stage/presence' ? 'active-nav' : '') ?>"><i class="fa fa-check-square" aria-hidden="true"></i>
                <span> presence</span>
                <ul class="collapse list-unstyled menu" id="#pageSubmenu6">
                <li> <a href="#"></a> Item1</li>
                <li> <a href="#"></a> Item2</li>
                <li> <a href="#"></a> Item3</li>
                    
                </ul>
            </li>

            <li class=" menue">
                <a href="../chat/chat.php"><i class="fa fa-commenting" aria-hidden="true"  class="<?php echo ($url_actuel == '/stage/chat' ? 'active-nav' : '') ?>"></i> <span>chat</span></a>
            </li>
        </ul>
    </nav>
<?php }?>

<?php if($_SESSION['Rule'] == 'stagiaire'){?>
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3>
        <img src="../users/<?php echo $row["PHOTO"];?>" class="img-thumbnail" width="200px" height="200px"> </br> <span> <?php echo $_SESSION['username'] ." "."<h6><b> est en ligne</b> </h6>"; ?></span></h3>
        </div>
        <ul class="list-unstyled components">
            <!-- <li class=""  class="<?php echo ($url_actuel == '/stage' ? 'active-nav' : '') ?>">
                 <a href="../" class="dashboard"> <i class="fa fa-dashboard" aria-hidden="true"></i>
                <span>dashboard</span></a> 
            </li> -->
            <div class="small-screen navbar-display">
                <li class="dropdown d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#homeSubmenu0" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <ul class="collapse list-unstyled menu" id="homeSubmenu0">
                            <li> <a href="#">you have 5 messages</a></li>
                            <li> <a href="#">you have 5 messages</a></li>
                            <li> <a href="#">you have 5 messages</a></li>
                            <li> <a href="#">you have 5 messages</a></li>
                            <li> <a href="#">you have 5 messages</a></li>
                        </ul>
                    
                </li>

                <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="../"><i class="fa fa-tasks" aria-hidden="true"></i> <span>apps</span></a>
                </li>
                <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span>param</span></a>
                </li>
                <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span>settings</span></a>
                </li>
                
            </div>
            

            <li class="dropdown">
                <a href="../taches/mestaches.php"  data-toggle="collapse" aria-expanded="true"  class="<?php echo ($url_actuel == '/stage/taches' ? 'active-nav' : '') ?>"><i class="fa fa-tasks" aria-hidden="true"></i>
                <span>Mes taches</span>
                <ul class="collapse list-unstyled menu" id="#pageSubmenu2">
                <li> <a href="#">Item1</a> </li>
                <li> <a href="#">Item2</a> </li>
                <li> <a href="#">Item3</a></li>
                    
                </ul>
            </li>

            <li class="dropdown">
                <a href="../projet/mesprojets.php" data-toggle="collapse" aria-expanded="true"  class="<?php echo ($url_actuel == '/stage/projet' ? 'active-nav' : '') ?>"><i class="fa fa-marker" aria-hidden="true"></i>
                <span> Mes projets</span>
                <ul class="collapse list-unstyled menu" id="#pageSubmenu4">
                <li> <a href="#"></a> Item1</li>
                <li> <a href="#"></a> Item2</li>
                <li> <a href="#"></a> Item3</li>
                    
                </ul>
            </li>

            <li class="dropdown">
                <a href="../themes/mesthemes.php" data-toggle="collapse" aria-expanded="true"  class="<?php echo ($url_actuel == '/stage/themes' ? 'active-nav' : '') ?>"><i class="fa fa-address-book" aria-hidden="true"></i></i>
                <span>Mon theme</span>
                <ul class="collapse list-unstyled menu" id="#pageSubmenu6">
                <li> <a href="#"></a> Item1</li>
                <li> <a href="#"></a> Item2</li>
                <li> <a href="#"></a> Item3</li>
                    
                </ul>
            </li>

            <li class="dropdown">
                <a href="../equipe/monequipe.php" data-toggle="collapse" aria-expanded="true"  class="<?php echo ($url_actuel == '/stage/equipe' ? 'active-nav' : '') ?>"><i class="fa fa-users" aria-hidden="true"></i></i>
                <span> Mon equipe</span>
                <ul class="collapse list-unstyled menu" id="#pageSubmenu6">
                <li> <a href="#"></a> Item1</li>
                <li> <a href="#"></a> Item2</li>
                <li> <a href="#"></a> Item3</li>
                    
                </ul>
            </li>


            <li class="">
                <a href="../chat/chat.php"><i class="fa fa-commenting" aria-hidden="true"  class="<?php echo ($url_actuel == '/stage/chat' ? 'active-nav' : '') ?>"></i> <span>chat</span></a>
            </li>
            <li class="class">
                <a href="../users/profil.php?id=<?php echo $_SESSION["user_id"]?>""><i class="fa fa-eye" aria-hidden="true" class="<?php echo ($url_actuel == '/stage/chat' ? 'active-nav' : '') ?>"></i> <span>Modifier votre profil</span></a>
            </li>
        </ul>
    </nav>

<?php }?>

<?php if($_SESSION['Rule'] == 'encadreur'){?>
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3>
        <img src="../users/<?php echo $row["PHOTO"];?>" class="img-thumbnail" width="200px" height="200px"> </br> <span> <?php echo $_SESSION['username'] ." "."<h6><b> est en ligne</b> </h6>"; ?></span></h3>
        </div>
        <ul class="list-unstyled components">
            <li class=""  class="<?php echo ($url_actuel == '/stage' ? 'active-nav' : '') ?>">
                <a href="../" class="dashboard"> <i class="fa fa-dashboard" aria-hidden="true"></i>
                <span>dashboard</span></a>
            </li>
            <div class="small-screen navbar-display">
                <li class="dropdown d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#homeSubmenu0" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <ul class="collapse list-unstyled menu" id="homeSubmenu0">
                            <li> <a href="#">you have 5 messages</a></li>
                            <li> <a href="#">you have 5 messages</a></li>
                            <li> <a href="#">you have 5 messages</a></li>
                            <li> <a href="#">you have 5 messages</a></li>
                            <li> <a href="#">you have 5 messages</a></li>
                        </ul>
                    
                </li>

                <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="../"><i class="fa fa-tasks" aria-hidden="true"></i> <span>apps</span></a>
                </li>
                <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span>param</span></a>
                </li>
                <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span>settings</span></a>
                </li>
                
            </div>
            <li class="dropdown">
            <a href="../users/index.php" data-toggle="collapse" aria-expanded="false"  class="<?php echo ($url_actuel == '/stage/users' ? 'active-nav' : '') ?>"><i class="fa fa-user" aria-hidden="true"></i>
                <span>users</span>
                <ul class="collapse list-unstyled menu" id="#pageSubmenu1">
                <li> <a href="#">Item1</a></li>
                <li> <a href="#">Item2</a></li>
                <li> <a href="#">Item3</a></li>
                    
                </ul>
            </li>

            <li class="dropdown">
            <a href="../taches/index.php"  data-toggle="collapse" aria-expanded="true"  class="<?php echo ($url_actuel == '/stage/taches' ? 'active-nav' : '') ?>"><i class="fa fa-tasks" aria-hidden="true"></i>
                <span>taches</span>
                <ul class="collapse list-unstyled menu" id="#pageSubmenu2">
                <li> <a href="#">Item1</a> </li>
                <li> <a href="#">Item2</a> </li>
                <li> <a href="#">Item3</a></li>
                    
                </ul>
            </li>

        
            

            <li class="dropdown">
                <a href="../projet/index.php" data-toggle="collapse" aria-expanded="true"  class="<?php echo ($url_actuel == '/stage/projet' ? 'active-nav' : '') ?>"><i class="fa fa-marker" aria-hidden="true"></i>
                <span> projets</span>
                <ul class="collapse list-unstyled menu" id="#pageSubmenu4">
                <li> <a href="#"></a> Item1</li>
                <li> <a href="#"></a> Item2</li>
                <li> <a href="#"></a> Item3</li>
                    
                </ul>
            </li>

            <li class="dropdown">
                <a href="../themes/index.php" data-toggle="collapse" aria-expanded="true"  class="<?php echo ($url_actuel == '/stage/themes' ? 'active-nav' : '') ?>"><i class="fa fa-address-book" aria-hidden="true"></i></i>
                <span> themes</span>
                <ul class="collapse list-unstyled menu" id="#pageSubmenu6">
                <li> <a href="#"></a> Item1</li>
                <li> <a href="#"></a> Item2</li>
                <li> <a href="#"></a> Item3</li>
                    
                </ul>
            </li>

            <li class="dropdown">
                <a href="../equipe/index.php" data-toggle="collapse" aria-expanded="true"  class="<?php echo ($url_actuel == '/stage/equipe' ? 'active-nav' : '') ?>"><i class="fa fa-users" aria-hidden="true"></i></i>
                <span> equipe</span>
                <ul class="collapse list-unstyled menu" id="#pageSubmenu6">
                <li> <a href="#"></a> Item1</li>
                <li> <a href="#"></a> Item2</li>
                <li> <a href="#"></a> Item3</li>
                    
                </ul>
            </li>

            <li class="dropdown">
                <a href="../presence/index.php" data-toggle="collapse" aria-expanded="true"  class="<?php echo ($url_actuel == '/stage/presence' ? 'active-nav' : '') ?>"><i class="fa fa-check-square" aria-hidden="true"></i>
                <span> presence</span>
                <ul class="collapse list-unstyled menu" id="#pageSubmenu6">
                <li> <a href="#"></a> Item1</li>
                <li> <a href="#"></a> Item2</li>
                <li> <a href="#"></a> Item3</li>
                    
                </ul>
            </li>

            <li class="">
                <a href="../chat.php"><i class="fa fa-commenting" aria-hidden="true"  class="<?php echo ($url_actuel == '/stage/chat' ? 'active-nav' : '') ?>"></i> <span>chat</span></a>
            </li>
        </ul>
    </nav>

<?php }?>

<?php
}
else{
    header('location: ../login.php');
}
?>

