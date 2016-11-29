<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ingredient {

    public $id_ingredient;
    public $nom;
    public $couleur;
    public $type;

    static public function getListIngredients() {
        $requete = "select * from ingredients order by nom";
        //echo ("<p>requete = $requete </p>");
        return ingredient::getRequeteList($requete);
    }

    static public function GetListId($id_recette) {
        $requete = "SELECT ingredients.nom, constituants.quantite, constituants.id_constituant  FROM constituants JOIN ingredients ON constituants.id_ingredient = ingredients.id_ingredient  JOIN recettes ON constituants.id_recette = recettes.id_recette where recettes.id_recette=$id_recette order by constituants.rang";
        //$requete = "SELECT ingredients.nom, constituants.quantite, constituants.id_constituant  FROM constituants JOIN ingredients ON constituants.id_ingredient = ingredients.id_ingredient  JOIN recettes ON constituants.id_recette = recettes.id_recette where recettes.id_recette=$id_recette";
        //echo ("<p>requete = $requete </p>");
        $listIdIngredients = array();
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
                    //print_r($monItem);
                    array_push($listIdIngredients, $monItem);
                }
                return $listIdIngredients;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "une erreur est survenue : " . $e->getMessage();
            return false;
        }
    }

    private function getRequeteList($requete) {
        $listIngredients = array();
        try {
            $dbh = new PDO(SERVEUR, USER, PWD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $mesItems = $dbh->query($requete);
            $dbh = null;
            //echo ("<p>requete executee $requete</p>");
            //print_r($mesItems);
            $mesItems->setFetchMode(PDO::FETCH_ASSOC);
            if ($mesItems->rowCount() > 0) {
                foreach ($mesItems as $monItem) {
                    array_push($listIngredients, $monItem);
                }
                return $listIngredients;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "une erreur est survenue : " . $e->getMessage();
            return false;
        }
    }

    public function getById($id) {
        $requete = "select * from ingredients where id_ingredient= $this->aliasTexte($id)";
        //echo ("<p>requete = $requete </p>");
        try {
            $dbh = new PDO(SERVEUR, USER, PWD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $mesItems = $dbh->query($requete);
            echo ("<p>requete executee</p>");
            $mesItems->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($mesItems as $monItem) {
                $this->id_ingredient = $monItem['id_recette'];
                $this->nom = $monItem['nom'];
                $this->couleur = $monItem['couleur'];
                $this->type = $monItem['type'];
            }
            $dbh = null;
        } catch (POEException $e) {
            echo "une erreur est survenue : " . $e->getMessage();
        }
    }

    public function getByNom($nom) {
        $nom=$this->aliasTexte($nom);
        echo "<br> fonction ingredient getByNom($nom)";
        $requete = "select * from ingredients where nom='$nom'";
        echo ("<br>requete = $requete </p>");
        try {
            $dbh = new PDO(SERVEUR, USER, PWD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $mesItems = $dbh->query($requete);
            echo ("<p>requete executee</p>");
            $mesItems->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($mesItems as $monItem) {
                $this->id_ingredient = $monItem['id_ingredient'];
                $this->nom = $monItem['nom'];
                $this->couleur = $monItem['couleur'];
                $this->type = $monItem['type'];
            }
            $dbh = null;
            return $this;
        } catch (POEException $e) {
            echo "une erreur est survenue : " . $e->getMessage();
            return null;
        }
    }

    public function create(){
        $requete = "insert into ingredients (nom, couleur, type) values ('$this->nom', '$this->couleur', '$this->type')";
        echo ("<p>requete = $requete </p>");
        try {
            $dbh = new PDO(SERVEUR, USER, PWD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo ("<p>cnx base OK</p>");
            $mesItems = $dbh->query($requete);
            //print_r($mesItems);
            if ($mesItems != false) {
                $dbh = null;
                //echo ("<p>requete executee</p>");
                $mesItems->setFetchMode(PDO::FETCH_ASSOC);
                //$this->getById($titre);
                return true;
            } else {
                $dbh = null;
                //echo ("<p>erreur sur requete</p>");
                return false;
            }
        } catch (PDOException $e) {
            echo "<p>une erreur est survenue lors de la creation de la recette : " . $e->getMessage();
            return false;
        }
        return false;
    }
    
    public function affiche() {
        echo "<table>";
        echo "<tr><td>id_ingredient</td><td>" . $this->id_ingredient . "</td></tr>";
        echo "<tr><td>nom</td><td>" . $this->nom . "</td></tr>";
        echo "<tr><td>couleur</td><td>" . $this->couleur . "</td></tr>";
        echo "<tr><td>type</td><td>" . $this->type . "</td></tr>";
        echo "</table>";
    }

        public function aliasTexte($chaine){
        $healthy=array("'");
        $yummy=array("\'");
        return str_replace($healthy, $yummy, $chaine);
    }

}

?>