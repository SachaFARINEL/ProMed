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
        //La session n'est pas encore enregistré pour skippe l'authentification patient 
        if (!isset($_SESSION['mail'])) {
            $pageTitle = 'Authentification patient';
            \Renderer::render('authentificationPatient', compact('pageTitle'));
        } else {
            $pageTitle = 'Espace patient';
            \Renderer::render('espacePatient', compact('pageTitle'));
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
    public function showEspace(): void
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
        $donnesPatient = $this->model->find($_SESSION['id']);
        $pageTitle = "Mon profil";
        \Renderer::render('profilPatient', compact('pageTitle', 'donnesPatient'));
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
                    $_SESSION["id"] = $id;
                    $_SESSION["mail"] = $mail;
                    $_SESSION["mot_de_passe"] = $mot_de_passe;
                    $_SESSION["nom"] = $nom;
                    $_SESSION["prenom"] = $prenom;

                    //Redirection du patient sur son espace
                    $pageTitle = 'Espace patient';
                    \Renderer::render('espacePatient', compact('pageTitle', 'id', 'mail', 'mot_de_passe', 'nom', 'prenom'));
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
     * Permet au patient de se déconnecer. Clear les variables de Session : 
     * @return void
     */
    function logout()
    {
        unset($_SESSION["mail"]);
        unset($_SESSION["mot_de_passe"]);
        \Http::redirect('?controller=praticien&task=index');
    }
}
