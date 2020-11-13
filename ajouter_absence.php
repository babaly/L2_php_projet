<?php
include_once 'navbar.php';
?>
<div class="main">
<h3>Ajouter des absences</h3>
<div class="row">
  <div class="col-md-6">
   <form action="?ajouter_absence.php" method="post" enctype="multipart/form-data">
     <div class="form-group">
        <label>Semestre</label>
            <select class="form-control niveau_list" name="NUMSEMESTRE">
              <?php
              include ('config.php');
              $conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
                echo '<option value="">Selectionner une semestre</option>';
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
        <label>Niveau</label>
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
<button type="submit" class="btn btn-primary" name="rech">Recherche</button>
</form> 
  </div>
<?php
if (isset($_POST['rech'])) {
  $niveau = $_POST['NUMNIVEAU'];
  $semestre = $_POST['NUMSEMESTRE'];

?>
  <div class="col-md-6">
   <form action="ajouter_absence_1.php" method="post" enctype="multipart/form-data">
  
     <div class="form-group">
        <label>Matiere</label>
            <select class="form-control niveau_list" name="NUMMATIERE">
              <?php
              include ('config.php');
              $conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
                echo '<option value="">Selectionner une matière</option>';
              $reponse = mysqli_query($conn, 'SELECT DISTINCT NUMMATIERE, LIBELLEMATIERE FROM matiere WHERE NUMNIVEAU='.$niveau.' AND NUMSEMESTRE='.$semestre.' ORDER BY LIBELLEMATIERE');


              $data = mysqli_fetch_array($reponse);
                      
              foreach ($reponse as $reponse) {
              $reponss = $reponse['LIBELLEMATIERE'];  
              echo '<option value="'.$reponse['NUMMATIERE'].'">'.$reponss.'</option>';
                              }
          ?>
            </select>
    </div>
    <div class="form-group">
        <label>Etudiant</label>
            <select class="form-control niveau_list" name="NUMETUDIANT">
              <?php
              include ('config.php');
              $conn = mysqli_connect($sql_serveur, $sql_user, $sql_passwd, $sql_bdd) or die("Impossible de se connecter à la base mysql");
                echo '<option value="">Selectionner un(e) étudiant(e)</option>';
              $reponse = mysqli_query($conn, 'SELECT DISTINCT NUMETUDIANT, PRENOMETUDIANT, NOMETUDIANT FROM etudiant WHERE NUMNIVEAU='.$niveau.' ORDER BY NOMETUDIANT');


              $data = mysqli_fetch_array($reponse);
                      
              foreach ($reponse as $reponse) {
              $reponss = $reponse['PRENOMETUDIANT']; 
              echo '<option value="'.$reponse['NUMETUDIANT'].'">'.$reponss.' '.$reponse['NOMETUDIANT'].'</option>';
                              }
          ?>
            </select>
    </div>
    <input type="hidden" name="NUMNIVEAU" value="<?php echo $niveau ?>">
    <input type="hidden" name="NUMSEMESTRE" value="<?php echo $semestre ?>">
     
    <button type="submit" class="btn btn-primary" name="btn_rech2">Valider</button>
    </form> 
  </div>
  <?php
    }
  ?>
</div>
</div>