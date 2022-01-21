<?php

namespace Models;

require_once "libraries/classes/models/Model.php";


class Patient extends Model
{
    protected $table = 'patient';
}


// function login($mailU, $mdpU) {
//     if (!isset($_SESSION)) {
//         session_start();
//     }

//     //Bastien : Reprise du code du TP MVC d'ULRICH Fonction login
//     $util = getUtilisateurByMailU($mailU);
//     $mdpBD = $util["mdpU"];

//     if (trim($mdpBD) == trim(crypt($mdpU, $mdpBD))) {
//         // le mot de passe est celui de l'utilisateur dans la base de donnees
//         $_SESSION["mailU"] = $mailU;
//         $_SESSION["mdpU"] = $mdpBD;
//     }
// }

// function logout() {
//     if (!isset($_SESSION)) {
//         session_start();
//     }
//     unset($_SESSION["mailU"]);
//     unset($_SESSION["mdpU"]);
// }

// function getMailULoggedOn(){
//     if (isLoggedOn()){
//         $ret = $_SESSION["mailU"];
//     }
//     else {
//         $ret = "";
//     }
//     return $ret;
        
// }

// function isLoggedOn() {
//     if (!isset($_SESSION)) {
//         session_start();
//     }
//     $ret = false;

//     if (isset($_SESSION["mailU"])) {
//         $util = getUtilisateurByMailU($_SESSION["mailU"]);
//         if ($util["mailU"] == $_SESSION["mailU"] && $util["mdpU"] == $_SESSION["mdpU"]
//         ) {
//             $ret = true;
//         }
//     }
//     return $ret;
// }