<?php

require_once 'Mysql.php';
class Stage extends Mysql
{
    // Les attributs privés
    private $_id_stage;
    private $_id_soutenance;
    private $_id_responsable;
    private $_dateDebut;
    private $_dateFin;
    private $_typeStage;
    private $_Theme;

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

    public function details($id_stage)
    {
        $q = "SELECT * FROM stage WHERE id_stage ='$id_stage'";
        $res = $this->requete($q);
        $row = mysqli_fetch_array($res);
        $prod = new self();

        $prod->_id_stage = $row['id_stage'];
        $prod->_id_soutenance = $row['id_soutenance'];
        $prod->_id_responsable = $row['id_responsable'];
        $prod->_dateFin = $row['dateFin'];
        $prod->_dateDebut = $row['dateDebut'];
        $prod->_typeStage = $row['typeStage'];
        $prod->_Theme = $row['Theme'];

        return $prod;
    }

    public function liste()
    {
        $q = 'SELECT * FROM stage';
        $list_prod = array(); // Tableau V	id_stageE
        $res = $this->requete($q);
        while ($row = mysqli_fetch_array($res)) {
            $prod = new self();

            $prod->_id_stage = $row['id_stage'];
            $prod->_id_soutenance = $row['id_soutenance'];
            $prod->_id_responsable = $row['id_responsable'];
            $prod->_dateFin = $row['dateFin'];
            $prod->_dateDebut = $row['dateDebut'];
            $prod->_typeStage = $row['typeStage'];
            $prod->_Theme = $row['Theme'];
            $list_prod[] = $prod;
        }

        return $list_prod;
    }

    //liste des stage son date
    public function listeNon()
    {
        $q = 'SELECT * FROM stage where dateFin is null or  dateDebut is null';
        $list_prod = array(); // Tableau V	id_stageE
        $res = $this->requete($q);
        while ($row = mysqli_fetch_array($res)) {
            $prod = new self();

            $prod->_id_stage = $row['id_stage'];
            $prod->_id_soutenance = $row['id_soutenance'];
            $prod->_id_responsable = $row['id_responsable'];
            $prod->_dateFin = $row['dateFin'];
            $prod->_dateDebut = $row['dateDebut'];
            $prod->_typeStage = $row['typeStage'];
            $prod->_Theme = $row['Theme'];
            $list_prod[] = $prod;
        }

        return $list_prod;
    }

    //Ajouter les date pour les stages
    public function modifierDate()
    {
        $q = "UPDATE stage SET
          dateFin = '$this->_dateFin',
          dateDebut = '$this->_dateDebut'
          WHERE dateFin is null or dateDebut is null ";

        $res = $this->requete($q);

        return $res;
    }

    public function ajouter()
    {
        $q = "INSERT INTO stage(id_stage,id_soutenance,id_responsable,dateDebut,dateFin,Theme,typeStage) VALUES 
          ( '$this->_id_stage','$this->_id_soutenance','$this->_id_responsable','$this->_dateDebut','$this->_dateFin','$this->_Theme','$this->_typeStage'
        );";
        $res = $this->requete($q);

        return mysqli_insert_id($this->get_cnx());
    }

    public function modifier()
    {
        $q = "UPDATE stage SET
          id_stage 	= '$this->_id_stage',
          id_soutenance 	= '$this->_id_soutenance',
          id_responsable 	= '$this->_id_responsable',
          dateFin = '$this->_dateFin',
          dateDebut = '$this->_dateDebut',
          typeStage = '$this->_typeStage'
          
          WHERE id_stage = '$this->_id_stage' ";

        $res = $this->requete($q);

        return $res;
    }

    public function supprimer($id_stage)
    {
        $q = "DELETE FROM stage WHERE 	id_stage = '$id_stage'";
        $res = $this->requete($q);

        return $res;
    }
}
