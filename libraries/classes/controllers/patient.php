<?php

namespace Controllers;

use Database;
use PDO;

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
     * Ajouter un patient dans la base de donnée
     * 
     * @return void
     */

    public function save()
    {
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);

        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);

        $mail = filter_input(INPUT_POST, 'mail');

        $tel = filter_input(INPUT_POST, 'tel', FILTER_VALIDATE_INT);

        $mot_de_passe = filter_input(INPUT_POST, 'mot_de_passe');

        $activite = filter_input(INPUT_POST, 'activite', FILTER_SANITIZE_SPECIAL_CHARS);

        $num_secu = filter_input(INPUT_POST, 'num_secu', FILTER_VALIDATE_INT);

        $mutuelle = filter_input(INPUT_POST, 'mutuelle', FILTER_SANITIZE_SPECIAL_CHARS);

        $caisse = filter_input(INPUT_POST, 'caisse', FILTER_SANITIZE_SPECIAL_CHARS);

        $date_naissance = filter_input(INPUT_POST, 'date_naissance');

        $sexe = filter_input(INPUT_POST, 'sexe', FILTER_SANITIZE_SPECIAL_CHARS);

        $nom_tuteur = filter_input(INPUT_POST, 'nom_tuteur', FILTER_SANITIZE_SPECIAL_CHARS);

        $prenom_tuteur = filter_input(INPUT_POST, 'prenom_tuteur', FILTER_SANITIZE_SPECIAL_CHARS);

        $mail_tuteur = filter_input(INPUT_POST, 'mail_tuteur');

        $tel_tuteur = filter_input(INPUT_POST, 'tel_tuteur', FILTER_VALIDATE_INT);

        $nom_generaliste = filter_input(INPUT_POST, 'nom_generaliste', FILTER_SANITIZE_SPECIAL_CHARS);

        $prenom_generaliste = filter_input(INPUT_POST, 'prenom_generaliste', FILTER_SANITIZE_SPECIAL_CHARS);

        $mail_generaliste = filter_input(INPUT_POST, 'mail_generaliste');

        $tel_generaliste = filter_input(INPUT_POST, 'tel_generaliste', FILTER_VALIDATE_INT);

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
            'sexe',
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
        \Http::redirect('?controller=patient&task=index');
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
        $mot_de_passe = filter_input(INPUT_POST, 'mot_de_passe');

        //Apelle de la requète checkAuth avec le mail du patient
        $rechercheMotDePasse = $this->model->checkAuth($mail);


        /*Compare le mot de passe POST avec le mot de passe trouvé dans le BDD (ATTENTION : la requète retourne un array, nous devons donc transférer notre string patient mail en array pour la comparaison {Meilleure méthode à trouver ?? })
        Si c'est mot de passe son identique : */
        if ($rechercheMotDePasse === compact('mot_de_passe')) {
            // Si une session n'éxiste pas on la crée et un ajoute nos variables à la superglobale et on redirige le patient sur son espace.

            if (!isset($_SESSION)) {
                session_start();
                $_SESSION["mail"] = $mail;
                $_SESSION["mot_de_passe"] = $mot_de_passe;

                //Redirection du patient sur son espace
                $pageTitle = 'Espace patient';
                \Renderer::render('espacePatient', compact('pageTitle', 'mail', 'mot_de_passe'));
            }
            //Sinon on affiche une erreur.
        } else {
            echo 'ERR, mot de passe incorrect';
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
