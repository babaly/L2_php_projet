<?php 
// SERVEUR SQL
$sql_serveur="localhost";

// LOGIN SQL
$sql_user="root";

// MOT DE PASSE SQL
$sql_passwd="";

// NOM DE LA BASE DE DONNEES
$sql_bdd="unipro";
$bdd = new PDO('mysql:host=localhost;dbname='.$sql_bdd.'', $sql_user , '');

	 try {
	 	$bdd = new PDO('mysql:host=localhost;dbname='.$sql_bdd.'', $sql_user , '');
	 	
	 }
	catch (PDOExeption $e) {
		die('Erreur:'. $e->getMessage());
	}

?> 
