<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

$myIncludePath = '/var/www/html/popote';
set_include_path(get_include_path() . PATH_SEPARATOR . $myIncludePath);

include_once 'modeles/recette/classe_recette.php';
include_once 'modeles/membre/classe_membre.php';
include_once 'modeles/constituant/classe_constituant.php';
include_once 'modeles/photo/classe_photo.php';
include_once 'librairies/configuration/popote_conf.php';

echo "<br> on recupere le ficheir uploadé";
print_r($_FILES);

$nomOrigine = $_FILES['modifphoto1']['name'];
if (isset($_SESSION['membre'])) {
    // une session existe on recupere le membre dans la session
    $membre = unserialize($_SESSION['membre']);
    echo "<br> membre qui depose le ficheir : " . $membre->prenom . " " . $membre->nom;
} else {
    echo 'aucun membre identifié';
}
echo "<br> nom fichier original => " . $nomOrigine;
$nomPhotoServer = $membre->login . "_" . $nomOrigine;
echo "<br> nom fichier destination => " . $nomPhotoServer;
$repertoireDestinationPhotos = dirname(__FILE__) . "/../../librairies/photos";
echo "<br> repertoire destination => " . $repertoireDestinationPhotos;
$repertoireDestinationPhotos = "/var/www/html/popote/librairies/photos/";
echo "<br> repertoire destination => " . $repertoireDestinationPhotos;
if (is_uploaded_file($_FILES["modifphoto1"]["tmp_name"])) {
    echo "<br> nom du fichier temporaire => " . $_FILES['modifphoto1']['tmp_name'];
    echo "<br> nom du fichier destination => " . $repertoireDestinationPhotos . $nomPhotoServer;
} else {
    echo "<br>Le fichier n'a pas été uploadé";
    $nomPhotoServer = '';
}
echo "<br> copie de [" . $_FILES["modifphoto1"]["tmp_name"] . "] vers [" . $repertoireDestinationPhotos . $nomPhotoServer . "]";
if (move_uploaded_file($_FILES["modifphoto1"]["tmp_name"], $repertoireDestinationPhotos . $nomPhotoServer)) {
    echo "<br> ficheir copie avec succes";
} else {
    echo "<br> copie impossible";
    $nomPhotoServer = '';
}

echo "<br> on recupere la recette d'id => " . $_SESSION['id_recette'];
echo "<br>";
$recette = recette::NewById($_SESSION['id_recette']);
//print_r($recette);
// recuperation des parametres
$modif = 0;
$tmp = $_POST['modiftitre1'];
if ($tmp != $recette->titre) {
    $recette->titre = $tmp;
    echo "<br> titre => " . $tmp;
    $modif = 1;
}

$tmp = $_POST['modifpreparation1'];
if ($tmp != $recette->description) {
    $recette->description = $tmp;
    echo "<br> description => " . $tmp;
    $modif = 1;
}

$tmp = $_POST['modifconseil1'];
if ($tmp != $recette->conseil) {
    $recette->conseil = $tmp;
    echo "<br> conseil => " . $tmp;
    $modif = 1;
}

$tmp = $_POST['choixnbpers'];
if ($tmp != $recette->nb_pers) {
    $recette->nb_pers = $tmp;
    echo "<br> nb_pers => " . $tmp;
    $modif = 1;
}

$tmp = $_POST['modiftpsprepa'];
if ($tmp != $recette->preparation) {
    $recette->preparation = $tmp;
    echo "<br> preparation => " . $tmp;
    $modif = 1;
}

$tmp = $_POST['modiftpscuisson'];
if ($tmp != $recette->cuisson) {
    $recette->cuisson = $tmp;
    echo "<br> cuisson => " . $tmp;
    $modif = 1;
}

$tmp = $_POST['choixcatprix'];
if ($tmp != $recette->cat_prix) {
    $recette->cat_prix = $tmp;
    echo "<br> cat_prix => " . $tmp;
    $modif = 1;
}

$tmp = $_POST['choixcatdiff'];
if ($tmp != $recette->cat_diff) {
    $recette->cat_diff = $tmp;
    echo "<br> cat_diff => " . $tmp;
    $modif = 1;
}

$tmp = $_POST['choixtypeplat'];
if ($tmp != $recette->id_cat) {
    $recette->id_cat = $tmp;
    echo "<br> id_cat => " . $tmp;
    $modif = 1;
}

$tmp = $_POST['choixsscat'];
if ($tmp != $recette->id_ss_cat) {
    $recette->id_ss_cat = $tmp;
    echo "<br> id_ss_cat => " . $tmp;
    $modif = 1;
}


if ($modif == 1) {
// mise a jour de la recette en base 
    $recette->update("$recette->id_recette", "$recette->id_membre", "$recette->titre", "$recette->nb_pers", "$recette->cat_prix", "$recette->cat_diff", "$recette->description", "$recette->cuisson", "$recette->preparation", "$recette->conseil", "$recette->id_cat", "$recette->id_ss_cat", "$recette->note", "$recette->nb_votes", "$recette->somme_notes", "$recette->publication");
}

// gestion de l'ajout d'ingredients 
$tmp = $_POST['quantitenouvelingredient'];
if ($tmp != '') {
    $quantite = $tmp;
    echo "<br> quantite de cet ingredient => " . $tmp;
}else{
	$quantite = '';
}
$tmp = $_POST['choixnouvelingredient'];
if ($tmp != '') {
    $ingredient = $tmp;
    echo "<br> nouvel ingredient => [" . $tmp . "]";
    $constituant = constituant::NewCreate($recette->id_recette, $ingredient, $quantite);
}


echo "<br> ";
// gestion de la modification de la photo

if ($nomPhotoServer != '') {
    echo "<br> photo modifiee";
    // une photo a etee selectionnee
    // on verifie si une entree en table photo 
    // existe pour cette recette
    $photo = photo::NewByRecetteId($recette->id_recette);
    if ($photo == null) {
        // il faut creer une nouvelle entree dans la base photo
        echo "<br> creation d'une entree en base photo";
        $photo = new photo();
        $photo->id_recette = $recette->id_recette;
        $photo->lien = $nomPhotoServer;
        $photo->create($recette->id_recette, $nomPhotoServer);
    } else {
        // une entree photo pour cette recette
        // existe en base on change le lien
        echo "<br> mise a jour de la base photo avec le lien";
        $photo->lien = $nomPhotoServer;
        // mise a jour de la base avec la nouvelle photo
        $photo->update($recette->id_recette, $nomPhotoServer);
    }
}


//echo "<br>on sort de enregistrerRecette.php <br>";
//echo "<a href=/popote/index.php>Continuer</a>";
header("location: /popote");
