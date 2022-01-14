<?php
require_once "libraries/classes/Database.php";

class Rendez_vous
{
    /**
     * Retourne la liste des rendez-vous classés par leurs identifiants
     * 
     * @return array
     */

    public function findAll(): array
    {
        try {
            $pdo = getPdo();
            $resultats = $pdo->query('SELECT * FROM rendez_vous ORDER BY id ');
            // On fouille le résultat pour en extraire les données réelles
            $rendez_vous = $resultats->fetchAll();

            return $rendez_vous;

            echo 'Tous les rendez-vous trouvés';
        } catch (PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }

    /** 
     * Retourne un rendez-vous grâce à son identifiant
     * 
     * @param integer $id
     * @return array
     */

    public function find(int $id)
    {
        try {
            $pdo = getPdo();
            $query = $pdo->prepare("SELECT * FROM rendez_vous WHERE id = :id_rendez_vous");

            // On exécute la requête en précisant le paramètre :id_rendez_vous
            $query->execute(['id_rendez_vous' => $id]);

            //On fouille le résultat pour en extraire les données réelles du rendez_vous
            $rendez_vous = $query->fetch();

            return $rendez_vous;

            echo 'Rendez-vous trouvé';
        } catch (PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Supprime un rendez_vous dans la base grâce à son identifiant
     * 
     * @param integer $id
     * @return void
     */

    public function delete(int $id): void
    {
        try {
            $pdo = getPdo();
            $query = $pdo->prepare('DELETE FROM rendez_vous WHERE id = :id');
            $query->execute(['id' => $id]);

            echo 'Rendez-vous supprimé';
        } catch (PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }
}
