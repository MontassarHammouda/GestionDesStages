<?php

require_once 'Mysql.php';
class Enseignant extends Mysql
{
    private $_matricule_enseignant;
    private $_nom;
    private $_prenom;
    private $_adress;
    private $_email;
    private $_cin;
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

    public function details($id)
    {
        $q = "SELECT * FROM enseignant WHERE matricule_enseignant ='$id'";
        $res = $this->requete($q);
        $row = mysqli_fetch_array($res);
        $Ensg = new self();

        $Ensg->_matricule_enseignant = $row['matricule_enseignant'];
        $Ensg->_nom = $row['nom'];
        $Ensg->_prenom = $row['prenom'];
        $Ensg->_email = $row['email'];
        $Ensg->_adress = $row['adress'];
        $Ensg->_cin = $row['cin'];
        $Ensg->_password = $row['password'];

        return $Ensg;
    }

    public function liste()
    {
        $q = 'SELECT * FROM enseignant ORDER BY matricule_enseignant';
        $list_Ensg = array(); // Tableau Vmatricule_enseignantE
        $res = $this->requete($q);
        while ($row = mysqli_fetch_array($res)) {
            $Ensg = new self();

            $Ensg->_matricule_enseignant = $row['matricule_enseignant'];
            $Ensg->_nom = $row['nom'];
            $Ensg->_prenom = $row['prenom'];
            $Ensg->_email = $row['email'];
            $Ensg->_adress = $row['adress'];
            $Ensg->_cin = $row['cin'];
            $list_Ensg[] = $Ensg;
        }

        return $list_Ensg;
    }

    public function ajouter()
    {
        $q = "INSERT INTO enseignant(matricule_enseignant,nom,prenom,email,adress,cin,password) VALUES 
	  		(  '$this->_matricule_enseignant','$this->_nom','$this->_prenom','$this->_email','$this->_adress','$this->_cin','$this->_cin'
			);";
        $res = $this->requete($q);

        return mysqli_insert_id($this->get_cnx());
    }

    public function modifier()
    {
        $q = "UPDATE enseignant SET
			  nom 	= '$this->_nom',
              prenom = '$this->_prenom',
			  email = '$this->_email',
			  adress = '$this->_adress',
              cin = '$this->_cin',
              password = '$this->_password'
			  
			  WHERE matricule_enseignant = '$this->_matricule_enseignant' ";

        $res = $this->requete($q);

        return $res;
    }

    public function supprimer($matricule_enseignant)
    {
        $q = "DELETE FROM enseignant WHERE matricule_enseignant = '$matricule_enseignant'";
        $res = $this->requete($q);

        return $res;
    }
}
