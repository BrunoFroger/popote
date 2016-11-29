<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$_SESSION['typeContenu']='liste';
//$_SESSION['typeContenu']='recette';
//$_SESSION['id_recette']='5';
if (isset($_SESSION['typeContenu'])) {
    switch ($_SESSION['typeContenu']) {
        case 'admin':
            $_SESSION['typeCommentaire'] = '';
            unset ($_SESSION['sendMail']);
            if (isset($_SESSION['typeAffichageAdmin'])) {
                // on switch sur la valeur de ce parametre
                //echo "<br> Contenu : on est dans une page d'admin : ".$_SESSION['typeAffichageAdmin'];
                switch ($_SESSION['typeAffichageAdmin']) {
                    case 'users':
                        include_once 'controleurs/admin/gestionUsers.php';
                        break;
                    case 'recettes':
                        include_once 'controleurs/admin/gestionRecettes.php';
                        break;
                    case 'categories':
                        include_once 'controleurs/admin/gestionCategories.php';
                        break;
                    case 'sousCategories':
                        include_once 'controleurs/admin/gestionSousCategories.php';
                        break;
                    default:
                        include_once 'controleurs/admin/gestionAdmin.php';
                        break;
                }

            } else {
                include_once 'controleurs/admin/gestionAdmin.php';
            }
            break;
        case 'creationRecette':
            $_SESSION['typeCommentaire'] = '';
            $_SESSION['listeRecette'] = 'user';
            unset ($_SESSION['sendMail']);
            //echo "<br> contenu : affichage de creation recette";
            include_once 'controleurs/recette/creerNouvelleRecette.php';
            break;
        case 'envoi_mail':
            $_SESSION['typeCommentaire'] = '';
            include_once 'controleurs/membre/formulaire_mail.php';
            break;
        case 'gestion_compte':
            $_SESSION['typeCommentaire'] = '';
            unset ($_SESSION['sendMail']);
            include_once 'controleurs/membre/gestion_compte.php';
            break;
         case 'imprimeRecette':
            unset ($_SESSION['sendMail']);
            if (isset($_SESSION['membre'])) {
                if ($_SESSION['typeCommentaire'] == '') {
                    $_SESSION['typeCommentaire'] = 'affichage';
                }
            }
            include_once 'controleurs/recette/imprime_recette.php';
            break;
       case 'liste':
            $_SESSION['typeCommentaire'] = '';
            unset ($_SESSION['sendMail']);
            include_once 'controleurs/recette/listeRecette.php';
            break;
        case 'login':
            $_SESSION['typeCommentaire'] = '';
            unset ($_SESSION['sendMail']);
            include_once 'controleurs/membre/login.php';
            break;
         case 'maListe':
            $_SESSION['typeCommentaire'] = '';
            unset ($_SESSION['sendMail']);
            include_once 'controleurs/recette/listeRecette.php';
            break;
        case 'modificationRecette':
            $_SESSION['typeCommentaire'] = '';
            $_SESSION['listeRecette'] = 'user';
            unset ($_SESSION['sendMail']);
            //echo "<br> contenu : affichage de creation recette";
            include_once 'controleurs/recette/modificationRecette.php';
            break;
        case 'recette':
            unset ($_SESSION['sendMail']);
            if (isset($_SESSION['membre'])) {
                if ($_SESSION['typeCommentaire'] == '') {
                    $_SESSION['typeCommentaire'] = 'affichage';
                }
            }
            include_once 'controleurs/recette/affiche_recette.php';
            break;
        case 'recherche':
            unset ($_SESSION['sendMail']);
            $_SESSION['typeCommentaire'] = '';
            include_once 'controleurs/recette/recherche.php';
            break;
    }
} else {
    //par defaut on affiche une recette
    unset ($_SESSION['sendMail']);
    include_once 'controleurs/recette/affiche_recette.php';
}
?>
