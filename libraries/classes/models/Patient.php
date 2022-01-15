<?php

namespace Models;

require_once "libraries/classes/models/Model.php";


class Patient extends Model
{
    protected $table = 'patient';

    /**
     * Insère un patient dans la base de données
     * 
     * @return void
     */

    public function insert(
        string $nom,
        string $prenom,
        string $mail,
        string $tel,
        string $mot_de_passe,
        string $activite,
        string $num_secu,
        string $mutuelle,
        string $caisse,
        string $date_naissance,
        string $sexe,
        string $nom_tuteur,
        string $prenom_tuteur,
        string $mail_tuteur,
        string $tel_tuteur,
        string $nom_generaliste,
        string $prenom_generaliste,
        string $mail_generaliste,
        string $tel_generaliste
    ): void {

        try {

            $query = $this->pdo->prepare('INSERT INTO patient SET 
        nom = :nom, 
        prenom = :prenom, 
        mail = :mail, 
        tel =:tel, 
        mot_de_passe =:mot_de_passe, 
        activite =:activite, 
        num_secu =:num_secu, 
        mutuelle =:mutuelle, 
        caisse =:caisse, 
        date_naissance =:date_naissance, 
        sexe =:sexe, 
        nom_tuteur =:nom_tuteur, 
        prenom_tuteur =:prenom_tuteur, 
        mail_tuteur =:mail_tuteur, 
        tel_tuteur =:tel_tuteur, 
        nom_generaliste =:nom_generaliste, 
        prenom_generaliste =:prenom_generaliste,
        mail_generaliste =:mail_generaliste, 
        tel_generaliste =:tel_generaliste, 
        date_inscription = NOW()');

            $query->execute(compact(
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
                'tel_generaliste'
            ));

            echo 'Entrée ajoutée dans la table';
        } catch (\PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }
}
