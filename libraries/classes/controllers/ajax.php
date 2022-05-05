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
            $adresseModel = new \Models\Adresse();
            foreach ($dataPraticien as $data) {
                extract($data);
                $informationsPraticiens[] = $adresseModel->findAdresseById('praticien', $id);
            }
            echo "<div class='col-10'>";
            echo "<div class='row'>";
            foreach ($informationsPraticiens as $informationPraticien) {
                foreach ($informationPraticien as $data) {

                    extract($data);
                    echo Utils::cartes($nom, $prenom, $tel, $mail, $profession, $numero, $type_de_voie, $adresse, $code_postal, $ville);
                }
            }
            echo "</div>";
            echo "</div>";
        } else {
            echo "Aucun praticien trouvé.e.s";
        }
    }

    public static function rechercherUnPatient()
    {
        $search = $_POST['userData'];
        $patientModel = new \Models\Patient();
        $dataPatient = $patientModel->findByName($search);

        if (isset($dataPatient) && !empty($dataPatient)) {
            echo "<div class='col-10'>";
            echo "<div class='row'>";
            foreach ($dataPatient as $patient) {
                extract($patient);
                echo Utils::cartes($nom, $prenom, $tel, $mail);
            }
        } else {
            echo "Aucun patients trouvé.e.s";
        }
    }
}
