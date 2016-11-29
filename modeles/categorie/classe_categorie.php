<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class categorie {

    public $id_cat;
    public $nom;
    public $description;

    static public function NewById($id) {
        $tmp = new categorie();
        if ($tmp->getById($id)) {
            return $tmp;
        } else {
            return null;
        }
    }

    static public function NewByRecetteId($id) {
        $tmp = new categorie();
        if ($tmp->getById($id)) {
            return $tmp;
        } else {
            return null;
        }
    }

    static public function getListCategorie() {
        $requete = "select * from categorie ";
        //echo ("<p>requete = $requete </p>");
        return categorie::getRequeteList($requete);
    }

    private function getRequeteList($requete) {
        $listValues = array();
        try {
            $dbh = new PDO(SERVEUR, USER, PWD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $mesItems = $dbh->query($requete);
            $dbh = null;
            //echo ("<p>requete executee</p>");
            //print_r($mesItems);
            $mesItems->setFetchMode(PDO::FETCH_ASSOC);
            if ($mesItems->rowCount() > 0) {
                foreach ($mesItems as $monItem) {
                    array_push($listValues, $monItem);
                }
                return $listValues;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "une erreur est survenue : " . $e->getMessage();
            return false;
        }
    }

    public function getById($id) {
        $requete = "select * from categorie where id_cat= $id";
        return $this->getRequete($requete);
    }

    public function getByRecetteId($id) {
        $requete = "select * from categorie where id_recette= $id";
        return $this->getRequete($requete);
    }

    private function getRequete($requete) {
        //echo ("<p>requete = $requete </p>");
        try {
            $dbh = new PDO(SERVEUR, USER, PWD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $mesItems = $dbh->query($requete);
            $dbh = null;
            //echo ("<p>requete executee</p>");
            $mesItems->setFetchMode(PDO::FETCH_ASSOC);
            if ($mesItems->rowCount() > 0) {
                foreach ($mesItems as $monItem) {
                    $this->id_cat = $monItem['id_cat'];
                    $this->nom = $monItem['nom'];
                    $this->description = $monItem['description'];
                }
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "une erreur est survenue : " . $e->getMessage();
            return false;
        }
    }

        public function create() {
        $requete = "insert into categorie (nom, description) values ('$this->nom', '$this->description')";
        echo ("<p>requete create categorie = $requete </p>");
        try {
            $dbh = new PDO(SERVEUR, USER, PWD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo ("<p>cnx base OK</p>");
            $mesItems = $dbh->query($requete);
            if ($mesItems != false) {
                $dbh = null;
                //echo ("<p>requete executee</p>");
                $mesItems->setFetchMode(PDO::FETCH_ASSOC);
                return true;
            } else {
                $dbh = null;
                //echo ("<p>erreur sur requete</p>");
                return false;
            }
        } catch (PDOException $e) {
            echo "<p>une erreur est survenue lors de l'update de la photo : " . $e->getMessage();
            return false;
        }
        return false;
    }

        public function update() {
        $requete = "update categorie set nom='".$this->nom
                ."', description='".$this->description
                . "' where id_cat='".$this->id_cat."'";
        echo ("<p>requete update categorie = $requete </p>");
        try {
            $dbh = new PDO(SERVEUR, USER, PWD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo ("<p>cnx base OK</p>");
            $mesItems = $dbh->query($requete);
            if ($mesItems != false) {
                $dbh = null;
                //echo ("<p>requete executee</p>");
                $mesItems->setFetchMode(PDO::FETCH_ASSOC);
                $this->getById($this->id_cat);
                return true;
            } else {
                $dbh = null;
                //echo ("<p>erreur sur requete</p>");
                return false;
            }
        } catch (PDOException $e) {
            echo "<p>une erreur est survenue lors de l'update de la photo : " . $e->getMessage();
            return false;
        }
        return false;
    }

    public function affiche() {
        echo "<table>";
        echo "<tr><td>id_cat</td><td>" . $this->id_cat . "</td></tr>";
        echo "<tr><td>nom</td><td>" . $this->nom . "</td></tr>";
        echo "<tr><td>description</td><td>" . $this->description . "</td></tr>";
        echo "</table>";
    }

}

?>