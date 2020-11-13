<?php

include_once 'navbar.php';
?>
<div class="main">
<?php
include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$matiere=$_POST['NUMMATIERE'];
$etud=$_POST['NUMETUDIANT'];
$semestre=$_POST['NUMSEMESTRE'];
$niveau = $_POST['NUMNIVEAU'];

//$req = $bdd->prepare("INSERT INTO absence(NUMMATIERE,NUMETUDIANT,NUMSEMESTRE,TYPES,LIBELLE) VALUES (?,?,?,?,?)");
//$req->execute([$matiere,$etud,$sem,$typ,$libelle]);


//Ce script permet d'ajouter un joueur dans la base de donnée.
//Quand on arrive ici, on vient de répondre au formulaire.



  if (isset($_POST['btn_rech2'])) {
  	
    ?>
    <div class="row">
      <div class="col-md-12">
      	<form action="?ajouter_absence_1.php" method="post">
      	<input type="hidden" name="NUMNIVEAU" value="<?php echo $niveau ?>">
    	<input type="hidden" name="NUMSEMESTRE" value="<?php echo $semestre ?>">
    	<input type="hidden" name="NUMETUDIANT" value="<?php echo $etud ?>">
    	<input type="hidden" name="NUMMATIERE" value="<?php echo $matiere ?>">

	    <div class="form-group">
	        <label>Types</label>
	        <select class="form-control niveau_list" name="TYPE">
	          <option value="Absent(e)">Absent(e)</option>
	          <option value="Retard">Retard</option>
	        </select>
	     </div>
	     <div class="form-group">
	        <label>Date</label>
	        <input type="date" name="DATE" class="form-control" >
	     </div>
	     <div class="form-group">
	        <label>Heure</label>
	        <input type="text" name="HEURE" class="form-control" placeholder="ex: 8h-10h">
	     </div>
	     <div class="form-group">
	        <label>Libelle</label>
	        <input type="text" name="LIBELLE" class="form-control" >
	     </div>
	     <div class="form-group">
	        <label>Enseignants</label>
	            <select class="form-control niveau_list" name="NUMENSEIGNANT">
	              <?php
	              include ('config.php');
	              $conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
	                echo '<option value="">Selectionner un(e) enseignant(e)</option>';
	              $reponse = mysqli_query($conn, 'SELECT DISTINCT NUMENSEIGNANT, PRENOMENSEIGNANT, NOMENSEIGNANT FROM enseignant WHERE NUMMATIERE='.$matiere.' ORDER BY NOMENSEIGNANT');


	              $data = mysqli_fetch_array($reponse);
	                      
	              foreach ($reponse as $reponse) {
	              $reponss = $reponse['PRENOMENSEIGNANT']; 
	              echo '<option value="'.$reponse['NUMENSEIGNANT'].'">'.$reponss.' '.$reponse['NOMENSEIGNANT'].'</option>';
	                              }
	          ?>
	            </select>
	     </div>
	     <button type="submit" class="btn btn-primary" name="btn_save">Enregistre</button>
	     </form>
      </div>
	</div>
    <?php
  }

  if (isset($_POST['btn_save'])) {
  	//die($_POST['DATE']);
  	$req = $bdd->prepare("INSERT INTO absence(NUMSEMESTRE,NUMNIVEAU,NUMMATIERE,NUMETUDIANT,TYPE,LIBELLE,date_SAVE,HEURE) VALUES (?,?,?,?,?,?,?,?)");
	$req->execute([$_POST['NUMSEMESTRE'],$_POST['NUMNIVEAU'],$_POST['NUMMATIERE'],$_POST['NUMETUDIANT'],$_POST['TYPE'],$_POST['LIBELLE'],$_POST['DATE'],$_POST['HEURE']]);
  	echo '<p>Abscence enregistré</p>
	<p><a href="ajouter_absence.php">enregistrer une nouvelle absence</a></p>
	<p><a href="gerer_absences.php">gerer les absences</a></p>';
  }
  ?>
</div>