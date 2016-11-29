<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'librairies/configuration/popote_conf.php';

class preferee {

    public $id_preferee;
    public $id_recette;
    public $id_membre;

    static public function check($idRecette, $idMembre) {
        $requete = "select * from preferees where id_recette='$idRecette' and id_membre='$idMembre'";
        //echo "$requete";
        $tmp = new preferee();
        if ($tmp->getRequete($requete)) {
            //print_r($tmp);
            return $tmp;
        } else {
            return null;
        }
    }

    public function create() {
        $requete = "insert into preferees (id_recette, id_membre) values ('$this->id_recette', '$this->id_membre')";
        //echo ("<p>requete = $requete </p>");
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
            echo "<p>une erreur est survenue lors de la creation du user : " . $e->getMessage();
            return false;
        }
        return false;
    }

    public function delete($id) {
        $requete = "delete from preferees where id_preferee='$id'";
        //echo ("<p>requete = $requete </p>");
        try {
            $dbh = new PDO(SERVEUR, USER, PWD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $mesItems = $dbh->query($requete);
            //echo ("<p>requete executee</p>");
            $dbh = null;
        } catch (PDOException $e) {
            echo "une erreur est survenue : " . $e->getMessage();
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
                    $this->id_preferee = $monItem['id_preferee'];
                    $this->id_membre = $monItem['id_membre'];
                    $this->id_recette = $monItem['id_recette'];
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

}
