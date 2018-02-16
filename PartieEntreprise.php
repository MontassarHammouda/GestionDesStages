<?php
session_start();
include_once 'session.php';
include_once 'connect.php';
$idcon = connect('montassarhammouda_gestiondestage', 'myparam');
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css" />
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
.loader {
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    border-top: 16px solid blue;
    border-bottom: 16px solid blue;
    width: 100px;
    height: 100px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
  }
  
  @-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
  }
  
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
.bottomright {
    position: absolute;
    bottom: 8px;
    right: 16px;
    font-size: 18px;
}

</style>
</head>
<body>
<section class="hero is-primary animated swing">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
      <?php echo $_SESSION['nom']; ?>
      </h1>
     
    </div>
  </div>
</section>


<?php
if ($idcon) {
    $a = $_SESSION['id'];
    $requete1 = "SELECT s.dateSoutance,s.matricule_etud,e.nom,e.prenom,s.them,so.role FROM Etudiant e,Stage s,soutenance so where so.matricule_ense='$a' and so.idstage=s.idstage and s.matricule_etud=e.matricule_etud ORDER by 1 ASC";

    $result = $idcon->query($requete1);
    if ($result) {
        $ligne = $result->fetch(PDO::FETCH_ASSOC);
        $da = $ligne['dateSoutance']; ?>
     
<table id="customers">
<tr>
  <?php 
  foreach ($ligne as $key => $value) {
      echo "<th>$key</th>";
  } ?>
  </tr>
  
  <?php 
  do {
      echo '<tr>';
      foreach ($ligne as $key => $value) {
          echo "<td>$value</td>";
      }
      echo '</tr>';
  } while ($ligne = $result->fetch(PDO::FETCH_ASSOC)); ?>
 
  
</table>
<?php 
       $resultd = $idcon->query('select Date(now())as d');
        $ligned = $resultd->fetch(PDO::FETCH_ASSOC);

        if ($ligned['d'] == $da) {
            echo"<div class='bottomright'><form method='POST' action='AjoutNote.php'><button type='submit' class='btn btn-info'/>Ajouter les Note</button></form></div>";
        } else {
            ?>
<div class="bottomright"><h4>Date Soutance</h4>
<div class="loader"></div></div>
<?php
        }
    }
}?>

</body>
</html>
