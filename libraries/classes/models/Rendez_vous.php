<?php
require_once "libraries/classes/Database.php";

class Rendez_vous
{
    /**
     * Retourne la liste des rendez-vous classés par leurs identifiants
     * 
     * @return array
     */

    function findAll(): array
    {
        $pdo = getPdo();
        $resultats = $pdo->query('SELECT * FROM rendez_vous ORDER BY id ');
        // On fouille le résultat pour en extraire les données réelles
        $rendez_vous = $resultats->fetchAll();

        return $rendez_vous;
    }

    /** 
     * Retourne un rendez-vous grâce à son identifiant
     * 
     * @return array
     */

    public function find(int $id)
    {
        $pdo = getPdo();
        $query = $pdo->prepare("SELECT * FROM rendez_vous WHERE id = :rendez_vous_id");

        // On exécute la requête en précisant le paramètre :rendez_vous_id
        $query->execute(['rendez_vous_id' => $id]);

        //On fouille le résultat pour en extraire les données réelles du rendez_vous
        $rendez_vous = $query->fetch();

        return $rendez_vous;
    }

    /**
     * Supprime un rendez_vous dans la base grâce à son identifiant
     * 
     * @param integer $id
     * @return void
     */

    public function delete(int $id): void
    {
        $pdo = getPdo();
        $query = $pdo->prepare('DELETE FROM rendez_vous WHERE id = :id');
        $query->execute(['id' => $id]);
    }
}
