<?php
include_once 'navbar.php';
?>
<div class="main">
  <h2>Gestion des notes</h2>
  
  <form action="ajouter_notes.php" method="post" enctype="multipart/form-data">
	 <div class="form-group">
        <label>Ci-dessous, il est necessaire d'indiquer le type d'épreuve</label>
        <select class="form-control niveau_list" name="TYPE">
        	<option value="1">Contrôle Continu</option>
        	<option value="2">Contrôle Terminal</option>
        </select>
     </div>
     <div class="form-group">
        <label>Séléctionner un semestre</label>
            <select class="form-control niveau_list" name="NUMSEMESTRE">
            	<?php
          		include ('config.php');
          		$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
                echo '<option value="">Selectionner un semestre</option>';
          		$reponse = mysqli_query($conn, "SELECT DISTINCT NUMSEMESTRE, LIBELLESEMESTRE FROM semestre ORDER BY LIBELLESEMESTRE");


          		$data = mysqli_fetch_array($reponse);
          						
          		foreach ($reponse as $reponse) {
          		$reponss = $reponse['LIBELLESEMESTRE'];	
          		echo '<option value="'.$reponse['NUMSEMESTRE'].'">'.$reponss.'</option>';
          		               	}
		    	?>
            </select>
    </div>
     
     <div class="form-group">
        <label>Sélectionner un niveau (Section)</label>
            <select class="form-control niveau_list" name="NUMNIVEAU">
            	<?php
          		include ('config.php');
          		$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
                echo '<option value="">Selectionner un niveau</option>';
          		$reponse = mysqli_query($conn, "SELECT DISTINCT NUMNIVEAU, LIBELLENIVEAU FROM niveau ORDER BY LIBELLENIVEAU");


          		$data = mysqli_fetch_array($reponse);
          						
          		foreach ($reponse as $reponse) {
          		$reponss = $reponse['LIBELLENIVEAU'];	
          		echo '<option value="'.$reponse['NUMNIVEAU'].'">'.$reponss.'</option>';
          		               	}
		    	?>
            </select>
    </div>
    <div class="form-group">
        <label>Sélectionner une matière</label>
            <select class="form-control niveau_list" name="NUMMATIERE">
            	<?php
          		include ('config.php');
          		$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
                echo '<option value="">Selectionner une matière</option>';
          		$reponse = mysqli_query($conn, "SELECT DISTINCT NUMMATIERE, LIBELLEMATIERE FROM matiere ORDER BY LIBELLEMATIERE");


          		$data = mysqli_fetch_array($reponse);
          						
          		foreach ($reponse as $reponse) {
          		$reponss = $reponse['LIBELLEMATIERE'];	
          		echo '<option value="'.$reponse['NUMMATIERE'].'">'.$reponss.'</option>';
          		               	}
		    	?>
            </select>
    </div>

	<button type="submit" class="btn btn-primary" name="btn_note">Valider</button>
</form>	
</div>