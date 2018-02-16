<?php

require_once '../classes/Enseignant.php';
$pro = new Enseignant($bdd);

$pro->supprimer($_REQUEST['id']);
header('Location:Enseignant_liste.php');
