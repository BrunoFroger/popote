<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ('vues/enteteHtml.php');
include_once ('librairies/configuration/popote_conf.php');
include_once ('modeles/categorie/classe_categorie.php');
include_once ('modeles/commentaire/classe_commentaire.php');
include_once ('modeles/constituant/classe_constituant.php');
include_once ('modeles/ingredient/classe_ingredient.php');
include_once ('modeles/membre/classe_menbre.php');
include_once ('modeles/photo/classe_photo.php');
include_once ('modeles/recette/classe_recette.php');
include_once ('modeles/sous_categorie/classe_sous_categorie.php');

echo "<html>";
echo "<head>";
echo "<style>";
echo " td{ border:1px solid black}";
echo "</style>";
echo "</head>";

echo "<body>";
if (isset($_GET['value'])) {
    $value = $_GET['value'];
} else {
    $value = 1;
}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "";
}

if (isset($_POST['login'])) {
    $new_login = $_POST['login'];
    //echo "new login = $new_login  ; ";
    $new_password = $_POST['password'];
    //echo "new password = $new_password  ; ";
    $new_nom = $_POST['nom'];
    //echo "new nom = $new_nom  ; ";
    $new_prenom = $_POST['prenom'];
    //echo "new prenom = $new_prenom  ; ";
    $new_email = $_POST['email'];
    //echo "new email = $new_email  ; ";
    $new_type = $_POST['type'];
    //echo "new type = $new_type";
    $membre = membre::NewByLogin($new_login);
    $value=$membre->id_membre;
    $membre->update($value, $new_login, $new_password, $new_nom, $new_prenom, $new_email, $new_type);
}

echo "<p> affichage de l'enreg $value </p>";
if (($membre = membre::NewById($value))) {
    echo "<form method='POST' action='formulaire.php'>";
    echo "<table>";
    echo "<tr>";
    echo "<td>id_membre</td>";
    echo "<td>" . $membre->id_membre . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>login</td>";
    echo "<td><input type=text name=login value='$membre->login'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>password</td>";
    echo "<td><input type=text name=password value='$membre->password'></td>";
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
    echo "<td><input type=text name=email value='$membre->email'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>type</td>";
    echo "<td><input type=text name=type value='$membre->type'></td>";
    echo "</tr>";
    echo "<tr>";
    $prec = $value - 1;
    $suiv = $value + 1;
    echo "<td><a href='formulaire.php?value=$prec'>precedent</a></td>";
    echo "<td><a href='formulaire.php?value=$suiv'>suivant</a></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><input class='gobutton' type=submit value=update ></td>";
    echo "<td></td>";
    echo "</tr>";
    echo "</table>";
    echo "</form>";
    echo "</body>";
    echo "</html>";
} else {
    echo "<p>objet vide $value";
}
exit;


try {

    echo "<p>--------------------------------------------</p>";
    $value = "hq";
    echo "<p>on essaie de creer un objet membre avec recuperation dans la base par login [$value]</p>";
    $bruno = membre::NewByLogin($value);
    if ($bruno == null) {
        echo "<p> objet vide </p>";
    } else {
        $bruno->affiche();
    }

    $value = 10;
    echo "<p>on essaie de creer un objet membre avec recuperation dans la base par id [$value]</p>";
    $helene = membre::NewById($value);
    if ($helene == null) {
        echo "<p> objet vide </p>";
    } else {
        $helene->affiche();
    }
    echo "<p>on essaie de creer un nouveau membre avec creation dans la base</p>";
    $camille = membre::NewCreate('cho', 'pwdcho', 'Houdot', 'Camille', 'camille.houdot@orange.com', 'user');
    if ($camille == null) {
        echo "<p> objet vide </p>";
    } else {
        $camille->affiche();
    }
    exit;




    echo "<p>--------------------------------------------</p>";
    echo "<p>on essaie de creer un objet membre vide</p>";
    $tmp = new membre;
    echo "<p>objet cree, on un nouveau membre en base</p>";
    $new_id = $tmp->create("toto_login", "toto_pwd", "toto_nom", "toto_prenom", "toto_email", "user");
    echo "<p>donnees recuperees de la base on l'affiche</p>";
    $tmp->affiche();
    echo "<p>donnees affichees on le detruit</p>";
//$tmp->delete($new_id);
    $tmp = null;


    echo "<p>--------------------------------------------</p>";
    echo "<p>on essaie de creer un objet categorie</p>";
    $tmp = new categorie;
    echo "<p>objet cree, on initialise avec une valeur de la base </p>";
    $tmp->getById(1);
    echo "<p>donnees recuperees de la base </p>";
    $tmp->affiche();
    echo "<p>donnees affichee</p>";
    echo '</body>';
    echo '</html>';
    $tmp = null;

    echo "<p>--------------------------------------------</p>";
    echo "<p>on essaie de creer un objet commentaire</p>";
    $tmp = new commentaire;
    echo "<p>objet cree, on initialise avec une valeur de la base </p>";
    $tmp->getById(1);
    echo "<p>donnees recuperees de la base </p>";
    $tmp->affiche();
    echo "<p>donnees affichees</p>";
    echo '</body>';
    echo '</html>';
    $tmp = null;

    echo "<p>--------------------------------------------</p>";
    echo "<p>on essaie de creer un objet constituant</p>";
    $tmp = new constituant;
    echo "<p>objet cree, on initialise avec une valeur de la base </p>";
    $tmp->getById(1);
    echo "<p>donnees recuperees de la base </p>";
    $tmp->affiche();
    echo "<p>donnees affichees</p>";
    echo '</body>';
    echo '</html>';
    $tmp = null;

    echo "<p>--------------------------------------------</p>";
    echo "<p>on essaie de creer un objet ingredient</p>";
    $tmp = new ingredient;
    echo "<p>objet cree, on initialise avec une valeur de la base </p>";
    $tmp->getById(1);
    echo "<p>donnees recuperees de la base </p>";
    $tmp->affiche();
    echo "<p>donnees affichees</p>";
    echo '</body>';
    echo '</html>';
    $tmp = null;

    echo "<p>--------------------------------------------</p>";
    echo "<p>on essaie de creer un objet membre</p>";
    $tmp = new membre;
    echo "<p>objet cree, on initialise avec une valeur de la base </p>";
    $tmp->getById(1);
    echo "<p>donnees recuperees de la base </p>";
    $tmp->affiche();
    echo "<p>donnees affichees</p>";
    $tmp = null;

    echo "<p>--------------------------------------------</p>";
    echo "<p>on essaie de creer un objet photo</p>";
    $tmp = new photo;
    echo "<p>objet cree, on initialise avec une valeur de la base </p>";
    $tmp->getById(1);
    echo "<p>donnees recuperees de la base </p>";
    $tmp->affiche();
    echo "<p>donnees affichees</p>";
    $tmp = null;

    echo "<p>--------------------------------------------</p>";
    echo "<p>on essaie de creer un objet recette</p>";
    $tmp = new recette;
    echo "<p>objet cree, on initialise avec une valeur de la base </p>";
    $tmp->getById(1);
    echo "<p>donnees recuperees de la base </p>";
    $tmp->affiche();
    echo "<p>donnees affichees</p>";
    echo '</body>';
    echo '</html>';
    $tmp = null;

    echo "<p>--------------------------------------------</p>";
    echo "<p>on essaie de creer un objet sous-categorie</p>";
    $tmp = new sous_categorie;
    echo "<p>objet cree, on initialise avec une valeur de la base </p>";
    $tmp->getById(1);
    echo "<p>donnees recuperees de la base </p>";
    $tmp->affiche();
    echo "<p>donnees affichees</p>";
    echo '</body>';
    echo '</html>';
    $tmp = null;

    echo "<p>--------------------------------------------</p>";
} catch (POEException $e) {
    echo "une erreur est survenue : " . $e->getMessage();
}
?>
