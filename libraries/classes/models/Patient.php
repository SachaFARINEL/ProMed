<?php
require_once "libraries/classes/models/Model.php";


class Patient extends Model
{
    /**
     * Retourne la liste des patients classés par leurs identifiants
     * 
     * @return array
     */

    public function findAll(): array
    {
        try {

            $resultats = $this->pdo->query('SELECT * FROM patient ORDER BY id ');

            // On fouille le résultat pour en extraire les données réelles
            $patients = $resultats->fetchAll();

            return $patients;

            echo 'Tous les patients trouvés';
        } catch (PDOException $e) {

            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /** 
     * Retourne un patient grâce à son identifiant
     * 
     * @param integer $id
     * @return array
     */

    public function find(int $id)
    {
        try {

            $query = $this->pdo->prepare("SELECT * FROM patient WHERE id = :id_patient");

            // On exécute la requête en précisant le paramètre :id_patient
            $query->execute(['id_patient' => $id]);

            //On fouille le résultat pour en extraire les données réelles du patient
            $patient = $query->fetch();

            return $patient;

            echo 'Patient trouvé';
        } catch (PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Supprime un patient dans la base grâce à son identifiant
     * 
     * @param integer $id
     * @return void
     */

    public function delete(int $id): void
    {
        try {

            $query = $this->pdo->prepare('DELETE FROM patient WHERE id = :id');
            $query->execute(['id' => $id]);

            echo 'Entrée ajoutée dans la table';
        } catch (PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }

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
        } catch (PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }
}
