<?php

namespace Controllers;

class Patient extends Controller
{
    protected $modelName = "Patient";

    public function show()
    {
        $pageTitle = 'Espace praticien';
        \Renderer::render('patient', compact('pageTitle'));
    }

    public function inscription()
    {
        $pageTitle = 'Formulaire Patient';
        \Renderer::render('formulairePatient', compact('pageTitle'));
    }

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

        // 4. Redirection vers l'article en question :
        \Http::redirect('?controller=praticien&task=index');
    }
}
function getUtilisateurByMailU($mailU) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateur where mailU=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}