<?php
require_once('verifier_access.php'); 
require_once("../classes/Produits.php");
$cat = new Produits($bdd);

$cat->supprimer((int)$_REQUEST['id']);
header("Location: produit_liste.php");
?>