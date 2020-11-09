<?php

include_once 'navbar.php';
?>
<div class="main">
<?php
include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$nom=$_POST['NOMETUDIANT'];
$sect=$_POST['NUMNIVEAU'];
$prenom=$_POST['PRENOMETUDIANT'];
$telephone=$_POST['TELPORT'];
$email=$_POST['EMAIL'];
$sexe=$_POST['SEXE'];
$date_de_naissance=$_POST['DATENAISSANCE'];
$lieunaissance=$_POST['LIEUNAISSANCE'];
$adresse=$_POST['ADRESSE'];

$req = $bdd->prepare("INSERT INTO etudiant(NUMNIVEAU,PRENOMETUDIANT,NOMETUDIANT,DATENAISSANCE,LIEUNAISSANCE,ADRESSE,SEXE,TELPORT,EMAIL) VALUES (?,?,?,?,?,?,?,?,?)");
$req->execute([$sect,$prenom,$nom,$date_de_naissance,$lieunaissance,$adresse,$sexe,$telephone,$email]);

echo '<p>UE ajouté </p>
<p><a href="ajouter_etudiants.php">ajouter un autre Etudiant</a></p>
<p><a href="gerer_etudiants.php">gerer les Etudiant</a></p>';
//Ce script permet d'ajouter un joueur dans la base de donnée.
//Quand on arrive ici, on vient de répondre au formulaire.

?>
</div>