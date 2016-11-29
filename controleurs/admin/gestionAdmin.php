<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "<div id='P6adminaccueil'>";
echo "<h4>Gestion d'administration du site</h4>";

echo "<p><a class='P6listemenu1' href='controleurs/admin/selectAdminUsers.php'>Gestion des membres</a></p>";
echo "<p><a class='P6listemenu1' href='controleurs/admin/selectAdminRecettes.php'>Gestion des recettes</a></p>";
echo "<p><a class='P6listemenu1'href='controleurs/admin/selectAdminCategories.php'>Gestion des catégories</a></p>";
echo "<p><a class='P6listemenu1'href='controleurs/admin/selectAdminSousCategories.php'>Gestion des sous-catégories</a></p>";

// echo "<br><br><a href='controleurs/admin/selectSortieAdmin.php'>retour</a>"; //n'est pas utile sur cette page
echo "</div>";


//echo "<br> fin de page d'admin";
