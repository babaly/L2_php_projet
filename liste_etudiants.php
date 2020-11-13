<?php
include_once 'navbar.php';
?>
<div class="main">
  <h2>Liste des étudiants</h2>
  
  <?php
echo '
<a href="ajouter_etudiants.php">ajouter un nouveau étudiant</a><br /> 

<table>
<tr>
<th>Actions</th>
<th>Prenom</th>
<th>Nom</th>
<th>Date de naissance</th>
<th>Lieu de naissance</th>
<th>Adresse</th>
<th>Sexe</th>
<th>Téléphone</th>
<th>Email</th>
</tr>';

include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$req1 = mysqli_query($conn, "SELECT NUMETUDIANT,NUMNIVEAU,PRENOMETUDIANT,NOMETUDIANT,DATENAISSANCE,LIEUNAISSANCE,ADRESSE,SEXE,TELPORT,EMAIL FROM etudiant ORDER BY NUMNIVEAU");
$data1 = mysqli_fetch_array($req1);
$niveau = $data1['NUMNIVEAU'];

//$req2 = mysqli_query($conn, "SELECT NUMNIVEAU,LIBELLENIVEAU FROM niveau WHERE NUMNIVEAU=$niveau");

//$data2 = mysqli_fetch_array($req2);

foreach ($req1 as $row) :
   
	echo '<tr>
		<td>
			<a method="GET" href="supprimer_etudiant_php7.php?NUMETUDIANT='.$row['NUMETUDIANT'].'">supprimer</a> /
			<a href="modifier_etudiant_php7.php?NUMETUDIANT='.$row['NUMETUDIANT'].'">modifier</a>
		</td>
		<td>'.$row['PRENOMETUDIANT'].'</td>
		<td>'.$row['NOMETUDIANT'].'</td>
		<td>'.$row['DATENAISSANCE'].'</td>
		<td>'.$row['LIEUNAISSANCE'].'</td>
		<td>'.$row['ADRESSE'].'</td>
		<td>'.$row['SEXE'].'</td>
		<td>'.$row['TELPORT'].'</td>
		<td>'.$row['EMAIL'].'</td>
	</tr>';

endforeach;
echo '</table>';

?>
  
  
</div>