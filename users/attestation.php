<?php
include("action1.php");

//recuperons les donnees de la table taches
$id = $_GET["id"];

$sql= "SELECT * FROM membres,profil WHERE profil.ID_STAGIAIRE=membres.id AND membres.id='$id'";
$sql2= "SELECT * FROM membres,themes WHERE themes.id_stagiaire=membres.id AND membres.id='$id'";

$result= $db->query($sql);
$result2= $db->query($sql2);

$row=$result->fetch(PDO::FETCH_ASSOC);
$row2=$result2->fetch(PDO::FETCH_ASSOC);

$nom = $row['username'];
$city = $row['city'];
$date_debut = date("d, M Y", strtotime($row['DATE_DEBUT']));
$date_fin = date("d, M Y", strtotime($row['DATE_FIN']));
$nom_theme = $row2['nom_theme'];
$date = date('y-m-d');


// creons un ficher PDF avec  la bibliotheque FPDF
require ('../fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage('A4');

$pdf->SetLineWidth(1);


$pdf->Image('../img/o4.jpg', 00, 00, 297, 210); // pousse a gauche, en haut,  pousse a droite, monter le bas pour le haut uniquement
$pdf->SetY(20);
$pdf->Image('../img/gg.png' , 19, 11, 70, 65);// l'espace ,desendre, taille ecriture,
$pdf->Ln(25);
$pdf->Image('../img/dd.png' , 205, 11, 70, 65);


$pdf->Image('../img/logo_svg.png', ($pdf->GetPageWidth() / 2) - 10, 40, 20, 30, 'PNG'); //le logo


$pdf->SetDrawColor(0, 0, 0, 0);
$pdf->Image('../img/inn-op.png',  50, 70, 199, 120 ); //image centre filigranePour augmenter la taille de l'image, vous pouvez modifier les deux derniers chiffres de la fonction Image. Le troisième chiffre contrôle la position verticale de l'image, alors que le quatrième chiffre contrôle sa taille.

$pdf->SetDrawColor(0, 0, 0, 0);

$pdf->Ln(40);



//ecrire dans l'attestation

$pdf-> SetFont('times', 'BU', 18);

//TITRE
$pdf-> SetTextColor(255, 165, 0);
$pdf->SetDrawColor(255,165,0);
$pdf->cell( 0, 10, 'ATTESTATION DE FIN DE STAGE ACADEMIQUE', '', 1, 'C');
$pdf->SetTextColor(255,165,0);

$pdf->Ln(05); 



$pdf-> SetFont('Arial', '', 12);
$pdf-> SetTextColor(0, 0, 0);
$h = 7; //hauteur

$retrait = " ";



// $pdf->cell(40, 10,'Nous soussignes, INOV CAMEROON SARL, ');
$pdf->write($h, $retrait . utf8_decode("Nous soussignés, "));

$pdf-> SetFont('Arial', 'B', 12);
$pdf-> SetTextColor(255, 165, 0);
$pdf->Write($h, $retrait ."INOV CAMEROON SARL, ");
$pdf-> SetTextColor(0, 0, 0);


$pdf-> SetFont('Arial', '', 12);//pour la police du reste 
$pdf->Write($h, $retrait . utf8_decode("certifions par la présente attestation que  "));
$pdf->SetFont('Arial', 'B', 12);
$pdf->Write($h, $nom);
$pdf->SetFont('Arial', '', 12);

$pdf->write($h, $retrait . utf8_decode("étudiant(e) au campus de "));
$pdf->SetFont('Arial', 'B', 12);
$pdf->Write($h, $city);
$pdf->SetFont('Arial', '', 12);

$pdf->Write($h, $retrait. utf8_decode(", a effectué un  stage académique dans notre entreprise du "));
$pdf->SetFont('Arial', 'B', 12);
$pdf->Write($h, $date_debut);

$pdf->Write($h, $retrait ."au ");
$pdf->SetFont('Arial', 'B', 12);
$pdf->Write($h, $date_fin.'.');
$pdf->Ln(10);


$pdf->SetFont('Arial', '', 12);
$pdf->Write($h, $retrait ."Au cours de son stage, ");
$pdf->SetFont('Arial', 'B', 12);
$pdf->Write($h, $nom);


$pdf->SetFont('Arial', '', 12);
$pdf->write($h, $retrait . utf8_decode("a travaillé sur le thème " ));
$pdf->SetFont('Arial', 'BI', 12);
$pdf->Write($h, '" '.$nom_theme.' "');

$pdf->SetFont('Arial', '', 12);
$pdf->write($h, $retrait . utf8_decode(". Elle/Il a fait preuve de compétence, de professionnalisme et d'initiative dans toutes les taches qui lui ont été confié(es). Son travail a été très apprécié dans l'ensemble de l'équipe."));
$pdf->Ln(10);
$pdf->write($h, $retrait . utf8_decode("Nous tenons à remercier " ));
$pdf->SetFont('Arial', 'B', 12);
$pdf->Write($h, $nom);
$pdf->SetFont('Arial', '', 12);


$pdf->write($h, $retrait . utf8_decode(" pour son travail tout au long de son stage. Nous sommes convaincus que les compétences et l'expérience qu'elle/il a acquises tout au long de son stage lui seront bénéfiques pour sa future carrière."));
$pdf->Ln(7);
$pdf-> cell( 0, 10, ' DOUALA LE, '.$date.'.' );
// $pdf->SetFont('Arial', 'B', 12);
// $pdf->Write($h, $date);
$pdf->Ln(00);

$pdf-> SetFont('Arial', 'BU', 12);
$pdf-> cell( 0, 10, 'DIRECTRICE GENERALE', 0,2, 'R');
$pdf->Ln(17);
$pdf-> SetFont('Arial', '', 12);
$pdf-> cell( 0, 10, 'ESTELLE NDEDI NZALLI', 0, 1, 'R');

$pdf->Image('../img/cah1.png' , 245, 160, 30, 18);
ob_end_clean();
$pdf->output();


?>
