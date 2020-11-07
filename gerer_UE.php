<?php
include_once 'navbar.php';
?>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<div class="main">
  <h2>Gestion des Unités d'enseignements</h2>
  
  <?php
echo '
<a href="ajouter_UE.php">ajouter un UE</a><br /> 

<table>
<tr>
<th>Actions</th>
<th>Numero</th>
<th>UE</th>
<th>CREDIT</th>
</tr>';

include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$req = mysqli_query($conn, "SELECT NUMMODULE, LIBELLEMODULE, CREDIT FROM module ORDER BY NUMMODULE");


foreach ($req as $row) :
   
	echo '<tr>
		<td>
			<a method="GET" href="supprimer_UE_php7.php?NUMMODULE='.$row['NUMMODULE'].'">supprimer</a> /
			<a href="modifier_UE_php7.php?NUMMODULE='.$row['NUMMODULE'].'">modifier</a>
		</td>
		<td>'.$row['NUMMODULE'].'</td>
		<td>'.$row['LIBELLEMODULE'].'</td>
		<td>'.$row['CREDIT'].'</td>
	</tr>';

endforeach;
echo '</table>';

?>
  
  
</div>