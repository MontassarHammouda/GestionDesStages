<?php

require_once '../classes/Entreprise.php';

@$Nom = $_POST['nom'];
@$Lieu = $_POST['Lieu'];
@$email = $_POST['email'];
@$id = $_POST['id'];

if (!empty($Nom) && !empty($Lieu) && !empty($email)) {
    $cat = new Entreprise();
    $cat->_nom = $Nom;
    $cat->_Lieu = $Lieu;
    $cat->_email = $email;

    // Modification
    $cat->_matricule_entreprise = $id;
    $cat->modifierAdmin();
    header('Location: Entreprise_liste.php');
} else {
    exit('Tous les champs sont obligatoires !!');
}
