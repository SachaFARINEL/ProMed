<?php
require_once "libraries/classes/Database.php";

class Patient
{
    /**
     * Retourne la liste des patients classés par leurs identifiants
     * 
     * @return array
     */

    public function findAll(): array
    {
        $pdo = getPdo();
        $resultats = $pdo->query('SELECT * FROM patient ORDER BY id ');

        // On fouille le résultat pour en extraire les données réelles
        $patients = $resultats->fetchAll();

        return $patients;
    }

    /** 
     * Retourne un patient grâce à son identifiant
     * 
     * @return array
     */

    public function find(int $id)
    {
        $pdo = getPdo();
        $query = $pdo->prepare("SELECT * FROM patient WHERE id = :patient_id");

        // On exécute la requête en précisant le paramètre :patient_id
        $query->execute(['patient_id' => $id]);

        //On fouille le résultat pour en extraire les données réelles du patient
        $patient = $query->fetch();

        return $patient;
    }

    /**
     * Supprime un patient dans la base grâce à son identifiant
     * 
     * @param integer $id
     * @return void
     */

    public function delete(int $id): void
    {
        $pdo = getPdo();
        $query = $pdo->prepare('DELETE FROM patient WHERE id = :id');
        $query->execute(['id' => $id]);
    }
}
