<?php

namespace Controllers;

use ArrayObject;

class Patient extends Controller
{
    protected $modelName = "Patient";

    /**
     * Affiche l'authentification patient
     * 
     * @return pageTitle
     */
    public function showAuth()
    {
        $pageTitle = 'Authentification patient';
        \Renderer::render('authentificationPatient', compact('pageTitle'));
    }

    /**
     * Affiche le formulaire d'inscription du patient
     * 
     * @return pageTitle
     * @return nomPartie
     */
    public function inscription()
    {
        $nomPartie = 'Création de la fiche patient';
        $pageTitle = 'Formulaire Patient';
        \Renderer::renderEspacePraticien('formulairePatient', compact('pageTitle', 'nomPartie'));
    }

    /**
     * Affiche l'espace du patient
     * 
     * @return pageTitle
     * @return rdvAVenir
     * @return rdvPasses
     * @return nomPartie
     */
    public function showEspace()
    {
        $rdvModel = new \Models\Rendez_vous();
        $rdvAVenir = $rdvModel->retourneRdv('id_patient', $_SESSION['id'], '>');
        $rdvPasses = $rdvModel->retourneRdv('id_patient', $_SESSION['id'], '<');
        $pageTitle = 'Espace patient';
        $nomPartie = 'DASHBOARD';
        \Renderer::renderEspacePatient('espacePatient', compact('pageTitle', 'rdvAVenir', 'rdvPasses', 'nomPartie'));
    }

    /**
     * Affiche le profil du patient
     * 
     * @return pageTitle
     * @return nomPartie
     * @return donneesTablePatient
     * @return donneesAdresse
     * @return donneesRdv
     */
    public function profilPatient()
    {
        $donneesTablePatient = $this->model->find('id', $_SESSION['id']);
        $adresseModel = new \Models\Adresse();
        $rdvModel = new \Models\Rendez_vous();
        $donneesAdresse = $adresseModel->find('id_user', $_SESSION['id']);
        $donneesRdv = $rdvModel->findRdv($_SESSION['id']);
        $dataOnRdv = new ArrayObject();
        $dataOnRdv->append($rdvModel->nombreRendezVous('id_patient', $_SESSION['id']));
        $dataOnRdv->append($rdvModel->nombrePraticienUnique('id_praticien', $_SESSION['id']));
        $dataOnRdv->append($rdvModel->nombrePraticienUnique('id_prestation', $_SESSION['id']));

        $pageTitle = 'Espace patient';
        $nomPartie = 'Mon profil';
        \Renderer::renderEspacePatient('profilPatient', compact('pageTitle', 'donneesTablePatient', 'donneesAdresse', 'donneesRdv', 'nomPartie', 'dataOnRdv'));
    }

    /**
     * Affiche la page de modification du profil patient
     * 
     * @return pageTitle
     * @return nomPartie
     * @return donneesTablePatient
     * @return donneesAdresse
     * @return donneesRdv
     */
    public function AfficherUpdatePatient()
    {

        $donneesTablePatient = $this->model->find('id', $_SESSION['id']);
        $adresseModel = new \Models\Adresse();
        $rdvModel = new \Models\Rendez_vous();
        $donneesAdresse = $adresseModel->find('id_user', $_SESSION['id']);
        $donneesRdv = $rdvModel->findRdv($_SESSION['id']);
        $pageTitle = 'Espace patient';
        $nomPartie = 'Modifier Informations';
        \Renderer::renderEspacePatient('modifPatient', compact('pageTitle', 'donneesTablePatient', 'donneesAdresse', 'donneesRdv', 'nomPartie'));
    }



    /**
     * Ajouter un patient dans la base de donnée, lors de l'inscription
     * 
     * @return pageTitle
     */
    public function save()
    {
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
        $genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_SPECIAL_CHARS);
        $date_naissance = filter_input(INPUT_POST, 'date_naissance');
        $activite = filter_input(INPUT_POST, 'activite', FILTER_SANITIZE_SPECIAL_CHARS);
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
        $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);
        $password = filter_input(INPUT_POST, 'mot_de_passe');
        $password_confirmation = filter_input(INPUT_POST, 'mot_de_passe_confirmation');
        if ($password === $password_confirmation) {
            //Hachage du mot de passe.
            $mot_de_passe = password_hash($password, PASSWORD_DEFAULT);
        } else {

            echo 'Les mots de passes ne sont pas indentiques - JS check ?';
        }
        //Données liées aux soins
        $num_secu = filter_input(INPUT_POST, 'num_secu', FILTER_SANITIZE_NUMBER_INT);
        $mutuelle = filter_input(INPUT_POST, 'mutuelle', FILTER_SANITIZE_SPECIAL_CHARS);
        $caisse = filter_input(INPUT_POST, 'caisse', FILTER_SANITIZE_SPECIAL_CHARS);
        //Contact du tuteur
        $nom_tuteur = filter_input(INPUT_POST, 'nom_tuteur', FILTER_SANITIZE_SPECIAL_CHARS);
        $prenom_tuteur = filter_input(INPUT_POST, 'prenom_tuteur', FILTER_SANITIZE_SPECIAL_CHARS);
        $mail_tuteur = filter_input(INPUT_POST, 'mail_tuteur', FILTER_SANITIZE_EMAIL);
        $tel_tuteur = filter_input(INPUT_POST, 'tel_tuteur', FILTER_SANITIZE_NUMBER_INT);
        //Contact du généraliste
        $nom_generaliste = filter_input(INPUT_POST, 'nom_generaliste', FILTER_SANITIZE_SPECIAL_CHARS);
        $prenom_generaliste = filter_input(INPUT_POST, 'prenom_generaliste', FILTER_SANITIZE_SPECIAL_CHARS);
        $mail_generaliste = filter_input(INPUT_POST, 'mail_generaliste', FILTER_SANITIZE_EMAIL);
        $tel_generaliste = filter_input(INPUT_POST, 'tel_generaliste', FILTER_SANITIZE_NUMBER_INT);

        $date_inscription = date('Y-m-d H:i:s');

        $this->model->insert(compact(
            'nom',
            'prenom',
            'mail',
            'tel',
            'mot_de_passe',
            'activite',
            'num_secu',
            'mutuelle',
            'caisse',
            'date_naissance',
            'genre',
            'nom_tuteur',
            'prenom_tuteur',
            'mail_tuteur',
            'tel_tuteur',
            'nom_generaliste',
            'prenom_generaliste',
            'mail_generaliste',
            'tel_generaliste',
            'date_inscription'

        ));
        //Adresse
        $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_SPECIAL_CHARS);
        $type_de_voie = filter_input(INPUT_POST, 'type_de_voie', FILTER_SANITIZE_SPECIAL_CHARS);
        $adresse = filter_input(INPUT_POST, 'adresse', FILTER_SANITIZE_SPECIAL_CHARS);
        $code_postal = filter_input(INPUT_POST, 'code_postal', FILTER_SANITIZE_NUMBER_INT);
        $ville = filter_input(INPUT_POST, 'ville', FILTER_SANITIZE_SPECIAL_CHARS);
        $departement = filter_input(INPUT_POST, 'departement', FILTER_SANITIZE_SPECIAL_CHARS);
        $pays = filter_input(INPUT_POST, 'pays', FILTER_SANITIZE_SPECIAL_CHARS);
        $role = filter_input(INPUT_GET, 'controller', FILTER_SANITIZE_SPECIAL_CHARS);

        extract($this->model->findLastInsertId()); //Récupérationde l'id patient pour le mettre dans la base adresse
        $adresseModel = new \Models\Adresse();
        $adresseModel->insert(compact(
            'id_user',
            'role',
            'numero',
            'type_de_voie',
            'adresse',
            'code_postal',
            'ville',
            'departement',
            'pays'

        ));
        // 4. Redirection vers la page d'accueil pour le moment :
        $pageTitle = 'Espace Praticien';
        \Renderer::render('espacePraticien', compact('pageTitle'));
    }

    /**
     * Logging du patient
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
                $patient = 'patient';
                $_SESSION['id_session'] = $id_session;
                $_SESSION['id'] = $id;
                $_SESSION['role'] = $patient;
                $_SESSION['nom'] = $nom;
                $_SESSION['prenom'] = $prenom;
                //Redirection du praticien sur son espace
                //\Renderer::render('espacePraticien', compact('pageTitle', 'id_session', 'id', 'praticien', 'donneesPraticien'));
                //Praticien::showEspace();
                // \Http::redirect('?controller=praticien&task=showEspace');
                //Sinon on affiche une erreur.
            } else {
                echo 'errMDP';
            }
        } else {
            echo 'errMail';
        }
    }


    /**
     * Permet au patient de se déconnecer. Clear les variables de Session & la détruit : 
     * 
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
     * Affiche la page afin de rechercher un praticien
     * 
     * @return pageTitle
     * @return nomPartie
     * @return informationsPraticiens
     */
    function pagePourRechercherUnPraticien()
    {
        $pageTitle = "Rechercher un praticien";
        $nomPartie = "Mes rendez-vous";
        $praticienModel = new \Models\Praticien();
        $adresseModel = new \Models\Adresse();
        $allPraticiens = $praticienModel->findAll('nom');
        foreach ($allPraticiens as $praticien) {
            extract($praticien);
            $informationsPraticiens[] = $adresseModel->findAdresseById('praticien', $id);
        }
        \Renderer::renderEspacePatient('rechercherUnPraticien', compact('pageTitle', 'nomPartie', 'informationsPraticiens'));
    }

    /**
     * Permet de modifier un patient en base de donnée
     * 
     * @return void
     */
    function updatePatient()
    {
        $id = $_SESSION['id'];
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_SPECIAL_CHARS);
        $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_SPECIAL_CHARS);
        $activite = filter_input(INPUT_POST, 'activite', FILTER_SANITIZE_SPECIAL_CHARS);
        $mutuelle = filter_input(INPUT_POST, 'mutuelle', FILTER_SANITIZE_SPECIAL_CHARS);
        $caisse = filter_input(INPUT_POST, 'caisse', FILTER_SANITIZE_SPECIAL_CHARS);
        $nom_tuteur = filter_input(INPUT_POST, 'nom_tuteur', FILTER_SANITIZE_SPECIAL_CHARS);
        $prenom_tuteur = filter_input(INPUT_POST, 'prenom_tuteur', FILTER_SANITIZE_SPECIAL_CHARS);
        $mail_tuteur = filter_input(INPUT_POST, 'mail_tuteur', FILTER_SANITIZE_SPECIAL_CHARS);
        $tel_tuteur = filter_input(INPUT_POST, 'tel_tuteur', FILTER_SANITIZE_SPECIAL_CHARS);
        $adresse_tuteur = filter_input(INPUT_POST, 'adresse_tuteur', FILTER_SANITIZE_SPECIAL_CHARS);

        $this->model->update(
            $id,
            $prenom,
            $nom,
            $mail,
            $tel,
            $activite,
            $mutuelle,
            $caisse,
            $nom_tuteur,
            $prenom_tuteur,
            $mail_tuteur,
            $tel_tuteur,
            $adresse_tuteur
        );
        \Http::redirect('?controller=patient&task=profilPatient');
    }
}
// public function update()
    // {
    //     
    //     $id = $_SESSION['id'];
    //     $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
    //     $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
    //     $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
    //     $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);
    //     $mot_de_passe = filter_input(INPUT_POST, 'mot_de_passe', FILTER_SANITIZE_NUMBER_INT);
    //     $activite = filter_input(INPUT_POST, 'activite', FILTER_SANITIZE_NUMBER_INT);
    //     $num_secu = filter_input(INPUT_POST, 'num_secu', FILTER_SANITIZE_NUMBER_INT);
    //     $mutuelle = filter_input(INPUT_POST, 'mutuelle', FILTER_SANITIZE_NUMBER_INT);
    //     $caisse = filter_input(INPUT_POST, 'caisse', FILTER_SANITIZE_NUMBER_INT);
    //     $date_naissance = filter_input(INPUT_POST, 'date_naissance', FILTER_SANITIZE_NUMBER_INT);
    //     $genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_NUMBER_INT);
    //     $nom_tuteur = filter_input(INPUT_POST, 'nom_tuteur', FILTER_SANITIZE_NUMBER_INT);
    //     $prenom_tuteur = filter_input(INPUT_POST, 'prenom_tuteur', FILTER_SANITIZE_NUMBER_INT);
    //     $mail_tuteur = filter_input(INPUT_POST, 'mail_tuteur', FILTER_SANITIZE_NUMBER_INT);
    //     $nom_generaliste = filter_input(INPUT_POST, 'nom_generaliste', FILTER_SANITIZE_NUMBER_INT);
    //     $prenom_generaliste = filter_input(INPUT_POST, 'prenom_generaliste', FILTER_SANITIZE_NUMBER_INT);
    //     $mail_generaliste = filter_input(INPUT_POST, 'mail_generaliste', FILTER_SANITIZE_NUMBER_INT);
    //     $tel_generaliste = filter_input(INPUT_POST, 'tel_generaliste', FILTER_SANITIZE_NUMBER_INT);

    //     $this->model->updatePatient(compact(
    //         'id',
    //         'nom',
    //         'prenom',
    //         'mail',
    //         'tel',
    //         'mot_de_passe',
    //         'activite',
    //         'num_secu',
    //         'mutuelle',
    //         'caisse',
    //         'date_naissance',
    //         'genre',
    //         'nom_tuteur',
    //         'prenom_tuteur',
    //         'mail_tuteur',
    //         'nom_généraliste',
    //         'prenom_généraliste',
    //         'mail_generaliste',
    //         'tel_generaliste',
    //     ));
    //     \Http::redirect('?controller=patient&task=profilPatient');
    // }
