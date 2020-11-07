<?php
include_once 'navbar.php';
?>
<div class="main">
  <h2>Gestion des semestres</h2>
  
  <?php
echo '
<a href="ajouter_semestres.php">ajouter un semestre</a><br /> 

<table>
<tr>
<th>Actions</th>
<th>Numero</th>
<th>Semestre</th>
</tr>';

include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$req = mysqli_query($conn, "SELECT NUMSEMESTRE, LIBELLESEMESTRE FROM semestre ORDER BY LIBELLESEMESTRE");


foreach ($req as $row) :
   
	echo '<tr>
		<td>
			<a method="GET" href="supprimer_semestre_php7.php?NUMSEMESTRE='.$row['NUMSEMESTRE'].'">supprimer</a> /
			<a href="modifier_semestre_php7.php?NUMSEMESTRE='.$row['NUMSEMESTRE'].'">modifier</a>
		</td>
		<td>'.$row['NUMSEMESTRE'].'</td>
		<td>'.$row['LIBELLESEMESTRE'].'</td>
	</tr>';

endforeach;
echo '</table>';

?>
  
  
</div>