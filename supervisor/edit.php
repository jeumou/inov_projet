<?php
include("../inc/connexion.php");
$id=$_GET["id"];

$sql="SELECT * FROM supervisor WHERE id='$id'";
$result=$db->query($sql);
$row=$result->fetch(PDO::FETCH_ASSOC);

?>


<form method="POST" action="../formIncrip.php" >
        <label> id: <input type="number" name="id" value="<?php echo $row["id"]?>"></label></br>
        <label> id_sup: <input type="text" name="id_sup" value="<?php echo $row["id_sup"]?>"></label></br>
        <label> id_stag: <input type="text" name="id_stag" value="<?php echo $row["id_stag"]?>"></label></br>    
        <button> <input type="submit" name="modifier"> </button>
</form>