<?php

namespace Controllers;

class Ajax extends Controller
{
    protected $modelName = "Ajax";

    public static function rechercherUnPatient()
    {
        // print_r($_POST);
        // exit;
        $search = $_POST['userData'];
        $patientModel = new \Models\Patient();
        // $dataPatient = ($patientModel->findPatientByName($search)[0]);
        $dataPatient = $patientModel->findPatientByName($search);

        if (isset($dataPatient) && !empty($dataPatient)) {
            for ($i = 0; $i < count($dataPatient); $i++) {
                echo $dataPatient[$i]['nom'] . "&nbsp" . $dataPatient[$i]['prenom'] . "<br/>";
            }
        } else {
            echo "Aucun patients trouvé.e.s";
        }
        // \Renderer::renderAjax('ajax', compact('dataPatient'));
    }

    public static function rechercherUnPraticien()
    {

        $search = $_POST['userData'];
        $praticienModel = new \Models\Praticien();
        $dataPraticien = $praticienModel->findPraticienByName($search);

        if (isset($dataPraticien) && !empty($dataPraticien)) {
            for ($i = 0; $i < count($dataPraticien); $i++) {
                echo $dataPraticien[$i]['nom'] . "&nbsp" . $dataPraticien[$i]['prenom'] . "<br/>";
            }
        } else {
            echo "Aucun praticien trouvé.e.s";
        }
        // \Renderer::renderAjax('ajax', compact('dataPatient'));
    }

    public static function rechercherUnPatient2()
    {
        // print_r($_POST);
        // exit;
        $search = $_POST['userData'];
        $patientModel = new \Models\Patient();
        $praticienModel = new \Models\Praticien();
        // $dataPatient = ($patientModel->findPatientByName($search)[0]);
        $dataPatient = $patientModel->findPatientByName($search);
        $donneesAllPatients = $praticienModel->findAll();



        if (isset($dataPatient) && !empty($dataPatient)) {
            for ($i = 0; $i < count($dataPatient); $i++) {
                echo $dataPatient[$i]['nom'] . "&nbsp" . $dataPatient[$i]['prenom'] . "<br/>";
            }
        } else {
            echo "Aucun patients trouvé.e.s";
        }
        // \Renderer::renderAjax('ajax', compact('dataPatient'));
    }

    public static function findAllPraticien()
    {
        $praticienModel = new \Models\Praticien();
        $allPraticiens = $praticienModel->findAll();
        var_dump($allPraticiens);
        exit;
        if (isset($allPraticiens) && !empty($allPraticiens)) {
            for ($i = 0; $i < count($allPraticiens); $i++) {
                echo $allPraticiens[$i]['nom'] . "&nbsp" . $allPraticiens[$i]['prenom'] . "<br/>";
            }
        } else {
            echo "NOP";
        }
    }
}
