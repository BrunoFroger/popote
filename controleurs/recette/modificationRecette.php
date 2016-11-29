<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// on recupere l'ide de recette dans la session
$recette = recette::NewById($_SESSION['id_recette']);

echo "<form enctype='multipart/form-data' name='monfichier' method='POST' id='modifrecetteall' action='controleurs/recette/enregistreRecette.php'>";
echo "  <div id='P8paramgauche'>";
echo "      <div id='P8modiftitre'> ";
echo "          <fieldset>";
echo "              <legend><strong>Entrer un titre de recette </strong></legend>";
echo "              <p><input type='text' id='modiftitre1' name='modiftitre1' value='" . $recette->titre . "'></p>";
echo "          </fieldset>";
echo "      </div>";
echo "      <div id='P8modifpreparation'>";
echo "          <fieldset>";
echo "              <legend><strong>Saisir le descriptif de la recette</strong></legend>";
echo "              <textarea  name='modifpreparation1' cols='70' rows='20'>" . $recette->description . "</textarea>";
echo "          </fieldset>";
echo "      </div>";
echo "      <div id='P8modifconseil'>";
echo "      <fieldset>";
echo "          <legend><strong>Proposer un conseil</strong></legend>";
echo "          <textarea  name='modifconseil1' cols='70' >" . $recette->conseil . "</textarea>";
echo "      </fieldset>";
echo "  </div>";
echo "  <div id='P8modifphoto'>";
$photo = photo::NewByRecetteId($recette->id_recette);
echo "      <fieldset>";
echo "          <legend><strong>Ajouter une photo </strong></legend>";
echo "          <div id='P8zonephotoxs'>";
echo "           <p><img src='librairies/photos/$photo->lien' id='imagerecetteXS'>";
// ESSAI POUR REMPLACER LE BOUTON DU INPUT FILE PAR UN AUTRE MODELE DE BOUTON
//echo "           <div id='upload' class='upbutton'>";
//echo "          <input type='hidden' name='MAX_FILE_SIZE' value='300000' />";
//echo "          <input type='file' name='modifphoto1'  value ='' class='browse' multiple>"; 
//echo "          <span id='fileSelectButton' class='gobutton'>Sélectionnez la photo</span>";
//echo "          <p class='browse'><strong>Taille maximale :</strong> 300Ko.</p>";
//echo "          <p class='browse'><strong>Formats supportés :</strong> jpg,jpeg.</p>";
//echo "          </div>";
// ------------------FIN ESSAI
echo "          <span> Sélectionnez une photo </span> </p>";
echo "          </div> <!-- fin #P8zonephotoxs -->";
echo "          <div id='P8infophoto'>";
echo "          <p><strong>Taille maximale :</strong> 300Ko.</p>";
echo "          <p><strong>Formats supportés :</strong> jpg, jpeg, png.</p>";
echo "          </div> <!-- fin #P8infophoto -->"; 
echo "          <div id='P8uploadphoto' class='gobutton'>";
echo "          <p> <input type='hidden' name='MAX_FILE_SIZE' value='300000' />";
echo "          <input class='gobutton' type='file' value='' name='modifphoto1'></p>";
echo "          </div> <!-- fin #P8uploadphoto -->";
echo "      </fieldset>";
echo "  </div> <!-- fin #P8modifphoto -->";
echo "  </div> <!-- fin #P8paramgauche -->";

echo "  <div id='P8paramdroite'>";
echo "      <div id='P8modifparamliste'>";
echo "          <div id='P8modifnbpers'>";
echo "              <fieldset>";
echo "                  <legend> <strong>Nombre de personnes </strong></legend>";
echo "                  <p> Préparation pour";
echo "                  <select id='choixnbpers' name='choixnbpers'>";
for ($i = 1; $i <= 10; $i++) {
    if ($i == $recette->nb_pers) {
        $selected = " selected='selected'";
    } else {
        $selected = "";
    }
    if ($i != 10) {
        echo "              <option value='" . $i . "'" . $selected . ">" . $i . "</option>";
    } else
        echo "              <option value='" . $i . "'" . $selected . ">10 et plus</option>";
}
echo "                  </select> personne(s) </p>";
echo "              </fieldset>";
echo "          </div> <!-- fin div P8modifnbpers -->";
echo "          <div id='P8modiftps'>";
echo "              <fieldset>";
echo "                  <legend> <strong>Temps</strong></legend>";
echo "                  <table>";
echo "                      <tr>";
echo "                          <td>Préparation :</td>";
echo "                          <td><input type='text' id='modiftpsprepa' name='modiftpsprepa' value='" . $recette->preparation . "'> </td>";
echo "                      </tr>";
echo "                      <tr>";
echo "                          <td>Cuisson :  </td>";
echo "                          <td><input type='text' id='modiftpscuisson' name='modiftpscuisson' value='" . $recette->cuisson . "'> </td>";
echo "                      </tr>";
echo "                  </table>";
echo "              </fieldset>";
echo "          </div><!-- fin div P8modiftps -->";
echo "          <div id='P8modifallcategories'>";
echo "              <fieldset>";
echo "                  <legend> <strong>Catégories </strong></legend>";
echo "                  <table>";
echo "                      <tr>";
$listCatPrix = array('Gratuit (0/5)', 'Peu Cher (1/5)', 'Très Abordable (2/5)', 'Cher (3/5)', 'Très Cher (4/5)', 'Hors de prix (5/5)');
echo "                          <td>Prix :</td>";
echo "                          <td><select id='choixcatprix' name='choixcatprix'>";
foreach ($listCatPrix as $catPrix) {
    if ($catPrix == $recette->cat_prix) {
        $selected = " selected='selected'";
    } else {
        $selected = "";
    }
    echo "                              <option value='$catPrix' $selected>$catPrix</option>";
}
echo "                          </select></td>";
echo "                      </tr>";
echo "                      <tr>";
$listCatDiff = array('Super débutant (0/5)', 'Débutant (1/5)', 'Débutant expérimenté (2/5)', 'Expert débutant (3/5)', 'Expert (4/5)', 'Super Chef (5/5)');
echo "                          <td>Difficulté :  </td>";
echo "                          <td><select id='choixcatdiff' name='choixcatdiff'>";
foreach ($listCatDiff as $catDiff) {
    if ($catDiff == $recette->cat_diff) {
        $selected = " selected='selected'";
    } else {
        $selected = "";
    }
    echo "                          <option value='$catDiff' $selected>$catDiff</option>";
}
echo "                          </select></td>";
echo "                      </tr>";
echo "                      <tr>";
echo "                          <td>Recette : </td>";
$listCategories = categorie::getListCategorie();
echo "                          <td><select id='choixtypeplat' name='choixtypeplat'>";
foreach ($listCategories as $item) {
    if ($recette->id_cat == $item['id_cat']) {
        echo "                      <option value=" . $item['id_cat'] . " selected='selected'>" . $item['nom'] . "</option>";
    } else {
        echo "                      <option value=" . $item['id_cat'] . ">" . $item['nom'] . "</option>";
    }
}
echo "                          </select></td>"; 
if ($recette->id_cat != "") {
    $listSousCategories = sous_categorie::getListSousCategorieByCategorie($recette->id_cat);
}else
 {
    $listSousCategories = sous_categorie::getListSousCategorie();
}
echo "                      </tr>";
echo "                      <tr>";
echo "                          <td>Sous-catégorie recette : </td>";
echo "                          <td><select id='choixsscat' name ='choixsscat'>";
foreach ($listSousCategories as $item) {
    if ($recette->id_ss_cat == $item['id_ss_cat']) {
        echo "                      <option value=" . $item['id_ss_cat'] . " selected='selected'>" . $item['nom'] . "</optoin>";
    } else {
        echo "                      <option value=" . $item['id_ss_cat'] . ">" . $item['nom'] . "</optoin>";
    }
}
echo "                          </select></td>";
echo "                      </tr>";
echo "                  </table>";
echo "              </fieldset>";
echo "          </div> <!-- fin div P8modifcategories -->";
echo "          <div id='P8memoingredient'>";
echo "              <fieldset>";
echo "                  <legend><strong>Liste des ingrédients</strong></legend>";
echo "                  <!-- même table que pour la page de saisie des ingredients -->";
$listIngredients = ingredient::GetListId($recette->id_recette);
echo "                  <div id = 'P8affichetableingredientsaisi'>";
echo "                      <table>";
echo "                          <tr>";
echo "                              <th> Ingrédient </th>";
echo "                              <th> Qté </th>";
echo "                              <th> Suppression </th>";
echo "                          </tr>";
//print_r($listIngredients);
foreach ($listIngredients as $ingredient) {
    echo "                      <tr>";
    echo "                          <td>$ingredient[nom]</td>";
    echo "                          <td>$ingredient[quantite]</td>";
    echo "                          <td><a href='controleurs/constituants/deleteconstituant.php?id=$ingredient[id_constituant]'>  X  </a></td>";
    //echo "                          <td><a href='controleurs/constituants/changeordreconstituant.php?id=$ingredient[id_constituant]&sens=up'><img src='librairies/icones/up.png' id='imagerecetteXS'></a></td>";
	echo "                          <td><a href='controleurs/constituants/changeordreconstituant.php?id=$ingredient[id_constituant]&sens=up'>  ^  </a></td>";
    echo "                          <td><a href='controleurs/constituants/changeordreconstituant.php?id=$ingredient[id_constituant]&sens=down'>  v  </a></td>";
    echo "                      </tr>";
}
echo "                      </table>";
echo "                      <br>Ajout d'ingrédients :";
echo "                      <table>";
echo "                          <tr>";
echo "                              <th> Ingrédient </th>";
echo "                              <th> Quantité </th>";
echo "                          </tr>";
$listIngredients = ingredient::getListIngredients();
//print_r($listIngredients);
echo "                          <tr>";
echo "                              <td>";
echo "                                  <datalist id='choixlisteingredient'>";
foreach ($listIngredients as $ingredient) {
//    echo "<br> ingredient => ". $ingredient['nom'];
//    echo "                                  <option value='$ingredient[id_ingredient]'>$ingredient[nom]</option>";
    echo "                                  <option value='$ingredient[nom]'>$ingredient[nom]</option>";
}
echo "                                  </datalist>";
echo "                                  <input list='choixlisteingredient' id='choixnouvelingredient' name='choixnouvelingredient' type='text'>";
echo "                              </td>";
echo "                              <td>";
echo "                                  <input type='text' size='10' id='quantitenouvelingredient' name='quantitenouvelingredient'>";
//echo "                                  <input type='text' size='10' id='quantitenouvelingredient' >";
echo "                              </td>";
echo "                              <td>";
echo "                                  <input class='gobutton' type='submit' value='Ajouter'>";
echo "                              </td>";
echo "                          </tr>";
echo "                      </table>";
echo "                  </div>";
echo "                  <!-- fin affichage table ingredients -->";
echo "              </fieldset>";
echo "          </div><!-- fin memoingredient -->";
echo "      </div> <!-- fin modifparamlist -->";
echo "      <div id='P8validmodifrecette'>";
echo "          <fieldset>";
echo "              <legend><strong> Valider votre recette </strong></legend>";
echo "              <input class='gobutton' type='submit' value=' Enregistrer la recette' id='recordmodif'>";
echo "          </fieldset>";
echo "      </div> <!-- fin P8validmodifrecette -->";
echo "  </div><!-- fin paramdroite -->";
echo "</form> ";
