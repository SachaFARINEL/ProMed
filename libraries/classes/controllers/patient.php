<?php

require_once "libraries/classes/Renderer.php";
require_once "libraries/classes/models/Patient.php";

$model = new Patient();
$patients = $model->findAll();

// recuperation des donnees GET, POST, et SESSION


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

// traitement si necessaire des donnees recuperees

// appel du script de vue qui permet de gerer l'affichage des donnees

$pageTitle = 'Espace patient';
render('patient', compact('pageTitle', 'patients'));
