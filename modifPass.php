<?php

session_start();
 include_once 'session.php';
 include_once 'connect.php';
 $idcon = connect('montassarhammouda_gestiondestage', 'myparam');
 $pass = $_GET['password'];
 $id = $_SESSION['IDetud'];
 if ($idcon) {
     $requete = "update Etudiant set passWord='$pass' where matricule_etud='$id'";
     $result = $idcon->exec($requete);
     if ($result > 0) {
         header('location:PartieEtudiant.php');
     } else {
         echo'problem du request';
     }
 } else {
     echo'connction echee';
 }
$idcon = null;
