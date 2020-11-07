<!--

Fichier permettant d'ajouter un joueur dans la base.

Ce fichier ne contient que le formulaire, on trouve la requette dans : ajouter_joueurs_1.php

!-->
<h1>Ajouts des étudiants dans la base</h1>
<form action="?action=ajouter_etudiants_1" method="post" enctype="multipart/form-data">
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
	<td class="colone_b">Régime </td>
	<td class="colone_b"><select name="REGIME">
		<option value="Regulier">			Régulier		</option>
		<option value="Accelere">			Accéléré		</option>
		</select></td>
</tr>
<tr>
	<td class="colone_b">Boursier </td>
	<td class="colone_b"><select name="BOURSE">
		<option value="Tarif Normal">			Tarif Normal		</option>
		<option value="Demi Bourse">			Demi bourse		</option>
		<option value="Bourse Entiere">			Bourse entière		</option>
		</select></td>
</tr>
	<tr>
	<td class="colone_a">Sexe</td>
	<td class="colone_b"><select name="SEXE">
		<option value="Femme">			Femme		</option>
		<option value="Homme">			Homme		</option>
		</select></td>
</tr>

<tr>
	<td class="colone_a">Section: </td>
	<td class="colone_b">
		<select name="SECTION">';
	
	<?php
$req = mysql_query("SELECT DISTINCT LIBELLENIVEAU FROM niveau ORDER BY LIBELLENIVEAU")
or die("erreur de connexion à la BDD");
while(false!==($data = mysql_fetch_array($req))){

	echo '<option value="'.$data['LIBELLENIVEAU'].'">'.$data['LIBELLENIVEAU'].'</option>';
}

	echo '
	</select></td>
</tr>';
?>
	




<?php
	echo '
	</select></td>
</tr>
</table><br />
<input type="submit" />
</form>';
?>