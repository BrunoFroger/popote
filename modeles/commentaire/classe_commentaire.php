<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class commentaire {

    public $id_commentaire;
    public $id_recette;
    public $id_membre;
    public $message;

    static public function NewById($id) {
        $tmp = new commentaire();
        if ($tmp->getById($id)) {
            return $tmp;
        } else {
            return null;
        }
    }

    static public function NewByRecetteMembre($idRecette, $idMembre) {
        $tmp = new commentaire();
        if ($tmp->getByRecetteMembre($idRecette, $idMembre)) {
            return $tmp;
        } else {
            return null;
        }
        return $tmp;
    }

    public function getById($id) {
        $requete = "select * from commentaires where id_commentaire= $id";
        return $this->getRequete($requete);
    }

    public function getByRecetteMembre($idRecette, $idMembre) {
        $requete = "select * from commentaires where id_recette= $idRecette and id_membre= $idMembre";
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
                    $this->id_commentaire = $monItem['id_commentaire'];
                    $this->id_membre = $monItem['id_membre'];
                    $this->id_recette = $monItem['id_recette'];
                    $this->message = $monItem['message'];
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

    public function create($id_recette, $id_membre, $messsage) {
        $requete = "insert into commentaires (id_recette, id_membre, message) values ('$id_recette', '$id_membre', '$messsage')";
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
                $this->getByRecetteMembre($id_recette, $id_membre);
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

    public function update($id, $id_recette, $id_membre, $messsage) {
        $requete = "update commentaires set id_recette='$id_recette', id_membre='$id_membre', message='$messsage' where id_commentaire='$id'";
        echo ("<p>requete = $requete </p>");
        try {
            $dbh = new PDO(SERVEUR, USER, PWD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo ("<p>cnx base OK</p>");
            $mesItems = $dbh->query($requete);
            if ($mesItems != false) {
                $dbh = null;
                //echo ("<p>requete executee</p>");
                $mesItems->setFetchMode(PDO::FETCH_ASSOC);
                $this->getByRecetteMembre($id_recette, $id_membre);
                return true;
            } else {
                $dbh = null;
                $this->getById($id);
                //echo ("<p>erreur sur requete</p>");
                return false;
            }
        } catch (PDOException $e) {
            $this->getById($id);
            echo "<p>une erreur est survenue lors de l'update du user: " . $e->getMessage();
            return false;
        }
        return false;
    }

    public function affiche() {
        echo "<table>";
        echo "<tr><td>id_commentaire</td><td>" . $this->id_commentaire . "</td></tr>";
        echo "<tr><td>id_membre</td><td>" . $this->id_membre . "</td></tr>";
        echo "<tr><td>id_recette</td><td>" . $this->id_recette . "</td></tr>";
        echo "<tr><td>message</td><td>" . $this->message . "</td></tr>";
        echo "</table>";
    }

}

?>