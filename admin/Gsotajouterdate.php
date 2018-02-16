<?php

require_once '../classes/soutenance.php';

@$date = $_POST['date'];
@$id = $_POST['id'];
echo $datedebuit;

if (!empty($datefin) && !empty($datedebuit)) {
    $cat = new Stage();
    $cat->_dateFin = $datefin;
    $cat->_dateDebut = $datedebuit;

    $cat->modifierDate();

    header('Location: Stage_liste.php');
} else {
    exit('Tous les champs sont obligatoires !!');
}
