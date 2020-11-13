<?php
include_once 'navbar.php';
	?>
<div class="main">	
<?php
include ('config.php');

$matiere = $_GET['NUMMATIERE'];
$etudiant = $_GET['NUMETUDIANT'];
$semestre = $_GET['NUMSEMESTRE'];
$type = $_GET['TYPE'];
//die($matiere.'-'.$etudiant.'-'.$semestre.'-'.$type);
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$req = mysqli_query($conn,'DELETE FROM note WHERE NUMMATIERE='.$matiere.' AND NUMETUDIANT='.$etudiant.' AND NUMSEMESTRE='.$semestre.' AND TYPE='.$type)
or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />l\'erreur s\'est produite à la ligne : <u>'.__LINE__.'</u>, dans le fichier <u>"'.__FILE__.'"</u>.</span><br />'.mysqli_error($conn));
echo '<p>Note supprimée</p>';
header('Location: ajouter_notes.php');
exit;
?>
</div>