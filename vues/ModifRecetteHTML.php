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
                <form id='newrecette' action='saisienewrecette.php'>
                    <div id='paramgauche'>
                        <div id='newtitre'>
                            <p>Entrer un titre de recette : </p>
                            <p><input type='text' id='newtitre1' value='le titre de la recette'></p>

                        </div>
                        <div id='newtextpreparation'>
                            <p>Saisir le descriptif de la recette</p>  
                            <textarea  name='newtextpreparation1' placeholder='description de la nouvelle recette' >
                            </textarea>
                        </div>
                        <div id='newconseil'>
                            <p>Ajouter un conseil</p>  
                            <textarea  name='newconseil1' placeholder='(Proposer un conseil)'>                                  
                            </textarea>
                        </div>
                        <div id='newphoto'>
                            <p>Ajouter une photo </p>
                            <p><span> Sélectionnez le fichier </span>
                             <input type="file" value="" name="newphoto1"></p>
                        </div>
                    </div> <!-- fin #paramgauche -->
                    <div id='paramdroite'>
                        
                        <div id='allcategorie'>
                            <div id='newnbpers'>
                                <Label> <strong>Nombre de personnes </strong></label>
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
                            </div> <!-- fin div newnbpers -->
                                    
                            <div id='newtps'>
                                <Label> <strong>Temps</strong></label>
                                <p>Préparation :  
                                    <input type='text' id='newtpsprepa' value='Temps + unité de tps'> </p>
                                <p>Cuisson :  <input type='text' id='newtpscuisson' value='Temps + unité de tps'> </p></p>
                            </div>
                            <div id='newcategories'>
                                <Label> <strong>Catégories </strong></label>
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
                            </div>
                            <div id='newlisteingredient'>
                                <div id='ajoutunitaire'>
                                   <form action='saisieunit.php'>
                                        <fieldset>
                                            <legend>Ajouter un ingrédient</legend>
                                                Ingrédient :<br>
                                            <input list='modeleingredient' >
                                            <datalist id='modeleingredient'>
                                                <option value='0'> sucre </option>
                                                 <option value='2'> beurre </option>
                                                  <option value='3'> farine </option>
    <br>
    Last name:<br>
    <input type="text" name="lastname" value="Mouse">
    <br><br>
    <input type="submit" value="Submit">
  </fieldset>
</form> 
                                </div>
                                <Label> <strong>Liste des ingrédients</strong></label>
                                <p>Ingrédient :  </p>
                                <p>quantité :  </p>

                            </div>
                        </div> <!-- fin div allcategorie -->

                        <div id='validnewrecette'>
                            <p> Valider votre nouvelle recette </p>
                            <input type='submit' value=' Enregistrer la nouvelle recette' id='newrecord'>
                        </div> 

                    </div><!-- fin paramdroite -->
                </form> 




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
