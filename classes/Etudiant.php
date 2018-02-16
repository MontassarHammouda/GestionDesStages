<?php

require_once 'Mysql.php';
class Etudiant extends Mysql
{
    private $_matricule_etudaint;
    private $_id_classe;
    private $_id_stage;
    private $_nom;
    private $_prenom;
    private $_adress;
    private $_email;
    private $_cin;
    private $_daten;
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

    public function details($matricule_etudaint)
    {
        $q = "SELECT * FROM etudiant WHERE matricule_etudaint ='$matricule_etudaint'";
        $res = $this->requete($q);
        $row = mysqli_fetch_array($res);
        $Ensg = new self();

        $Ensg->_matricule_etudaint = $row['matricule_etudaint'];
        $Ensg->_id_classe = $row['id_classe'];
        $Ensg->_id_stage = $row['id_stage'];
        $Ensg->_nom = $row['nom'];
        $Ensg->_prenom = $row['prenom'];
        $Ensg->_email = $row['email'];
        $Ensg->_adress = $row['adress'];
        $Ensg->_cin = $row['cin'];
        $Ensg->_daten = $row['daten'];
        $Ensg->_password = $row['password'];

        return $Ensg;
    }

    public function detailsEnst($id_stage)
    {
        $q = "SELECT * FROM etudiant WHERE id_stage ='$id_stage'";
        $res = $this->requete($q);
        $row = mysqli_fetch_array($res);
        $Ensg = new self();

        $Ensg->_matricule_etudaint = $row['matricule_etudaint'];
        $Ensg->_id_classe = $row['id_classe'];
        $Ensg->_id_stage = $row['id_stage'];
        $Ensg->_nom = $row['nom'];
        $Ensg->_prenom = $row['prenom'];
        $Ensg->_email = $row['email'];
        $Ensg->_adress = $row['adress'];
        $Ensg->_cin = $row['cin'];
        $Ensg->_daten = $row['daten'];
        $Ensg->_password = $row['password'];

        return $Ensg;
    }

    public function liste()
    {
        $q = 'SELECT * FROM etudiant ORDER BY matricule_etudaint';
        $list_Ensg = array(); // Tableau Vmatricule_etudaintE
        $res = $this->requete($q);
        while ($row = mysqli_fetch_array($res)) {
            $Ensg = new self();
            $Ensg->_matricule_etudaint = $row['matricule_etudaint'];
            $Ensg->_id_classe = $row['id_classe'];
            $Ensg->_id_stage = $row['id_stage'];
            $Ensg->_nom = $row['nom'];
            $Ensg->_prenom = $row['prenom'];
            $Ensg->_email = $row['email'];
            $Ensg->_adress = $row['adress'];
            $Ensg->_cin = $row['cin'];
            $Ensg->_daten = $row['daten'];
            $list_Ensg[] = $Ensg;
        }

        return $list_Ensg;
    }

    public function ajouterAdmin()
    {
        $q = "INSERT INTO etudiant(matricule_etudaint,id_classe,id_stage,nom,prenom,email,adress,cin,daten,password) VALUES 
	  		(  '$this->_matricule_etudaint','$this->_id_classe',null,'$this->_nom','$this->_prenom','$this->_email','$this->_adress','$this->_cin','$this->_daten','$this->_cin'
			);";
        $res = $this->requete($q);

        return mysqli_insert_id($this->get_cnx());
    }

    public function ajouter()
    {
        $q = "INSERT INTO etudiant(matricule_etudaint,id_classe,id_stage,nom,prenom,email,adress,cin,daten,password) VALUES 
	  		(  '$this->_matricule_etudaint','$this->_id_classe','$this->_id_stage','$this->_nom','$this->_prenom','$this->_email','$this->_adress','$this->_cin','$this->_daten','$this->_password'
			);";
        $res = $this->requete($q);

        return mysqli_insert_id($this->get_cnx());
    }

    public function modifier()
    {
        $q = "UPDATE etudiant SET
             id_classe	= '$this->_id_classe',
              id_stage = '$this->_id_stage',
			  nom 	= '$this->_nom',
              prenom = '$this->_prenom',
			  email = '$this->_email',
			  adress = '$this->_adress',
              cin = '$this->_cin',
              password = '$this->_password'
			  
			  WHERE matricule_etudaint = '$this->_matricule_etudaint' ";

        $res = $this->requete($q);

        return $res;
    }

    public function supprimer($matricule_etudaint)
    {
        $q = "DELETE FROM etudiant WHERE matricule_etudaint = '$matricule_etudaint'";
        $res = $this->requete($q);

        return $res;
    }
}
