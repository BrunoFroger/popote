<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


echo "<form method='POST' id='newrecette' action='controleurs/recette/creeerRecetteBase.php'>";
echo "  <div id='P7newrecette1'>";
echo "      <div id = 'P7cadretitre'>";
echo "          <h1>Saisie d'une nouvelle recette</h1>";
if (isset($_SESSION['erreurCreeRecette'])){
    echo "      <h3>".$_SESSION['erreurCreeRecette']."</h3>";
    unset($_SESSION['erreurCreeRecette']);
}
echo "      </div>";
echo "      <div id='P7newtitre'>";
echo "          <fieldset>";
echo "              <legend><strong>Entrer un titre de recette : </strong></legend>";
if (isset($_SESSION['titre CreeRecette'])){
    $titre=$_SESSION['titre CreeRecette'];
}else{
    $titre="Nouvelle recette";
}
echo "              <p><input type='text' id='newtitre1' name='newtitre1' value='$titre'></p>";
echo "          </fieldset>";
echo "      </div>";
$listCategories=categorie::getListCategorie();
// echo "<br> liste des categories";
//print_r($listCategories);
$listSousCategories=sous_categorie::getListSousCategorie();
//echo "<br> liste des sous categories";
//print_r($listSousCategories);
echo "      <div id='P7categoriemandatory'>";
echo "          <fieldset>";
echo "              <legend><strong>Choix des catégories de recette </strong></legend>";
echo "              <p>Type plat :  <select id='choixtypeplat' name='choixtypeplat'>";
foreach($listCategories as $item){
    echo "              <option value=".$item['id_cat'].">".$item['nom']."</optoin>";
}
echo "              </select></p>";
echo "              <p>Sous Catégorie :  <select id='choixsscat' name='choixsscat'>";
foreach($listSousCategories as $item){
    echo "              <option value=".$item['id_ss_cat'].">".$item['nom']."</optoin>";
}
echo "              </select></p>";
echo "          </fieldset>";
echo "      </div><!-- #categoriemandatory -->";
echo "      <div id='P7validnewrecette'>";
echo "          <fieldset>";
echo "              <legend><strong>Valider votre nouvelle recette </strong></legend>";
echo "              <input class='gobutton' type='submit' value=' Enregistrer la nouvelle recette' id='newrecord'>";
echo "          </fieldset>";
echo "      </div> <!-- #validnewrecette -->";
echo "  </div> <!-- #P7newrecette1 -->";
echo "</form> <!-- #newrecette -->";


