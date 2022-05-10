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
                    echo Utils::cartes($id, $nom, $prenom, $tel, $mail, $profession, $numero, $type_de_voie, $adresse, $code_postal, $ville);
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
            $adresseModel = new \Models\Adresse();
            foreach ($dataPatient as $data) {
                extract($data);
                $informationsPatients[] = $adresseModel->findAdresseById('patient', $id);
            }
            echo "<div class='col-10'>";
            echo "<div class='row'>";
            foreach ($informationsPatients as $informationsPatient) {
                foreach ($informationsPatient as $data)
                    extract($data);
                echo Utils::cartes($id, $nom, $prenom, $tel, $mail, $profession = "", $numero, $type_de_voie, $adresse, $code_postal, $ville);
            }
        } else {
            echo "Aucun patients trouvé.e.s";
        }
    }

    public static function prestationsDuPraticien()
    {
        $idCible = $_POST['id'];
        $prestationModel = new \Models\Prestation();
        $prestations = $prestationModel->findWithFetchAll('id_praticien', $idCible);
        echo '<select name="prestations" class="prestations" id="prestations' . $idCible . '">';
        echo '<option value="">--Choisir une prestation--</option>';
        foreach ($prestations as $prestation) {
            extract($prestation);
            echo '<option value="' . $prix . '">' . $nom_prestation . '</option>';
        }
        echo '</select>';
    }

    public static function remplisLaModal()
    {
        $idPraticien = $_POST['id'];
        // $modelPraticien = new \Models\Praticien();
        $adresseModel = new \Models\Adresse();
        $dataPraticien = $adresseModel->findAdresseById('praticien', $idPraticien);

        $prestationModel = new \Models\Prestation();
        $dataPrestation = $prestationModel->findWithFetchAll('id_praticien', $idPraticien);

        extract($dataPraticien[0]);
        echo '
        <div class="row d-flex">
            <div class="nomProfessionModal col-6">
                <h3 class="nomPraticienModal">' . $nom . " " . $prenom . ' </h3>
                <h5 class="professionModal">' . $profession . '</h5>
            </div>
            <div class="col-6" style="text-align: center">
                <div>
                <h6>' . Utils::espaceTelephone($tel) . ' </h6>
                <h6>' . $mail . ' </h6>
                </div>
                <div>
                <h6>' .  $numero . " " . $type_de_voie . " " . $adresse . ' </h6>
                <h6>' .  $code_postal . "  " . $ville . ' </h6>
                </div>
            </div>
        </div>
            <div class="main col-12">
                <div class="container rounded-3 bg-white shadow mt-4" style="font-family: Lato, sans-serif;text-align: center; height: 50vh">
                    <div class="mesPrestation">
                        <select name="prestations" class="prestations" id="prestations>
                            <option value="null"> --Choisir une prestation-- </option>';
        foreach ($dataPrestation as $prestation) {
            extract($prestation);
            echo '<option value="' . $prix . '">' . $nom_prestation . '</option>';
        }
        echo '</select>
                    </div>
                    <div class="mesRdv mb-5" id="rdvPossible"></div>
                        <div class=" prix"></div>
                        <div class="calendrier">
                            <input type="date" class="inputDate" id="inputDate' . $idPraticien . '">
                        </div>
                        <div class="resultat" id="resultat">

                        </div>
                    </div>
            </div>
            <button type="button" class="valider">Prendre un rendez-vous</button>';
    }

    public static function rendezVousDisponibles()
    {
        $dateDesiree = $_POST['dateDesiree'];
        $idPraticien = $_POST['idPraticien'];
        $rendezVousModel = new \Models\Rendez_vous();
        $heuresDisponibles = $rendezVousModel->findRdvLibreByDateAndIdPraticien($idPraticien, $dateDesiree);
        echo '<div class="row">';
        echo '<div class="col-2" style="display:flex">';

        foreach ($heuresDisponibles as $heureDisponible) {
            echo $heureDisponible;
        }

        echo '</div>';
        echo '</div>';
    }
}
