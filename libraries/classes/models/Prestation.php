<?php
require_once "libraries/classes/models/Model.php";

class Prestation extends Model
{
    /**
     * Retourne la liste des prestations classés par leurs identifiants
     * 
     * @return array
     */

    public function findAll(): array
    {
        try {

            $resultats = $this->pdo->query('SELECT * FROM prestation ORDER BY id ');

            // On fouille le résultat pour en extraire les données réelles
            $prestations = $resultats->fetchAll();

            return $prestations;

            echo 'Toutes les prestations trouvées';
        } catch (PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }

    /** 
     * Retourne une prestation grâce à son identifiant
     * 
     * @param integer $id
     * @return array
     */

    public function find(int $id)
    {
        try {

            $query = $this->pdo->prepare("SELECT * FROM prestation WHERE id = :id_prestation");

            // On exécute la requête en précisant le paramètre :id_prestation
            $query->execute(['id_prestation' => $id]);

            //On fouille le résultat pour en extraire les données réelles de la prestation
            $prestation = $query->fetch();

            return $prestation;

            echo 'Prestation trouvée';
        } catch (PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Supprime une prestation dans la base grâce à son identifiant
     * 
     * @param integer $id
     * @return void
     */

    public function delete(int $id): void
    {
        try {

            $query = $this->pdo->prepare('DELETE FROM prestation WHERE id = :id');
            $query->execute(['id' => $id]);

            echo 'Prestation supprimée';
        } catch (PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }
}
