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
}
