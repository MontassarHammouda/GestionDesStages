<?php

ob_start();
session_start();
include_once 'connect.php';
$idcon = connect('montassarhammouda_gestiondestage', 'myparam');

//$idcon = connect('GestionDeStage', 'myparam');
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
              echo '<b>le note de satge</b>'.'         :        '.$ligne['noteg'].'<br>';
          } else {
              echo '<b>le note de satge</b>'.'         : '.'le résultat ne pas encor disponible';
          }
      }
  } else {
      echo 'aaa';
  }

$html = ob_get_contents();
ob_end_clean();

//exit($html);

require 'vendor/autoload.php';

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
//$dompdf->loadHtml('hello world');
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
//$dompdf->setPaper('A4', 'landscape');
$dompdf->setPaper('A4');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('Satge-999999.pdf');
