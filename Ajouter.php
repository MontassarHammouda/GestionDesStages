<?php

    include_once 'session.php';
    include_once 'connect.php';
    $idcon = connect('montassarhammouda_gestiondestage', 'myparam');

    //$idcon = connect('GestionDeStage', 'myparam');
    $note = $_POST['Note'];
    $id = $_POST['ids'];
    $ides = $_POST['ides'];

    if ($idcon) {
        $requete = "update soutenance set note='$note' where idstage='$id' and matricule_ense='$ides'";
        $requete1 = "select noteg from Stage where idstage='$id'";
        $requete2 = "select porcentage from soutenance where idstage='$id' and matricule_ense='$ides'";

        $result1 = $idcon->query($requete1);
        $ligne = $result1->fetch(PDO::FETCH_ASSOC);
        $result2 = $idcon->query($requete2);
        $ligne2 = $result2->fetch(PDO::FETCH_ASSOC);
        $notg = $ligne['noteg'] + (($note * $ligne2['porcentage']) / 100);
        $requete3 = "update Stage set noteg='$notg' where idstage='$id'";
        $result3 = $idcon->exec($requete3);

        $result = $idcon->exec($requete);
        if ($result) {
            header('location:AjoutNote.php');
        } else {
            echo'problem du request';
        }
    } else {
        echo'connction echee';
    }
$idcon = null;
