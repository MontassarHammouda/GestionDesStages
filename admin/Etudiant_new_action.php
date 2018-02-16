<?php

require_once '../classes/Etudiant.php';

@$Nom = $_POST['nom'];
@$prenom = $_POST['prenom'];
@$cin = $_POST['cin'];
@$daten = $_POST['daten'];
@$id_classe = $_POST['classe'];
@$id_stage = $_POST['id_stage'];
@$adress = $_POST['adress'];
@$email = $_POST['email'];
@$id = $_POST['id'];
echo $id;

if (!empty($Nom) && !empty($adress) && !empty($email) && !empty($prenom) && !empty($id_classe) && !empty($cin) && !empty($daten)) {
    $cat = new Etudiant();
    $cat->_matricule_etudaint = $id;
    $cat->_id_classe = $id_classe;
    $cat->_id_stage = $id_stage;
    $cat->_nom = $Nom;
    $cat->_prenom = $prenom;
    $cat->_email = $email;
    $cat->_adress = $adress;
    $cat->_cin = $cin;
    $cat->_daten = $daten;
    if (empty($id)) {
        $cat->_matricule_etudaint = $_POST['matricule_etudaint'];
        $id = $cat->ajouterAdmin();
    } else {				// Modification
        // Modification
        $cat->_matricule_etudaint = $id;
        $cat->modifier();
    }
    header('Location: Etudaint_liste.php');
} else {
    exit('Tous les champs sont obligatoires !!');
}
