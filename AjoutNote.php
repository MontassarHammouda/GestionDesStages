<?php
session_start();
include_once 'session.php';
include_once 'connect.php';
$idcon = connect('montassarhammouda_gestiondestage', 'myparam');

//$idcon = connect('GestionDeStage', 'myparam');
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
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
.bottomright {
    position: absolute;
    bottom: 8px;
    right: 16px;
    font-size: 18px;
}
</style>
    </head>
    <body>
    <div class="bottomright">
    <a href="PartieEnseignant.php">
          <span class="glyphicon glyphicon-home" style='font-size:40px';></span>
        </a>
</div>
    <?php
if ($idcon) {
    $a = $_SESSION['id'];
    $requete1 = "SELECT so.*,e.*,s.* FROM Etudiant e,Stage s,soutenance so where so.matricule_ense='$a' and so.idstage=s.idstage and s.matricule_etud=e.matricule_etud and s.dateSoutance <=date(now()) ORDER by 1 ASC";

    $result = $idcon->query($requete1);
    if ($result) {
        $ligne = $result->fetch(PDO::FETCH_ASSOC);
        $da = $ligne['dateSoutance']; ?>
     
<table id="customers">
<tr>
  <?php 

      echo '<th>Nom</th><th>Prenom</th><th>Them</th><th>Note</th>'; ?>
  </tr>
  
  <?php 
  do {
      echo '<tr>';

      echo '<td>'.$ligne['nom'].'</td><td>'.$ligne['prenom'].'</td><td>'.$ligne['them'].'</td>';
      if ($ligne['note'] == null) {
          echo "<form method='POST' action='Ajouter.php'><td><input type='number' min='0' step='0.1'  max='20' name='Note'><input type='hidden' name='ids' value=".$ligne['idstage']."><input type='hidden' name='ides' value=".$ligne['matricule_ense'].'> <Button class="glyphicon glyphicon-ok"style="height:26.3px;"></form></td>';
      } else {
          echo '<td>'.$ligne['note'].'</td>';
      }
      echo '</tr>';
  } while ($ligne = $result->fetch(PDO::FETCH_ASSOC)); ?>
 
  
</table>
<?php
    }
}?>
    </body>
    </html>