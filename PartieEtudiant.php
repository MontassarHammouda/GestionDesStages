<?php
session_start();
include_once 'session.php';
include_once 'connect.php';
$idcon = connect('montassarhammouda_gestiondestage', 'myparam');

//$idcon = connect('GestionDeStage', 'myparam');
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css" />
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
div.tab {
    float: left;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width: 30%;
    height: 300px;
}
div.static {
    position: static;
    border: 3px solid #73AD21;
}

/* Style the buttons inside the tab */
div.tab button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 22px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 17px;
}
.loader {
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 2s linear infinite;
}

.center p {
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current "tab button" class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    float: left;
    padding: 0px 12px;
    border: 1px solid #ccc;
    width: 70%;
    border-left: none;
    height: 300px;
}
</style>
</head>
<body>

<section class="hero is-primary animated slideInDown">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
      <?php echo $_SESSION['nonet']; ?>
      </h1>
     
    </div>
  </div>
</section>


<div class="tab">
  <button class="tablinks" onclick="openCity(event,'London')" id="defaultOpen">Profil</button>
  <button class="tablinks" onclick="openCity(event,'Paris')">Consulte Vous Stage En Cours</button>
  <button class="tablinks" onclick="openCity(event,'Tunisie')">Historique Stage</button>
  
  <?php 
  $a = $_SESSION['IDetud'];
  $requete5 = "SELECT Stage.*,Entreprise.nom as nomt  FROM Stage,Entreprise where Stage.matricule_etud='$a' and Entreprise.matricule_entre=Stage.Ent_matricule";

        $result5 = $idcon->query($requete5);
        $ligne = $result5->fetch(PDO::FETCH_ASSOC);
        if (!isset($ligne['them'])) {
            ?>
        <button class="tablinks" onclick="openCity(event,'Tunisie1')">Offre de  Stage</button>
       <?php
        }

  ?>
  
</div>
<div id="Tunisie1" class="tabcontent">
  <h3>Liste d'offre</h3>
 <p>
  <?php
  if ($idcon) {
      $a = $_SESSION['IDetud'];
      $requete2 = 'SELECT * FROM Entreprise ';
      $result2 = $idcon->query($requete2);
      $ligne2 = $result2->fetch(PDO::FETCH_ASSOC);
      echo" <form method='POST' action='".$_SERVER['PHP_SELF']."'>";
      echo "<td><select name='themchoix'>";
      echo'<option> </option>';
      do {
          echo'<option  value='.$ligne2['matricule_entre'].'>'.$ligne2['nom'].'</option>';
      } while ($ligne2 = $result2->fetch(PDO::FETCH_ASSOC));
      echo"</select><button type='submit' class='btn btn-info' value='".$_SESSION['IDetud']."'>valider</button></form><br>";
  }
  if (isset($_POST['themchoix'])) {
      $b = $_POST['themchoix'];
      $requete2 = "SELECT * FROM Entreprise where matricule_entre ='$b'";
      $result2 = $idcon->query($requete2);
      $ligne2 = $result2->fetch(PDO::FETCH_ASSOC);
      $requete1 = "SELECT * FROM them where Ent_matricule ='$b' and them.matricule_etud=''";
      echo"<table class='table table-inverse' border=2><tr>
      
        <th><center>Nom d Entreprise</center></th>
        <th><center>thème proposé</center></th>
        <th>Validation de choix</th></tr>";

      echo" <form method='POST' action='Etudiant_inser.php'>";
      echo'<td>'.$ligne2['nom'].'  à  '.$ligne2['lieu']."<input type='hidden' name='id' value='".$ligne2['matricule_entre']."'> </td> ";
      $_SESSION['idtent'] = $b;
      $result = $idcon->query($requete1);
      if ($result) {
          $ligne = $result->fetch(PDO::FETCH_ASSOC);
          echo "<td><center><select name='themchoix2'>";
          echo'<option></option>';
          do {
              echo'<option value='.$ligne['idthem'].'>'.$ligne['description'].'</option>';
          } while ($ligne = $result->fetch(PDO::FETCH_ASSOC));
          echo" </select></td><td><center><button type='submit' class='btn btn-info' value='".$_SESSION['IDetud']."'></button></form></td></tr></br>";
      }
  }

  ?>
 </p>


</div>

<div id="London" class="tabcontent">
  <h3>Profil</h3>
 <p>
  <?php
  if ($idcon) {
      $a = $_SESSION['IDetud'];
      $requete1 = "SELECT * FROM Etudiant where matricule_etud='$a'";

      $result = $idcon->query($requete1);
      if ($result) {
          $ligne = $result->fetch(PDO::FETCH_ASSOC);
          echo '<b>Votre Matricule</b>'.'         :          '.$ligne['matricule_etud'].'<br>';
          echo'<h2>Infos Générales</h2>'.'<br>';
          echo '<b>Date de naissance</b>'.'         :        '.$ligne['dateNaissance'].'<br>';
          echo '<b>Lieu</b>'.'         :        '.$ligne['lieu'].'<br>';
          echo '<b>Mot de passe</b>'.'         :        '.$ligne['passWord'].'<br>';
      }
  }

  ?>
 </p>
 
<button onclick="openCity(event,'Roma')" class="tablinks" class="btn btn-info" value=<?php echo $_SESSION['IDetud']; ?> >Modifier Votre Infos</button>
</div> 
<div id="Roma" class="tabcontent">

<h3> nouveau mot de passe :</h3>
<form action="modifPass.php" method="GET">
            <div class="row">
    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                 
                                            
                                        
                                    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" equired autocomplete="off">
                                    
                                    </div>
                                </div>
   
            </div>            
</br> <button type="submit" class="btn btn-info" > Modifier</button></form>
</div>
                  
   
</div>
<div id="Paris" class="tabcontent">
  <h3>Stage</h3>
  <p>
  <?php
  if ($idcon) {
      $a = $_SESSION['IDetud'];

      $requete2 = "SELECT Stage.*,Entreprise.nom as nomt  FROM Stage,Entreprise where Stage.matricule_etud='$a' and Entreprise.matricule_entre=Stage.Ent_matricule";

      $result1 = $idcon->query($requete2);
      if ($result1) {
          $ligne = $result1->fetch(PDO::FETCH_ASSOC);
          echo '<b>le them de Votre Stage</b>'.'         :          '.$ligne['them'].'<br>';
          echo'<b>Date debuit de stage</b>'.'         :          '.$ligne['dateDebut'].'<br>';
          echo '<b>Date fin</b>'.'         :        '.$ligne['dateFin'].'<br>';
          echo '<b>Date de soutance</b>'.'         :        '.$ligne['dateSoutance'].'<br>';
          echo "<b>le Nom de l''entreprise</b>".'         :        '.$ligne['nomt'].'<br>';

          if ($ligne['noteg'] != null) {
              echo '<b>le note de stage</b>'.'         :        '.$ligne['noteg'].'<br>';
          } else {
              echo '<b>le note de stage</b>'.'         : '.'le résultat ne pas encor disponible   <div class="loader"></div>';
          }
      }
  } else {
      echo 'aaa';
  }

?>
</p> 
<form method='POST' action='imprimer.php'>
<button type='submit' class="btn btn-info" value=<?php echo $_SESSION['IDetud']; ?> >Imprimer</button></form>
</div>
<div id="Tunisie" class="tabcontent">
  <h3>Historique Stage</h3>
  <p>
  <?php
  if ($idcon) {
      $a = $_SESSION['IDetud'];

      $requete2 = "SELECT Stage.*,Entreprise.nom as nomt  FROM Stage,Entreprise where Stage.matricule_etud='$a' and Entreprise.matricule_entre=Stage.Ent_matricule and Stage.dateSoutance < date(now())";

      $result1 = $idcon->query($requete2);
      if ($result1) {
          $ligne = $result1->fetch(PDO::FETCH_ASSOC);
          if ($ligne['matricule_etud'] != null) {
              echo '<b>le them de Votre Stage</b>'.'         :          '.$ligne['them'].'<br>';
              echo'<b>Date debuit de stage</b>'.'         :          '.$ligne['dateDebut'].'<br>';
              echo '<b>Date fin</b>'.'         :        '.$ligne['dateFin'].'<br>';
              echo '<b>Date de soutance</b>'.'         :        '.$ligne['dateSoutance'].'<br>';
              echo "<b>le Nom de l''entreprise</b>".'         :        '.$ligne['nomt'].'<br>';

              if ($ligne['noteg'] != null) {
                  echo '<b>le note de satge</b>'.'         :        '.$ligne['noteg'].'<br>';
              } else {
                  echo '<b>le note de satge</b>'.'         : '.'le résultat ne pas encor disponible   <div class="loader"></div>';
              }
          } else {
              echo '<h4>pas de Hitorique</h4><br>  <div class="loader"></div>';
          }
      }
  } else {
      echo 'aaa';
  }

?>
</p> 
</div>
<form action="Deconnexion.php" method="POST">
<input class="btn btn-danger" type="submit" value="Deconnexion" />
</form>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();


</script>

</body>
</html> 
