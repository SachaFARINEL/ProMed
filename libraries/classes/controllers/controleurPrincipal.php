<?php

/**
 * Le controleur principal gère la redirection des pages
 * 
 */


function controleurPrincipal($action)
{
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["accueil"] = "accueil.php";
    $lesActions["patient"] = "patient.php";
    $lesActions["praticien"] = "praticien.php";
    $lesActions["inscriptionPraticien"] = "inscriptionPraticien.php";
    $lesActions["inscriptionPatient"] = "inscriptionPatient.php";
    $lesActions["formulaireInscriptionPatient"] = "formulaireInscriptionPatient.php";


    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } else {
        return $lesActions["defaut"];
    }
}
