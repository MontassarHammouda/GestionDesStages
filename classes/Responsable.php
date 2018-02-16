<?php

require_once 'Mysql.php';
class Responsable extends Mysql
{
    private $_id_responsable;
    private $_id_service;
    private $_nom;
    private $_prenom;

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
        $q = "SELECT * FROM responsable WHERE id_responsable ='$id'";
        $res = $this->requete($q);
        $row = mysqli_fetch_array($res);
        $cla = new self();

        $cla->_idB_id_responsableareme = $row['id_responsable'];
        $cla->_id_service = $row['id_service'];
        $cla->_nom = $row['nom'];
        $cla->_prenom = $row['prenom'];

        return $cla;
    }

    public function liste()
    {
        $q = 'SELECT * FROM responsable ORDER BY id_responsable';
        $list_cla = array(); // Tableau VIDE
        $res = $this->requete($q);
        while ($row = mysqli_fetch_array($res)) {
            $cla = new self();
            $cla->_id_responsable = $row['id_responsable'];
            $cla->_id_service = $row['id_service'];
            $cla->_nom = $row['nom'];
            $cla->_prenom = $row['prenom'];

            $list_cla[] = $cla;
        }

        return $list_cla;
    }

    public function ajouter()
    {
        $q = "INSERT INTO responsable(id_responsable, id_service,nom,prenom) VALUES 
               ( '$this->_id_responsable' ,'$this->_id_service'	,'$this->_nom','$this->_prenom'
             )";
        $res = $this->requete($q);

        return mysqli_insert_id($this->get_cnx());
    }

    public function modifier()
    {
        $q = "UPDATE responsable SET
               id_responsable 	= '$this->_id_responsable',
               id_service = '$this->_id_service',
               nom = '$this->_nom'
               prenom= '$this->_prenom'
              
               WHERE id_responsable = '$this->_id_responsable' ";

        $res = $this->requete($q);

        return $res;
    }

    public function supprimer($id)
    {
        $q = "DELETE FROM responsable WHERE id_responsable = '$id'";
        $res = $this->requete($q);

        return $res;
    }
}
