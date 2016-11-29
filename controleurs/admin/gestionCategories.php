<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (isset($_GET['id'])) {
    // on est en modification de categorie
    //echo "<br> modification de la categorie";
    //echo "<br> id=" . $_GET['id'];
    //echo "<br> nom=" . $_POST['nomCategorie'];
    //echo "<br> id=" . $_POST['descCategorie'];
    $tmp = categorie::NewById($_GET['id']);
    $tmp->nom=$_POST['nomCategorie'];
    $tmp->description=$_POST['descCategorie'];
    $tmp->update();
}
if (isset($_GET['action'])) {
    // on est en creation d'une categorie
    //echo "<br> creation de la categorie";
    //echo "<br> nom=" . $_POST['nomCategorie'];
    //echo "<br> id=" . $_POST['descCategorie'];
    $tmp = new categorie();
    $tmp->nom=$_POST['nomCategorie'];
    $tmp->description=$_POST['descCategorie'];
    $tmp->create();
}

$listeCategorieId = categorie::getListCategorie();
$nbCategories = count($listeCategorieId);
echo"<div id='P63tabcategorie'>";
echo "<h4> Gestion des categories ($nbCategories)</h4>";
//print_r($listeCategorieId);


echo "<table>";
echo "<th>Id</th>";
echo "<th>Nom</th>";
echo "<th>Description</th>";
echo "<th>Action</th>";
echo "</tr>";
foreach ($listeCategorieId as $item) {
    $tmp = categorie::NewById($item['id_cat']);
    echo "<form method='POST' action='index.php?id=$tmp->id_cat'";
    echo "<tr>";
    echo "<td>" . $tmp->id_cat . "</td>";
    if ($tmp->nom != '(vide)') {
        echo "<td><input type='text' name='nomCategorie' value='" . $tmp->nom . "'></td>";
        echo "<td><input type='text' name='descCategorie' value='" . $tmp->description . "'></td>";
        echo "<td><input class='gobutton' type='submit' value='Modifier' ></td>";
    } else {
        echo "<td>" . $tmp->id_cat . "</td>";
        echo "<td>" . $tmp->nom . "</td>";
        echo "<td>" . $tmp->description . "</td>";
    }
    echo "</tr>";
echo "</form>";
}
echo "<form method='POST' action='index.php?action=create'";
echo "<tr>";
echo "<td></td>";
echo "<td><input type='text' name='nomCategorie' value='Nom new cat'></td>";
echo "<td><input type='text' name='descCategorie' value='Saisir description'></td>";
echo "<td><input class='gobutton' type='submit' value='Créer' ></td>";
echo "</tr>";
echo "</table>";
echo "</div>";

echo"<div id='P63gestionretour'>";
echo "<a class='P6listemenu1' href='controleurs/admin/selectHomeAdmin.php'>Retour</a>";
echo "</div>";