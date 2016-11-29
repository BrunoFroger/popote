<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//echo "<br>gestion des users";
$listeMembreId = membre::getListMembre();
$nbUsers = count($listeMembreId);
echo "<div id='P61tabusers'>";
echo "<h4>Gestion des membres($nbUsers)</h4>";
//print_r($listeMembreId);
echo "<table>";
echo "<tr>";
echo "<th>Id</th>";
echo "<th>login</th>";
echo "<th>nom</th>";
echo "<th>prenom</th>";
echo "<th>email</th>";
echo "<th>role</th>";
echo "<th>nb recettes</th>";
echo "<th>Login authorisé</th>";
echo "<th>suppression</th>";
echo "</tr>";
foreach ($listeMembreId as $userid) {
    $tmpUser = membre::NewById($userid['id_membre']);
    echo "<tr>";
    echo "<td>" . $tmpUser->id_membre . "</td>";
    echo "<td>" . $tmpUser->login . "</td>";
    echo "<td>" . $tmpUser->nom . "</td>";
    echo "<td>" . $tmpUser->prenom . "</td>";
    echo "<td>" . $tmpUser->email . "</td>";
    if ($tmpUser->login == '_popote') {
        // on interdit de modifier le user popote
        echo "<td style='text-align:center'>admin</td>";
        echo "<td></td>";
        echo "<td style='text-align:center'>non</td>";
        echo "<td></td>";
    } else {
        echo "<td style='text-align:center'><a href=controleurs/admin/changedroits.php?id=$tmpUser->id_membre>" . $tmpUser->type . "</a></td>";
        echo "<td style='text-align:center'>" . count(recette::getListIdByMembre($tmpUser)) . "</td>";
        //echo "<td style='text-align:center'>en cours</td>";
        if ($tmpUser->valid == '1'){
            echo "<td style='text-align:center'><a href=controleurs/admin/Authuser.php?id=$tmpUser->id_membre>oui</a></td>";
        }else{
            echo "<td style='text-align:center'><a href=controleurs/admin/Authuser.php?id=$tmpUser->id_membre>non</a></td>";
        }
        echo "<td style='text-align:center'><a href=controleurs/admin/deleteuser.php?id=$tmpUser->id_membre>X</a></td>";
    }
    echo "</tr>";
}
echo "</table>";

echo "</div>";
echo "<div id='P61gestionretour'>";
echo "<br><br><a class='P6listemenu1' href='controleurs/admin/selectHomeAdmin.php'>Retour</a>";
echo "</div>";
