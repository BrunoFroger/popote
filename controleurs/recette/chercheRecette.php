<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

$myIncludePath = '/var/www/html/popote';
set_include_path(get_include_path() . PATH_SEPARATOR . $myIncludePath);

// inclure le code de recherche de la recette
$_SESSION['typeContenu'] = 'liste';

$texteRecherche = $_POST['texteRecherche'];
if ($texteRecherche == '') {
    unset($_SESSION['listeRecherche']);
} else {
    echo "<br> texte recherche = " . $texteRecherche;
    $_SESSION['listeRecherche'] = $texteRecherche;
}

$catRecherche = $_POST['choixtypeplat'];
if ($catRecherche == 1) {
    unset($_SESSION['catRecherche']);
} else {
    echo "<br> Catégorie recherchée = ". $catRecherche;
    $_SESSION['catRecherche'] = $catRecherche;
}

$sscatRecherche = $_POST['choixsscat'];
if ($sscatRecherche == 1) {
    unset($_SESSION['sscatRecherche']);
} else {
    echo "<br> Sous-catégorie recherchée = ". $sscatRecherche;
    $_SESSION['sscatRecherche'] = $sscatRecherche;
}

//echo "<br> type_contenu = ". $_SESSION['typeContenu'];
$_SESSION['numPage']=0;
//echo "<br>on sort de chercheRecette.php <br>";
//echo "<a href=/popote/index.php>Continuer</a>";
header("location: /popote");
?>
