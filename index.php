<!-- le stagiaire ne peut acceder a la page dashboard uniquement a tache-->
<?php
session_start();
if ($_SESSION['Rule']!= 'stagiaire') {
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="icon/css/all.min.css">
    <link rel="stylesheet" href="bs5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bell.css">
    <link rel="stylesheet" href="css/dash.css">
    <link rel="icon" href="img/logo.png">
    <script src="js/chart.js"></script>
  
    <style>
        #myChart{
            height: 330px !important;
            width: 100% !important; 
        }
        #myCircle{
            height: 330px !important;
            width: 90% !important; 
        }
    </style>
    

<?php
 //tache en cours
    include 'inc/connexion.php';

    $sql_encours="SELECT * FROM taches WHERE STATUT = 'en cours'";
    $result = $db->query($sql_encours);
    $count_encours = $result->rowCount();  
?>
 
<?php
 //tache terminee
    
    $sql_terminee="SELECT * FROM taches WHERE STATUT = 'terminee'";
    $result = $db->query($sql_terminee);
    $count_terminee = $result->rowCount();  
?>

<?php
 //tache annulee
    
    $sql_annulee="SELECT * FROM taches WHERE STATUT = 'annulee'";
    $result = $db->query($sql_annulee);
    $count_annulee = $result->rowCount();  
?>
           

<?php
    //boucle pour mettre les donnees dans 2 tableaux

    foreach ($result as $data){
        $months[] = $data['STATUT'];
        $number[] = $data['ID_TACHE'];
    }

    $months = [ "terminee","en cours", "annulee"];

    $number = [ $count_terminee, $count_encours, $count_annulee];
    

?>
</head>
<body>
    
    <div class="wrapper">
        <div class="body-overlay"></div>
        <!-------sidebar---->
        <?php
        include("layouts/sidebar.php");
        
        ?>

        <!--page content--->
        <div id="content">
            <!--top--navbar--design-->
         <?php
        include("layouts/nav1.php");
        ?>

        <!------main content-les tables du bas---->
        <div class="main-content">
        <?php
        include("layouts/card.php");
        ?>

            <!------row second---->
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="card" style="min-height: 485;">
                    <div class="card-header card-header-text">
                        <h4 class="card-title"> statistique des taches</h4>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div> 
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="card" style="min-height: 485;">
                    <div class="card-header card-header-text">
                        <h4 class="card-title"> statistique des presences</h4>
                    </div>
                </div>
                 <div class="card">
                    <div>
                        <canvas id="myCircle"></canvas>
                    </div>



<?php
 //tache en cours
    include 'inc/connexion.php';

    $spl_present="SELECT * FROM presence WHERE DATE = CURDATE() AND STATUT = 'present'  ";
    $result = $db->query($spl_present);
    $count_present = $result->rowCount();  
?>
 
<?php
 //tache terminee
    
    $sql_absent="SELECT * FROM presence WHERE  DATE = CURDATE() AND STATUT = 'absent' ";
    $result = $db->query($sql_absent);
    $count_absent = $result->rowCount();  
?>

<?php
 //tache annulee
    
    $sql_permissionnaire="SELECT * FROM presence  WHERE DATE = CURDATE() AND STATUT = 'permissionnaire' ";
    $result = $db->query($sql_permissionnaire);
    $count_permissionnaire = $result->rowCount();  
?>
           

<?php
    //boucle pour mettre les donnees dans 2 tableaux

    foreach ($result as $data){
        $statut2[] = $data['STATUT'];
        $number2[] = $data['ID_PRESENCE'];
    }

    $statut2 = ["present", "absent", "permissionnaire"];

    $number2 = [$count_present, $count_absent, $count_permissionnaire];
    

    ?>

<script>
const labels2 = <?php echo json_encode($statut2) ?>;

const data2 = {
  labels: [
    'Present',
    'Absent',
    'Permissionnaire'
  ],
  datasets: [{
    label: 'Nombre',
    data: <?php echo json_encode($number2) ?>,
    backgroundColor: [
      'rgb(85, 222, 64, 0.8)',
      'rgb(237, 26, 26, 0.8)',
      'rgb(250, 150, 2)'
    ],
    hoverOffset: 4
  }]
};

const config2 = {
  type: 'doughnut',
  data: data2,
};
 
</script>
<script>
    const myChart2 = new Chart(
        document.getElementById('myCircle'),
        config2
    );
</script>


    </div>
        </div>
            <div class="col-lg-12 col-md-12">
            <div class="card" style="min-height: 485px;">
                <div class="card-header card-header-text">
                    <h4 class="card-title">liste de projets</h4>
                    <p class="category">projets en cours</p>
                </div>
                <div class="card-content table responsive">
                        <div class="table-responsive">
                            <table class="table table-striped
                            table-hover	
                            table-borderless
                            table-primary
                            align-middle">
                                <thead class="text-primary">
                                    <caption>Table Name</caption>
                                    <tr>
                                        <th>libelle</th>
                                        <th>description</th>
                                        <th>ordonnee</th>
                                        <th>date de debut</th> 
                                        <th>date de fin</th> 
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        include('inc/connexion.php');
                                        $sql2="SELECT * FROM equipe, projet WHERE STATUT='En cours' AND projet.id_equipe=equipe.id_equipe";
                                        $result2=$db->query($sql2);
                                        if($result2->rowCount()>0){
                                        while($row2=$result2->fetch(PDO::FETCH_ASSOC)){?>


                                                        <tr>
                                                            <td><?php echo $row2["NOM_PROJET"]?></td> 
                                                            <td><?php echo $row2["DESCRIPTION"]?></td> 
                                                            <td><?php echo $row2["STATUT"]?></td> 
                                                            <td><?php echo $row2["DATE_DEBUT"]?></td> 
                                                            <td><?php echo $row2["DATE_FIN"]?></td> 

                                                        </tr>
                                    <?php }} ?>  

                                    </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>

    </div>
</div>


     </div>
    </div>

    <script>
        const labels = <?php echo json_encode($months) ?>;

        const data = {
            labels: labels,
            datasets: [{
                label: 'tache',
                backgroundColor: [

                    'rgba(0, 200, 43, 0.8)',
                    'rgba(0, 149, 242, 0.8)',
                    'rgba(255, 0, 0, 0.8)'
                ],

                borderColor: [

                    'rgba(0, 200, 43, 0.8)',
                    'rgba(0, 149, 242, 0.8)',
                    'rgba(235, 0, 0, 0.8)'
                ],
                borderWidth: 1,

                data: <?php echo json_encode($number) ?>,
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'easeInCubic',
                        from: 1,
                        to: 0,
                        loop: true
                    }                
                },
                scales: {
                    y:{
                        beginAtZero: true
                    }
                }
            }
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

    
    <!-----html code compleate--->
    <script src="bs5/js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
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



    <?php 
}else {
    header('location:taches/mestaches.php');
}
?>