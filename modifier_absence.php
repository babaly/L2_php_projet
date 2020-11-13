<?php
include_once 'navbar.php';
	?>
<div class="main">	
<?php
include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
if (isset($_GET['NUMABSENCE'])){
	
    $idAbscence = $_GET['NUMABSENCE'];
	$semestre = $_GET['NUMSEMESTRE'];
	$niveau = $_GET['NUMNIVEAU'];
	$matiere = $_GET['NUMMATIERE'];
	$etudiant = $_GET['NUMETUDIANT'];
	$type = $_GET['TYPE'];
	$libelle = $_GET['LIBELLE'];
	$date = $_GET['date_SAVE'];
	$heure = $_GET['HEURE'];

	$req = mysqli_query($conn,'SELECT NUMABSENCE, NUMSEMESTRE, NUMNIVEAU, NUMMATIERE, NUMETUDIANT,TYPE,LIBELLE, date_SAVE, HEURE FROM absence WHERE NUMABSENCE='.$_GET['NUMABSENCE'].';')
	or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />l\'erreur s\'est produite à la ligne : <u>'.__LINE__.'</u>, dans le fichier <u>"'.__FILE__.'"</u>.</span><br />'.mysqli_error($conn));
    $a=mysqli_fetch_array($req);
	?>
<div class="main">	
		<h3>Modification Absence !</h3>
		<form action="?action=modifier_absence" method="post" enctype="multipart/form-data">
	
     <div class="form-group">
        <label>Matière</label>
            <select class="form-control niveau_list" name="NUMMATIERE">
                    <?php
						include ('config.php');
						$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

						$reponse = mysqli_query($conn, "SELECT NUMMATIERE, LIBELLEMATIERE FROM matiere WHERE NUMMATIERE=$matiere");
						$data = mysqli_fetch_array($reponse);

						echo '<option value="'.$data['NUMMATIERE'].'">'.$data['LIBELLEMATIERE'].'</option>';
						//$reponse = mysqli_query($conn, "SELECT DISTINCT NUMMATIERE, LIBELLEMATIERE FROM matiere ORDER BY LIBELLEMATIERE");

		                foreach ($reponse as $reponse) {
						$reponss = $reponse['LIBELLEMATIERE'];	
						echo '<option value="'.$reponse['NUMMATIERE'].'">'.$reponss.'</option>';
		               	}
		                ?>
                  </select>
    </div>
    <div class="form-group">
        <label>Etudiant</label>
            <select class="form-control niveau_list" name="NUMETUDIANT">
                    <?php
						include ('config.php');
						$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

						$reponse = mysqli_query($conn, "SELECT NUMETUDIANT, PRENOMETUDIANT, NOMETUDIANT FROM etudiant WHERE NUMETUDIANT=$etudiant");
						$data = mysqli_fetch_array($reponse);

						echo '<option value="'.$data['NUMETUDIANT'].'">'.$data['PRENOMETUDIANT'].' '.$data['NOMETUDIANT'].'</option>';
						$reponse2 = mysqli_query($conn, 'SELECT DISTINCT NUMETUDIANT, PRENOMETUDIANT, NOMETUDIANT FROM etudiant WHERE NUMNIVEAU='.$niveau.' ORDER BY NUMETUDIANT');

		                foreach ($reponse2 as $reponse2) {
						echo '<option value="'.$reponse2['NUMETUDIANT'].'">'.$reponse2['PRENOMETUDIANT'].' '.$reponse2['NOMETUDIANT'].'</option>';
		               	}
		                ?>
                  </select>
    </div>
    <div class="form-group">
        <label>Semestre</label>
            <select class="form-control niveau_list" name="NUMSEMESTRE">
                    <?php
						include ('config.php');
						$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

						$reponse = mysqli_query($conn, "SELECT NUMSEMESTRE, LIBELLESEMESTRE FROM semestre WHERE NUMSEMESTRE=$semestre");
						$data = mysqli_fetch_array($reponse);

						echo '<option value="'.$data['NUMSEMESTRE'].'">'.$data['LIBELLESEMESTRE'].'</option>';
						//$reponse = mysqli_query($conn, "SELECT DISTINCT NUMSEMESTRE, LIBELLESEMESTRE FROM semestre ORDER BY LIBELLESEMESTRE");

		                foreach ($reponse as $reponse) {
						$reponss = $reponse['LIBELLESEMESTRE'];	
						echo '<option value="'.$reponse['NUMSEMESTRE'].'">'.$reponss.'</option>';
		               	}
		                ?>
                  </select>
    </div>
    <div class="form-group">
        <label>Types</label>
        <select class="form-control niveau_list" name="TYPE">
        	<option value="<?php echo $a['TYPE']?>"><?php echo $a['TYPE']?></option>
        	<option value="Absent(e)">Absent(e)</option>
        	<option value="Retard">Retard</option>
        </select>
     </div>

	     <div class="form-group">
	        <label>Date</label>
	        <input type="date" value="<?php echo $a['date_SAVE']?>" name="DATE" class="form-control" >
	     </div>
	     <div class="form-group">
	        <label>Heure</label>
	        <input type="text" value="<?php echo $a['HEURE']?>" name="HEURE" class="form-control" placeholder="ex: 8h-10h">
	     </div>
	     <div class="form-group">
	        <label>Libelle</label>
	        <input type="text" name="LIBELLE" value="<?php echo $a['LIBELLE']?>" class="form-control" >
	     </div>
    <input type="hidden" name="NUMABSENCE" value="<?php echo $_GET['NUMABSENCE']?>">
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>	
		
<?php
include_once 'navbar.php';	
}

else if (isset($_POST['NUMABSENCE'])){

	mysqli_query($conn,'
	UPDATE
		absence
	SET
		NUMSEMESTRE='.$_POST['NUMSEMESTRE'].',
		NUMNIVEAU='.$_POST['NUMNIVEAU'].',
		NUMMATIERE='.$_POST['NUMMATIERE'].',
		NUMETUDIANT='.$_POST['NUMETUDIANT'].',
		TYPE='.$_POST['TYPE'].',
		LIBELLE='.$_POST['LIBELLE'].',
		date_SAVE='.$_POST['DATE'].',
		HEURE='.$_POST['HEURE'].'

		
	WHERE
		NUMABSENCE='.$_GET['NUMABSENCE'].';')
	or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />l\'erreur s\'est produite à la ligne : <u>'.
		__LINE__.'</u>, dans le fichier <u>"'.__FILE__.'"</u>.</span><br />'.mysql_error());
	echo '
		<h3>Modification absence !</h3>
		
	';
}else
	echo '<img src="imgs/messagebox_warning.png" alt="alert" /> action non definit !!!';
?>

<br />
<a href="gerer_absences.php">retour à la gestion des absence</a>
</div>