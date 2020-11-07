<?php

include_once 'navbar.php';
?>
<div class="main">
<?php
include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$LIBELLENIVEAU=$_POST['LIBELLENIVEAU'];
$req = mysqli_query($conn, "INSERT INTO niveau(LIBELLENIVEAU) VALUES('$LIBELLENIVEAU')");

echo '<p>Niveau ajouté </p>
<p><a href="ajouter_niveau.php">ajouter un autre niveau</a></p>';
?>
</div>