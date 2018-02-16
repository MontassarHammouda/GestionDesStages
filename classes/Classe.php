<?php

require_once 'Mysql.php';
class Classe extends Mysql
{
    private $_id_classe;
    private $_desginClasse;
    private $_desginNiveau;
    private $_desginParcours;
    private $_DataUnive;

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
        $q = "SELECT * FROM classe WHERE id_classe ='$id'";
        $res = $this->requete($q);
        $row = mysqli_fetch_array($res);
        $cla = new self();

        $cla->_id_classe = $row['id_classe'];
        $cla->_desginClasse = $row['desginClasse'];
        $cla->_desginNiveau = $row['desginNiveau'];
        $cla->_desginParcours = $row['desginParcours'];
        $cla->_DataUnive = $row['DataUnive'];

        return $cla;
    }

    public function liste()
    {
        $q = 'SELECT * FROM classe ORDER BY id_classe';
        $list_cla = array(); // Tableau VIDE
        $res = $this->requete($q);
        while ($row = mysqli_fetch_array($res)) {
            $cla = new self();
            $cla->_id_classe = $row['id_classe'];
            $cla->_desginClasse = $row['desginClasse'];
            $cla->_desginNiveau = $row['desginNiveau'];
            $cla->_desginParcours = $row['desginParcours'];
            $cla->_DataUnive = $row['DataUnive'];

            $list_cla[] = $cla;
        }

        return $list_cla;
    }

    public function ajouter()
    {
        $q = "INSERT INTO classe(id_classe, desginClasse,desginNiveau,desginParcours,DataUnive) VALUES 
               ( '$this->_id_classe' ,'$this->_desginClasse'	,'$this->_desginNiveau','$this->_desginParcours','$this->_DataUnive'
             )";
        $res = $this->requete($q);

        return mysqli_insert_id($this->get_cnx());
    }

    public function modifier()
    {
        $q = "UPDATE classe SET
               id_classe 	= '$this->_id_classe',
               desginClasse = '$this->_desginClasse',
               desginNiveau = '$this->_desginNiveau'
               desginParcours= '$this->_desginParcours'
               DataUnive ='$this->_DataUnive'
               WHERE id_classe = '$this->_id_classe' ";

        $res = $this->requete($q);

        return $res;
    }

    public function supprimer($id)
    {
        $q = "DELETE FROM classe WHERE id_classe = '$id'";
        $res = $this->requete($q);

        return $res;
    }
}
