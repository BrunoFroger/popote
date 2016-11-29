<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_SESSION['membre'])) {
    $membre = unserialize($_SESSION['membre']);
    $action = 'controleurs/membre/modifie_compte.php';
    $valeurBouton = 'Modification du compte';
} else {
    $action = 'controleurs/membre/ajout_compte.php';
    $valeurBouton = 'Création du compte';
    if (isset($_SESSION['newmembre'])) {
        //echo "<br> on recupere le membre en cours de creation";
        $membre = unserialize($_SESSION['newmembre']);
    } else {
        //echo "<br> on initialise une nouvelle instance de membre";
        $membre = new membre();
        $newMembre->login = '';
        $newMembre->password = '';
        $newMembre->nom = '';
        $newMembre->prenom = '';
        $newMembre->email = '';
        $newMembre->type = 'user';
    }
}

if (isset($_SESSION['MessageGestionCompte']) && $_SESSION['MessageGestionCompte'] != '') {
    $MessageGestionCompte = $_SESSION['MessageGestionCompte'];
}

$passwd2 = '';
echo "<form method='POST' action='$action'>";
echo "<div id='P5paramcompte'   >";
if ($MessageGestionCompte != '') {
    echo "<h3>" . $MessageGestionCompte . "</h3>";
}
echo "<table id='P5saisiecompte'> ";
echo "<caption>Mon compte utilisateur</caption>";
echo "<tr> ";
echo "<td>Login </td> ";
echo "<td><input type='text' name='login' value='$membre->login'></td>";
echo "</tr>";
echo "<tr> ";
echo "<td>Mot de passe </td> ";
echo "<td><input type='password' name='pwd' value='$membre->password'></td>";
echo "</tr>";
echo "<tr> ";
echo "<td>Confirmer le MDP </td> ";
echo "<td><input type='password' name='pwd2' value='$passwd2'></td>";
echo "</tr>";
echo "<tr> ";
echo "<td>Nom </td> ";
echo "<td><input type='text' name='nom' value='$membre->nom'></td>";
echo "</tr>";
echo "</tr>";
echo "<tr> ";
echo "<td>Prénom </td> ";
echo "<td><input type='text' name='prenom' value='$membre->prenom'></td>";
echo "</tr>";
echo "<tr> ";
echo "<td>Email </td> ";
echo "<td><input type='text' name='mail' value='$membre->email' size='40'></td>";
echo "</tr>";
echo "</table>";
echo "</div><!-- fin paramcompte -->";
echo "<div id='P5validcompte'> ";

echo "<input class='gobutton' type='submit' value='$valeurBouton'>";
echo "</div>";
echo "</form> ";
?>