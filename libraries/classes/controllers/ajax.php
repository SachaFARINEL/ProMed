<?php

namespace Controllers;

class Ajax extends Controller
{
    protected $modelName = "Ajax";

    public static function rechercherUnPraticien()
    {

        $search = $_POST['userData'];
        $praticienModel = new \Models\Praticien();
        $dataPraticien = $praticienModel->findByName($search);

        if (isset($dataPraticien) && !empty($dataPraticien)) {

            echo "<div class='col-10'>";
            echo "<div class='row'>";
            foreach ($dataPraticien as $data) {
                extract($data);

                echo Utils::cartes($nom, $prenom, $profession, $tel, $mail);
            }
            echo "</div>";
            echo "</div>";
        } else {
            echo "Aucun praticien trouvé.e.s";
        }
        // \Renderer::renderAjax('ajax', compact('dataPatient'));
    }

    public static function rechercherUnPatient()
    {
        // print_r($_POST);
        // exit;
        $search = $_POST['userData'];
        $patientModel = new \Models\Patient();
        $praticienModel = new \Models\Praticien();
        // $dataPatient = ($patientModel->findPatientByName($search)[0]);
        $dataPatient = $patientModel->findByName($search);
        $donneesAllPatients = $patientModel->findAll();



        if (isset($dataPatient) && !empty($dataPatient)) {

            echo "<div class='col-10'>";
            echo "<div class='row'>";
            foreach ($dataPatient as $dpatient) {
                extract($dpatient);
                echo Utils::cartesPatient($nom, $prenom, $tel, $mail);
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

    // public static function rechercherUnPraticienOLD()
    // {

    //     $search = $_POST['userData'];
    //     $praticienModel = new \Models\Praticien();
    //     $dataPraticien = $praticienModel->findPraticienByName($search);

    //     if (isset($dataPraticien) && !empty($dataPraticien)) {
    //         for ($i = 0; $i < count($dataPraticien); $i++) {
    //             var_dump($dataPraticien);
    //             exit;
    //             echo $dataPraticien[$i]['nom'] . "&nbsp" . $dataPraticien[$i]['prenom'] . "<br/>";
    //         }
    //     } else {
    //         echo "Aucun praticien trouvé.e.s";
    //     }
    //     // \Renderer::renderAjax('ajax', compact('dataPatient'));
    // }
    // public static function rechercherUnPatientOLD()
    // {
    //     // print_r($_POST);
    //     // exit;
    //     $search = $_POST['userData'];
    //     $patientModel = new \Models\Patient();
    //     // $dataPatient = ($patientModel->findPatientByName($search)[0]);
    //     $dataPatient = $patientModel->findByName($search);

    //     if (isset($dataPatient) && !empty($dataPatient)) {
    //         for ($i = 0; $i < count($dataPatient); $i++) {
    //             echo $dataPatient[$i]['nom'] . "&nbsp" . $dataPatient[$i]['prenom'] . "<br/>";
    //         }
    //     } else {
    //         //echo "Aucun patients trouvé.e.s";
    //     }
    //     // \Renderer::renderAjax('ajax', compact('dataPatient'));
    // }
}
