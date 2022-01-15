<?php
require_once "libraries/classes/Renderer.php";
require_once "libraries/classes/models/Patient.php";



$model = new Patient;
// recuperation des donnees GET, POST, et SESSION
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
// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


// traitement si necessaire des donnees recuperees


// appel du script de vue qui permet de gerer l'affichage des donnees
$pageTitle = "Formulaire d'inscription Patient";
render('formulairePatient', compact('pageTitle'));
