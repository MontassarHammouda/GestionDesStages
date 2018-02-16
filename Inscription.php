<?php

session_start();
include_once 'session.php';
include_once 'connect.php';
$idcon = connect('montassarhammouda_gestiondestage', 'myparam');

//$idcon = connect('GestionDeStage', 'myparam');
if ((empty($_POST['Matricule'])) || (empty($_POST['last_name'])) || (empty($_POST['lieu'])) || (empty($_POST['password_confirmation']))) {
    header('location:singin.php');
} else {
    $m = $_POST['Matricule'];
    $l = $_POST['last_name'];
    $li = $_POST['lieu'];
    $pw = $_POST['password_confirmation'];
    $requete1 = "insert into Entreprise values ('$m','$l','$li','$pw')";
    $nb1 = $idcon->exec($requete1);
    if ($nb1 > 0) {
        header('location:index.php');
    }
}
