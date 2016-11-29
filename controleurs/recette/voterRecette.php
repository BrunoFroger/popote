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
include_once 'librairies/configuration/popote_conf.php';

//echo "<br> id recette => " . $_GET['id'];

$maRecette = $_GET['id'];
$maNote = $_GET['note'];
$tmpRecette = recette::NewById($maRecette);

$note = $tmpRecette->note;
$nbVote = $tmpRecette->nb_votes;
$somme=$tmpRecette->somme_notes;
echo "<br> ancienne note => " . $note;
echo "<br> ancien nb votant => " . $nbVote;
echo "<br> note votee => " . $maNote;
echo "<br> ancienne somme => ". $somme;

$nouvelleSomme = $somme + $maNote;
$nbVote++;
$note = ($nouvelleSomme / $nbVote);

echo "<br> nouvelle somme => " . $nouvelleSomme;
echo "<br> nouvelle note => " . $note;
echo "<br> nouveau nb votant => " . $nbVote;
$tmpRecette->update($tmpRecette->id_recette, $tmpRecette->id_membre, $tmpRecette->titre, $tmpRecette->nb_pers, $tmpRecette->cat_prix, $tmpRecette->cat_diff, $tmpRecette->description, $tmpRecette->cuisson, $tmpRecette->preparation, $tmpRecette->conseil, $tmpRecette->id_cat, $tmpRecette->id_ss_cat, $note, $nbVote, $nouvelleSomme, $tmpRecette->publication);

$_SESSION['id_recette'] = $maRecette;

//echo "<br>on revient en page d'admin";
//echo "<br><a href=/popote/index.php>Continuer</a>";
header("location: /popote");
