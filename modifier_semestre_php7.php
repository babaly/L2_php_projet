<?php
include_once 'navbar.php';
	?>
<div class="main">	
<?php
include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
if (isset($_GET['NUMSEMESTRE'])){
	$req = mysqli_query($conn,'SELECT NUMSEMESTRE, LIBELLESEMESTRE FROM semestre WHERE NUMSEMESTRE='.$_GET['NUMSEMESTRE'].';')
	or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />l\'erreur s\'est produite à la ligne : <u>'.__LINE__.'</u>, dans le fichier <u>"'.__FILE__.'"</u>.</span><br />'.mysql_error());
	$a=mysqli_fetch_array($req);
	?>
<div class="main">	
		<h3>Modification semestre !</h3>
		<form action="?action=modifier_semestre" method="post">
		<table width='100%' border='0' cellspacing='1' cellpadding='1'>
		<input type="hidden" name="NUMSEMESTRE" value="<?php echo $_GET['NUMSEMESTRE']?>">
<tr><td align='right' width='30%'><span class='txtform'>Libellé :</span></td><td><input type="text" name="LIBELLESEMESTRE" value="<?php echo $a['LIBELLESEMESTRE'] ?>"  size='24' border='0'></td>
</tr>
		
<tr><td align='right' width='30%'></td><td><input type='submit' name='submit' value='Envoyer' border='0'></td></tr>
			</table>
		</form>
		
<?php
include_once 'navbar.php';	
}

else if (isset($_POST['NUMSEMESTRE'])){
	mysqli_query($conn,'
	UPDATE
		semestre
	SET
	    LIBELLESEMESTRE="'.$_POST['LIBELLESEMESTRE'].'"
		
	WHERE
		NUMSEMESTRE='.$_POST['NUMSEMESTRE'].';')
	or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />l\'erreur s\'est produite à la ligne : <u>'.
		__LINE__.'</u>, dans le fichier <u>"'.__FILE__.'"</u>.</span><br />'.mysql_error());
	echo '
		<h3>Modification du semestre !</h3>
		
	';
}else
	echo '<img src="imgs/messagebox_warning.png" alt="alert" /> action non deffinit !!!';
?>

<br />
<a href="gerer_semestres.php">retour à la gestion des semestres</a>
</div>