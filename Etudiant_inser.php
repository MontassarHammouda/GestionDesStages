<?php

session_start();
include_once 'session.php';
include_once 'connect.php';
$idcon = connect('montassarhammouda_gestiondestage', 'myparam');

//$idcon = connect('GestionDeStage', 'myparam');
if (isset($_POST['themchoix2'])) {
    $idet = $_SESSION['IDetud'];
    $ident = $_SESSION['idtent'];

    $requete2 = "SELECT * FROM them where idthem ='".$_POST['themchoix2']."'";
    $result2 = $idcon->query($requete2);
    $ligne2 = $result2->fetch(PDO::FETCH_ASSOC);
    $them = $ligne2['description'];
    $requete = "update them set matricule_etud='".$_SESSION['IDetud']."' where idthem='".$_POST['themchoix2']."'";
    $requete1 = "insert into Stage values (null,'$idet','$ident',null,null,'$them',null,null)";
    echo $requete1;
    $nb = $idcon->exec($requete);
    $nb1 = $idcon->exec($requete1);
    if ($nb > 0 && $nb1 > 0) {
        echo $_POST['themchoix2'];
        header('location:PartieEtudiant.php');
    }
}
