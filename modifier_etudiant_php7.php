<?php
include_once 'navbar.php';
	?>
<div class="main">	
<?php
include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
if (isset($_GET['NUMETUDIANT'])){
	$req = mysqli_query($conn,'SELECT NUMETUDIANT,NUMNIVEAU,PRENOMETUDIANT,NOMETUDIANT,DATENAISSANCE,LIEUNAISSANCE,ADRESSE,SEXE,TELPORT,EMAIL FROM etudiant WHERE NUMETUDIANT='.$_GET['NUMETUDIANT'].';')
	or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />l\'erreur s\'est produite à la ligne : <u>'.__LINE__.'</u>, dans le fichier <u>"'.__FILE__.'"</u>.</span><br />'.mysqli_error($conn));
	$a=mysqli_fetch_array($req);
	$niveau = $a['NUMNIVEAU'];
	$prenom = $a['PRENOMETUDIANT'];
	$nom = $a['NOMETUDIANT'];
	$date = $a['DATENAISSANCE'];
	$lieu = $a['LIEUNAISSANCE'];
	$adresse = $a['ADRESSE'];
	$sexe = $a['SEXE'];
	$tel = $a['TELPORT'];
	$email = $a['EMAIL'];
	?>
<div class="main">	
		<h3>Modification Etudiant !</h3>
		<form action="?action=modifier_etudiant_php7" method="post" enctype="multipart/form-data">
	 <div class="form-group">
        <label>Prenom</label>
        <input type="text" name="PRENOMETUDIANT" value="<?php echo $a['PRENOMETUDIANT']?>" class="form-control" placeholder="Prenom etudiant">
     </div>
     <div class="form-group">
        <label>Nom</label>
        <input type="text" name="NOMETUDIANT" value="<?php echo $a['NOMETUDIANT']?>" class="form-control" placeholder="Nom etudiant">
     </div>
     <div class="form-group">
        <label>Date de naissance</label>
        <input type="date" name="DATENAISSANCE" value="<?php echo $a['DATENAISSANCE']?>" class="form-control" placeholder="">
     </div>
     <div class="form-group">
        <label>Lieu de naissance</label>
        <input type="text" name="LIEUNAISSANCE" value="<?php echo $a['LIEUNAISSANCE']?>" class="form-control" placeholder="ex: Dakar">
     </div>
     <div class="form-group">
        <label>Sexe</label>
        <select class="form-control niveau_list" name="SEXE">
        	<option value="<?php echo $a['SEXE']?>"><?php echo $a['SEXE']?></option>
        	<option value="Masculin">Masculin</option>
        	<option value="Féminin">Féminin</option>
        </select>
     </div>
     <div class="form-group">
        <label>Adresse</label>
        <input type="text" name="ADRESSE" value="<?php echo $a['ADRESSE']?>" class="form-control" placeholder="ex: Rue 39 x Blaise Diagne">
     </div>
     <div class="form-group">
        <label>Téléphone</label>
        <input type="text" name="TELPORT" value="<?php echo $a['TELPORT']?>" class="form-control" placeholder="ex: 777123578">
     </div>
     <div class="form-group">
        <label>Email</label>
        <input type="text" name="EMAIL" value="<?php echo $a['EMAIL']?>" class="form-control" placeholder="exemple@gmail.com">
     </div>
     <div class="form-group">
        <label>Section</label>
            <select class="form-control niveau_list" name="NUMNIVEAU">
                    <?php
						include ('config.php');
						$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

						$rep = mysqli_query($conn, "SELECT NUMNIVEAU, LIBELLENIVEAU FROM niveau WHERE NUMNIVEAU=$niveau");
						$data = mysqli_fetch_array($rep);

						echo '<option value="'.$data['NUMNIVEAU'].'">'.$data['LIBELLENIVEAU'].'</option>';
						$reponse = mysqli_query($conn, "SELECT DISTINCT NUMNIVEAU, LIBELLENIVEAU FROM niveau ORDER BY LIBELLENIVEAU");

		                foreach ($reponse as $reponse) {
						$reponss = $reponse['LIBELLENIVEAU'];	
						echo '<option value="'.$reponse['NUMNIVEAU'].'">'.$reponss.'</option>';
		               	}
		                ?>
                  </select>
    </div>
    <input type="hidden" name="NUMETUDIANT" value="<?php echo $_GET['NUMETUDIANT']?>">
<button type="submit" class="btn btn-primary">Enregistrer</button>
</form>	
		
<?php
include_once 'navbar.php';	
}

else if (isset($_POST['NUMETUDIANT'])){

	mysqli_query($conn,'
	UPDATE
		etudiant
	SET
	    NUMNIVEAU="'.$_POST['NUMNIVEAU'].'",
	    PRENOMETUDIANT="'.$_POST['PRENOMETUDIANT'].'",
	    NOMETUDIANT="'.$_POST['NOMETUDIANT'].'",
	    DATENAISSANCE="'.$_POST['DATENAISSANCE'].'",
	    LIEUNAISSANCE="'.$_POST['LIEUNAISSANCE'].'",
	    ADRESSE="'.$_POST['ADRESSE'].'",
	    SEXE="'.$_POST['SEXE'].'",
	    TELPORT="'.$_POST['TELPORT'].'",
	    EMAIL="'.$_POST['EMAIL'].'"
		
	WHERE
		NUMETUDIANT='.$_POST['NUMETUDIANT'].';')
	or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />l\'erreur s\'est produite à la ligne : <u>'.
		__LINE__.'</u>, dans le fichier <u>"'.__FILE__.'"</u>.</span><br />'.mysql_error());
	echo '
		<h3>Modification Etudiant !</h3>
		
	';
}else
	echo '<img src="imgs/messagebox_warning.png" alt="alert" /> action non deffinit !!!';
?>

<br />
<a href="gerer_etudiants.php">retour à la gestion des Etudiants</a>
</div>