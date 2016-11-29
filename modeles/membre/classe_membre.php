<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'librairies/configuration/popote_conf.php';

//echo '<p>chargement de la classe membre</p>';

class membre {

    public $id_membre;
    public $login;
    public $password;
    public $nom;
    public $prenom;
    public $email;
    public $type;
    public $valid;

    static public function NewById($id) {
        $tmp = new membre();
        if ($tmp->getById($id)) {
            return $tmp;
        } else {
            return null;
        }
    }

    static public function NewByLogin($login) {
        $tmp = new membre();
        if ($tmp->getByLogin($login)) {
            return $tmp;
        } else {
            return null;
        }
        return $tmp;
    }

    static public function NewByEmail($mail) {
        $tmp = new membre();
        if ($tmp->getByEmail($mail)) {
            return $tmp;
        } else {
            return null;
        }
        return $tmp;
    }

    static public function NewCreate($login, $passwd, $nom, $prenom, $email, $type) {
        $tmp = new membre();
        if ($tmp->create($login, $passwd, $nom, $prenom, $email, $type)) {
            return $tmp;
        } else {
            return null;
        }
    }

    static public function getListAdmin() {
        $requete = "select email from membres where type='admin' ";
        //$requete = "select email from membres  ";
        //echo ("<p>requete getListAdmin = $requete </p>");
        return membre::getRequeteList($requete);
    }

    static public function getListMembre() {
        $requete = "select id_membre from membres ";
        //echo ("<p>requete = $requete </p>");
        return membre::getRequeteList($requete);
    }

    private function getRequeteList($requete) {
        $listIdMembres = array();
        try {
            $dbh = new PDO(SERVEUR, USER, PWD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $mesItems = $dbh->query($requete);
            $dbh = null;
            //echo ("<p>requete executee resultat = </p>");
            //              print_r($mesItems);
            //echo ("<p>fin resultat</p>");
            $mesItems->setFetchMode(PDO::FETCH_ASSOC);
            if ($mesItems->rowCount() > 0) {
                foreach ($mesItems as $monItem) {
                    array_push($listIdMembres, $monItem);
                }
                return $listIdMembres;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "une erreur est survenue : " . $e->getMessage();
            return false;
        }
    }

    public function getById($id) {
        $requete = "select * from membres where id_membre='$id'";
        return $this->getRequete($requete);
    }

    public function authorized($id) {
        $requete = "select * from membres where id_membre='$id'";
        $this->getRequete($requete);
        return $this->valid;
    }

    public function getByLogin($id) {
        $requete = "select * from membres where login='$id'";
        return $this->getRequete($requete);
    }

    public function getByEmail($id) {
        $requete = "select * from membres where email='$id'";
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
                    $this->id_membre = $monItem['id_membre'];
                    $this->login = $monItem['login'];
                    $this->password = $monItem['password'];
                    $this->nom = $monItem['nom'];
                    $this->prenom = $monItem['prenom'];
                    $this->email = $monItem['email'];
                    $this->type = $monItem['type'];
                    $this->valid = $monItem['valid'];
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

    public function create($login, $passwd, $nom, $prenom, $email, $type) {
        $requete = "insert into membres (login, password, nom, prenom, email, type, valid) values ('$login', '$passwd', '$nom', '$prenom', '$email', '$type', '1')";
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
                $this->getByLogin($login);
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


    public function update($id, $login, $passwd, $nom, $prenom, $email, $type) {
        $requete = "update membres set login='$login', password='$passwd', nom='$nom', prenom='$prenom', email='$email', type='$type' where id_membre='$id'";
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
                $this->getByLogin($login);
                return true;
            } else {
                $dbh = null;
                $this->getByLogin($login);
                //echo ("<p>erreur sur requete</p>");
                return false;
            }
        } catch (PDOException $e) {
            $this->getByLogin($login);
            echo "<p>une erreur est survenue lors de l'update du user: " . $e->getMessage();
            return false;
        }
        return false;
    }

    public function ChangeAuthent($valid) {
        $requete = "update membres set valid='$valid' where id_membre='$this->id_membre'";
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
                $this->getByLogin($login);
                return true;
            } else {
                $dbh = null;
                $this->getByLogin($login);
                //echo ("<p>erreur sur requete</p>");
                return false;
            }
        } catch (PDOException $e) {
            $this->getByLogin($login);
            echo "<p>une erreur est survenue lors de l'update du user: " . $e->getMessage();
            return false;
        }
        return false;
    }

    public function delete() {
        $requete = "delete from membres where id_membre='$this->id_membre'";
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

    static public function checkUnique($membre) {
        //echo "<p> verification unicite d'un user</p>";
        $tst_membre1 = new membre;
        $tst_membre2 = new membre;
        if ($tst_membre1->getByLogin($membre->login) || $tst_membre2->getByEmail($membre->email)) {
            return false;
        }
        return true;
    }

    public function affiche() {
        echo "<table>";
        echo "<tr><td>id_membre</td><td>" . $this->id_membre . "</td></tr>";
        echo "<tr><td>login</td><td>" . $this->login . "</td></tr>";
        echo "<tr><td>password</td><td>" . $this->password . "</td></tr>";
        echo "<tr><td>nom</td><td>" . $this->nom . "</td></tr>";
        echo "<tr><td>prenom</td><td>" . $this->prenom . "</td></tr>";
        echo "<tr><td>email</td><td>" . $this->email . "</td></tr>";
        echo "<tr><td>type</td><td>" . $this->type . "</td></tr>";
        echo "</table>";
    }

}

?>
