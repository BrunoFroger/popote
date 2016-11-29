<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once ('vues/enteteHtml.php');
include_once ('modeles/membre/classe_menbre.php');

$validation = true;
$password2 = '';
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create' :
            $mode = 'create';
            break;
        case 'update';
            $mode = 'update';
    }
} else {
    $mode = 'create';
}

if (isset($_POST['login'])) {
    //echo "<p>passage de verification dans le formulaire</p>";
    if (isset($_SESSION['membre'])) {
        $membre = unserialize($_SESSION['membre']);
    }
    if ((!empty($_POST['login']))) {
        //echo "<p>login OK</p>";
        $membre->login = $_POST['login'];
    } else {
        $validation = false;
    }
    if ((!empty($_POST['password']))) {
        //echo "<p>password OK</p>";
        $membre->password = $_POST['password'];
    } else {
        $validation = false;
    }
    $password2 = $_POST['password2'];
    if ((!empty($_POST['nom']))) {
        //echo "<p>nom OK</p>";
        $membre->nom = $_POST['nom'];
    } else {
        $validation = false;
    }
    if ((!empty($_POST['prenom']))) {
        //echo "<p>prenom OK</p>";
        $membre->prenom = $_POST['prenom'];
    } else {
        $validation = false;
    }
    if ((!empty($_POST['email']))) {
        //echo "<p>email OK</p>";
        $membre->email = $_POST['email'];
    } else {
        $validation = false;
    }
    if ((!empty($_POST['type']))) {
        //echo "<p>type OK</p>";
        $membre->type = $_POST['type'];
    } else {
        $validation = false;
    }


    if (!$validation) {
        //echo "<p>validation KO</p>";
        echo "<p>il reste des champs a saisir</p>";
    } else {
        //echo "<p>validation OK</p>";
        if ($password2 != $membre->password) {
            echo "<p>erreur sur validation du password veuillez le ressaisir </p>";
        } else {
            //echo "<p>validation password OK</p>";
            //echo "<p>checkUnique()</p>";
            if (membre::checkUnique($membre) != false) {
                //print_r($membre);
                if ($mode == 'create') {
                    if ($membre->create($membre->login, $membre->password, $membre->nom, $membre->prenom, $membre->email, $membre->type)) {
                        echo "<p>on user cree en base et on redirige vers la page index</p>";
                        // la creation s'est bien passee
                        echo "<p> creation du user faite avec succes</p>";
                        $mode = 'update';
                    } else {
                        echo "<p> erreur lorsq de la creation du user</p>";
                    }
                } else {
                    $membre->update($membre->id, $membre->login, $membre->password, $membre->nom, $membre->prenom, $membre->email, $membre->type);
                        echo "<p>on user ;odifie en base et on redirige vers la page index</p>";
                }
                echo "<a href=/popote/index.php>retour</a>";
                //rediriger vers index
            } else {
                echo "<p>Ce user existe deja</p>";
            }
        }
    }

    //echo "<p>fin de validation</p>";
} else {
    // premiere passe sur cette page on cree l'objet
    //echo "<p>premier passage dans le formulaire</p>";
    $membre = new membre();
    $_SESSION['membre'] = serialize($membre);
}
//print_r($membre);
echo "<form method='POST' action='inscription.php?action=$mode'>";
echo "<table>";
echo "<tr>";
echo "<td>login</td>";
echo "<td><input type=text name=login value='$membre->login'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>password</td>";
echo "<td><input type=password name=password value='$membre->password'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>validation password</td>";
echo "<td><input type=password name=password2 value='$password2'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>nom</td>";
echo "<td><input type=text name=nom value='$membre->nom'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>prenom</td>";
echo "<td><input type=text name=prenom value='$membre->prenom'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>email</td>";
echo "<td><input type=email name=email value='$membre->email'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>type</td>";
echo "<td><select name=type value='$membre->type'>"
 . "<option>membre</option>"
 . "<option>admin</option></td>";
echo "</tr>";
echo "<tr>";
echo "<td><input class='gobutton' type=submit value=$mode ></td>";
echo "<td></td>";
echo "</tr>";
echo "</table>";
echo "</form>";

?>
