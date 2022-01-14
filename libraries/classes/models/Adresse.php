<?php
require_once "libraries/classes/Database.php";

class Adresse
{
    /**
     * Retourne la liste des adresses classés par leurs identifiants
     * 
     * @return array
     */

    function findAll(): array
    {
        $pdo = getPdo();
        $resultats = $pdo->query('SELECT * FROM adresse ORDER BY id ');
        // On fouille le résultat pour en extraire les données réelles
        $adresses = $resultats->fetchAll();

        return $adresses;
    }

    /** 
     * Retourne une adresse grâce à son identifiant
     * 
     * @return array
     */

    public function find(int $id)
    {
        $pdo = getPdo();
        $query = $pdo->prepare("SELECT * FROM adresse WHERE id = :adresse_id");

        // On exécute la requête en précisant le paramètre :adresse_id
        $query->execute(['adresse_id' => $id]);

        //On fouille le résultat pour en extraire les données réelles de l'adresse
        $adresse = $query->fetch();

        return $adresse;
    }

    /**
     * Supprime un adresse dans la base grâce à son identifiant
     * 
     * @param integer $id
     * @return void
     */

    public function delete(int $id): void
    {
        $pdo = getPdo();
        $query = $pdo->prepare('DELETE FROM adresse WHERE id = :id');
        $query->execute(['id' => $id]);
    }
}
