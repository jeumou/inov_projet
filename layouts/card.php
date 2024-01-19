<div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-starts">
                        <div class="card-header">
                            <div class="icon icon-warning">
                                <span> <span class="fa fa-users" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="card-content">
                            <p class="category"><strong>stagiaires</strong></p><?php

                                include('inc/connexion.php');
                                    $sql="SELECT * FROM membres WHERE Rule='stagiaire'";
                                    $result=$db->query($sql);
                                    $count=$result->rowCount();  
                                        ?>
                            <h3 class="card-title" ><?php echo $count?>

                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="starts"> 
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <a href="users">voir la liste</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-starts">
                        <div class="card-header">
                            <div class="icon icon-success">
                            <span class="fa fa-tasks" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="card-content">
                            <p class="category"><strong>taches</strong></p><?php
                            
                                $sql="SELECT * FROM taches";
                                $result=$db->query($sql);
                                $count=$result->rowCount();  
                                    ?>
                            <h3 class="card-title" ><?php echo $count?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="starts">
                            <i class="fa fa-eye"></i>
                                <a href="taches">voir les taches</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-starts">
                        <div class="card-header">
                            <div class="icon icon-rose">
                            <span class="fa fa-user-secret"></span><!--<span><i class="fa fa-pencil" aria-hidden="true"></i>money</span>-->
                            </div>
                        </div>
                        <div class="card-content">
                            <p class="category"><strong>superviseurs</strong></p><?php

                                $sql="SELECT * FROM supervisor";
                                $result=$db->query($sql);
                                $count=$result->rowCount();  
                                    ?>
                            <h3 class="card-title" ><?php echo $count?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="starts">
                            <i class="fa fa-eye"></i><!--<i class="fa fa-" aria-hidden="true"></i><span>info</span>-->
                                <a href="supervisor">voir la liste</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-starts">
                        <div class="card-header">
                            <div class="icon icon-rose">
                            <span class="fa fa-users"></span><!--<span><i class="fa fa-pencil" aria-hidden="true"></i>money</span>-->
                            </div>
                        </div>
                        <div class="card-content">
                            <p class="category"><strong>equipes</strong></p><?php

                            $sql="SELECT * FROM equipe";
                            $result=$db->query($sql);
                            $count=$result->rowCount();  
                                ?>
                            <h3 class="card-title" ><?php echo $count?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="starts">
                            <i class="fa fa-eye"></i><!--<i class="fa fa-" aria-hidden="true"></i><span>info</span>-->
                                <a href="equipe">voir les equipes</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



               <!-- <div class="col-lg-5 col-md-12">
                <div class="card" style="min-height:485">
                    <div class="card-header card-header-text">
                        <h4 class="card-title"> activities</h4>
                    </div>
                </div>
                <div class="card-content">
                    <div class="steamline">
                        <div class="sl-item sl-primary">
                            <div class="sl-content">
                                <small class="text-muted">5 min ago</small>
                                <p>williams add</p>
                            </div>
                        </div>

                        <div class="sl-item sl-danger">
                            <div class="sl-content">
                                <small class="text-muted">25 min ago</small>
                                <p>john add</p>
                            </div>
                        </div>



                        < <div class="sl-item">
                            <div class="sl-content">
                                <small class="text-muted">45 min ago</small>
                                <p>mariam add</p>
                            </div>
                        </div> -->

                        <!-- <div class="sl-item sl-warning">
                            <div class="sl-content">
                                <small class="text-muted">55 min ago</small>
                                <p>williams share a folter</p>
                            </div>
                        </div> -->
                    <!-- </div>

                </div>
            </div> -->
<!-- <div class="col-lg-5 col-md-12">
    <div class="carde" style="min-height:400">
        <div class="card-header card-header-text"> -->