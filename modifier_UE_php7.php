<?php
include_once 'navbar.php';
	?>
<div class="main">	
<?php
include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
if (isset($_GET['NUMMODULE'])){
	$req = mysqli_query($conn,'SELECT NUMMODULE, NUMSEMESTRE, NUMNIVEAU, LIBELLEMODULE, CREDIT FROM module WHERE NUMMODULE='.$_GET['NUMMODULE'].';')
	or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />l\'erreur s\'est produite à la ligne : <u>'.__LINE__.'</u>, dans le fichier <u>"'.__FILE__.'"</u>.</span><br />'.mysqli_error($conn));
	$a=mysqli_fetch_array($req);
	$niveau = $a['NUMNIVEAU'];
	$module = $a['NUMMODULE'];
	$semestre = $a['NUMSEMESTRE'];
	?>
<div class="main">	
		<h3>Modification U.E !</h3>
		<form action="?action=modifier_UE" method="post">


	
                <!-- text input -->
                <div class="form-group">
                  <label>Nom</label>
                  <input type="text" name="LIBELLEMODULE" value="<?php echo $a['LIBELLEMODULE']?>" class="form-control" placeholder="Nom Module">
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
                <div class="form-group">
                  <label>Credit</label>
                  <input type="NUMBER" name="CREDIT" value="<?php echo $a['CREDIT']?>" class="form-control" placeholder="Définir le nombre de crédit">
                </div>
                <div class="form-group">
                  <label>Semestre</label>
                  <select class="form-control semetre_list" name="NUMSEMESTRE">
                    <?php
						include ('config.php');
						$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

						$reponse1 = mysqli_query($conn, "SELECT DISTINCT LIBELLESEMESTRE, NUMSEMESTRE FROM semestre WHERE NUMSEMESTRE=$semestre");


						$data = mysqli_fetch_array($reponse1);
              
						echo '<option value="'.$data['NUMSEMESTRE'].'">'.$data['LIBELLESEMESTRE'].'</option>';
						$reponse2 = mysqli_query($conn, "SELECT DISTINCT LIBELLESEMESTRE, NUMSEMESTRE FROM semestre ORDER BY LIBELLESEMESTRE");
		                foreach ($reponse2 as $reponse2) {
						$reponss = $reponse2['LIBELLESEMESTRE'];	
						echo '<option value="'.$reponse2['NUMSEMESTRE'].'">'.$reponss.'</option>';
		               	}
		                ?>
                  </select>
                </div>
				<input type="hidden" name="NUMMODULE" value="<?php echo $_GET['NUMMODULE']?>">
                
                <button type="submit" class="btn btn-primary">Enregistrer</button>
              </form>
		
		
<?php
include_once 'navbar.php';	
}

else if (isset($_POST['NUMMODULE'])){
	$NUMSEMESTRE=$_POST['NUMSEMESTRE'];
	$NUMNIVEAU=$_POST['NUMNIVEAU'];
	$LIBELLEMODULE=$_POST['LIBELLEMODULE'];
	$CREDIT=$_POST['CREDIT'];

	mysqli_query($conn,'
	UPDATE
		module
	SET
	    NUMSEMESTRE="'.$_POST['NUMSEMESTRE'].'",
	    NUMNIVEAU="'.$_POST['NUMNIVEAU'].'",
	    LIBELLEMODULE="'.$_POST['LIBELLEMODULE'].'",
	    CREDIT="'.$_POST['CREDIT'].'"
		
	WHERE
		NUMMODULE='.$_POST['NUMMODULE'].';')
	or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />l\'erreur s\'est produite à la ligne : <u>'.
		__LINE__.'</u>, dans le fichier <u>"'.__FILE__.'"</u>.</span><br />'.mysql_error());
	echo '
		<h3>Modification du semestre !</h3>
		
	';
}else
	echo '<img src="imgs/messagebox_warning.png" alt="alert" /> action non deffinit !!!';
?>

<br />
<a href="gerer_UE.php">retour à la gestion des UE</a>
</div>