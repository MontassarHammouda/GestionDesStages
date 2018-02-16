<?php

require_once 'verifier_access.php';
require_once '../classes/Entreprise.php';
$cat = new Entreprise($bdd);

$cat->supprimer($_REQUEST['id']);
header('Location: Entreprise_liste.php');
