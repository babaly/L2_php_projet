<?php
include_once 'navbar.php';
?>
<div class="main">
<h3>Ajouts des enseignants dans la base</h3>

<form method="post" action="ajouter_enseignant_1.php">
	
                <!-- text input -->
                <div class="form-group">
                  <label>Nom</label>
                  <input type="text" name="NOMENSEIGNANT" class="form-control" placeholder="Nom enseignant">
                </div>
                 <div class="form-group">
                  <label>Prenom</label>
                  <input type="text" name="PRENOMENSEIGNANT" class="form-control" placeholder="Prenom enseignant">
                </div>
                 <div class="form-group">
                  <label>Nom d'utilisateur</label>
                  <input type="text" name="pseudo" class="form-control" placeholder="Définir le nom d'utilisateur">
                </div>
                 <div class="form-group">
                  <label>Mot de passe</label>
                  <input type="password" name="passe" class="form-control" placeholder="Définir le mot de passe de l'utilisateur">
                </div>
              <div class="form-group">
                  <label>Matière</label>
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
               
          
                <button type="submit" class="btn btn-primary">Enregistrer</button>
              </form>
</div>
<script type="text/javascript" src="js/UE.js"></script>