<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_SESSION['membre'])) {
    // une session existe on recupere le membre dans la session
    $membre = unserialize($_SESSION['membre']);
    echo $membre->prenom . " " . $membre->nom;
} else {
    echo 'Invité';
}
?>