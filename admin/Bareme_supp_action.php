<?php

require_once '../classes/Bareme.php';
$pro = new Bareme($bdd);

$pro->supprimer($_REQUEST['id']);
header('Location:Bareme_list.php');
