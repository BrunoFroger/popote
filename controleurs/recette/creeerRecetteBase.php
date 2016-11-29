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

$titre = $_POST['newtitre1'];
echo "<br> titre = " . $titre;
$categorie = $_POST['choixtypeplat'];
echo "<br> categorie = " . $categorie;
$sous_categorie = $_POST['choixsscat'];
echo "<br> sous_categorie = " . $sous_categorie;

if ($titre == 'Nouvelle recette'){
    // aucun titre n'a ete saisi => erreur
    $_SESSION['erreurCreeRecette']="Veuillez indiquer un nom de recette";
    header("location: /popote");
    exit;
}else{
    unset($_SESSION['erreurCreeRecette']);
}

$membre = unserialize($_SESSION['membre']);
echo "<br>id membre = " . $membre->id_membre;
echo "<br>";

$recette = recette::NewCreate($membre->id_membre, $titre, '', '', '', '', '', '', '', $categorie, $sous_categorie, '', '', '', '');

if ($recette == null) {
    // aucun titre n'a ete saisi => erreur
    $_SESSION['erreurCreeRecette']="cette recette existe déjà ; veuillez modifier le titre";
    $_SESSION['titre CreeRecette']=$titre;
    header("location: /popote");
    exit;
    //echo "<br>creation de la recette impossible ; veuillez recommencer";
    //$_SESSION['typeContenu'] = 'creationRecette';
    //echo "<br>on sort de creation recette en base.php";
    echo "<br><a href=/popote/index.php>Continuer</a>";
    exit;
} else {
    $_SESSION['id_recette'] = $recette->id_recette;
    $_SESSION['typeContenu'] = 'modificationRecette';
    unset($_SESSION['titre CreeRecette']);
}

echo "<br>recette cree ; on sort de creation recette en base.php et on passe en modification recette";
//echo "<br><a href=/popote/index.php>Continuer</a>";
header("location: /popote");
