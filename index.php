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
include_once 'modeles/recette/classe_recette.php';
include_once 'modeles/ingredient/classe_ingredient.php';
include_once 'modeles/categorie/classe_categorie.php';
include_once 'modeles/sous_categorie/classe_sous_categorie.php';
include_once 'modeles/photo/classe_photo.php';
include_once 'modeles/commentaire/classe_commentaire.php';
include_once 'modeles/preferee/classe_preferee.php';
include_once 'librairies/configuration/popote_conf.php';
// ESSAI POUR REMPLACER LE BOUTON DU INPUT FILE PAR UN AUTRE MODELE DE BOUTON
//include_once 'modeles\photo\uploadfile.js';
// FIN ESSAI

if (!isset($_SESSION['nbLigneParPages'])) {
    $nbLigneParPages = NBRECETTEPARPAGE;
}

//setup php for working with Unicode data
//mb_internal_encoding('UTF-8');
//mb_http_output('UTF-8');
//mb_http_input('UTF-8');
//mb_language('uni');
//mb_regex_encoding('UTF-8');
//ob_start('mb_output_handler');
header( 'content-type: text/html; charset=utf-8' );

include_once 'vues/Accueil.php';



exit;
?>
