<?php

namespace Controllers;

use ArrayObject;

class Praticien extends Controller
{
    protected $modelName = "Praticien";

    /**
     * Affiche authentification praticien 
     * 
     * @return pageTitle
     */

    public function showAuth()
    {
        $pageTitle = 'Authentification praticien';
        \Renderer::render('authentificationPraticien', compact('pageTitle'));
    }

    /**
     * Redirige sur l'espace du praticien
     * 
     * @return pageTitle
     * @return nomPartie
     * @return prestations
     */

    public function showEspace(): void
    {
        $pageTitle = 'Mon espace';
        $nomPartie = 'DASHBOARD';
        $rendez_vousModel = new \Models\Rendez_vous();
        $rdvAVenir = $rendez_vousModel->retourneRdv('id_praticien', $_SESSION['id'], '>');
        $rdvPasses = $rendez_vousModel->retourneRdv('id_praticien', $_SESSION['id'], '<');
        $rdvToday = $rendez_vousModel->retourneRdvDuJour($_SESSION['id']);

        \Renderer::renderEspacePraticien('espacePraticien', compact('pageTitle', 'nomPartie', 'rdvAVenir', 'rdvPasses', 'rdvToday'));
    }

    /**
     * Affiche l'accueil quand on clique sur le logo "PROMED"
     * 
     * @return pageTitle
     */
    public function index(): void
    {
        $pageTitle = 'Accueil';
        \Renderer::render('accueil', compact('pageTitle'));
    }

    /**
     * Affiche le formulaire d'inscription du praticien
     * 
     * @return pageTitle
     */
    public function inscription(): void
    {
        $pageTitle = "Formulaire d'inscription Praticien";
        \Renderer::render('formulairePraticien', compact('pageTitle'));
    }

    /**
     * Logging du praticien
     * 
     * @return void
     */
    public function save()
    {
        // Récupération des input text remplis lors de l'inscription du praticien
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
        $profession = filter_input(INPUT_POST, 'profession', FILTER_SANITIZE_SPECIAL_CHARS);
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
        $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);
        $num_adelie = filter_input(INPUT_POST, 'num_adelie', FILTER_SANITIZE_SPECIAL_CHARS);
        $nom_cabinet = filter_input(INPUT_POST, 'nom_cabinet', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'mot_de_passe');
        $password_confirmation = filter_input(INPUT_POST, 'mot_de_passe_confirmation');
        // Test sur mot de passe et de sa confirmation
        if ($password === $password_confirmation) {
            //Hachage du mot de passe.
            $mot_de_passe = password_hash($password, PASSWORD_DEFAULT);
        } else {
            echo 'Les mots de passes ne sont pas indentiques - JS check ?';
        }

        $date_inscription = date('Y-m-d H:i:s');

        $this->model->insert(compact(
            'nom',
            'prenom',
            'mail',
            'mot_de_passe',
            'profession',
            'tel',
            'num_adelie',
            'nom_cabinet'
        ));

        \Http::redirect('?controller=praticien&task=showAuth');
    }

    /**
     * Test de loging et mot de passe lors de l'authentification du praticien
     * 
     * @return void
     */
    public function auth()
    {
        //Récupération des données du formulaire
        // $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_SPECIAL_CHARS);
        // $mdp = filter_input(INPUT_POST, 'mot_de_passe');
        $mail = $_POST['mail'];
        $mdp = $_POST['mot_de_passe'];

        // if (!empty($mail) && !empty($mdp)) {
        //Extract de la requète checkAuth avec le mail du praticien (Le méthode extract est expliqué dans le Renderer)

        if ($this->model->checkAuth($mail)) {
            extract($this->model->checkAuth($mail));
            if (password_verify($mdp, $mot_de_passe)) {
                // Si une session n'existe pas on la crée et un ajoute nos variables à la superglobale et on redirige le praticien sur son espace.
                $id_session = session_id();
                $praticien = 'praticien';
                $_SESSION['id_session'] = $id_session;
                $_SESSION['id'] = $id;
                $_SESSION['role'] = $praticien;
                $_SESSION['nom'] = $nom;
                $_SESSION['prenom'] = $prenom;
                //Redirection du praticien sur son espace
                //\Renderer::render('espacePraticien', compact('pageTitle', 'id_session', 'id', 'praticien', 'donneesPraticien'));
                //Praticien::showEspace();
                \Http::redirect('?controller=praticien&task=showEspace');
                //Sinon on affiche une erreur.
            } else {
                echo 'errMDP';
            }
        } else {
            echo 'errMail';
        }
        // Compare le mot de passe POST avec le mot de passe trouvé dans le BDD
        // Si c'est mot de passe son identique : 

        // } else {
        //     echo 'Les champs sont vides - JS Check à faire';
        // }
    }

    /**
     * Affiche le profil du praticien
     * 
     * @return pageTitle
     * @return nomPartie
     * @return dataPraticien
     * @return donneesPraticien
     * @return prestations
     */
    public function profilPraticien()
    {
        $dataPraticien = $this->model->find('id', $_SESSION["id"]);
        $pageTitle = 'Mon Profil';
        $nomPartie = 'Mon Profil';
        $donneesPraticien = $this->model->find('id', $_SESSION['id']);
        $prestationModel = new \Models\Prestation();
        $prestations = $prestationModel->findWithFetchAll('id_praticien', $_SESSION['id']);
        \Renderer::renderEspacePraticien('profilPraticien', compact('pageTitle', 'dataPraticien', 'nomPartie', 'donneesPraticien', 'prestations'));
    }

    /**
     * Ajout d'une prestation par le praticien
     * 
     * @return pageTitle
     * @return nomPartie
     * @return prestations
     * 
     */
    public function ajoutPrestation()
    {
        $prestationModel = new \Models\Prestation();
        $prestations = $prestationModel->findWithFetchAll('id_praticien', $_SESSION['id']);
        $pageTitle = 'Mon Profil';
        $nomPartie = 'Ajouter une prestation';
        \Renderer::renderEspacePraticien('ajoutPrestation', compact('pageTitle', 'nomPartie', 'prestations'));
    }

    /**
     * Modification des prestations par le praticien
     * 
     * @return pageTitle
     * @return nomPartie
     * @return prestations
     * 
     */
    public function modifPrestation()
    {
        $prestationModel = new \Models\Prestation();
        $prestations = $prestationModel->findWithFetchAll('id_praticien', $_SESSION['id']);
        $pageTitle = 'Mon Profil';
        $nomPartie = 'Modifier une prestation';
        \Renderer::renderEspacePraticien('modifPrestation', compact('pageTitle', 'nomPartie', 'prestations'));
    }

    /**
     * Modification des informations du profil praticien
     * 
     * @return void
     */
    public function update()
    {
        $id = $_SESSION['id'];
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
        $profession = filter_input(INPUT_POST, 'profession', FILTER_SANITIZE_SPECIAL_CHARS);
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
        $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);
        $num_adelie = filter_input(INPUT_POST, 'num_adelie', FILTER_SANITIZE_SPECIAL_CHARS);
        $nom_cabinet = filter_input(INPUT_POST, 'nom_cabinet', FILTER_SANITIZE_SPECIAL_CHARS);

        $this->model->updatePraticien(
            $id,
            $nom,
            $prenom,
            $mail,
            $profession,
            $tel,
            $num_adelie,
            $nom_cabinet
        );
        \Http::redirect('?controller=praticien&task=profilPraticien');
    }

    /**
     * Permet au praticien de se déconnecer. Clear les variables de Session & la détruit : 
     * @return void
     */
    function logout()
    {
        // Détruit toutes les variables de session
        $_SESSION = array();
        // Si vous voulez détruire complètement la session, effacez également
        // le cookie de session.
        // Note : cela détruira la session et pas seulement les données de session !
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        // Finalement, on détruit la session.
        session_destroy();
        \Http::redirect('?controller=praticien&task=index');
    }

    /**
     * Permet d'afficher la page afin de rechercher un patient
     * 
     * @return pageTitle
     * @return nomPartie
     * @return informationsPatients
     */
    function pagePourRechercherUnPatient()
    {
        $pageTitle = "Rechercher un patient";
        $nomPartie = "Mes Patients";
        $patientModel = new \Models\Patient();
        $donneesAllPatients = $patientModel->findAll('nom');
        $adresseModel = new \Models\Adresse();
        foreach ($donneesAllPatients as $patient) {
            extract($patient);
            $informationsPatients[] = $adresseModel->findAdresseById('patient', $id);
        }
        \Renderer::renderEspacePraticien('rechercherUnPatient', compact('pageTitle', 'nomPartie', 'informationsPatients'));
    }

    function pagePatientPdvPraticien()
    {
        // $pageTitle = "Mes patients";

        // $donneesPatient = $patientModel->find('id', $userID);
        // var_dump($donneesPatient);
        //  exit;
        // extract($donneesPatient);
        // $nomPartie = "Fiche de " . strtoupper($nom) . ' ' . $prenom;

        // $adresseModel = new \Models\Adresse();
        // foreach ($donneesPatient as $patient) {
        //     extract($patient);
        //     $informationPatient[] = $adresseModel->findAdresseById('patient', $userID);
        //     $informationPatient = $informationPatient[0][0];
        // }

        //  if (isset($_GET['id'])) $userID = $_GET['id'];
        // \Renderer::renderEspacePraticien('fichePatient', compact('pageTitle', 'nomPartie', 'informationPatient'));

        $userID = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);
        $patientModel = new \Models\Patient();

        $donneesTablePatient = $patientModel->find('id', $userID);
        $adresseModel = new \Models\Adresse();
        $rdvModel = new \Models\Rendez_vous();
        $donneesAdresse = $adresseModel->find('id_user', $userID);
        $donneesRdv = $rdvModel->findRdv($userID);
        $dataOnRdv = new ArrayObject();
        $dataOnRdv->append($rdvModel->nombreRendezVous('id_patient', $userID));
        $dataOnRdv->append($rdvModel->nombrePraticienUnique('id_praticien', $userID));
        $dataOnRdv->append($rdvModel->nombrePraticienUnique('id_prestation', $userID));

        $pageTitle = 'Espace patient';
        $nomPartie = 'Profil de ' . $donneesTablePatient['nom'] . ' ' . $donneesTablePatient['prenom'];
        \Renderer::renderEspacePraticien('profilPatient', compact('pageTitle', 'donneesTablePatient', 'donneesAdresse', 'donneesRdv', 'nomPartie', 'dataOnRdv'));
    }
}
