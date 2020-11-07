<?php
include_once 'navbar.php';
?>
<div class="main">
  <h2>Gestion des Niveaux</h2>
  
  <?php
echo '
<a href="ajouter_niveau.php">ajouter un niveau</a><br /> 

<table>
<tr>
<th>Actions</th>
<th>Numero</th>
<th>Niveau</th>
</tr>';

include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$req = mysqli_query($conn, "SELECT NUMNIVEAU, LIBELLENIVEAU FROM niveau ORDER BY LIBELLENIVEAU");


foreach ($req as $row) :
   
	echo '<tr>
		<td>
			<a method="GET" href="supprimer_niveau_php7.php?NUMNIVEAU='.$row['NUMNIVEAU'].'">supprimer</a> /
			<a href="modifier_niveau_php7.php?NUMNIVEAU='.$row['NUMNIVEAU'].'">modifier</a>
		</td>
		<td>'.$row['NUMNIVEAU'].'</td>
		<td>'.$row['LIBELLENIVEAU'].'</td>
	</tr>';

endforeach;
echo '</table>';

?>
  
  
</div>