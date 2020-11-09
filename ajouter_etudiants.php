<?php
include_once 'navbar.php';
?>
<div class="main">
<h3>Ajouter des étudiants</h3>
<form action="ajouter_etudiants_1.php" method="post" enctype="multipart/form-data">
	 <div class="form-group">
        <label>Prenom</label>
        <input type="text" name="PRENOMETUDIANT" class="form-control" placeholder="Prenom etudiant">
     </div>
     <div class="form-group">
        <label>Nom</label>
        <input type="text" name="NOMETUDIANT" class="form-control" placeholder="Nom etudiant">
     </div>
     <div class="form-group">
        <label>Date de naissance</label>
        <input type="date" name="DATENAISSANCE" class="form-control" placeholder="">
     </div>
     <div class="form-group">
        <label>Lieu de naissance</label>
        <input type="text" name="LIEUNAISSANCE" class="form-control" placeholder="ex: Dakar">
     </div>
     <div class="form-group">
        <label>Sexe</label>
        <select class="form-control niveau_list" name="SEXE">
        	<option value="Masculin">Masculin</option>
        	<option value="Féminin">Féminin</option>
        </select>
     </div>
     <div class="form-group">
        <label>Adresse</label>
        <input type="text" name="ADRESSE" class="form-control" placeholder="ex: Rue 39 x Blaise Diagne">
     </div>
     <div class="form-group">
        <label>Téléphone</label>
        <input type="text" name="TELPORT" class="form-control" placeholder="ex: 777123578">
     </div>
     <div class="form-group">
        <label>Email</label>
        <input type="text" name="EMAIL" class="form-control" placeholder="exemple@gmail.com">
     </div>
     <div class="form-group">
        <label>Section</label>
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
<button type="submit" class="btn btn-primary">Enregistrer</button>
</form>	
</div>