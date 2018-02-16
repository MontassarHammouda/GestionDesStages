<?php

require_once 'verifier_access.php';
require_once '../classes/Etudiant.php';
$cat = new Etudiant($dbb);

$cat->supprimer($_REQUEST['id']);
header('Location:Etudaint_liste.php');
