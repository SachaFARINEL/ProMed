<?php

namespace Controllers;

class Praticien extends Controller
{
    protected $modelName = "Praticien";

    /**
     * Affiche authentification praticien 
     * 
     * @return void
     */

    public function showAuth()
    {
        $pageTitle = 'Authentification praticien';
        \Renderer::render('authentificationPraticien', compact('pageTitle'));
    }


    public function showEspace(): void
    {
        session_start();
        $pageTitle = 'Mon espace';
        $nomPartie = 'DASHBOARD';
        $donneesPraticien = $this->model->find($_SESSION['id']);
        \Renderer::renderEspacePraticien('espacePraticien', compact('pageTitle', 'nomPartie', 'donneesPraticien'));
    }


    /**
     * Affiche l'accueil (Reussir à l'utiliser directement sur l'index ? {N'a rien à faire dans le controleur praticien car correspond à nos deux utilisateurs})
     * 
     * @return void
     */
    public function index(): void
    {
        $pageTitle = 'Accueil';
        \Renderer::render('accueil', compact('pageTitle'));
    }

    /**
     * Affiche le formulaire d'inscription du praticien
     * 
     * @return void
     */

    public function inscription(): void
    {
        $pageTitle = "Formulaire d'inscription Praticien";
        \Renderer::render('formulairePraticien', compact('pageTitle'));
    }

    /**
     * Affiche les données de l'ENSEMBLE des praticiens (Pour choisir lequel affiché, il faudra faire une requète pour avoir l'id de celui qui vient de se connecter, le mettre dans une variable de session, et choisir la requète find et non find all avec ...WHERE id = $_SESSION["id"])
     * 
     * @return void
     */
    public function afficherMonProfil()
    {
        session_start();
        $donnesPraticien = $this->model->find($_SESSION['id']);
        $prestationModel = new \Models\Prestation();
        $donnesPrestations = $prestationModel->findPrestations($_SESSION['id']);
        $pageTitle = "Profil et prise en charge";
        \Renderer::render('profilPraticien', compact('pageTitle', 'donnesPraticien', 'donnesPrestations'));
    }

    /**
     * Logging du praticien
     * 
     * @return void
     */
    public function save()
    {

        //Informations personnelles
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
        $profession = filter_input(INPUT_POST, 'profession', FILTER_SANITIZE_SPECIAL_CHARS);
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
        $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);
        $num_adelie = filter_input(INPUT_POST, 'num_adelie', FILTER_SANITIZE_SPECIAL_CHARS);
        $nom_cabinet = filter_input(INPUT_POST, 'nom_cabinet', FILTER_SANITIZE_SPECIAL_CHARS);


        $password = filter_input(INPUT_POST, 'mot_de_passe');
        $password_confirmation = filter_input(INPUT_POST, 'mot_de_passe_confirmation');
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

    public function auth()
    {
        //Récupération des données du formulaire
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_SPECIAL_CHARS);
        $mdp = filter_input(INPUT_POST, 'mot_de_passe');
        if (!empty($mail) && !empty($mdp)) {
            //Extract de la requète checkAuth avec le mail du praticien (Le méthode extract est expliqué dans le Renderer)
            extract($this->model->checkAuth($mail));
            // Compare le mot de passe POST avec le mot de passe trouvé dans le BDD
            // Si c'est mot de passe son identique : 
            if (password_verify($mdp, $mot_de_passe)) {
                // Si une session n'existe pas on la crée et un ajoute nos variables à la superglobale et on redirige le praticien sur son espace.
                if (!isset($_SESSION)) {
                    session_start();
                    $id_session = session_id();
                    $praticien = 'praticien';
                    $_SESSION['id_session'] = $id_session;
                    $_SESSION['id'] = $id;
                    $_SESSION['role'] = $praticien;
                    //Redirection du praticien sur son espace
                    //\Renderer::render('espacePraticien', compact('pageTitle', 'id_session', 'id', 'praticien', 'donneesPraticien'));
                    //Praticien::showEspace();
                    \Http::redirect('?controller=praticien&task=showEspace');
                }
                //Sinon on affiche une erreur.
            } else {
                echo 'ERR, mot de passe incorrect';
            }
        } else {
            echo 'Les champs sont vides - JS Check à faire';
        }
    }

    public function profilPraticien()
    {
        session_start();
        $dataPraticien = $this->model->find($_SESSION["id"]);
        $pageTitle = 'Mon Profil';
        $nomPartie = 'Mon Profil';
        $donneesPraticien = $this->model->find($_SESSION['id']);
        \Renderer::renderEspacePraticien('profilPraticien', compact('pageTitle', 'dataPraticien', 'nomPartie', 'donneesPraticien'));
    }


    public function update()
    {
        session_start();
        $id = $_SESSION['id'];
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
        $profession = filter_input(INPUT_POST, 'profession', FILTER_SANITIZE_SPECIAL_CHARS);
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
        $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);
        $num_adelie = filter_input(INPUT_POST, 'num_adelie', FILTER_SANITIZE_SPECIAL_CHARS);

        $this->model->updatePraticien(
            $id,
            $nom,
            $prenom,
            $mail,
            $profession,
            $tel,
            $num_adelie,
        );
        \Http::redirect('?controller=praticien&task=profilPraticien');
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

    function pagePourRechercherUnPatient()
    {
        session_start();
        $pageTitle = "Rechercher un patient";
        $nomPartie = "Mes Patients";
        $donneesAllPatients = $this->model->findAll();
        $donneesPraticien = $this->model->find($_SESSION['id']);

        \Renderer::renderEspacePraticien('rechercherUnPatient', compact('pageTitle', 'nomPartie', 'donneesAllPatients', 'donneesPraticien'));
    }

    public function rechercherUnPraticien()
    {
        $search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
        $dataPraticien = $this->model->findPraticienByName($search);
        $pageTitle = 'Rechercher un praticien';
        \Renderer::render('rechercherUnPraticien', compact('pageTitle', 'dataPraticien'));
    }
}
