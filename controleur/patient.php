<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}


    // recuperation des donnees GET, POST, et SESSION
;

    // appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


    // traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Espace patient";
include "$racine/vue/entete.html.php";
include "$racine/vue/patient.html.php";
include "$racine/vue/pied.html.php";
