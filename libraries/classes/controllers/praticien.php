<?php

namespace Controllers;

class Praticien extends Controller
{
    protected $modelName = "Praticien";



    /**
     * Affiche authentification Praticien
     * 
     * @return void
     */

    public function showAuth(): void
    {
        $pageTitle = 'Authentification Praticien';
        \Renderer::render('authentificationPraticien', compact('pageTitle'));
    }


    public function showEspace(): void
    {
        $pageTitle = 'Espace praticien';
        \Renderer::render('espacePraticien', compact('pageTitle'));
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
        $donnesPraticien = $this->model->findAll();
        $pageTitle = "Mon profil";
        \Renderer::render('parametrePriseEnCharge', compact('pageTitle', 'donnesPraticien'));
    }

    /**
     * Logging du praticien
     * 
     * @return void
     */
    public function auth()
    {
        //Récupération des données du formulaire
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_SPECIAL_CHARS);
        $mot_de_passe = filter_input(INPUT_POST, 'mot_de_passe');

        //Apelle de la requète checkAuth avec le mail du praticien
        extract($this->model->checkAuth($mail));

        /*Compare le mot de passe POST avec le mot de passe trouvé dans le BDD (ATTENTION : la requète retourne un array, nous devons donc transférer notre string patient mail en array pour la comparaison {Meilleure méthode à trouver ?? })
        Si c'est mot de passe son identique : */
        if ($rechercheMotDePasse === compact('mot_de_passe')) {
            /*Si une session n'éxiste pas on la crée et un ajoute nos variables à la superglobale et on redirige le patient sur son espace.
            Je n'ai pas encore réussi à utiliser les variables de Session dans l'espace praticien */
            if (!isset($_SESSION)) {
                session_start();
                $_SESSION["mail"] = $mail;
                $_SESSION["mot_de_passe"] = $mot_de_passe;
                $_SESSION["nom"] = $nom;
                $_SESSION["prenom"] = $prenom;

                //Redirection du praticien sur son espace
                \Renderer::render('espacePraticien', compact('pageTitle', 'mail', 'mot_de_passe', 'nom', 'prenom'));
            }
            //Sinon on affiche une erreur.
        } else {
            echo 'ERR, mot de passe incorrect';
        }
    }
}
