<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// saisie du login
echo "<div id='P3identconnexion'>";
echo "<form method='POST' action='controleurs/membre/check_login.php'>";
echo "<div id='P3connectmembre'>";
if (isset($_SESSION['loginMessage'])) {
    if ($_SESSION['loginMessage'] != '') {
        echo "<h3>" . $_SESSION['loginMessage'] . "</h3>";
    }
}
$_SESSION['loginMessage'] = '';

$loginSaisi='Login';
if (isset($_SESSION['loginSaisi'])) {
    if ($_SESSION['loginSaisi'] != '') {
        $loginSaisi=$_SESSION['loginSaisi'];
    }
}

echo "<table id='P3saisielogin'>";
echo "<caption> S'identifier & se connecter </caption>";
echo "<tr> ";
echo "<td>Login </td>";
echo "<td> <input type='text' name='login' value='$loginSaisi'> </td>";
echo "</tr>";
echo "<tr>";
echo "<td>Mot de passe </td>";
echo "<td> <input type='password' name='pwd' value='votre pwd'> </td>";
echo "</tr>";
echo "</table>";
echo "</div> <!-- fin connectmembre -->";
echo "<div id='P3validlogin'>";
echo "<input class='gobutton' type='submit' value='Connexion'>";
echo "</div><!-- fin validlogin -->";
echo "</form>";
echo "</div> <!-- fin identconnexion -->";

// creation de compte
echo "<div id='P3creermoncompte'>";
echo "<form method='POST' action='controleurs/membre/cree_compte.php'>";
echo "<input class='gobutton' type='submit' value='Se créer un compte utilisateur'>";
echo "</form>";
echo "</div> <!-- fin creermoncompte -->";


// envoi d'un mail a l'administarteur
echo "<div id='P3mailadmin'>";
echo "<form method='POST' action='controleurs/accueil/mailadmin.php'>";
echo "<div id='P3mailinfoperdue'   >";
if (isset($_SESSION['mailOublieMessage'])) {
    if ($_SESSION['mailOublieMessage'] != '') {
        echo "<h3>" . $_SESSION['mailOublieMessage'] . "</h3>";
    }
}
$_SESSION['mailOublieMessage'] = '';
$emailSaisi='@ mail';
if (isset($_SESSION['emailSaisi'])) {
    if ($_SESSION['emailSaisi'] != '') {
        $emailSaisi=$_SESSION['emailSaisi'];
    }
}
echo "<table id='P3oublilogin'>";
echo "<caption> J'ai oublié mon login (ou mon mot de passe) </caption>";
echo "<tr>";
echo "<td>Mon adresse mail  </td> ";
echo "<td> : <input type='email' name='monmail' value='$emailSaisi'size='50'> </td>";
echo "</tr>";
echo "</table>";
if (isset($_SESSION['mailEnvoye'])) {
    if ($_SESSION['mailEnvoye'] == 'envoye') {
        echo "<h3>Un message avec vos identifiants vient de vous être envoyé</h3>";
        $_SESSION['mailEnvoye'] = '';
    }
}
echo "</div>";
echo "<div id='P3envoimailadmin'>";
echo "<input class='gobutton' type='submit' value='Demande infos connexion'>";
echo "</div>";
echo "</form>";
echo "</div> <!-- fin mailadmin -->";
?>