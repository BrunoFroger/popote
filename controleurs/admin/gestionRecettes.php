<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// gstion de srecettes a valider
$ListeRecette = recette::GetListAllId();
$nbRecettes = count($ListeRecette);
echo"<div id='P62tabrescette'>";
echo "<h4> Gestion/Validation des recettes ($nbRecettes)</h4>";
//print_r($ListeRecette);
echo "<table>";
echo "<tr>";
echo "<th>Id</th>";
echo "<th>Titre</th>";
echo "<th>Catégorie</th>";
echo "<th>Ss-catégorie</th>";
echo "<th>User</th>";
echo "<th>Validée</th>";
echo "</tr>";
foreach ($ListeRecette as $recetteId) {
    $tmpRecette = recette::NewById($recetteId);
    $tmpCat = categorie::NewById($tmpRecette->id_cat);
    $tmpSSCat = sous_categorie::NewById($tmpRecette->id_ss_cat);
    echo "<tr>";
    echo "<td>" . $tmpRecette->id_recette . "</td>";
    echo "<td>" . $tmpRecette->titre . "</td>";
    echo "<td>" . $tmpCat->nom . "</td>";
    echo "<td>" . $tmpSSCat->nom . "</td>";
    $membre = membre::NewById($tmpRecette->id_membre);
    if ($membre == null) {
        echo "<td>inconnu<td>";
    } else {
        echo "<td><a href='controleurs/recette/changeUserRecette.php?recette=$tmpRecette->id_recette&user=$membre->login'>" . $membre->login . "</a></td>";
    }
    if ($tmpRecette->publication != 0) {
        echo "<td><a class='P6listemenu2' href='controleurs/recette/changeValideRecette.php?tag=oui&id=$tmpRecette->id_recette'>oui</a></td>";
    } else {
        echo "<td><a class='P6listemenu2' href='controleurs/recette/changeValideRecette.php?tag=non&id=$tmpRecette->id_recette'>non</a></td>";
    }
}
echo "</table>";
echo "</div>";

echo"<div id='P62gestionretour'>";
echo "<a class='P6listemenu1' href='controleurs/admin/selectHomeAdmin.php'>retour</a>";
echo "</div>";
