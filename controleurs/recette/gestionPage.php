<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

$myIncludePath = '/var/www/html/popote';
set_include_path(get_include_path() . PATH_SEPARATOR . $myIncludePath);


if ($_GET['page'] == 'suivant') {
    if ($_SESSION['numPage'] > $_SESSION['nbPages']) {
        $_SESSION['numPage'] = $_SESSION['numPage'];
    } else {
        $_SESSION['numPage'] ++;
    }
}
if ($_GET['page'] == 'precedent') {
    if ($_SESSION['numPage'] < 0) {
        $_SESSION['numPage'] = 0;
    }else {
        $_SESSION['numPage'] --;
    }
}
       
//echo "<br>on sort de gestionPage.php <br>";
//echo "<a href=/popote/index.php>Continuer</a>";
header("location: /popote");
