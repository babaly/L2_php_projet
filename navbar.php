<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" media="all" href="/styles.css" />
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #135;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818111;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

/* Style the header with a grey background and some padding */
.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

/* Style the header links */
.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
}

/* Style the logo link (notice that we set the same value of line-height and font-size to prevent the header to increase when the font gets bigger */
.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

/* Change the background color on mouse-over */
.header a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the active/current link*/
.header a.active {
  background-color: dodgerblue;
  color: white;
}

/* Float the link section to the right */
.header-right {
  float: right;
}

/* Add media queries for responsiveness - when the screen is 500px wide or less, stack the links on top of each other */
@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  .header-right {
    float: none;
  }
}


</style>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>

<div class="sidenav">
<a href="template.php">Accueil</a>
  <a href="gerer_etudiants.php">Gérer étudiants</a>
   <a href="gerer_notes.php">Gérer notes</a>
  <a href="gerer_enseignants.php">Gérer enseignants</a>
  <a href="gerer_absences.php">Gérer abscences</a>
  <a href="gerer_cahier.php">Gérer cahier de texte</a>
  <a href="gerer_bulletins.php">Générer bulletins</a>
  <a href="parametrages.php">paramètrages</a>
</div>

 <div class="header">
  <div class="header-right">
  <a href="#default" class="logo">Logo</a> </div> 
  <div class="header-right">
    <a class="#default" href="#home">Utilisateur <?php// echo $_SESSION['pseudo'];?></a>
    <a href="deconect.php">Deconnexion</a>
  </div>
</div> 

<div class="main">
 
  
</div>
   
</body>
</html> 