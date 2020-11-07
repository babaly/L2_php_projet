<?php

include_once 'navbar.php';
?>
<div class="main">
<?php
include ('config.php');

$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$NUMSEMESTRE=$_POST['NUMSEMESTRE'];
$NUMNIVEAU=$_POST['NUMNIVEAU'];
$LIBELLEMODULE=$_POST['LIBELLEMODULE'];
$CREDIT=$_POST['CREDIT'];

$req = $bdd->prepare("INSERT INTO module (NUMSEMESTRE,NUMNIVEAU,LIBELLEMODULE,CREDIT) VALUES (?,?,?,?)");
$req->execute([$NUMSEMESTRE,$NUMNIVEAU,$LIBELLEMODULE,$CREDIT]);

echo '<p>UE ajouté </p>
<p><a href="ajouter_UE.php">ajouter un autre UE</a></p>
<p><a href="gerer_UE.php">gerer les UE</a></p>';

?>
</div>