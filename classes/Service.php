<?php

require_once 'Mysql.php';
class Service extends Mysql
{
    private $_id_service;
    private $_matricule_entreprise;
    private $_Nom_Service;
    private $_Statut;

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
        $q = "SELECT * FROM service WHERE id_service ='$id'";
        $res = $this->requete($q);
        $row = mysqli_fetch_array($res);
        $cla = new self();

        $cla->_idB_id_serviceareme = $row['id_service'];
        $cla->_matricule_entreprise = $row['matricule_entreprise'];
        $cla->_Nom_Service = $row['Nom_Service'];
        $cla->_Statut = $row['Statut'];

        return $cla;
    }

    public function liste()
    {
        $q = 'SELECT * FROM service ORDER BY id_service';
        $list_cla = array(); // Tableau VIDE
        $res = $this->requete($q);
        while ($row = mysqli_fetch_array($res)) {
            $cla = new self();
            $cla->_id_service = $row['id_service'];
            $cla->_matricule_entreprise = $row['matricule_entreprise'];
            $cla->_Nom_Service = $row['Nom_Service'];
            $cla->_Statut = $row['Statut'];

            $list_cla[] = $cla;
        }

        return $list_cla;
    }

    public function ajouter()
    {
        $q = "INSERT INTO service(id_service, matricule_entreprise,Nom_Service,Statut,DataUnive) VALUES 
               ( '$this->_id_service' ,'$this->_matricule_entreprise','$this->_Nom_Service','$this->_Statut'
             )";
        $res = $this->requete($q);

        return mysqli_insert_id($this->get_cnx());
    }

    public function modifier()
    {
        $q = "UPDATE service SET
               id_service 	= '$this->_id_service',
               matricule_entreprise = '$this->_matricule_entreprise',
               Nom_Service = '$this->_Nom_Service'
               Statut= '$this->_Statut'
              
               WHERE id_service = '$this->_id_service' ";

        $res = $this->requete($q);

        return $res;
    }

    public function supprimer($id)
    {
        $q = "DELETE FROM service WHERE id_service = '$id'";
        $res = $this->requete($q);

        return $res;
    }
}
