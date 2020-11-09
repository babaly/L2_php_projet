<?php
include_once 'navbar.php';
	?>
<div class="main">	
<?php
include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$req = mysqli_query($conn,'DELETE FROM enseignant WHERE NUMENSEIGNANT='.$_GET['NUMENSEIGNANT'])
or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />l\'erreur s\'est produite à la ligne : <u>'.__LINE__.'</u>, dans le fichier <u>"'.__FILE__.'"</u>.</span><br />'.mysql_error());
echo '<p>Enseignant supprimée</p>
<p><a href="?action=ajouter_enseignant">ajouter un enseignant</a> / <a href="?action=gerer_enseignant">gérer les enseignants</a></p>';
?>
</div>