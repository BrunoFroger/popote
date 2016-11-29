<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

$myIncludePath = '/var/www/html/popote';
set_include_path(get_include_path() . PATH_SEPARATOR . $myIncludePath);

include_once 'librairies/configuration/popote_conf.php';
include_once 'modeles/recette/classe_recette.php';

$_SESSION['typeContenu'] = 'envoi_mail';
//echo "<br> typeContenu = " . $_SESSION['typeContenu'];

if (isset($_GET['user'])) {
    $_SESSION['destinataireMail'] = $_GET['user'];
}else{
    //if (isset($POST['expediteur']))
}
//echo "<br> destinataireMail = " . $_SESSION['destinataireMail'];
$_SESSION['recetteMail'] = $_GET['recette'];
//echo "<br> recetteMail = " . $_SESSION['recetteMail'];
$recette = recette::NewById($_GET['recette']);
//echo "<br> recette titre = " . $recette->titre;

if (isset($_POST['contenu'])) {
    $_SESSION['contenuMail'] = $_POST['contenu'];
} else {
    unset($_SESSION['contenuMail']);
}
echo "<br> contenu = " . $_SESSION['contenuMail'];

if (isset($_POST['expediteur'])) {
    $_SESSION['expediteur'] = $_POST['expediteur'];
} else {
    unset($_SESSION['expediteur']);
}
echo "<br> contenu = " . $_SESSION['contenuMail'];

if (isset($_POST['sujet'])) {
    //echo "<br> POST sujet existe = " . $_POST['sujet'];
    $_SESSION['sujetMail'] = $_POST['sujet'];
} else {
    //echo "<br> POST sujet n'existe pas = " . $_POST['sujet'];
    $_SESSION['sujetMail'] = "MaPopoteAuQuotidien : " . $recette->titre;
}
//echo "<br> sujet = " . $_SESSION['sujetMail'];

if (isset($_GET['mode'])) {
    if ($_GET['mode'] == 'send') {
        echo "<br> on active l'envoi de mail Session(sendMail = " . $_SESSION['sendMail'];
        $_SESSION['sendMail'] = 'send';
        $sendmail = $_SESSION['sendMail'];
    } else {
        unset($_SESSION['sendMail']);
        $sendmail = '';
    }
}
echo "<br> sendMail = " . $_SESSION['sendMail'];

//echo "<br>on sort de selectEnvoiMail.php <br>";
//echo "<a href=/popote/index.php>Continuer</a>";
header("location: /popote");


exit;

