<?php

include_once 'navbar.php';
?>
<div class="main">
<?php
include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

if (isset($_GET['NUMETUDIANT'])) {
	
	
?>

	<form action="?ajouter_notes_1.php" method="post" enctype="multipart/form-data">
	 <div class="form-group">
	 	<?php
          		include ('config.php');
          		$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
                
          		$reponse = mysqli_query($conn, 'SELECT NUMETUDIANT,PRENOMETUDIANT,NOMETUDIANT,DATENAISSANCE,LIEUNAISSANCE FROM etudiant WHERE NUMETUDIANT='.$_GET['NUMETUDIANT'].';');


          		$data = mysqli_fetch_array($reponse);
          						
          		foreach ($reponse as $reponse) {
          		echo '<p>Prenom: '.$reponse['PRENOMETUDIANT'].'<br>
          				Nom: '.$reponse['NOMETUDIANT'].'<br>
          				Date et lieu de naissance: '.$reponse['DATENAISSANCE'].' à '.$reponse['LIEUNAISSANCE'].'<br>
          			</p>';
          		               	}
		    	?>

      <div class="form-group">
      	<label>Note</label>
        <input type="number" name="NOTE" value="" class="form-control" placeholder="renseigner le note de l'étudiant">
     </div>
        <input type="hidden" name="TYPE" value="<?php echo $_GET['TYPE'] ?>" class="form-control" placeholder="Prenom etudiant">
     </div>
     <div class="form-group">
        <input type="hidden" name="NUMNIVEAU" value="<?php echo $_GET['NUMNIVEAU'] ?>" class="form-control" placeholder="Prenom etudiant">
     </div>
      <div class="form-group">
        <input type="hidden" name="NUMSEMESTRE" value="<?php echo $_GET['NUMSEMESTRE'] ?>" class="form-control" placeholder="Prenom etudiant">
     </div>
      <div class="form-group">
        <input type="hidden" name="NUMMATIERE" value="<?php echo $_GET['NUMMATIERE'] ?>" class="form-control" placeholder="Prenom etudiant">
     </div>
      <div class="form-group">
        <input type="hidden" name="NUMETUDIANT" value="<?php echo $_GET['NUMETUDIANT'] ?>" class="form-control" placeholder="Prenom etudiant">
     </div>
     
     

	<button type="submit" class="btn btn-primary" name="btn_note_save">Enregistrer</button>
</form>	

<?php
  	//die('sem: '.$semestre.'<br>niv: '.$niveau.'<br>mat: '.$matiere.'<br>type: '.$type.'<br>note: '.$note);


}elseif (isset($_POST['btn_note_save'])) {
	$req = $bdd->prepare("INSERT INTO note(NOTE,NUMMATIERE,NUMETUDIANT,NUMSEMESTRE,TYPE) VALUES (?,?,?,?,?)");
	$req->execute([$_POST['NOTE'],$_POST['NUMMATIERE'],$_POST['NUMETUDIANT'],$_POST['NUMSEMESTRE'],$_POST['TYPE']]);
	echo '<p>Note ajouté </p>
	<p><a href="ajouter_etudiants.php">ajouter un autre Note</a></p>
	<p><a href="gerer_etudiants.php">gerer les Notes</a></p>';
}

//Ce script permet d'ajouter un joueur dans la base de donnée.
//Quand on arrive ici, on vient de répondre au formulaire.

?>
</div>