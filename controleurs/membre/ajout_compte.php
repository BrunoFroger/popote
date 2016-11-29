<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$myIncludePath = '/var/www/html/popote';
set_include_path(get_include_path() . PATH_SEPARATOR . $myIncludePath);

include_once 'modeles/membre/classe_membre.php';

$newMembre = new membre();
$newMembre->login = $_POST['login'];
$newMembre->password = $_POST['pwd'];
$newMembre->nom = $_POST['nom'];
$newMembre->prenom = $_POST['prenom'];
$newMembre->email = $_POST['mail'];
$newMembre->type = 'user';
$_SESSION['newmembre']=  serialize($newMembre);

//echo "check parametre saisis<br>";
//verification de la saisie
if (empty($_POST['login']) || empty($_POST['pwd']) || empty($_POST['pwd2']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail'])) {
    $_SESSION['MessageGestionCompte']="Au moins un des paramètres n'est pas renseigné";
    $_SESSION['typeContenu'] = 'gestion_compte';
    header("location: /popote");
    exit;
}
if ($_POST['pwd'] != $_POST['pwd2']) {
    $_SESSION['MessageGestionCompte']= "Confirmation de passwd incorrecte";
    $_SESSION['typeContenu'] = 'gestion_compte';
    header("location: /popote");
    exit;
}
//echo "parametres saisis ok <p>";
//echo $_POST['login'].", ". $_POST['pwd'].", ". $_POST['nom'].", ". $_POST['prenom'].", ". $_POST['mail']." <br>";
//$membre->affiche();
//echo "<br>";
//$newMembre->affiche();
// verification unicité
//echo "<br> login ou mail different on check si unique";
if (!membre::checkUnique($newMembre)) {
        $_SESSION['MessageGestionCompte']="ce membre existe deja (login ou email identique)";
        $_SESSION['typeContenu'] = 'gestion_compte';
        header("location: /popote");
    exit;
}
// dans les autres cas, on cree le user
$_SESSION['typeContenu'] = 'recette';
$newMembre->create($newMembre->login, $newMembre->password, $newMembre->nom, $newMembre->prenom, $newMembre->email, $newMembre->type);
$_SESSION['membre'] = serialize($newMembre);
//$newMembre->affiche();
//echo "<a href='/popote'>Retour</a> <br>";
header("location: /popote");
?>
