<?php

require_once '../classes/Bareme.php';

@$idBareme = $_POST['idBareme'];
@$descr = $_POST['descr'];
@$NoteMax = $_POST['NoteMax'];
@$id = $_POST['id'];
if (!empty($idBareme) && !empty($descr) && !empty($NoteMax)) {
    $pro = new Bareme();
    $pro->_idBareme = $id;
    $pro->_descr = $descr;
    $pro->_NoteMax = $NoteMax;
    if (empty($id)) { 	// Ajout
        $pro->_idBareme = $_POST['idBareme'];
        $id = $pro->ajouterAdmin();
    } else {				// Modification
        $pro->_idBareme = $id;
        $pro->modifier();
    }

    header('Location:Bareme_list.php');
} else {
    exit('Tous les champs sont obligatoires !!');
}
