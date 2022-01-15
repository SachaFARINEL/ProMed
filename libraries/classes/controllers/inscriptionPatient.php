<?php
require_once "libraries/classes/Renderer.php";
require_once "libraries/classes/models/Patient.php";


/**
 * Création d'un nouvel objet model, de la classe Patient.
 */

$model = new Patient;

/**
 * Récupération des donnés POST de notre formulaire Patient
 * Une méthode sera plus simple par la suite, mais j'ai pas encore regardé la vidéo lol
 */

$nom = $_POST['nom'];

$prenom = $_POST['prenom'];

$mail = $_POST['mail'];

$tel = $_POST['tel'];

$mot_de_passe = $_POST['mot_de_passe'];

$activite = $_POST['activite'];

$num_secu = $_POST['num_secu'];

$mutuelle = $_POST['mutuelle'];

$caisse = $_POST['caisse'];

$date_naissance = $_POST['date_naissance'];

$sexe = $_POST['sexe'];

$nom_tuteur = $_POST['nom_tuteur'];

$prenom_tuteur = $_POST['prenom_tuteur'];

$mail_tuteur = $_POST['mail_tuteur'];

$tel_tuteur = $_POST['tel_tuteur'];

$nom_generaliste = $_POST['nom_generaliste'];

$prenom_generaliste = $_POST['prenom_generaliste'];

$mail_generaliste = $_POST['mail_generaliste'];

$tel_generaliste = $_POST['tel_generaliste'];

/**
 * Insertion de toutes les variables dans ma requète SQL INSERT (Patient)
 */

$model->insert(
    $nom,
    $prenom,
    $mail,
    $tel,
    $mot_de_passe,
    $activite,
    $num_secu,
    $mutuelle,
    $caisse,
    $date_naissance,
    $sexe,
    $nom_tuteur,
    $prenom_tuteur,
    $mail_tuteur,
    $tel_tuteur,
    $nom_generaliste,
    $prenom_generaliste,
    $mail_generaliste,
    $tel_generaliste
);


/**
 * Appel du script de vue qui permet de gerer l'affichage des donnees
 * 
 */


$pageTitle = "Formulaire d'inscription Patient";
render('formulairePatient', compact('pageTitle'));
