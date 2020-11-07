<?php
if (isset($_GET['id_produit'])){
include ('config.php');
mysql_connect($sql_serveur,$sql_user,$sql_passwd) or die("Erreur de connexion au serveur");
mysql_select_db($sql_bdd) or die('Erreur de connexion à la base de données');

$req1 = mysql_query('DELETE FROM produit WHERE id_produit='.$_GET['id_produit'].';')
or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />l\'erreur s\'est produite à la ligne : <u>'.__LINE__.'</u>, dans le fichier <u>"'.__FILE__.'"</u>.</span><br />'.mysql_error());

echo '<p>Produit supprimé</p>
<p><a href="liste_produit.php">Liste des produits</a></p>';
}
?>