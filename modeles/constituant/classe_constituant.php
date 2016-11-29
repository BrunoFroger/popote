<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'modeles/ingredient/classe_ingredient.php';

class constituant {

    public $id_constituant;
    public $id_recette;
    public $id_ingredient;
    public $quantite;
    public $rang;

    static public function NewById($id) {
        $tmp = new constituant();
        if ($tmp->getById($id)) {
            //echo "<br> getbyid retourne ok";
            return $tmp;
        } else {
            //echo "<br> getbyid retourne null";
            return null;
        }
    }

    static public function NewCreate($id_recette, $ingredient, $quantite) {
        //echo "<br> fonction constituant::NewCreate($id_recette, $ingredient, $quantite, $rang)";
        $tmp = new constituant;
        $newIngredient = new ingredient;
        //echo "<br> ";
        //print_r($newIngredient);
        $newIngredient->getByNom($ingredient);
        if ($newIngredient->nom == '') {
            // cet ingredient n'existe pas, on le cree
            echo "<br> cet ingredient n'existe pas ; on le cree";
            $newIngredient->nom = $newIngredient->aliasTexte($ingredient);
            $newIngredient->couleur = '';
            $newIngredient->type = '';
            $newIngredient->create();
            $newIngredient->getByNom($ingredient);
        } else {
            echo "<br> l'ingredient existe deja en base on l'utilise";
        }
        echo "<br> newIngredient : ";
        print_r($newIngredient);
        if ($tmp->create($id_recette, $newIngredient->id_ingredient, $quantite)) {
            return $tmp;
        } else {
            return null;
        }
    }

    public function getById($id) {
        $requete = "select * from constituants where id_constituant= $id";
        return $this->getRequete($requete);
    }

     public function getByRang($id) {
        $requete = "select * from constituants where rang= $id";
        echo ("<p>requete = $requete </p>");
        return $this->getRequete($requete);
    }

    static public function NewByRang($id) {
        $tmp = new constituant();
        if ($tmp->getByRang($id)) {
            //echo "<br> getbyRang retourne ok";
            return $tmp;
        } else {
            //echo "<br> getbyRang retourne null";
            return null;
        }
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
                    $this->id_constituant = $monItem['id_constituant'];
                    $this->id_recette = $monItem['id_recette'];
                    $this->id_ingredient = $monItem['id_ingredient'];
                    $this->quantite = $monItem['quantite'];
                    $this->rang = $monItem['rang'];
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

    public function create($id_recette, $id_ingredient, $quantite) {
        $tmp=ingredient::GetListId($id_recette);
        echo "<br> liste des ingredients en base lors de la creation d'un nouvel ingredient : ";
        print_r($tmp);
        echo "<br> nb valeurs trouvees : " . count($tmp);
        if ($tmp == false){
             $rang=1;
        }else{
            $rang = count($tmp) + 1 ;
        }
        $requete = "insert into constituants (id_recette, id_ingredient, quantite, rang) values ('$id_recette', '$id_ingredient', '$quantite', '$rang')";
        echo ("<p>requete = $requete </p>");
        try {
            $dbh = new PDO(SERVEUR, USER, PWD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo ("<p>cnx base OK</p>");
            $mesItems = $dbh->query($requete);
            print_r($mesItems);
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
            echo "<p>une erreur est survenue lors de la creation du constituant : " . $e->getMessage();
            return false;
        }
        return false;
    }

    public function update() {
        $requete = "update constituants set 
                id_recette='" . $this->id_recette . "', 
                id_ingredient='" . $this->id_ingredient . "', 
                quantite='" . $this->quantite . "', 
                rang='" . $this->rang . "'  
                where id_constituant='" . $this->id_constituant ."'";
        //echo ("<p>requete = $requete </p>");
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
            echo "<p>une erreur est survenue lors de la mise a jour du constituant : " . $e->getMessage();
            return false;
        }
        return false;
    }

    public function delete() {
        $requete = "delete from constituants where id_constituant='$this->id_constituant'";
        echo ("<p>requete = $requete </p>");
        try {
            $dbh = new PDO(SERVEUR, USER, PWD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $mesItems = $dbh->query($requete);
            echo ("<p>requete executee</p>");
            $dbh = null;
        } catch (PDOException $e) {
            echo "une erreur est survenue : " . $e->getMessage();
        }
    }

    public function affiche() {
        echo "<table>";
        echo "<tr><td>id_constituant</td><td>" . $this->id_constituant . "</td></tr>";
        echo "<tr><td>id_recette</td><td>" . $this->id_recette . "</td></tr>";
        echo "<tr><td>id_ingredient</td><td>" . $this->id_ingredient . "</td></tr>";
        echo "<tr><td>quantite</td><td>" . $this->quantite . "</td></tr>";
        echo "</table>";
    }

    public function aliasTexte($chaine) {
        $healthy = array("'");
        $yummy = array("\'");
        return str_replace($healthy, $yummy, $chaine);
    }

    public function up(){
        $rangActuel=$this->rang;
        echo "<br>constituant a descendre : ". $this->id_constituant . " de " . $rangActuel . " vers " . ($rangActuel - 1);
        $this->rang = $rangActuel - 1;
        $tmp1=constituant::NewByRang($rangActuel - 1);
        echo "<br>constituant a monter : ". $tmp1->id_constituant;
        $tmp1->rang = $rangActuel;
        $this->update();
        $tmp1->update();
    }

    public function down(){
        $rangActuel=$this->rang;
        echo "<br>constituant a monter : ". $this->id_constituant . " de " . $rangActuel . " vers " . ($rangActuel + 1);
        $this->rang = $rangActuel + 1;
        $tmp1=constituant::NewByRang($rangActuel + 1);
        echo "<br>constituant a descendre : ". $tmp1->id_constituant;
        $tmp1->rang = $rangActuel;
        $this->update();
        $tmp1->update();
    }


}

?>
