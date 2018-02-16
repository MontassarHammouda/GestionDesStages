<?php

require_once 'Mysql.php';
class soutenance extends Mysql
{
    // Les attributs privés
    private $_id_soutenance;
    private $_id_stage;
    private $_date;
    private $_heure;
    private $_NoteG;

    // Méthode magique pour les setters & getters
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

    public function details($id_soutenance)
    {
        $q = "SELECT * FROM soutenance WHERE 	id_soutenance ='$id_soutenance'";
        $res = $this->requete($q);
        $row = mysqli_fetch_array($res);
        $prod = new self();

        $prod->_id_soutenance = $row['id_soutenance'];
        $prod->_id_stage = $row['id_stage'];
        $prod->_heure = $row['heure'];
        $prod->_date = $row['date'];
        $prod->_NoteG = $row['NoteG'];

        return $prod;
    }

    public function liste()
    {
        $q = 'SELECT * FROM soutenance ORDER BY id_soutenance';
        $list_prod = array(); // Tableau V	id_soutenanceE
        $res = $this->requete($q);
        while ($row = mysqli_fetch_array($res)) {
            $prod = new self();

            $prod->_id_soutenance = $row['id_soutenance'];
            $prod->_id_stage = $row['id_stage'];
            $prod->_heure = $row['heure'];
            $prod->_date = $row['date'];
            $list_prod[] = $prod;
        }

        return $list_prod;
    }

    public function ajouter()
    {
        $q = "INSERT INTO soutenance(id_soutenance,id_stage,heure,date,NoteG) VALUES 
          ( '$this->_id_soutenance'	,'$this->_id_stage','$this->_heure','$this->_date','$this->_NoteG'
        );";
        $res = $this->requete($q);

        return mysqli_insert_id($this->get_cnx());
    }

    public function modifier()
    {
        $q = "UPDATE soutenance SET
          id_stage 	= '$this->_id_stage',
          heure = '$this->_heure',
          date = '$this->_date',
          NoteG = '$this->_NoteG'
          
          WHERE id_soutenance = '$this->_id_soutenance' ";

        $res = $this->requete($q);

        return $res;
    }

    public function supprimer($id_soutenance)
    {
        $q = "DELETE FROM soutenance WHERE 	id_soutenance = '$id_soutenance'";
        $res = $this->requete($q);

        return $res;
    }
}
