<?php

namespace Controllers;


class Patient extends Controller
{
    protected $modelName = "Patient";

    /**
     * Affiche authentification patient 
     * 
     * @return void
     */

    public function showAuth()
    {
        session_start();
        if (!isset($_SESSION['id_session']) || $_SESSION["role"] !== 'patient') {
            $pageTitle = 'Authentification patient';
            \Renderer::render('authentificationPatient', compact('pageTitle'));
        } else {
            Patient::showEspace();
        }
    }

    /**
     * Affiche le formulaire d'inscription du patient
     * 
     * @return void
     */
    public function inscription()
    {
        $pageTitle = 'Formulaire Patient';
        \Renderer::render('formulairePatient', compact('pageTitle'));
    }

    /**
     * Redirige le patient sur son espace
     * 
     * @return void
     */
    public function showEspace()
    {
        $pageTitle = 'Espace patient';
        \Renderer::render('espacePatient', compact('pageTitle'));
    }

    /**
     * Affiche les données du patient
     * 
     * @return pageTitle
     * @return donnesPatient
     */
    public function afficherProfil()
    {
        session_start();
        $donnesTablePatient = $this->model->find($_SESSION['id']);
        $adresseModel = new \Models\Adresse();
        $donnesAdresse = $adresseModel->findAdresse($_SESSION['id']);
        $pageTitle = "Mon profil";
        \Renderer::render('profilPatient', compact('pageTitle', 'donnesTablePatient', 'donnesAdresse'));
    }

    /**
     * Ajouter un patient dans la base de donnée
     * 
     * @return void
     */

    public function save()
    {

        //Informations personnelles
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

        extract($this->model->findLastInsertId()); //Récupérationde l'id patient pour le mettre dans la base adresse
        $adresseModel = new \Models\Adresse();
        $adresseModel->insert(compact(
            'numero',
            'type_de_voie',
            'adresse',
            'code_postal',
            'ville',
            'departement',
            'pays',
            'id_user'
        ));
        // 4. Redirection vers la page d'accueil pour le moment :
        \Http::redirect('?controller=praticien&task=afficherMonProfil');
    }

    /**
     * Logging du patient
     * 
     * @return void
     */
    public function auth()
    {
        //Récupération des données du formulaire
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_SPECIAL_CHARS);
        $mdp = filter_input(INPUT_POST, 'mot_de_passe');
        if (!empty($mail) && !empty($mdp)) {
            //Extract de la requète checkAuth avec le mail du patient (Le méthode extract est expliqué dans le Renderer)
            extract($this->model->checkAuth($mail));
            // Compare le mot de passe POST avec le mot de passe trouvé dans le BDD
            // Si c'est mot de passe son identique : 
            if (password_verify($mdp, $mot_de_passe)) {
                // Si une session n'existe pas on la crée et un ajoute nos variables à la superglobale et on redirige le patient sur son espace.
                if (!isset($_SESSION)) {
                    session_start();
                    $id_session = session_id();
                    $_SESSION['id_session'] = $id_session;
                    $_SESSION["id"] = $id;
                    $_SESSION["mail"] = $mail;
                    $_SESSION["nom"] = $nom;
                    $_SESSION["prenom"] = $prenom;
                    $role = 'patient';
                    $_SESSION["role"] = $role;

                    //Redirection du patient sur son espace
                    $pageTitle = 'Espace patient';
                    \Renderer::render('espacePatient', compact('pageTitle', 'id_session', 'id', 'mail', 'nom', 'prenom', 'role'));
                }
                //Sinon on affiche une erreur.
            } else {
                echo 'ERR, mot de passe incorrect';
            }
        } else {
            echo 'Les champs sont vides - JS Check à faire';
        }
    }


    /**
     * Permet au patient de se déconnecer. Clear les variables de Session & la détruit : 
     * @return void
     */
    function logout()
    {
        session_start();

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

    public function rechercherUnPatient()
    {
        $search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
        $dataPatient = ($this->model->findPatientByName($search)[0]);
        $pageTitle = 'Rechercher un patient';
        \Renderer::render('rechercherUnPatient', compact('pageTitle', 'dataPatient'));
    }

    function pagePourRechercherUnPraticien()
    {
        $pageTitle = "Rechercher un praticien";
        \Renderer::render('rechercherUnPraticien', compact('pageTitle'));
    }
}
