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

$_SESSION['typeContenu']='admin';

$changeId=$_GET['id'];
echo "<br> id recupere : $changeId";
$changeMembre=membre::NewById($changeId);

if (isset($_SESSION['membre'])) {
    // une session existe on recupere le membre dans la session
    $membre = unserialize($_SESSION['membre']);
    if ($membre->id_membre == $changeId){
        echo "<br> Impossible de changer les droits de ce membre connecte";
        echo "<br> <a href=/popote/index.php>Continuer</a>";
        exit;
    }
}

echo "<br>changement du type du membre $changeMembre->login";
if ($changeMembre->valid =='1'){
    $changeMembre->valid='0';
}else{
    $changeMembre->valid='1';    
}
$changeMembre->ChangeAuthent($changeMembre->valid);

//echo "<br>on sort de changeuser.php <br>";
//echo "<a href=/popote/index.php>Continuer</a>";
header("location: /popote");
?>
