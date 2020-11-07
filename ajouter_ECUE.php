<?php
include_once 'navbar.php';
?>
<div class="main">
<h3>Ajouts des ECUE dans la base</h3>

<form method="post" action="ajouter_ECUE_1.php">
	
                <!-- text input -->
                <div class="form-group">
                  <label>Libellé Matière</label>
                  <input type="text" name="LIBELLEMATIERE" class="form-control" placeholder="Nom Module">
                </div>
              <div class="form-group">
                  <label>Section</label>
                  <select class="form-control niveau_list" name="NUMNIVEAU">
                    <?php
						include ('config.php');
						$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

						$reponse = mysqli_query($conn, "SELECT DISTINCT NUMNIVEAU, LIBELLENIVEAU FROM niveau ORDER BY LIBELLENIVEAU");


						$data = mysqli_fetch_array($reponse);

              
						echo '<option value="">Selectionner un niveau</option>';
		                foreach ($reponse as $reponse) {
						$reponss = $reponse['LIBELLENIVEAU'];	
						echo '<option value="'.$reponse['NUMNIVEAU'].'">'.$reponss.'</option>';
		               	}
		                ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Coéfficient</label>
                  <input type="NUMBER" name="COEF" class="form-control" placeholder="Définir le coefficient">
                </div>
                <div class="form-group">
                  <label>U.E</label>
                  <select class="form-control semetre_list" name="NUMMODULE">
                    <?php
            include ('config.php');
            $conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

            $reponse = mysqli_query($conn, "SELECT DISTINCT LIBELLEMODULE, NUMMODULE FROM module ORDER BY LIBELLEMODULE");


            $data = mysqli_fetch_array($reponse);

              
            echo '<option value="">Selectionner un UE</option>';
                    foreach ($reponse as $reponse) {
            $reponss = $reponse['LIBELLEMODULE']; 
            echo '<option value="'.$reponse['NUMMODULE'].'">'.$reponss.'</option>';
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Semestre</label>
                  <select class="form-control semetre_list" name="NUMSEMESTRE">
                    <?php
						include ('config.php');
						$conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");

						$reponse = mysqli_query($conn, "SELECT DISTINCT LIBELLESEMESTRE, NUMSEMESTRE FROM semestre ORDER BY LIBELLESEMESTRE");


						$data = mysqli_fetch_array($reponse);

              
						echo '<option value="">Selectionner un semestre</option>';
		                foreach ($reponse as $reponse) {
						$reponss = $reponse['LIBELLESEMESTRE'];	
						echo '<option value="'.$reponse['NUMSEMESTRE'].'">'.$reponss.'</option>';
		               	}
		                ?>
                  </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Enregistrer</button>
              </form>
</div>
<script type="text/javascript" src="js/UE.js"></script>