<?php
require_once "libraries/classes/Database.php";

class Prestation
{
    /**
     * Retourne la liste des prestations classés par leurs identifiants
     * 
     * @return array
     */

    function findAll(): array
    {
        $pdo = getPdo();
        $resultats = $pdo->query('SELECT * FROM prestation ORDER BY id ');
        // On fouille le résultat pour en extraire les données réelles
        $prestations = $resultats->fetchAll();

        return $prestations;
    }

    /** 
     * Retourne une prestation grâce à son identifiant
     * 
     * @return array
     */

    public function find(int $id)
    {
        $pdo = getPdo();
        $query = $pdo->prepare("SELECT * FROM prestation WHERE id = :prestation_id");

        // On exécute la requête en précisant le paramètre :prestation_id
        $query->execute(['prestation_id' => $id]);

        //On fouille le résultat pour en extraire les données réelles de la prestation
        $prestation = $query->fetch();

        return $prestation;
    }

    /**
     * Supprime une prestation dans la base grâce à son identifiant
     * 
     * @param integer $id
     * @return void
     */

    public function delete(int $id): void
    {
        $pdo = getPdo();
        $query = $pdo->prepare('DELETE FROM prestation WHERE id = :id');
        $query->execute(['id' => $id]);
    }
}
