<?php
include_once 'navbar.php';
?>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<div class="main">
  <h2>Gestion des ECUE</h2>
  
  <?php
echo '
<a href="ajouter_ECUE.php">ajouter un ECUE</a><br /> 

<table>
<tr>
<th>Actions</th>
<th>Numero</th>
<th>ECUE</th>
<th>COEFFICIENT</th>
</tr>';

include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$req = mysqli_query($conn, "SELECT NUMMATIERE, LIBELLEMATIERE, COEF FROM matiere ORDER BY NUMMATIERE");


foreach ($req as $row) :
   
	echo '<tr>
		<td>
			<a method="GET" href="supprimer_ECUE_php7.php?NUMMATIERE='.$row['NUMMATIERE'].'">supprimer</a> /
			<a href="modifier_ECUE_php7.php?NUMMATIERE='.$row['NUMMATIERE'].'">modifier</a>
		</td>
		<td>'.$row['NUMMATIERE'].'</td>
		<td>'.$row['LIBELLEMATIERE'].'</td>
		<td>'.$row['COEF'].'</td>
	</tr>';

endforeach;
echo '</table>';

?>
  
  
</div>