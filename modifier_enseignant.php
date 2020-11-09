<?php
include_once 'navbar.php';
	?>
<div class="main">	
<?php
include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
if (isset($_GET['NUMENSEIGNANT'])){
	$req = mysqli_query($conn,'SELECT NUMENSEIGNANT, pseudo, passe, PRENOMENSEIGNANT, NOMENSEIGNANT, NUMMATIERE FROM enseignant WHERE NUMENSEIGNANT='.$_GET['NUMENSEIGNANT'].';')
	or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />l\'erreur s\'est produite à la ligne : <u>'.__LINE__.'</u>, dans le fichier <u>"'.__FILE__.'"</u>.</span><br />'.mysql_error());
	$a=mysqli_fetch_array($req);
	?>
<div class="main">	
		<h3>Modification semestre !</h3>
		<form action="?action=modifier_enseignant" method="post">
		
			 <div class="form-group">
                  <label>Nom</label>
                  <input type="text" name="NOMENSEIGNANT" value="<?php echo $a['NOMENSEIGNANT'] ?>" class="form-control" placeholder="Nom enseignant">
                </div>
                 <div class="form-group">
                  <label>Prenom</label>
                  <input type="text" name="PRENOMENSEIGNANT" value="<?php echo $a['PRENOMENSEIGNANT'] ?>" class="form-control" placeholder="Prenom enseignant">
                </div>
                 <div class="form-group">
                  <label>Nom d'utilisateur</label>
                  <input type="text" name="pseudo" value="<?php echo $a['pseudo'] ?>" class="form-control" placeholder="Définir le nom d'utilisateur">
                </div>
                 <div class="form-group">
                  <label>Mot de passe</label>
                  <input type="text" name="passe" value="<?php echo $a['passe'] ?>" class="form-control" placeholder="Définir le mot de passe de l'utilisateur">
                </div>
              <div class="form-group">
                  <label>Matière</label>
                  <select class="form-control niveau_list" name="NUMMATIERE">
                    <?php
          						include ('config.php');
          						$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
                      
          						$reponse = mysqli_query($conn, "SELECT DISTINCT NUMMATIERE, LIBELLEMATIERE FROM matiere ORDER BY LIBELLEMATIERE");


          						$data = mysqli_fetch_array($reponse);
          							echo '<option value="'.$data['NUMMATIERE'].'">'.$data['LIBELLEMATIERE'].'</option>';
          		                foreach ($reponse as $reponse) {
          						$reponss = $reponse['LIBELLEMATIERE'];	
          						echo '<option value="'.$reponse['NUMMATIERE'].'">'.$reponss.'</option>';
          		               	}
		                ?>
                  </select>
                </div>
                <input  name="NUMENSEIGNANT" value="<?php echo $_GET['NUMENSEIGNANT']?>" type="hidden">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
		</form>
		
<?php
include_once 'navbar.php';	
}

else if (isset($_POST['NUMENSEIGNANT'])){
	mysqli_query($conn,'
	UPDATE
		enseignant
	SET
        pseudo="'.$_POST['pseudo'].'",
        passe="'.$_POST['passe'].'",
        PRENOMENSEIGNANT="'.$_POST['PRENOMENSEIGNANT'].'",
        NOMENSEIGNANT="'.$_POST['NOMENSEIGNANT'].'",
        NUMMATIERE="'.$_POST['NUMMATIERE'].'"
		
	WHERE
        NUMENSEIGNANT='.$_POST['NUMENSEIGNANT'].';')
	or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />l\'erreur s\'est produite à la ligne : <u>'.
		__LINE__.'</u>, dans le fichier <u>"'.__FILE__.'"</u>.</span><br />'.mysql_error());
	echo '
		<h3>Modification du enseignant !</h3>
		
	';
}else echo '<img src="imgs/messagebox_warning.png" alt="alert" /> action non deffinit !!!';
?>

<br />
<a href="gerer_enseignants.php">retour à la gestion des enseignants</a>
</div>