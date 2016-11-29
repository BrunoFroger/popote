<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "<form method='POST' action='controleurs/recette/chercheRecette.php'>";
echo "<div id='P4criteres'>";
echo "<p>Saisir le texte à rechercher dans le titre des recettes</p>";
echo "<p><input name='texteRecherche' type='text' size='80'></p>";
//echo "<td> <input type='text' name='login' value='votre login'> </td>";
echo "<p><table>";
echo "<tr>";
echo " <td>Catégorie de recette </td>";
echo "<td>: ";
$listCategories = categorie::getListCategorie();
echo "<select id='choixtypeplat' name='choixtypeplat'>";
foreach ($listCategories as $item) {
    if ($recette->id_cat == $item['id_cat']) {
        echo "<option value=" . $item['id_cat'] . " selected='selected'>" . $item['nom'] . "</optoin>";
    } else {
        echo "<option value=" . $item['id_cat'] . ">" . $item['nom'] . "</optoin>";
    }
}
echo "</select></td> </tr>";
echo "<tr>";
echo "<td> Sous-catégorie de recette</td>";
echo "<td>: ";
$listSousCategories = sous_categorie::getListSousCategorie();
echo "<select id='choixsscat' name ='choixsscat'>";
foreach ($listSousCategories as $item) {
    if ($recette->id_ss_cat == $item['id_ss_cat']) {
        echo "                  <option value=" . $item['id_ss_cat'] . " selected='selected'>" . $item['nom'] . "</optoin>";
    } else {
        echo "                  <option value=" . $item['id_ss_cat'] . ">" . $item['nom'] . "</optoin>";
    }
}
echo "</select></td> </tr>";
echo "</table>";
echo "</div>";
echo "<div id='P4validcriteres'>";
echo "<input class='gobutton' type='submit' value='Chercher'>"; 
echo "</div>";
echo "</form>";

?>