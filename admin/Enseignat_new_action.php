<?php

require_once '../classes/Enseignant.php';

@$cin = $_POST['cin'];
@$email = $_POST['email'];
@$adress = $_POST['adress'];
@$nom = $_POST['nom'];
@$prenom = $_POST['prenom'];
@$id = $_POST['id'];
if (!empty($cin) && !empty($email) && !empty($adress) && !empty($nom) && !empty($prenom)) {
    $pro = new Enseignant();
    $pro->_matricule_enseignant = $id;
    $pro->_nom = $nom;
    $pro->_prenom = $prenom;
    $pro->_adress = $adress;
    $pro->_email = $email;
    $pro->_cin = $cin;

    if (empty($id)) { 	// Ajout
        $pro->_matricule_enseignant = $_POST['matricule_enseignant'];
        $id = $pro->ajouter();
    } else {				// Modification
        $pro->_matricule_enseignant = $id;
        $pro->modifier();
    }

    header('Location:Enseignant_liste.php');
} else {
    exit('Tous les champs sont obligatoires !!');
}
