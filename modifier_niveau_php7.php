<?php
include_once 'navbar.php';
	?>
<div class="main">	
<?php
include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
if (isset($_GET['NUMNIVEAU'])){
	$req = mysqli_query($conn,'SELECT NUMNIVEAU, LIBELLENIVEAU FROM niveau WHERE NUMNIVEAU='.$_GET['NUMNIVEAU'].';')
	or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />l\'erreur s\'est produite à la ligne : <u>'.__LINE__.'</u>, dans le fichier <u>"'.__FILE__.'"</u>.</span><br />'.mysqli_error($conn));
	$a=mysqli_fetch_array($req);
	?>
<div class="main">	
		<h3>Modification niveau !</h3>
		<form action="?action=modifier_niveau" method="post">
		<table width='100%' border='0' cellspacing='1' cellpadding='1'>
		<input type="hidden" name="NUMNIVEAU" value="<?php echo $_GET['NUMNIVEAU']?>">
<tr><td align='right' width='30%'><span class='txtform'>Libellé :</span></td><td><input type="text" name="LIBELLENIVEAU" value="<?php echo $a['LIBELLENIVEAU'] ?>"  size='24' border='0'></td>
</tr>
		
<tr><td align='right' width='30%'></td><td><input type='submit' name='submit' value='Envoyer' border='0'></td></tr>
			</table>
		</form>
		
<?php
include_once 'navbar.php';	
}

else if (isset($_POST['NUMNIVEAU'])){
	mysqli_query($conn,'
	UPDATE
		niveau
	SET
	    LIBELLENIVEAU="'.$_POST['LIBELLENIVEAU'].'"
		
	WHERE
		NUMNIVEAU='.$_POST['NUMNIVEAU'].';')
	or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />l\'erreur s\'est produite à la ligne : <u>'.
		__LINE__.'</u>, dans le fichier <u>"'.__FILE__.'"</u>.</span><br />'.mysqli_error($conn));
	echo '
		<h3>Modification du semestre !</h3>
		
	';
}else
	echo '<img src="imgs/messagebox_warning.png" alt="alert" /> action non deffinit !!!';
?>

<br />
<a href="gerer_niveaux.php">retour à la gestion des niveaux</a>
</div>