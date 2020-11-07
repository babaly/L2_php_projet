<?php
function em($word) {

    $word = str_replace("@","%40",$word);
    $word = str_replace("`","%60",$word);
    $word = str_replace("¢","%A2",$word);
    $word = str_replace("£","%A3",$word);
    $word = str_replace("¥","%A5",$word);
    $word = str_replace("|","%A6",$word);
    $word = str_replace("«","%AB",$word);
    $word = str_replace("¬","%AC",$word);
    $word = str_replace("¯","%AD",$word);
    $word = str_replace("º","%B0",$word);
    $word = str_replace("±","%B1",$word);
    $word = str_replace("ª","%B2",$word);
    $word = str_replace("µ","%B5",$word);
    $word = str_replace("»","%BB",$word);
    $word = str_replace("¼","%BC",$word);
    $word = str_replace("½","%BD",$word);
    $word = str_replace("¿","%BF",$word);
    $word = str_replace("À","%C0",$word);
    $word = str_replace("Á","%C1",$word);
    $word = str_replace("Â","%C2",$word);
    $word = str_replace("Ã","%C3",$word);
    $word = str_replace("Ä","%C4",$word);
    $word = str_replace("Å","%C5",$word);
    $word = str_replace("Æ","%C6",$word);
    $word = str_replace("Ç","%C7",$word);
    $word = str_replace("È","%C8",$word);
    $word = str_replace("É","%C9",$word);
    $word = str_replace("Ê","%CA",$word);
    $word = str_replace("Ë","%CB",$word);
    $word = str_replace("Ì","%CC",$word);
    $word = str_replace("Í","%CD",$word);
    $word = str_replace("Î","%CE",$word);
    $word = str_replace("Ï","%CF",$word);
    $word = str_replace("Ð","%D0",$word);
    $word = str_replace("Ñ","%D1",$word);
    $word = str_replace("Ò","%D2",$word);
    $word = str_replace("Ó","%D3",$word);
    $word = str_replace("Ô","%D4",$word);
    $word = str_replace("Õ","%D5",$word);
    $word = str_replace("Ö","%D6",$word);
    $word = str_replace("Ø","%D8",$word);
    $word = str_replace("Ù","%D9",$word);
    $word = str_replace("Ú","%DA",$word);
    $word = str_replace("Û","%DB",$word);
    $word = str_replace("Ü","%DC",$word);
    $word = str_replace("Ý","%DD",$word);
    $word = str_replace("Þ","%DE",$word);
    $word = str_replace("ß","%DF",$word);
    $word = str_replace("à","%E0",$word);
    $word = str_replace("á","%E1",$word);
    $word = str_replace("â","%E2",$word);
    $word = str_replace("ã","%E3",$word);
    $word = str_replace("ä","%E4",$word);
    $word = str_replace("å","%E5",$word);
    $word = str_replace("æ","%E6",$word);
    $word = str_replace("ç","%E7",$word);
    $word = str_replace("è","%E8",$word);
    $word = str_replace("é","%E9",$word);
    $word = str_replace("ê","%EA",$word);
    $word = str_replace("ë","%EB",$word);
    $word = str_replace("ì","%EC",$word);
    $word = str_replace("í","%ED",$word);
    $word = str_replace("î","%EE",$word);
    $word = str_replace("ï","%EF",$word);
    $word = str_replace("ð","%F0",$word);
    $word = str_replace("ñ","%F1",$word);
    $word = str_replace("ò","%F2",$word);
    $word = str_replace("ó","%F3",$word);
    $word = str_replace("ô","%F4",$word);
    $word = str_replace("õ","%F5",$word);
    $word = str_replace("ö","%F6",$word);
    $word = str_replace("÷","%F7",$word);
    $word = str_replace("ø","%F8",$word);
    $word = str_replace("ù","%F9",$word);
    $word = str_replace("ú","%FA",$word);
    $word = str_replace("û","%FB",$word);
    $word = str_replace("ü","%FC",$word);
    $word = str_replace("ý","%FD",$word);
    $word = str_replace("þ","%FE",$word);
    $word = str_replace("ÿ","%FF",$word);
	$word =str_replace("'","\'",$word); 
    return $word;
}
//Ce script permet d'ajouter un joueur dans la base de donnée.
//Quand on arrive ici, on vient de répondre au formulaire.

$nom=urldecode(em($_POST['NOMETUDIANT']));
$sect=$_POST['SECTION'];
$prenom=urldecode(em($_POST['PRENOMETUDIANT']));
$telephone=$_POST['TELDOM'];
$email=$_POST['EMAIL'];
$sexe=$_POST['SEXE'];
$date_de_naissance=date_fr_to_mysql($_POST['DATENAISSANCE']);
$lieunaissance=urldecode(em($_POST['LIEUNAISSANCE']));
$adresse=$_POST['ADRESSE'];
//$numniveau=$_POST['NIVEAU'];
$regime=$_POST['REGIME'];
$boursier=$_POST['BOURSE'];
$code=$_POST['CODE'];
$annee = $_SESSION['annee'];
$not=0;	
$TYP="control_continue";	
$TYPE="control_total";	

$req10=mysql_query(' SELECT NIVEAULIB FROM niveau WHERE LIBELLENIVEAU="'.$sect.'" ')
	or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />
	<img src="imgs/messagebox_critical.png" alt="ERREUR" />
	l\'erreur s\'est produite �la ligne : <u>'.__LINE__.'</u>, dans le fichier <u>"'.
	'"</u>.</span><br />'.mysql_error());
	if (mysql_num_rows($req10) > 0) {
		while ($row10 = mysql_fetch_assoc($req10)) {
		
    	$numniveau = $row10['NIVEAULIB'];
	  }
	}
				
$req = mysql_query("INSERT INTO etudiant(ETUDIANTNIVEAU,PRENOMETUDIANT,NOMETUDIANT,DATENAISSANCE,LIEUNAISSANCE,ADRESSE,TELDOM,SEXE,EMAIL,CLASSE,CODE,ANNEEAC,REGIME,BOURSIER) VALUES('$numniveau','$prenom','$nom','$date_de_naissance','$lieunaissance','$adresse','$telephone','$sexe','$email','$sect','$code','$annee','$regime','$boursier')")
or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />
l\'erreur s\'est produite à la ligne : <u>'.__LINE__.'</u>, dans le fichier <u>"'.__FILE__.
'"</u>.</span><br />'.mysql_error());


$req0=mysql_query(' SELECT NUMETUDIANT FROM etudiant WHERE PRENOMETUDIANT="'.$prenom.'" AND NOMETUDIANT="'.$nom.'" AND DATENAISSANCE="'.$date_de_naissance.'" ')
	or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />
	<img src="imgs/messagebox_critical.png" alt="ERREUR" />
	l\'erreur s\'est produite �la ligne : <u>'.__LINE__.'</u>, dans le fichier <u>"'.
	'"</u>.</span><br />'.mysql_error());
	if (mysql_num_rows($req0) > 0) {
		while ($row = mysql_fetch_assoc($req0)) {
		
    	$numa = $row['NUMETUDIANT'];
	  }
	}

$req2=mysql_query('SELECT NUMMATIERE FROM matiere WHERE matiere.NUMSEMESTRE="'.$numnivea.'"')
	or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />
	<img src="imgs/messagebox_critical.png" alt="ERREUR" />
	l\'erreur s\'est produite �la ligne : <u>'.__LINE__.'</u>, dans le fichier <u>"'.
	__FILE__.'"</u>.</span><br />'.mysql_error());
//$data0=mysql_fetch_assoc($req);
//$prenometu=$data0['PRENOMETUDIANT'];
//print_r($prenometu);
if (mysql_num_rows($req2) > 0) {
   $k=0;
   while ($row = mysql_fetch_assoc($req2)) {
    //$nummod=$row['NUMMODULE'];
    //print_r($nummod);
	$nummati[$k] = $row['NUMMATIERE'];
	$k++;
     //print_r($row);
  }
}
$nb=count($nummati);
/*for ($k = 0; $k < $nb; $k++) {
$req = mysql_query("INSERT INTO note(NOTE, NUMMATIERE, NUMETUDIANT, NUMSEMESTRE, TYPE) VALUES('$not','$nummati[$k]', '$numa', '$numnivea','$TYP')")
or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />
l\'erreur s\'est produite à la ligne : <u>'.__LINE__.'</u>, dans le fichier <u>"'.__FILE__.
'"</u>.</span><br />'.mysql_error());
}	

for ($k = 0; $k < $nb; $k++) {
$req = mysql_query("INSERT INTO note(NOTE, NUMMATIERE, NUMETUDIANT, NUMSEMESTRE, TYPE) VALUES('$not','$nummati[$k]', '$numa', '$numnivea','$TYPE')")
or die('<span style="color:#F00;">Erreur lors d\'une requette MYSQL !<br />
l\'erreur s\'est produite à la ligne : <u>'.__LINE__.'</u>, dans le fichier <u>"'.__FILE__.
'"</u>.</span><br />'.mysql_error());
}*/
echo '<p>Etudiant ajouté </p>
<p><a href="?action=ajouter_etudiants">ajouter un autre étudiant</a></p>';
?>
<a href="?action=gerer_etudiants">retour à la gestion des étudiants</a>;
