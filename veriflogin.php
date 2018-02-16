<?php
 include_once 'session.php';
 include_once 'connect.php';
 $idcon = connect('montassarhammouda_gestiondestage', 'myparam');

 //$idcon = connect('GestionDeStage', 'myparam');

 $login = $_POST['Login'];
 $pw = $_POST['Password'];
 echo $login;
 echo $pw.aa;
 if ($idcon) {
     $requete = "SELECT * FROM Enseignant where matricule_ense='$login' and passWord='$pw'";
     $requete1 = "SELECT * FROM Etudiant where matricule_etud='$login' and passWord='$pw'";
     $requete2 = "SELECT * FROM Entreprise where matricule_etud='$login' and passWord='$pw'";
     //echo $requete1;

     $result = $idcon->query($requete);
     $result1 = $idcon->query($requete1);
     $result2 = $idcon->query($requete2);
     //echo $result;
     if ($result) {
         if (($result->rowCount()) == 1) {
             session_start();
             $_SESSION['Login'] = 1;
             $ligne = $result->fetch(PDO::FETCH_ASSOC);
             $_SESSION['nom'] = $ligne['nom'].' '.$ligne['prenom'];
             $requete2 = "SELECT * FROM soutenance where matricule_ense='$login'";
             $result2 = $idcon->query($requete2);
             $ligne1 = $result2->fetch(PDO::FETCH_ASSOC);
             $_SESSION['Role'] = $ligne1['role'];
             $_SESSION['id'] = $ligne1['matricule_ense'];
             header('location:PartieEnseignant.php');
         } else {
             echo'Login / Password  false';
         }
     }
     if ($result1) {
         if (($result1->rowCount()) == 1) {
             session_start();
             $_SESSION['Login'] = 1;
             $ligne = $result1->fetch(PDO::FETCH_ASSOC);
             $_SESSION['nonet'] = $ligne['nom'].' '.$ligne['prenom'];
             $_SESSION['IDetud'] = $ligne['matricule_etud'];
             header('location:PartieEtudiant.php');
         }
     } else {
         echo'Login / Password  false';
     }
 } else {
     echo'problem du requet';
 }

        $idcon = null;
