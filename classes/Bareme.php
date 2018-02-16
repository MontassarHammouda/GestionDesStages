<?php

require_once 'Mysql.php';
class Bareme extends Mysql
{
    private $_idBareme;
    private $_id_evaluation;
    private $_descr;
    private $_NoteMax;

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
        $q = "SELECT * FROM bareme WHERE idBareme ='$id'";
        $res = $this->requete($q);
        $row = mysqli_fetch_array($res);
        $bar = new self();

        $bar->_idBareme = $row['idBareme'];
        $bar->_id_evaluation = $row['id_evaluation'];
        $bar->_descr = $row['descr'];
        $bar->_NoteMax = $row['NoteMax'];

        return $bar;
    }

    public function liste()
    {
        $q = 'SELECT * FROM bareme ORDER BY idBareme';
        $list_bar = array(); // Tableau VIDE
        $res = $this->requete($q);
        while ($row = mysqli_fetch_array($res)) {
            $bar = new self();
            $bar->_idBareme = $row['idBareme'];
            $bar->_id_evaluation = $row['id_evaluation'];
            $bar->_descr = $row['descr'];
            $bar->_NoteMax = $row['NoteMax'];

            $list_bar[] = $bar;
        }

        return $list_bar;
    }

    public function ajouter()
    {
        $q = "INSERT INTO bareme(idBareme, id_evaluation,descr,NoteMax) VALUES 
	  		( null ,'$this->_id_evaluation'	,'$this->_descr','$this->_NoteMax'
			)";
        $res = $this->requete($q);

        return mysqli_insert_id($this->get_cnx());
    }

    public function ajouterAdmin()
    {
        $q = "INSERT INTO bareme(idBareme, id_evaluation,descr,NoteMax) VALUES 
	  		( null ,null,'$this->_descr','$this->_NoteMax'
			)";
        $res = $this->requete($q);

        return mysqli_insert_id($this->get_cnx());
    }

    public function modifier()
    {
        $q = "UPDATE bareme SET
			  idBareme 	= '$this->_idBareme',
			    descr = '$this->_descr',
			  NoteMax= '$this->_NoteMax'
			  WHERE idBareme = '$this->_idBareme' ";

        $res = $this->requete($q);

        return $res;
    }

    public function supprimer($id)
    {
        $q = "DELETE FROM bareme WHERE idBareme = '$id'";
        $res = $this->requete($q);

        return $res;
    }
}
