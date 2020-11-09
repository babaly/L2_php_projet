<?php
include_once 'navbar.php';
?>
<div class="main">
  <h2>Gerer enseignant</h2>
  
  <?php
echo '
<a href="ajouter_enseignant.php">ajouter un enseignant</a><br /> 

<table>
<tr>
<th>Actions</th>
<th>Numero</th>
<th>Pseudo</th>
<th>Passe</th>
<th>Prenom</th>
<th>Nom</th>
</tr>';

include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$req = mysqli_query($conn, "SELECT NUMENSEIGNANT, pseudo, passe, PRENOMENSEIGNANT, NOMENSEIGNANT, NUMMATIERE FROM enseignant ORDER BY NOMENSEIGNANT");


foreach ($req as $row) :
   
	echo '<tr>
		<td>
			<a href="supprimer_enseignant.php?NUMENSEIGNANT='.$row['NUMENSEIGNANT'].'">supprimer</a> /
			<a href="modifier_enseignant.php?NUMENSEIGNANT='.$row['NUMENSEIGNANT'].'">modifier</a>
		</td>
		<td>'.$row['NUMENSEIGNANT'].'</td>
    <td>'.$row['pseudo'].'</td>
    <td>'.$row['passe'].'</td>
    <td>'.$row['PRENOMENSEIGNANT'].'</td>
    <td>'.$row['NOMENSEIGNANT'].'</td>
	</tr>';

endforeach;
echo '</table>';

?>
  
</div>