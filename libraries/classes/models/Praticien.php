<?php
require_once "libraries/classes/Database.php";

class Praticien
{

    /**
     * Retourne la liste des praticiens classés par leurs identifiants
     * 
     * @return array
     */

    function findAll(): array
    {
        $pdo = getPdo();
        $resultats = $pdo->query('SELECT * FROM praticien ORDER BY id ');
        // On fouille le résultat pour en extraire les données réelles
        $praticiens = $resultats->fetchAll();

        return $praticiens;
    }

    /** 
     * Retourne un praticien grâce à son identifiant
     * 
     * @return array
     */

    public function find(int $id)
    {
        $pdo = getPdo();
        $query = $pdo->prepare("SELECT * FROM praticien WHERE id = :praticien_id");

        // On exécute la requête en précisant le paramètre :praticien_id
        $query->execute(['praticien_id' => $id]);

        //On fouille le résultat pour en extraire les données réelles du praticien
        $praticien = $query->fetch();

        return $praticien;
    }

    /**
     * Supprime un praticien dans la base grâce à son identifiant
     * 
     * @param integer $id
     * @return void
     */

    public function delete(int $id): void
    {
        $pdo = getPdo();
        $query = $pdo->prepare('DELETE FROM praticien WHERE id = :id');
        $query->execute(['id' => $id]);
    }
}
