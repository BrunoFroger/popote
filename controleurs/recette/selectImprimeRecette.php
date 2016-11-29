<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


session_start();

$myIncludePath = '/var/www/html/popote';
set_include_path(get_include_path() . PATH_SEPARATOR . $myIncludePath);

echo "<br> en cours de developpememt : ";
$recette = $_SESSION['id_recette'];
echo "<br>id recette = $recette";

if (isset($_SESSION['id_recette'])){
     echo "on positionne id_recette et typeContenu";
    $_SESSION['typeContenu']='imprimeRecette';
}

echo "<br>id recette = " . $_SESSION['id_recette'];
 echo "<br>typecontenu = " . $_SESSION['typeContenu'];
echo "<br>on passe en impression recette";
echo "<br><a href=/popote/index.php>Continuer</a>"; 
//header("location: /popote");

