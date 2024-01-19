
<?php
include("action.php");
//recuperons les donnees de la table taches

$sql= "SELECT * FROM membres,taches WHERE taches.ID_STAGIAIRE=membres.id";
$result= $db->query($sql);

// creons un ficher PDF avec  la bibliotheque FPDF
require ('../fpdf/fpdf.php');
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf-> SetFont('Arial', 'B', 16);
    $pdf-> cell( 40, 10, 'rapport sur les taches');

//ecriture des donnes dans le fichier PDF
    $pdf->Ln(20); //saut de ligne
    $pdf-> SetFont('Arial', 'B', 12);
    $pdf-> Cell(30, 10, 'ID_TACHE', 1);
    $pdf-> Cell(40, 10, 'NOM_STAGIAIRE', 1);
    $pdf-> Cell(30, 10, 'DATE_DEBUT', 1);
    $pdf-> Cell(50, 10, 'DATE_REMISE', 1);
    $pdf-> Cell(80, 10, 'SUJET', 1);
    $pdf-> Cell(30, 10, 'STATUT', 1);
    $pdf-> Ln();
    $pdf-> SetFont('Arial', 'B', 12);
while ($row=$result->fetch(PDO::FETCH_ASSOC)){
    //recuperons les donnes de chaque colonne

    $ID_TACHE = $row['ID_TACHE'];
    $NOM_STAGIAIRE = $row["username"];
    $DATE_DEBUT= $row['DATE_DEBUT'];
    $DATE_REMISE= $row ['DATE_REMISE'];
    $SUJET = $row['SUJET'];
    $STATUT = $row['STATUT'];

    //ecriture d'une ligne de tableau avec ces valeurs
    $pdf-> Cell(30, 10, $ID_TACHE, 1);
    $pdf-> Cell(40, 10, $NOM_STAGIAIRE, 1);
    $pdf-> Cell(30, 10, $DATE_DEBUT, 1);
    $pdf-> Cell(50, 10, $DATE_REMISE, 1);
    $pdf-> Cell(80, 10, $SUJET, 1);
    $pdf-> Cell(30, 10, $STATUT, 1);
    $pdf-> Ln();

}
    $pdf-> Output(); // envoyer le fichier pdf au navigateur
?>


