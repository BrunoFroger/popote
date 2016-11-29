<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "<li><a class='P0menuligne' href='controleurs/recette/selectList.php'>Recettes</a></li>";
echo "<li><a class='P0menuligne' href='controleurs/recette/selectRecherche.php'>Recherche</a></li>";

if  (isset($_SESSION['id_recette'])){
    $recette=$_SESSION['id_recette'];
}else{
    $recette ='';
}

if (!isset($_SESSION['membre'])) {
    echo "<li><a class='P0menuligne' href = 'controleurs/membre/select_identification.php'>S'identifier</a></li>";
    
}else{
    $_SESSION['identification']='gestion_compte';
    $membre = unserialize($_SESSION['membre']);
    echo "<li><a class='P0menuligne' href = 'controleurs/membre/select_mes_recettes.php'>Mes recettes</a></li>";
    echo "<li><a class='P0menuligne' href = 'controleurs/membre/select_identification.php'>Mon compte</a></li>";
    if (isset($_SESSION['id_recette'])) {
        if ($_SESSION['typeContenu'] == 'recette') {     
            //echo "<li><a class='P0menuligne' href = 'controleurs/recette/selectImprimeRecette.php/$recette'>Imprimer</a></li>";
        }
    }
    if ($membre->type == 'admin'){
        echo "<li><a class='P0menuligne' href = 'controleurs/admin/selectAdmin.php'>Gestion Admin</a></li>";
    }
    echo "<li><a class='P0menuligne' href = 'controleurs/membre/deconnexion.php'>Déconnexion</a></li>";
}
?>
