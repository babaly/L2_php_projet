<?php
include_once 'navbar.php';
?>
<div class="main">
  <h2>Insertion des notes</h2>
  
  <?php
  if (isset($_POST['btn_note'])) {
  	$type = $_POST['TYPE'];
  	$semestre = $_POST['NUMSEMESTRE'];
  	$niveau = $_POST['NUMNIVEAU'];
  	$matiere = $_POST['NUMMATIERE'];
  	
  	echo '
	<a href="gerer_notes.php">faire un autre trie</a><br /> 
<form>
	<table>
	<tr>
	<th>Actions</th>
	<th>Prenom</th>
	<th>Nom</th>
	<th>Date de naissance</th>
	<th>Lieu de naissance</th>
	</tr>';

	include ('config.php');
	$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

	$req1 = mysqli_query($conn, "SELECT NUMETUDIANT,NUMNIVEAU,PRENOMETUDIANT,NOMETUDIANT,DATENAISSANCE,LIEUNAISSANCE FROM etudiant WHERE NUMNIVEAU=$niveau");
	$data1 = mysqli_fetch_array($req1);
	$niveau = $data1['NUMNIVEAU'];

	//$req2 = mysqli_query($conn, "SELECT NUMNIVEAU,LIBELLENIVEAU FROM niveau WHERE NUMNIVEAU=$niveau");

	//$data2 = mysqli_fetch_array($req2);

	foreach ($req1 as $row) :
	   
		echo '<tr>
			<td>
				<a method="GET" href="supprimer_notes.php?NUMETUDIANT='.$row['NUMETUDIANT'].'&TYPE='.$type.'&NUMSEMESTRE='.$semestre.'&NUMNIVEAU='.$niveau.'&NUMMATIERE='.$matiere.'">supprimer</a> /
				<a href="modifier_notes.php?NUMETUDIANT='.$row['NUMETUDIANT'].'&TYPE='.$type.'&NUMSEMESTRE='.$semestre.'&NUMNIVEAU='.$niveau.'&NUMMATIERE='.$matiere.'">modifier</a> /
				<a href="ajouter_notes_1.php?NUMETUDIANT='.$row['NUMETUDIANT'].'&TYPE='.$type.'&NUMSEMESTRE='.$semestre.'&NUMNIVEAU='.$niveau.'&NUMMATIERE='.$matiere.'">Ajouter note</a>
			</td>
			<td>'.$row['PRENOMETUDIANT'].'</td>
			<td>'.$row['NOMETUDIANT'].'</td>
			<td>'.$row['DATENAISSANCE'].'</td>
			<td>'.$row['LIEUNAISSANCE'].'</td>
		
		</tr>';

	endforeach;
	echo '</table>
	
	
	</form>';
  }


?>
  
  
</div>