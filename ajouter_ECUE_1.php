<?php

include_once 'navbar.php';
?>
<div class="main">
<?php
include ('config.php');

$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$NUMSEMESTRE=$_POST['NUMSEMESTRE'];
$NUMNIVEAU=$_POST['NUMNIVEAU'];
$COEF= $_POST['COEF'];
$NUMMODULE= $_POST['NUMMODULE'];
$LIBELLEMATIERE=$_POST['LIBELLEMATIERE'];

$req = $bdd->prepare("INSERT INTO matiere (NUMMODULE, NUMSEMESTRE,NUMNIVEAU,LIBELLEMATIERE,COEF) VALUES (?,?,?,?,?)");
$req->execute([$NUMMODULE,$NUMSEMESTRE,$NUMNIVEAU,$LIBELLEMATIERE,$COEF]);

echo '<p>ECUE ajouté </p>
<p><a href="ajouter_ECUE.php">ajouter un autre ECUE</a></p>
<p><a href="gerer_ECUE.php">gerer les ECUE</a></p>';

?>
</div>