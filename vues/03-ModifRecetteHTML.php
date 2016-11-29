<?php
header( 'content-type: text/html; charset=uft-8');
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
<!-- saisie sous forme de modification des paramètres de la recette hormis les ingredients -->
<!-- bouton modif. dispo pour passer à la page de modif. de la liste des ingredients -->
<form id='modifrecetteall' action='modifrecette.php'>            
    <div id='paramgauche'>        
        <div id='modiftitre'>    
            <fieldset>
                <legend><strong>Entrer un titre de recette </strong></legend>
                <p><input type='text' id='modiftitre1' value='[titre de la recette]'></p>
            </fieldset>
        </div>    
        <div id='modifpreparation'>
            <fieldset>
                <legend><strong>Saisir le descriptif de la recette</strong></legend>
                <textarea  name='modifpreparation1' cols='60' rows='20'>[affiche le texte de la préparation]
                </textarea>
            </fieldset>
        </div>
        <div id='modifconseil'>
            <fieldset>                           
                <legend><strong>Proposer un conseil</strong></legend>     
                <textarea  name='modifconseil1' cols='60' >[affiche le texte du conseil]                                 
                </textarea>    
            </fieldset>
        </div>
        <div id='modifphoto'>               
            <fieldset>                           
                <legend><strong>Ajouter une photo</strong></legend>
                <p><span> Sélectionnez le fichier </span>
                    <input type='file' value='' name='modifphoto1'></p>
            </fieldset>               
        </div>            
    </div> <!-- fin #paramgauche -->
    <div id='paramdroite'>
        <div id='modifparamliste'>
            <div id='modifnbpers'>
                <fieldset>
                    <legend> <strong>Nombre de personnes </strong></legend>
                    <p> Préparation pour 
                        <select id='choixnbpers'>
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                            <option value='7'>7</option>
                            <option value='8'>8</option>
                            <option value='9'>9</option>
                            <option value='0'>10 et plus</option>
                        </select> personne(s) </p>
                </fieldset>
            </div> <!-- fin div modifnbpers -->                  
            <div id='modiftps'>
                <fieldset>
                    <legend> <strong>Temps</strong></legend>
                    <p>Préparation :  
                        <input type='text' id='modiftpsprepa' value='[tps prépa]'> </p>
                    <p>Cuisson :  <input type='text' id='modiftpscuisson' value='[tps cuisson]'> </p>
                </fieldset>
            </div><!-- fin div modiftps -->
            <div id='modifallcategories'>
                <fieldset>
                    <legend> <strong>Catégories </strong></legend>
                    <p>Prix :  
                        <select id='choixcatprix'>
                            <option value='0'>Gratuit (0/5)</option>
                            <option value='1'>Peu Cher (1/5)</option>
                            <option value='2'>Très Abordable (2/5)</option>
                            <option value='3'>Cher (3/5)</option>
                            <option value='4'>Très Cher (4/5)</option>
                            <option value='5'>Hors de prix (5/5)</option>
                        </select></p>
                    <p>Difficulté :  <select id='choixcatdiff'>
                            <option value='0'>Super débutant (0/5)</option>
                            <option value='1'>Débutant (1/5)</option>
                            <option value='2'>Débutant expérimenté (2/5)</option>
                            <option value='3'>Expert débutant (3/5)</option>
                            <option value='4'>Expert (4/5)</option>
                            <option value='5'>Super Chef (5/5)</option>
                        </select></p>
                    <p>Recette :  <select id='choixtypeplat'>
                            <option value='0'>(vide)</option>
                            <option value='1'>Plat Principal</option>
                            <option value='2'>Dessert</option>
                            <option value='3'>Hors d'oeuvre</option>
                            <option value='4'>Apéro</option>
                            <option value='5'>Entrée</option>
                        </select></p>  
                    <p>Sous Catégorie recette :  <select id='choixsscat'>
                            <option value='0'>(Vide)</option>
                            <option value='1'>viande</option>
                            <option value='2'>poisson</option>
                            <option value='3'>glace</option>
                        </select></p>
                </fieldset>
            </div> <!-- fin div modifcategories -->
            <div id='memoingredient'>
                <fieldset>
                    <legend><strong>Liste des ingrédients</strong></legend>
                    <!-- même table que pour la page de saisie des ingredients -->
                    <div class = 'affichetableingredientsaisi'> 
                        <table>
                            <tr>
                                <th> Ingrédient </th>
                                <th> Quantité </th>
                            </tr>
                            <tr>
                                <td>ingredient 1</td>
                                <td>qte 1</td>
                            </tr>
                            <tr>
                                <td>ingredient 2</td>
                                <td>qte 2</td>
                            </tr>
                        </table>
                    </div>
                    <!-- fin affichage table ingredients -->
                </fieldset>
            </div>
        </div><!-- fin modifparamlist -->
        <div id='validmodifrecette'>
            <fieldset>
                <legend><strong> Valider votre nouvelle recette </strong></legend>
                <input type='submit' value=' Enregistrer la nouvelle recette' id='recordmodif'>
            </fieldset>
        </div> 


    </div><!-- fin paramdroite -->
</form> 


<!-- ------------------------ fin etape 3 -------------------------------- -->

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
