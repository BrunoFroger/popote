<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$myIncludePath = '/var/www/html/popote';
set_include_path(get_include_path() . PATH_SEPARATOR . $myIncludePath);

include_once ('modeles/preferee/classe_preferee.php');

$idRecette=$_GET['id'];
$idMembre=$_GET['membre'];
$action=$_GET['action'];
if (isset($_GET['idPref'])){
    $idPref=$_GET['idPref'];
}else{
    $idPref='';
}

echo "<br> recette=$idRecette, membre=$idMembre, action=$action, idPref=$idPref";

if ($action == 'ajouter'){
    // on ajoute une entree dans la table preferee
    $tmp=new preferee();
    $tmp->id_recette=$idRecette;
    $tmp->id_membre=$idMembre;
    $tmp->create();
}else{
    // on retire la recette de la table preferee
    echo "<br> on retire la recette preferee d'id $idpref de la base";
    preferee::delete($idPref);
}

// pour revenir sur la meme recette
$_SESSION['id_recette']=$idRecette;

//echo "<br><a href=/popote/index.php>Continuer</a>";
header("location: /popote");

?>
