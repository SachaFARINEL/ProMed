<?php

namespace Controllers;

class Ajax extends Controller
{
    protected $modelName = "Ajax";

    public function rechercherUnPatient()
    {
        // print_r($_POST);
        // exit;
        $search = $_POST['userData'];
        $patientModel = new \Models\Patient();
        $dataPatient = ($patientModel->findPatientByName($search)[0]);
        $pageTitle = 'Rechercher un patient';
        \Renderer::render('rechercherUnPatient', compact('pageTitle', 'dataPatient'));
    }
}
