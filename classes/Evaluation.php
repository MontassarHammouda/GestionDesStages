<?php

require_once 'Mysql.php';
class Evaluation extends Mysql
{
    private $_id_evaluation;
    private $_id_soutenance;
    private $_matricule_enseignant;
    private $_note;

    // M�thode magique pour les setters & getters
    public function __get($attribut)
    {
        if (property_exists($this, $attribut)) {
            return  $this->$attribut;
        } else {
            exit('Erreur dans la calsse '.__CLASS__." : l'attribut $property n'existe pas!");
        }
    }

    public function __set($attribut, $value)
    {
        if (property_exists($this, $attribut)) {
            $this->$attribut = (mysqli_real_escape_string($this->get_cnx(), $value));
        } else {
            exit('Erreur dans la calsse '.__CLASS__." : l'attribut $property n'existe pas!");
        }
    }

    public function details($id)
    {
        $q = "SELECT * FROM Evaluation WHERE id_evaluation ='$id'";
        $res = $this->requete($q);
        $row = mysqli_fetch_array($res);
        $cla = new self();

        $cla->_id_evaluation = $row['id_evaluation'];
        $cla->_id_soutenance = $row['id_soutenance'];
        $cla->_matricule_enseignant = $row['matricule_enseignant'];
        $cla->_note = $row['note'];

        return $cla;
    }

    public function nbSoutenance($id)
    {
        $q = "SELECT * FROM Evaluation WHERE matricule_enseignant ='$id'";
        $list_cla = array();
        $res = $this->requete($q);
        while ($row = mysqli_fetch_array($res)) {
            $cla = new self();

            $cla->_id_evaluation = $row['id_evaluation'];
            $cla->_id_soutenance = $row['id_soutenance'];
            $list_cla[] = $cla;
        }

        return $list_cla;
    }

    public function liste()
    {
        $q = 'SELECT * FROM Evaluation ORDER BY id_evaluation';
        $list_cla = array(); // Tableau VIDE
        $res = $this->requete($q);
        while ($row = mysqli_fetch_array($res)) {
            $cla = new self();
            $cla->_id_evaluation = $row['id_evaluation'];
            $cla->_id_soutenance = $row['id_soutenance'];
            $cla->_matricule_enseignant = $row['matricule_enseignant'];
            $cla->_note = $row['note'];

            $list_cla[] = $cla;
        }

        return $list_cla;
    }

    public function ajouter()
    {
        $q = "INSERT INTO Evaluation(id_evaluation, id_soutenance,matricule_enseignant,note) VALUES 
               ( '$this->_id_evaluation' ,'$this->_id_soutenance'	,'$this->_matricule_enseignant','$this->_note'
             )";
        $res = $this->requete($q);

        return mysqli_insert_id($this->get_cnx());
    }

    public function modifier()
    {
        $q = "UPDATE Evaluation SET
               id_evaluation 	= '$this->_id_evaluation',
               id_soutenance = '$this->_id_soutenance',
               matricule_enseignant = '$this->_matricule_enseignant'
               note= '$this->_note'
              
               WHERE id_evaluation = '$this->_id_evaluation' ";

        $res = $this->requete($q);

        return $res;
    }

    public function supprimer($id)
    {
        $q = "DELETE FROM Evaluation WHERE id_evaluation = '$id'";
        $res = $this->requete($q);

        return $res;
    }
}
