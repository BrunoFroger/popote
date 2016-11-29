<?php
session_start();
$myIncludePath = '/var/www/html/popote';
set_include_path(get_include_path() . PATH_SEPARATOR . $myIncludePath);
include_once 'modeles/membre/classe_membre.php';
include_once 'modeles/recette/classe_recette.php';
include_once 'modeles/ingredient/classe_ingredient.php';
//session_destroy();
//$membre = membre::NewByLogin('bte');
//$membre = membre::NewByLogin('bfr');
//$_SESSION['membre'] = serialize($membre);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>
                Ma Popote Au Quotidien
            </title>
            <link rel="stylesheet" type="text/css" href="css/contenu.css" media="all">
                </head>

                <body>

                    <div id="global">
                        <div id="entete">
                            <a href=""><h1>MaPopoteAuQuotidien.fr</h1></a>
                            <div id="connect">
                                <p> Bonjour </p>
                                <p> <?php include_once 'controleurs/accueil/bonjour.php'; ?></p>
                            </div><!-- #connect -->
                        </div><!-- #entete -->

                        <div id="menu">
                            <ul>
                                <?php include_once 'controleurs/accueil/menu.php'; ?>
                            </ul>
                        </div><!-- #menu -->	

                        <!-- ---------------------- contenu affichage recette----------------------- --> 
                        <div id='contenu'> <!-- #cadre descriptif recette -->
                            <div id='navgauche'>
                                <div id='image'> <p> zone image</p> </div>
                                <div id='note'> <p> zone note </p> </div>
                            </div> <!-- fin nav gauche -->
                            <div id='navdroite'>
                                <div id='titre'> <p> Titre de la recette</p> </div>
                                <div id='nav'>
                                    <div id='ingredients'> <p> liste ingredients/ qté</p> </div>
                                    <div id='categories'> <p> indicateurs catégories</p> </div>
                                    <div id='affichetemps'> <p> indicateurs temps </p> </div>
                                </div> <!-- fin nav -->
                                <div id='preparation'> <p> description de la recette</p> </div>
                                <div id='conseil'> <p> conseil</p> </div>
                            </div><!-- fin navDroite -->
                        </div><!-- #contenu -->
                        <!-- ---------------------- fin contenu affichage recette----------------------- -->
                        <!-- ---------------------- affichage commentaire si membre connecté------------ -->
                        <div id='commentaire'>
                            <div id='zonecomment'>
                                <p> Mes commentaires & notes perso sur les recettes du site</p>
                            </div><!-- fin zonecomment -->
                            <div id='modifcomment'> 
                                <form action='modifcommentaire.php'>
                                <input type='submit' value='Modifier mes commentaires'>
                                </form>
                            </div><!-- fin modifcomment -->
                        </div>
                        <!-- ---------------------- fin affichage commentaire si membre connecté-------- --> 
                       
                        <div id='footer'>
                            <h1>pied-de-page</h1>
                        </div><!-- #pied-de-page -->

                    </div><!-- #global -->



                </body></html>
