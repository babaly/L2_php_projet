<?php
include_once 'navbar.php';
	?>
<div class="main">	
<?php
include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
if (isset($_GET['NUMMATIERE'])){
	$req = mysqli_query($conn,'SELECT NUMMATIERE, NUMMODULE,NUMSEMESTRE, NUMNIVEAU, LIBELLEMATIERE, COEF FROM matiere WHERE NUMMATIERE='.$_GET['NUMMATIERE'].';')
	or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />l\'erreur s\'est produite à la ligne : <u>'.__LINE__.'</u>, dans le fichier <u>"'.__FILE__.'"</u>.</span><br />'.mysqli_error($conn));
	$a=mysqli_fetch_array($req);
	$niveau = $a['NUMNIVEAU'];
	$module = $a['NUMMODULE'];
	$semestre = $a['NUMSEMESTRE'];
	?>
<div class="main">	
		<h3>Modification U.E !</h3>
		<form action="?action=modifier_ECUE" method="post">


	
                <!-- text input -->
                <div class="form-group">
                  <label>Libellé Matière</label>
                  <input type="text" name="LIBELLEMATIERE" value="<?php echo $a['LIBELLEMATIERE']?>" class="form-control" placeholder="Nom Module">
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
						$reponse1 = mysqli_query($conn, "SELECT DISTINCT NUMNIVEAU, LIBELLENIVEAU FROM niveau ORDER BY LIBELLENIVEAU");

		                foreach ($reponse1 as $reponse1) {
						$reponss = $reponse1['LIBELLENIVEAU'];	
						echo '<option value="'.$reponse1['NUMNIVEAU'].'">'.$reponss.'</option>';
		               	}
		                ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Coéfficient</label>
                  <input type="NUMBER" name="COEF" value="<?php echo $a['COEF']?>" class="form-control" placeholder="Définir le nombre de crédit">
                </div>
                <div class="form-group">
                  <label>U.E</label>
                  <select class="form-control semetre_list" name="NUMMODULE">
                    <?php
						include ('config.php');
						$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

						$reponse = mysqli_query($conn, "SELECT DISTINCT LIBELLEMODULE, NUMMODULE FROM module WHERE NUMMODULE=$module");


						$data = mysqli_fetch_array($reponse);
              
						echo '<option value="'.$data['NUMMODULE'].'">'.$data['LIBELLEMODULE'].'</option>';
						$reponse2 = mysqli_query($conn, "SELECT DISTINCT LIBELLEMODULE, NUMMODULE FROM module ORDER BY LIBELLEMODULE");
		                foreach ($reponse2 as $reponse2) {
						$reponss = $reponse2['LIBELLEMODULE'];	
						echo '<option value="'.$reponse2['NUMMODULE'].'">'.$reponss.'</option>';
		               	}
		                ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Semestre</label>
                  <select class="form-control semetre_list" name="NUMSEMESTRE">
                    <?php
						include ('config.php');
						$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

						$reponse = mysqli_query($conn, "SELECT DISTINCT LIBELLESEMESTRE, NUMSEMESTRE FROM semestre WHERE NUMSEMESTRE=$semestre");


						$data = mysqli_fetch_array($reponse);
              
						echo '<option value="'.$data['NUMSEMESTRE'].'">'.$data['LIBELLESEMESTRE'].'</option>';
						$reponse3 = mysqli_query($conn, "SELECT DISTINCT LIBELLESEMESTRE, NUMSEMESTRE FROM semestre ORDER BY LIBELLESEMESTRE");
		                foreach ($reponse3 as $reponse3) {
						$reponss = $reponse3['LIBELLESEMESTRE'];	
						echo '<option value="'.$reponse3['NUMSEMESTRE'].'">'.$reponss.'</option>';
		               	}
		                ?>
                  </select>
                </div>
				<input type="hidden" name="NUMMATIERE" value="<?php echo $_GET['NUMMATIERE']?>">
                
                <button type="submit" class="btn btn-primary">Enregistrer</button>
              </form>
		
		
<?php
include_once 'navbar.php';	
}

else if (isset($_POST['NUMMATIERE'])){
	$NUMSEMESTRE=$_POST['NUMSEMESTRE'];
	$NUMNIVEAU=$_POST['NUMNIVEAU'];
	$NUMMODULE=$_POST['NUMMODULE'];
	$LIBELLEMATIERE=$_POST['LIBELLEMATIERE'];
	$COEF=$_POST['COEF'];

	mysqli_query($conn,'
	UPDATE
		matiere
	SET
		NUMMODULE="'.$NUMMODULE.'",
	    NUMSEMESTRE="'.$NUMSEMESTRE.'",
	    NUMNIVEAU="'.$NUMNIVEAU.'",
	    LIBELLEMATIERE="'.$LIBELLEMATIERE.'",
	    COEF="'.$COEF.'"
		
	WHERE
		NUMMATIERE='.$_POST['NUMMATIERE'].';')
	or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />l\'erreur s\'est produite à la ligne : <u>'.
		__LINE__.'</u>, dans le fichier <u>"'.__FILE__.'"</u>.</span><br />'.mysql_error($conn));
	echo '
		<h3>Modification du ECUE réussi !</h3>
		
	';
}else
	echo '<img src="imgs/messagebox_warning.png" alt="alert" /> action non deffinit !!!';
?>

<br />
<a href="gerer_ECUE.php">retour à la gestion des ECUE</a>
</div>