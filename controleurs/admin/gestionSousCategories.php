<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (isset($_GET['id'])) {
    // on est en modification de sous_categorie
    echo "<br> modification de la sous_categorie";
    /* echo "<br> id_ss_cat=" . $_GET['id'];
      echo "<br> nom=" . $_POST['nomSousCategorie'];
      echo "<br> id=" . $_POST['descSousCategorie'];
      echo "<br> id_cat=" . $_POST['idcatSousCategorie']; */
    $tmp = sous_categorie::NewById($_GET['id']);
    $tmp->nom = $_POST['nomSousCategorie'];
    $tmp->description = $_POST['descSousCategorie'];
    $tmp->id_cat = $_POST['idcatSousCategorie'];
    $tmp->update();
}
if (isset($_GET['action'])) {
    // on est en creation d'une sous_categorie
    /* echo "<br> creation de la sous_categorie";
      echo "<br> nom=" . $_POST['nomSousCategorie'];
      echo "<br> id=" . $_POST['descSousCategorie']; */
    $tmp->id_cat = $_POST['idcatSousCategorie'];
    $tmp = new sous_categorie();
    $tmp->nom = $_POST['nomSousCategorie'];
    $tmp->description = $_POST['descSousCategorie'];
    $tmp->id_cat = $_POST['idcatSousCategorie'];
    $tmp->create();
}


$listeSousCategorieId = sous_categorie::getListSousCategorie();
$nbSousCategories = count($listeSousCategorieId);
//echo "<br> gestion des sous_categories ($nbSousCategories)";
//print_r($listeSousCategorieId);

echo"<div id='P64tabsscategorie'>";
echo "<h4> Gestion des sous-catégories ($nbSousCategories)</h4>";
echo "<table>";
echo "<th>Id</th>";
echo "<th>Nom</th>";
echo "<th>Description</th>";
echo "<th>Catégorie associée</th>";
echo "<th>Action</th>";
echo "</tr>";
foreach ($listeSousCategorieId as $item) {
    $tmp = sous_categorie::NewById($item['id_ss_cat']);
    echo "<form method='POST' action='index.php?id=$tmp->id_ss_cat'";
    echo "<tr>";
    echo "<td>" . $tmp->id_ss_cat . "</td>";
    if ($tmp->nom != '(vide)') {
        echo "<td><input type='text' name='nomSousCategorie' value='" . $tmp->nom . "'></td>";
        echo "<td><input type='text' name='descSousCategorie' value='" . $tmp->description . "'></td>";
        echo "<td><input type='text' name='idcatSousCategorie' value='" . $tmp->id_cat . "'></td>";
        echo "<td><input class='gobutton' type='submit' value='Modifier' ></td>";
    } else {
        echo "<td>" . $tmp->id_ss_cat . "</td>";
        echo "<td>" . $tmp->nom . "</td>";
        echo "<td>" . $tmp->description . "</td>";
        echo "<td>" . $tmp->id_cat . "</td>";
    }
    echo "</tr>";
    echo "</form>";
}
echo "<form method='POST' action='index.php?action=create'";
echo "<tr>";
echo "<td></td>";
echo "<td><input type='text' name='nomSousCategorie' value='Nom new ss-cat'></td>";
echo "<td><input type='text' name='descSousCategorie' value='Saisir description'></td>";
echo "<td><input type='text' name='idcatSousCategorie' value='Catégorie associée'></td>";
echo "<td><input class='gobutton' type='submit' value='Créer' ></td>";
echo "</tr>";
echo "</table>";
echo "</div>";

echo"<div id='P64gestionretour'>";
echo "<a class='P6listemenu1' href='controleurs/admin/selectHomeAdmin.php'>Retour</a>";
echo "</div>";

