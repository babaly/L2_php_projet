
<?php 
include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
//echo "connexion";
$pseudo= mysqli_real_escape_string($conn, $_POST['pseudo']);
$passe = mysqli_real_escape_string($conn,$_POST['passe']);


$requete = mysqli_query($conn, "SELECT * FROM utilisateur WHERE LOGIN='".$pseudo."' AND PASSWORD='".$passe."'");
//$row = mysqli_num_rows($requete);
$row=  mysqli_fetch_assoc($requete);

//$identif=$conn->prepare("SELECT * FROM utilisateur WHERE prenom='".$prenom."' AND passwd='".$passwd."'");

/*foreach ($identif as $row):
	$prenom=$row['prenom'];
	$passwd=$row['passwd'];
	//$id_utilisateur=$row['id_utilisateur'];

endforeach;*/

if (isset($_POST['pseudo']) && isset($_POST['passe'])) {

	// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
	//if($row>0) {
	if($row['IDLOGIN']>0) {
		// dans ce cas, tout est ok, on peut démarrer notre session
        if ($row['TYPE']=="admin"){
		session_start ();
		// on enregistre les paramètres de notre visiteur comme variables de session ($pseudo et $passe) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
		$_SESSION['pseudo'] = $_POST['pseudo'];
		$_SESSION['passe'] = $_POST['passe'];
        //$_SESSION['annee'] = $row2['ANNEE_ACAD'];
		// on redirige notre visiteur vers une page de notre section membre
		header("location:template.php");
		
	}
	}
	
	else {
	// On redirige le visiteur vers la page d'accueil
    header ('location: index.html');
}
	
} 
 

?> 
