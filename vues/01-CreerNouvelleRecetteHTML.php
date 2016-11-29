<?php
header('content-type: text/html; charset=uft-8');
//session_destroy();
//$membre = membre::NewByLogin('bte');
//$membre = membre::NewByLogin('bfr');
//$_SESSION['membre'] = serialize($membre);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"><head>
        <!--meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>
                Ma Popote Au Quotidien
            </title>
            <link rel="stylesheet" type="text/css" href="/popote/vues/css/contenu.css" media="all">
                </head>

                <body>

                    <div id="global">
                        <div id="entete">
                            <a href="/popote/controleurs/accueil/resetSession.php"><h1>MaPopoteAuQuotidien.fr</h1></a>
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


                        <div id="contenu"> <!-- #cadre descriptif recette -->
                            <!-- ==================================================================================================== -->                            
                            <!-- Créer nouvelle recette : saisie du titre de la recette, d'une catégorie, et d'une sous catégorie  -->               
                            <!-- Etape 1 : permet de créer un id_recette pour la saisie des ingrédients/qté  -->

                            <form id='newrecette' action='creenouvellerecette.php'>
                                <div id='newrecette1'>
                                    <div class='cadretitre'>
                                    <h1>Saisie d'une nouvelle recette</h1>
                                    </div>
                                    <div id='newtitre'>
                                        <fieldset>
                                            <legend><strong>Entrer un titre de recette : </strong></legend>
                                            <p><input type='text' id='newtitre1' value='le titre de la recette'></p>
                                        </fieldset>
                                    </div>  
                                    <div id='categoriemandatory'>
                                        <fieldset>
                                            <legend><strong>Choix des catégories de recette </strong></legend>
                                            <p>Type plat :  <select id='choixtypeplat'>
                                                    <option value='0'>(vide)</option>
                                                    <option value='1'>Plat Principal</option>
                                                    <option value='2'>Dessert</option>
                                                    <option value='3'>Hors d'oeuvre</option>
                                                    <option value='4'>Apéro</option>
                                                    <option value='5'>Entrée</option>
                                                </select></p>  
                                            <p>Sous Catégorie :  <select id='choixsscat'>
                                                    <option value='0'>(Vide)</option>
                                                    <option value='1'>viande</option>
                                                    <option value='2'>poisson</option>
                                                    <option value='3'>glace</option>
                                                </select></p>
                                        </fieldset>
                                    </div><!-- #categoriemandatory -->
                                    <div id='validnewrecette'>
                                        <fieldset>
                                            <legend><strong>Valider votre nouvelle recette </strong></legend>
                                            <input type='submit' value=' Enregistrer la nouvelle recette' id='newrecord'>
                                        </fieldset>

                                    </div> <!-- #validnewrecette -->
                                </div> <!-- #newrecette1 -->
                            </form> <!-- #newrecette -->

                            <!-- ==================================================================================================== -->                            

                        </div><!-- #contenu -->

                        <!-- ---------------------- zone des commentaires membres ------------ -->
                        <div id='commentaire'>
                            <?php include_once 'controleurs/accueil/commentaires.php'; ?>
                        </div>
                        <!-- ---------------------- fin zone des commentaires membres-------- --> 



                        <div id='footer'>
                            <h1>pied-de-page</h1>
                        </div><!-- #pied-de-page -->

                    </div><!-- #global -->



                </body></html>
