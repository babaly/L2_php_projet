<?php

include_once 'navbar.php';
?>
<div class="main">
<?php
include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$LIBELLESEMESTRE=$_POST['LIBELLESEMESTRE'];
$req = mysqli_query($conn, "INSERT INTO semestre(LIBELLESEMESTRE) VALUES('$LIBELLESEMESTRE')");

echo '<p>Semestre ajouté </p>
<p><a href="ajouter_semestres.php">ajouter un autre semestre</a></p>';
?>
</div>