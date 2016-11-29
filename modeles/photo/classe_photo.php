<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class photo {

    public $id_photo;
    public $id_recette;
    public $lien;

    static public function NewByRecetteId($id) {
        $tmp = new Photo();
        if ($tmp->getByRecetteId($id)) {
            return $tmp;
        } else {
            return null;
        }
    }

    public function getById($id) {
        $requete = "select * from photos where id_photo= '$id'";
        return $this->getRequete($requete);
    }

    public function getByRecetteId($id) {
        $requete = "select * from photos where id_recette= '$id'";
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
                    $this->id_photo = $monItem['id_photo'];
                    $this->id_recette = $monItem['id_recette'];
                    $this->lien = $monItem['lien'];
                }
                return true;
            } else {
                return false;
            }
        } catch (POEException $e) {
            echo "une erreur est survenue : " . $e->getMessage();
            return false;
        }
    }

    public function create($id_recette, $lien) {
        $requete = "insert into photos (id_recette, lien) values ('$id_recette', '$lien')";
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
            echo "<p>une erreur est survenue lors de la creation de la photo : " . $e->getMessage();
            return false;
        }
        return false;
    }

    public function update($id_recette, $lien) {
        $requete = "update photos set id_recette='".$id_recette
                ."', lien='".$lien
                . "' where id_recette='".$id_recette."'";
        echo ("<p>requete update photo = $requete </p>");
        try {
            $dbh = new PDO(SERVEUR, USER, PWD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo ("<p>cnx base OK</p>");
            $mesItems = $dbh->query($requete);
            if ($mesItems != false) {
                $dbh = null;
                //echo ("<p>requete executee</p>");
                $mesItems->setFetchMode(PDO::FETCH_ASSOC);
                $this->getByRecetteId($id_recette);
                return true;
            } else {
                $dbh = null;
                $this->getByRecetteId($id_recette);
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
        echo "<tr><td>id_photo</td><td>" . $this->id_photo . "</td></tr>";
        echo "<tr><td>id_recette</td><td>" . $this->id_recette . "</td></tr>";
        echo "<tr><td>lien</td><td>" . $this->lien . "</td></tr>";
        echo "</table>";
    }

}

?>