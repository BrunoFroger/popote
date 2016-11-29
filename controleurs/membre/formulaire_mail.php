<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (isset($_SESSION['membre'])) {
    $membre = unserialize($_SESSION['membre']);
    $expediteur = $membre->email;
    //echo "<br> on positionne l'expediteur avec le membre connecte ".$expediteur;
} else {
    $membre = null;
    if (isset($_SESSION['expediteur'])) {
        $expediteur = $_SESSION['expediteur'];
        //echo "<br> on recupere l'expediteur du POST ".$expediteur;
    } else {
        $expediteur = '';
        //echo "<br> on initialise l'expediteur a vide ".$expediteur;
    }
}
//echo "<br> expediteur = $expediteur";
// recuperation de l'adresse mail du destinataire
if (isset($_SESSION['destinataireMail'])) {
    if ($_SESSION['destinataireMail'] == 'admin'){
        $user="";
        $lst_admin = membre::getListAdmin();
        foreach($lst_admin as $admin){
            if ($admin['email'] != ""){
                //echo "<br>admin :  $user";
                if ($user == ""){
                    $user = $admin['email'];
                }
                else{
                    $user = "$user; " .  $admin['email'];
                }
            }
        }
        //echo "<br>list admin : $user";
        //$user = 'bfr';
        $destinataire=$user;
    }else{
        $user = $_SESSION['destinataireMail'];
        $destinataire = membre::NewByLogin($user)->email;
        //echo "<br>Destinataire : $destinataire";
    }
    //$destinataire = membre::NewByLogin($user);
}
//echo "<br> destinataire = $destinataire";
// recuperation de l'id de la recette 
if (isset($_SESSION['recetteMail'])) {
    $idRecette = $_SESSION['recetteMail'];
    $recette = recette::NewById($idRecette);
}
//echo "<br> id_recette = $idRecette ($recette->titre)";

if (isset($_SESSION['sujetMail'])) {
    $sujet = $_SESSION['sujetMail'];
} else {
    $sujet = "MaPopoteAuQuotidien : $recette->titre";
}
//echo "<br> sujet = $sujet";
if (isset($_SESSION['contenuMail'])) {
    $contenu = $_SESSION['contenuMail'];
} else {
    $contenu = "";
}
//echo "<br> contenu = $contenu";
echo "<div id='P9messagealerte'>";
if (isset($_SESSION['sendMail'])) {
    if ($_SESSION['sendMail'] == 'send') {
        // le mail a ete validé on l'envoie et on retourne a la page principale
        // recuperation du texte du mail
        //echo "<br> tentative envoi du mail";
        if ($contenu == '' || $expediteur == '') {
            echo "<h3>Impossible d'envoyé le mail</h3>";
            if ($contenu == '') {
                echo "<h3>Contenu vide</h3>";
            } else {
                echo "<h3>Adresse mail vide</h3>";
            }
        } else {
            //echo "<br> contenu du mail : [$contenu]";
            // contruction du mail 
            file_put_contents("/tmp/mail.txt", "to: $destinataire\n");
            file_put_contents("/tmp/mail.txt", "from: Ma Popote Au quotidien <popote@orange-labs.fr>\n", FILE_APPEND);
            file_put_contents("/tmp/mail.txt", "subject: $sujet\n", FILE_APPEND);
            //file_put_contents("/tmp/mail.txt", "<br>message de la part de ", FILE_APPEND);
            //file_put_contents("/tmp/mail.txt", "<a href=http://livebox-3840.dtdns.net:8001/popote/controleurs/membre/formulaire_mail.php?recette=$idRecette?user=$membre->login>", FILE_APPEND);
            //file_put_contents("/tmp/mail.txt", "$membre->login</a>\n", FILE_APPEND);
            file_put_contents("/tmp/mail.txt", "<br>message de la part de $membre->login\n", FILE_APPEND);
            file_put_contents("/tmp/mail.txt", "<br>$contenu\n", FILE_APPEND);
            $cmd = "mutt -H - -n "
                    . " -e 'set content_type=\"text/html\"'"
                    . " < /tmp/mail.txt";
            shell_exec($cmd);
            //echo "<br> commande du mail envoyé : " . $cmd;
            $ficMail = shell_exec("more /tmp/mail.txt");
            //echo "<br> fichier mail : $ficMail";
            echo "<h3> Le mail a été envoyé</h3>";
            $_SESSION['sendMail'] = 'mail envoye';
            //echo "<br> <a href=/popote/index.php>Continuer</a>";
            //exit;
        }
    }
}
echo "</div> <!-- fin P9messagealerte -->";
//on affiche la page de remplissage du mail
echo "<div id='P9formulairemail'>";
echo "<form method='POST' encType='multipart/text-data' action='controleurs/membre/selectEnvoiMail.php?recette=$recette->id_recette&user=" . $_SESSION['destinataireMail'] . "&mode=send'>";
echo "<div id='P9envoimail'>";
echo "  <table>";
if ($membre != null) {
    echo "      <tr>";
    echo "          <td>Expéditeur</td>";
    echo "          <td>: $membre->login</td>";
    echo "      </tr>";
} else {
    echo "      <tr>";
    echo "          <td>Expéditeur</td>";
    echo "          <td>: <input type='email' name='expediteur' size=70 value=$expediteur></td>";
    echo "      </tr>";
}
echo "      <tr>";
echo "          <td>Destinataire</td>";
echo "          <td>: " . $_SESSION['destinataireMail'] . " </td>";
echo "      </tr>";
echo "      <tr>";
echo "          <td>Sujet du mail </td>";
echo "          <td>: <input type='text' name='sujet' size=70 value='$sujet'></td>";
echo "      </tr>";
echo "      <tr>";
echo "          <td>Texte du mail </td>";
echo "          <td>  <textarea rows='15' cols='85' name='contenu'>$contenu</textarea></td>";
echo "      </tr>";
echo "  </table>";
echo "</div> <!-- fin P9envoimail -->";
if ($_SESSION['sendMail'] == 'mail envoye') {
    unset($_SESSION['sendMail']);
} else {
    echo "<div id='P9boutonenvoi'>";
    echo "  <input class='gobutton' type='submit' value='Envoyer'>";
    echo "</div> <!-- fin P9boutonenvoi -->";
    echo "</form>";
    echo "</div> <!-- fin P9formulairemail -->";
}
?>

