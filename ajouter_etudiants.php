<?php
include_once 'navbar.php';
?>
<div class="main">
<h3>Ajouter des étudiants</h3>
<form action="ajouter_etudiants_1.php" method="post" enctype="multipart/form-data">
<table>
<tr>
	<td width="50%" class="colone_a">label</td>
	<td class="colone_b">champ</td></tr>
<tr>
	<td class="colone_b">nom</td>
	<td class="colone_a"><input type="texte" maxlength="100" name="NOMETUDIANT"/></td></tr>
<tr>
	<td class="colone_a">prenom</td>
	<td class="colone_b"><input type="texte" maxlength="100" name="PRENOMETUDIANT"/></td></tr>
<tr>
	<td class="colone_b">téléphone</td>
	<td class="colone_a"><input type="texte" maxlength="10" name="TELDOM"/></td></tr>
<tr>
	<td class="colone_b">Email </td>
	<td class="colone_a"><input type="texte" maxlength="150" name="EMAIL"/></td></tr>

	<tr>
	<td class="colone_a">date de naissance</td>
	<td class="colone_b"><input type="texte" maxlength="10" name="DATENAISSANCE" value="00-00-0000"/></td></tr>
<tr>
	<td class="colone_b">Lieu de Naissance </td>
	<td class="colone_a"><input type="texte" maxlength="150" name="LIEUNAISSANCE"/></td></tr>

<tr>
	<td class="colone_b">Code d'accès </td>
	<td class="colone_a"><input type="texte" maxlength="150" name="CODE" value="passer"/></td></tr>
	
	<tr>
	<td class="colone_b">adresse</td>
	<td class="colone_a"><textarea name="ADRESSE" rows="7" cols="22"> </textarea></td></tr>

<tr>
	<td class="colone_a">Section: </td>
	<td class="colone_b">
		<select name="SECTION">';
	
	<?php
include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$reponse = mysqli_query($conn, "SELECT DISTINCT LIBELLENIVEAU FROM niveau ORDER BY LIBELLENIVEAU");


$data = mysqli_fetch_array($reponse);

              
				echo '<option value="">Selectionner Niveau</option>';
                foreach ($reponse as $reponse) {
				$reponss = $reponse['LIBELLENIVEAU'];	
				echo '<option value="'.$reponse['LIBELLENIVEAU'].'">'.$reponss.'</option>';
               	}
                ?>


            </select>




<?php
	echo '
	</select></td>
</tr>
</table><br />
<input type="submit" />
</form>';
?>
</div>