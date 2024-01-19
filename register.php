<?php
    include('../inc/connexion.php');
    $sql2 = "SELECT membres.username, membres.email, membres.tel, membres.city, membres.rule, membres.id_equipe, presence.STATUT, presence.DATE, presence.HEURE_DEBUT, presence.HEURE_FIN FROM presence INNER JOIN membres ON presence.ID_STAGIAIRE = membres.id ";
    $result2=$db->query($sql2);
    if($result2->rowCount()>0){
    while($row2=$result2->fetch(PDO::FETCH_ASSOC)){?>

            <tbody>
        <tr>
                <td></td> 
                <option><?php echo $row2["ID_STAGIAIRE"]?></option>
                <option><?php echo $row2["STATUT"]?></option> 
                <option><?php echo $row2["STATUT"]?></option> 
                <option><?php echo $row2["DATE"]?></option> 
                <option><?php echo $row2["HEURE_DEBUT"]?></option> 
                <option><?php echo $rolw2["HEURE_FIN"]?></option> 

                <th>
                <a href="edit.php?id=<?php echo $row2["ID_PRESENCE"]?>">modifier</a>
                <a href="delete.php?id=<?php echo $row2["ID_PRESENCE"]?>" >supprimer</a>
               
                </th>
                
            </tr>
            <?php }} ?>  
    </select>
            </table>
        </th>
</tr> 

            <table>

                            </tbody>
    </table>
         </div>
                </main>
            </div>
            
            <?php
            //code edit
include("action.php");
if (isset($_POST['modifier'])){
    $ID_STAGIAIRE = $_POST['ID_STAGIAIRE'];
    $HEURE_DEBUT = $_POST['HEURE_DEBUT'];
    $HEURE_FIN = $_POST['HEURE_FIN'];
    $DATE = $_POST['DATE'];
    $STATUT = $_POST['STATUT'];

try{
$sql=("UPDATE presence SET  HEURE_DEBUT = :HEURE_DEBUT, HEURE_FIN = :HEURE_FIN, DATE = :DATE ,STATUT = :STATUT WHERE  ID_STAGIAIRE='$ID_STAGIAIRE' AND DATE='$DATE");
$stmt=$db->prepare($sql);
$stmt->bindParam(":ID_STAGIAIRE", $ID_STAGIAIRE);
$stmt->bindParam(":HEURE_DEBUT", $HEURE_DEBUT);
$stmt->bindParam(":HEURE_FIN", $HEURE_FIN);
$stmt->bindParam(":DATE", $DATE);
$stmt->bindParam(":STATUT", $STATUT);
$stmt->execute();
header('location: index.php');
}catch(PDOException $e){
    echo" la mise a jour a echouee: ".$e->getMessage();
exit;
}
}
    
?>
<form method="POST" action="" >
    <?php
     include('../inc/connexion.php');
     $ID_PRESENCE= $_GET['id'];
     $sql="SELECT * FROM membres WHERE id='$ID_STAGIAIRE";
     $result=$db->query($sql);
     if($result->rowCount()>0){
     while($row=$result->fetch(PDO::FETCH_ASSOC)){?>
     
        <label> date: <input type="date" name="DATE" value="<?php echo $row["DATE"]?>"></label></br>
        <label>heure_debut: <input type="time" name="HEURE_DEBUT" value="<?php echo $row["HEURE_DEBUT"]?>"></label></br>
        <label>heure_fin: <input type="time" name="HEURE_FIN" value="<?php echo $row["HEURE_FIN"]?>"></label></br>
        <label>statut: <input type="text" name="STATUT" value="<?php echo $row["STATUT"]?>"></label></br>
        <label>stagiaire: <input type="hidden" name="ID_STAGIAIRE" value="<?php echo $row["ID_STAGIAIRE"]?>"></label></br>
        <label>username: <input type="text" name="username" value="<?php echo $row["USERNAME"]?>"></label></br>
        <label>statut: <input type="text" name="STATUT" value="<?php echo $row["STATUT"]?>"></label></br>
        <label>equipe: <input type="number" name="ID_EQUIPE" value="<?php echo $row["ID_EQUIPE"]?>"></label></br>
        
        
        <button> <input type="submit" name="modifier"> </button>
        <?php }} ?> 
</form>
<!--code action-->
<?php
include('../inc/connexion.php');
// insertion de taches

if (isset($_POST['login'])) {
    $ID_STAGIAIRE = $_POST['ID_STAGIAIRE'];
    $HEURE_DEBUT = date('H:i:s');
    $HEURE_FIN = date('H:i:s');
    $DATE = date('Y-m-d');
    $STATUT = $_POST['STATUT'];

//inserer nos donnees dans notre bd
//gestion de taches insertion d'une nouvelle tache
try{
$sql="INSERT INTO presence (ID_STAGIAIRE, HEURE_DEBUT, HEURE_FIN, DATE, STATUT) VALUES(:ID_STAGIAIRE, :HEURE_DEBUT, :HEURE_FIN, :DATE, :STATUT)";
$stmt=$db->prepare($sql);
$stmt->bindParam(':ID_STAGIAIRE', $ID_STAGIAIRE);
$stmt->bindParam(':HEURE_DEBUT', $HEURE_DEBUT);
$stmt->bindParam(':HEURE_FIN', $HEURE_FIN);
$stmt->bindParam(':DATE', $DATE);
$stmt->bindParam(':STATUT', $STATUT);
$stmt->execute();
echo "presence ajoutee avce succes";
header('location: index.php');

}catch(PDOException $e){
    echo" une erreur est survenue lors de l'ajout de la presence: ".$e->getMessage();
exit;
}
}
?>
      </div>
    
    

