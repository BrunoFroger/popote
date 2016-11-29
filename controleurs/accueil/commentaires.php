<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//echo "<br> zone commentaire : type Commentaire = $_SESSION['typeCommentaire']";

if (isset($_SESSION['typeContenu'])) {
    if ($_SESSION['typeContenu'] == 'recette') {
        if (isset($_SESSION['typeCommentaire'])) {
            switch ($_SESSION['typeCommentaire']) {
                case 'affichage':
                    // affichage du commentaire dans une zone d'affichage
                    // recuperation du commentaire de ce membre pour cette recette
                    $_SESSION['commentaire'] = '';
                    $comment = commentaire::NewByRecetteMembre($recette->id_recette, $membre->id_membre);
                    if ($comment != false) {
                        $_SESSION['commentaire'] = $comment->message;
                        $_SESSION['idComment'] = $comment->id_commentaire;
                    } else {
                        $_SESSION['idComment'] = "";
                    }

                    echo "<div id='zonecomment'>"
                    . "<p>" . $_SESSION['commentaire']
                    . "</p>"
                    . "</div><!-- fin zonecomment -->"
                    . "<div id='modifcomment'>"
                    . "<form method='POST' action='controleurs/accueil/check_commentaire.php?recette=$recette->id_recette'>"
                    // ."<input class='gobutton' type='submit' value='Modifier mes commentaires'>"
                    ."<button id='P0modifcomment' type='submit'  >Modifier mes commentaires</button>"
                    . "</form>"
                    ."</div><!-- fin modifcomment -->";
                    break;
                case 'modification':
                    // affichage du commentaire dans une zone de saisie de texte
                    // bouton = validation des modicfications
                    echo ""
                    . "<form method='POST' action='controleurs/accueil/check_commentaire.php?recette=$recette->id_recette&membre=$membre->id_membre'>"
                    . "<div id = 'addcomment'>"
                    . "<textarea name='commentajout' cols = '60'  >"
                    . $_SESSION['commentaire']
                    . "</textarea>"
                    . "</div><!-- fin zonesaiiecomment -->"
                    . "<div id='savecomment'> "
                    . "<input class='gobutton' id='P0majcomment' type='submit' value='MAJ du commentaire personnel'>"
                    . "</div>  "
                    . "</form>";
                    break;
                default:
                    // pas d'affichage
                    break;
            }
        }
    }
}
?>