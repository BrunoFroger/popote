<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


session_start();

$myIncludePath = '/var/www/html/popote';
set_include_path(get_include_path() . PATH_SEPARATOR . $myIncludePath);

if (isset($_GET['id'])){
    $_SESSION['id_recette']=$_GET['id'];
    $_SESSION['typeContenu']='modificationRecette';
    
}

//echo "<br>on passe en modification recette";
//echo "<br><a href=/popote/index.php>Continuer</a>";
header("location: /popote");

