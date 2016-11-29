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


                        <div id='contenu'> <!-- #cadre descriptif recette -->
                            <!-- ---------------------- contenu identification membre ----------------------- -->  
                            
                                 <form action='ajout_compte.php'>
                                     <div id='paramcompte'   >
                                      <table id='saisiecompte'> 
                                        <caption> Mon compte utilisateur </caption>
                                        <tr> 
                                            <td>Login </td> 
                                            <td> <input type='text' name='login' value='votre login'> </td>
                                        </tr>
                                        <tr> 
                                            <td>Mot de passe </td> 
                                            <td> <input type='text' name='pwd' value='votre pwd'> </td>
                                        </tr>
                                        <tr> 
                                            <td>Confirmer le MDP </td> 
                                            <td> <input type='text' name='pwd2' value='confirmer le pwd'> </td>
                                        </tr>
                                        <tr> 
                                            <td>Nom </td> 
                                            <td> <input type='text' name='nom' value='votre nom'> </td>
                                        </tr>
                                        </tr>
                                        <tr> 
                                            <td>Prénom </td> 
                                            <td> <input type='text' name='prenom' value='votre prénom'> </td>
                                        </tr>
                                        <tr> 
                                            <td>Email </td> 
                                            <td> <input type='text' name='mail' value='votre Email' size='50'> </td>
                                        </tr>



                                    </table>
                                 </div><!-- fin paramcompte -->
                                    <div id='validcompte'> 
                                        <input type='submit' value='Enregistrer les paramètres du compte'>
                                    </div>
                                </form> 

                            
                            <!-- ---------------------- fin contenu identification membre ----------------------- -->
                        </div><!-- #contenu -->


                        <div id='footer'>
                            <h1>pied-de-page</h1>
                        </div><!-- #pied-de-page -->

                    </div><!-- #global -->



                </body></html>
