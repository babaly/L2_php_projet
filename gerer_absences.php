<?php
include_once 'navbar.php';
?>
<div class="main">
  <h2>Gerer absence</h2>
  
  <?php
echo '
<a href="ajouter_absence.php">ajouter un absence</a><br /> 

<table>
<tr>
<th>Actions</th>
<th>Id</th>
<th>Prenom</th>
<th>Nom</th>
<th>Type</th>
<th>Heure</th>
<th>Date</th>
<th>Libellé</th>
</tr>';

include ('config.php');
$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

$req = mysqli_query($conn, "SELECT NUMABSENCE, NUMSEMESTRE, NUMNIVEAU, NUMMATIERE, NUMETUDIANT,TYPE,LIBELLE, date_SAVE, HEURE FROM absence ORDER BY NUMABSENCE");


  foreach ($req as $row) :
   $req2 = mysqli_query($conn, 'SELECT NUMETUDIANT, PRENOMETUDIANT, NOMETUDIANT FROM etudiant WHERE NUMETUDIANT='.$row['NUMETUDIANT'].';');
  echo '<tr>
    <td>
      <a method="GET" href="supprimer_absence.php?NUMABSENCE='.$row['NUMABSENCE'].'">supprimer</a> /
      <a href="modifier_absence.php?NUMABSENCE='.$row['NUMABSENCE'].'&NUMSEMESTRE='.$row['NUMSEMESTRE'].'&NUMNIVEAU='.$row['NUMNIVEAU'].'&NUMMATIERE='.$row['NUMMATIERE'].'&NUMETUDIANT='.$row['NUMETUDIANT'].'&TYPE='.$row['TYPE'].'&LIBELLE='.$row['LIBELLE'].'&date_SAVE='.$row['date_SAVE'].'&HEURE='.$row['HEURE'].'">modifier</a>
    </td>
    
    <td>'.$row['NUMABSENCE'].'</td>';
    ;
    foreach ($req2 as $key) :
      echo '
      <td>'.$key['PRENOMETUDIANT'].'</td>
      <td>'.$key['NOMETUDIANT'].'</td>';
    endforeach;
    echo'<td>'.$row['TYPE'].'</td>
    <td>'.$row['HEURE'].'</td>
    <td>'.$row['date_SAVE'].'</td>
    <td>'.$row['LIBELLE'].'</td>
  </tr>';

endforeach;
echo '</table>';



?>
  
</div>