<?php
require_once "libraries/utils.php";


    // recuperation des donnees GET, POST, et SESSION
;

    // appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


    // traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$pageTitle = "Formulaire d'inscription Praticien";
render('formulairePraticien', compact('pageTitle'));
