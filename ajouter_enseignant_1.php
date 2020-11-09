<?php

include_once 'navbar.php';
?>
<div class="main">
<?php
include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$pseudo=$_POST['pseudo'];
$passe=$_POST['passe'];
$PRENOMENSEIGNANT=$_POST['PRENOMENSEIGNANT'];
$NOMENSEIGNANT=$_POST['NOMENSEIGNANT'];
$NUMMATIERE=$_POST['NUMMATIERE'];
$req = mysqli_query($conn, "INSERT INTO enseignant(pseudo, passe, PRENOMENSEIGNANT, NOMENSEIGNANT, NUMMATIERE) 
                            VALUES('$pseudo', '$passe', '$PRENOMENSEIGNANT', '$NOMENSEIGNANT', '$NUMMATIERE')");

echo '<p>Enseignant ajouté </p>
<p><a href="ajouter_enseignant.php">ajouter un autre enseignant</a></p>
<p><a href="gerer_enseignants.php">gerer enseignant</a></p>';
?>
</div>