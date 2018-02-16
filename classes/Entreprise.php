<?php

require_once 'Mysql.php';
class Entreprise extends Mysql
{
    // Les attributs privés
    private $_matricule_entreprise;
    private $_nom;
    private $_Lieu;
    private $_email;
    private $_password;

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

    public function details($matricule_entreprise)
    {
        $q = "SELECT * FROM entreprise WHERE 	matricule_entreprise ='$matricule_entreprise'";
        $res = $this->requete($q);
        $row = mysqli_fetch_array($res);
        $prod = new self();

        $prod->_matricule_entreprise = $row['matricule_entreprise'];
        $prod->_nom = $row['nom'];
        $prod->_email = $row['email'];
        $prod->_Lieu = $row['Lieu'];
        $prod->_password = $row['password'];

        return $prod;
    }

    public function liste()
    {
        $q = 'SELECT * FROM entreprise ORDER BY matricule_entreprise';
        $list_prod = array(); // Tableau V	matricule_entrepriseE
        $res = $this->requete($q);
        while ($row = mysqli_fetch_array($res)) {
            $prod = new self();

            $prod->_matricule_entreprise = $row['matricule_entreprise'];
            $prod->_nom = $row['nom'];
            $prod->_email = $row['email'];
            $prod->_Lieu = $row['Lieu'];
            $list_prod[] = $prod;
        }

        return $list_prod;
    }

    public function ajouter()
    {
        $q = "INSERT INTO entreprise(matricule_entreprise,nom,email,Lieu,password) VALUES 
          ( '$this->_matricule_entreprise'	,'$this->_nom','$this->_email','$this->_Lieu','$this->_password'
        );";
        $res = $this->requete($q);

        return mysqli_insert_id($this->get_cnx());
    }

    public function modifier()
    {
        $q = "UPDATE entreprise SET
          nom 	= '$this->_nom',
          email = '$this->_email',
          Lieu = '$this->_Lieu',
          password = '$this->_password'
          
          WHERE matricule_entreprise = '$this->_matricule_entreprise' ";

        $res = $this->requete($q);

        return $res;
    }

    public function modifierAdmin()
    {
        $q = "UPDATE entreprise SET
          nom 	= '$this->_nom',
          email = '$this->_email',
          Lieu = '$this->_Lieu'
         WHERE matricule_entreprise = '$this->_matricule_entreprise' ";

        $res = $this->requete($q);

        return $res;
    }

    public function supprimer($matricule_entreprise)
    {
        $q = "DELETE FROM entreprise WHERE 	matricule_entreprise = '$matricule_entreprise'";
        $res = $this->requete($q);

        return $res;
    }
}
