<?php

namespace Controllers;

class Ajax extends Controller
{
    protected $modelName = "Ajax";

    /**
     * Fonction AJAX pour rechercher les praticiens grâce aux premières lettre de la barre de recherche et de les afficher dans une liste de "Cards"
     * 
     * @return void
     */
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

    /**
     * Fonction AJAX pour rechercher les patients grâce aux premières lettre de la barre de recherche et de les afficher dans une liste de "Cards"
     * 
     * @return void
     */
    public static function rechercherUnPatient()
    {
        session_start();
        $search = $_POST['userData'];
        $patientModel = new \Models\Patient();
        $dataPatient = $patientModel->findMyPatients($search, $_SESSION['id']);

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

    /**
     * Fonction AJAX pour remplir la modal de chaque praticien avec ses informations personnelles, de prestations, et de disponibilités.
     * 
     * @return void
     */
    public static function remplisLaModal()
    {
        $idPraticien = $_POST['id'];
        // $modelPraticien = new \Models\Praticien();
        $adresseModel = new \Models\Adresse();
        $dataPraticien = $adresseModel->findAdresseById('praticien', $idPraticien);


        $prestationModel = new \Models\Prestation();
        $dataPrestation = $prestationModel->findWithFetchAll('id_praticien', $idPraticien);


        extract($dataPraticien[0]);
?>
        <div class="row d-flex">
            <div class="nomProfessionModal col-6">
                <h3 class="nomPraticienModal"><?= $nom . " " . $prenom ?></h3>
                <h5 class="professionModal"><?= $profession ?></h5>
            </div>
            <div class="col-6" style="text-align: center">
                <div>
                    <h6><?= Utils::espaceTelephone($tel) ?> </h6>
                    <h6><?= $mail ?></h6>
                </div>
                <div>
                    <h6><?= $numero . " " . $type_de_voie . " " . $adresse ?></h6>
                    <h6><?= $code_postal . " " . $ville ?></h6>
                </div>
            </div>
        </div>
        <div class="main col-12">
            <div class="container rounded-3 bg-white shadow mt-4" style="font-family: Lato, sans-serif;text-align: center; height: 50vh" id="containerModal">
                <div class="mesPrestation" style="margin-top: 1.5rem">
                    <h4 class="font-monospace">Choisir une prestation</h4>
                    <select name="prestations" class="prestations form-select" id="testPresta" style="margin: 1.5rem ; width: 90%">
                        <?php
                        if (!empty($dataPrestation)) {
                            echo '<option value="null"> - Choisir - </option>';
                            foreach ($dataPrestation as $prestation) {
                                extract($prestation);
                                echo '<option value="' . $id . '-' . $prix . '">' . $nom_prestation . '</option>';
                            }
                        } else {
                            echo '<option value="null"> Aucune prestation </option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="calendrier">
                    <h4 class="font-monospace">Choisir un jour</h4>
                    <input type="date" value="- Choisir -" style=" margin: 1.5rem ; width: 90%" class="inputDate form-control" id="inputDate-<?= $idPraticien ?>">
                </div>
                <h4 class="font-monospace">Choisir une heure</h4>
                <div class="resultat" id="resultat">
                    <div id="selectH">
                        <select name="heures" class="heures form-select" id="heures" style="margin: 1.5rem ; width: 90%">
                            <option value="null"> - Choisir un jour - </option>
                        </select>
                    </div>
                </div>
                <div class="recap font-monospace">
                    <h4>
                        <span id="prestationNom"></span>
                        <span id="prestationPrix"></span>
                    </h4>
                    <h4>
                        <span id="heureRdv"></span>
                        <span id="dateRdv"></span>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-12" style="text-align: center">
            <button type="button" class="valider" id="sendRdv" style="margin: 1.5rem">Valider le rendez-vous</button>
        </div>
    <?php
    }


    /**
     * Fonction AJAX pour rechercher les créneaux disponibles des praticiens en fonction de la date émise par l'utilisateur
     * 
     * @return void
     */
    public static function rendezVousDisponibles()
    {
        $dateDesiree = $_POST['dateDesiree'];
        $idPraticien = $_POST['idPraticien'];
        $rendezVousModel = new \Models\Rendez_vous();
        $heuresDisponibles = $rendezVousModel->findRdvLibreByDateAndIdPraticien($idPraticien, $dateDesiree);
    ?>
        <div class="row" style="display:flex; justify-content: center">
            <div class="col-12" style="display:flex; justify-content: center">
                <select name="heures" class="heures form-select" id="heures" style="margin: 1.5rem ; width:90%">
                    <?php
                    echo '<option value="null"> - Choisir - </option>';
                    foreach ($heuresDisponibles as $heureDisponible) {
                        echo '<option value="' . $heureDisponible . '">' . $heureDisponible . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
    <?php
    }

    /**
     * Fonction AJAX pour enregistrer un rendez-vous en base de donnée
     * 
     * @return void
     */
    public static function enregistrerRdv()
    {
        $id_patient = $_SESSION["id"];
        $id_praticien = $_POST['idPraticien'];
        $id_prestation = $_POST['idPrestation'];
        $date = $_POST['date'];
        $isAnnule = $_POST['isAnnule'];
        $is_presentiel = $_POST['is_presentiel'];

        $rdvModel = new \Models\Rendez_vous();
        $isRequestFine = $rdvModel->insert(compact(
            'id_patient',
            'id_praticien',
            'id_prestation',
            'date',
            'isAnnule',
            'is_presentiel'
        ));
    }

    /**
     * Fonction AJAX pour afficher une fiche patient
     * 
     * @return void
     */
    public static function afficherFichePatient()
    {
        $idBouton = $_POST['id'];
        $fichePatientModel = new \Models\Patient();
        $fichePatient = $fichePatientModel->findWithFetchAll('id_praticien', $idBouton);
        echo $fichePatient;
    }

    /**
     * Fonction AJAX pour annuler un rendez-vous
     * 
     * @return void
     */
    public static function annulerRDV()
    {
        $id_patient = $_SESSION['id'];
        $id_praticien = $_POST['id_praticien'];
        $date = $_POST['date'];
        $rendezVousModel = new \Models\Rendez_vous();
        $fichePatient = $rendezVousModel->annulerUnRDV($id_patient, $id_praticien, $date);
        echo "good";
    }

    /**
     * Fonction AJAX pour mettre à jour les données modifier du profil praticien
     * 
     * @return void
     */
    public static function updateProfilPraticien()
    {
        $id = $_SESSION['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $profession = $_POST['profession'];
        $num_adelie = $_POST['num_adelie'];
        $tel = $_POST['tel'];
        $mail = $_POST['mail'];
        $mot_de_passe = $_POST['mot_de_passe'];
        $nom_cabinet = $_POST['nom_cabinet'];
        $numero = $_POST['numero'];
        $type_de_voie = $_POST['type_de_voie'];
        $adresse = $_POST['adresse'];
        $code_postal = $_POST['code_postal'];
        $ville = $_POST['ville'];
        $departement = $_POST['departement'];
        $pays = $_POST['pays'];

        $praticienModel = new \Models\Praticien();
        $adresseModel = new \Models\Adresse();
        if (empty($mot_de_passe)) {
            $praticienModel->update(compact(
                'id',
                'nom',
                'prenom',
                'profession',
                'num_adelie',
                'tel',
                'mail',
                'nom_cabinet'

            ));
        } else {
            $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
            $praticienModel->update(compact(
                'id',
                'nom',
                'prenom',
                'profession',
                'num_adelie',
                'tel',
                'mail',
                'mot_de_passe',
                'nom_cabinet'

            ));
        }
        $adresseModel->updateWithId(compact(
            'numero',
            'type_de_voie',
            'adresse',
            'code_postal',
            'ville',
            'departement',
            'pays'
        ), $id, 'praticien');
    }

    /**
     * Fonction AJAX pour crée une prestation
     * 
     * @return void
     */
    public static function createPrestation()
    {
        $id_praticien = $_SESSION['id'];
        $nom_prestation = $_POST['nom_prestation'];
        $prix = $_POST['prix'];
        $description = $_POST['description'];
        $prestationModel = new \Models\Prestation();

        $prestationModel->insert(compact(
            'id_praticien',
            'nom_prestation',
            'prix',
            'description'
        ));

    ?>
        <div class="divAddPresta mb-3" style='box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; background: #FAFAFF'></div>
        <?php
        $prestations = $prestationModel->findWithFetchAll('id_praticien', $_SESSION['id']);
        foreach ($prestations as $prestation) {
            extract($prestation);
        ?>
            <div class="mb-3" style='box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; background: #FAFAFF'>
                <div style="padding: 1rem" class="boxPresta" id="presta-<?= $prestation['id'] ?>">
                    <h6>
                        <span class="text-muted" style="text-decoration: underline"> Libelle</span> :
                        <span id="libelle-<?= $prestation['id'] ?>"><?= $nom_prestation ?></span>
                        <img src="./assets/images/editPresta.png" alt="avatar" id="imgPresta-<?= $prestation['id'] ?>" class="editPresta img-fluid" style="width: 5%">
                        <img src="./assets/images/deletePresta.png" alt="avatar" id="deletePresta-<?= $prestation['id'] ?>" class="deletePresta img-fluid" style="width: 5%">
                    </h6>
                    <h6>
                        <span class="text-muted" style="text-decoration: underline"> Prix</span> :
                        <span id="prix-<?= $prestation['id'] ?>"><?= $prix ?></span> €
                    </h6>
                    <h6>
                        <span class="text-muted" style="text-decoration: underline"> Description</span> :
                        <span id="description-<?= $prestation['id'] ?>"><?= $description ?></span>
                    </h6>
                </div>
            </div>
        <?php
        }
        ?>
<?php
    }

    /**
     * Fonction AJAX pour mettre à jour les données d'une prestation
     * 
     * @return void
     */
    public static function updatePrestation()
    {
        $id = $_POST['id'];
        $id_praticien = $_SESSION['id'];
        $nom_prestation = $_POST['nom_prestation'];
        $prix = $_POST['prix'];
        $description = $_POST['description'];
        $prestationModel = new \Models\Prestation();

        if ($prestationModel->update(compact(
            'id',
            'id_praticien',
            'nom_prestation',
            'prix',
            'description'
        ))) {
            echo 'bien';
        } else {
            echo 'pas bien';
        }
    }

    /**
     * Fonction AJAX pour delete une prestation
     * 
     * @return void
     */
    public static function deletePrestation()
    {
        $id = $_POST['id'];
        $prestationModel = new \Models\Prestation();
        $prestationModel->delete($id);
    }
}
