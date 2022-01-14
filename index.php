<?php
include "libraries/classes/controllers/controleurPrincipal.php";
// include_once "$racine/modele/authentification.inc.php"; // pour pouvoir utiliser isLoggedOn()



if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {

    $action = "defaut";
}

$fichier = controleurPrincipal($action);
include "libraries/classes/controllers/$fichier";
