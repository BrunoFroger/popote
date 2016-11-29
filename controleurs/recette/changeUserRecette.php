<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

$myIncludePath = '/var/www/html/popote';
set_include_path(get_include_path() . PATH_SEPARATOR . $myIncludePath);

include_once 'modeles/membre/classe_membre.php';
include_once 'modeles/recette/classe_recette.php';

$listeMembres = membre::getListMembre();
print_r($listeMembre);

$recette=$_GET['recette'];
$user=$_GET['user'];
echo "<br> user=$user, recette=$recette";

if (isset($_POST['newUser'])){
    echo "<br> on modifie le user en base";
    // il faut changer le user dans les tables suivantes dans l'ordre
    // Photo / Ingredients / recette
    $newUser=$_POST['newUser'];
    $tmpRecette=recette::NewById($recette);
    $tmpRecette->id_membre=$new_user;
    $tmpRecette->update($tmpRecette->id_recette, $tmpRecette->id_membre, $tmpRecette->titre, $tmpRecette->nb_pers, $tmpRecette->cat_prix, $tmpRecette->cat_diff, $tmpRecette->description, $tmpRecette->preparation, $tmpRecette->conseil, $tmpRecette->id_cat, $tmpRecette->id_ss_cat, $tmpRecette->note, $tmpRecette->nb_votes, $tmpRecette->publication);
    $user=$newuser;
}
echo "<br> selectionner le nouveau membre proprietaire de cette recette :";

echo "              <form method='POST' id='newUser' action='changeUserRecette.php?recette=$recette&user=$user'>";
echo "                  <select id='newUser' name='newUser'>";
foreach ($listeMembres as $item) {
    $membre=membre::NewById($item['id_membre']);
    if ($user == $membre->login) {
        echo "              <option value=" . $membre->login . " selected='selected'>" . $membre->login . "</optoin>";
    } else {
        echo "              <option value=" . $membre->login . ">" . $membre->login . "</optoin>";
    }
}
echo "                  </select></p>";
echo "                  <input class='gobutton' type='submit' value=' changer le user ' id='recordmodif'>";
echo "              </form> ";


echo "<br>on sort de changeUserRecette.php <br>";
echo "<a href=/popote/index.php>Continuer</a>";
//header("location: /popote");
?>
