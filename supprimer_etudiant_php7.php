<?php
include_once 'navbar.php';
	?>
<div class="main">	
<?php
include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$req = mysqli_query($conn,'DELETE FROM etudiant WHERE NUMETUDIANT='.$_GET['NUMETUDIANT'])
or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />l\'erreur s\'est produite à la ligne : <u>'.__LINE__.'</u>, dans le fichier <u>"'.__FILE__.'"</u>.</span><br />'.mysqli_error($conn));
echo '<p>Etudiant supprimée</p>
<p><a href="ajouter_etudiants.php">ajouter un nouveau niveau</a> / <a href="gerer_etudiants.php">gérer etudiant</a></p>';
?>
</div>