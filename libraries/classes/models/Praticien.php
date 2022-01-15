<?php
require_once "libraries/classes/models/Model.php";

class Praticien extends Model
{
    /**
     * Retourne la liste des praticiens classés par leurs identifiants
     * 
     * @return array
     */

    public function findAll(): array
    {
        try {

            $resultats = $this->pdo->query('SELECT * FROM praticien ORDER BY id ');

            // On fouille le résultat pour en extraire les données réelles
            $praticiens = $resultats->fetchAll();

            return $praticiens;

            echo 'Tous les praticiens trouvés';
        } catch (PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }

    /** 
     * Retourne un praticien grâce à son identifiant
     * 
     * @param integer $id
     * @return array
     */

    public function find(int $id)
    {
        try {

            $query = $this->pdo->prepare("SELECT * FROM praticien WHERE id = :id_praticien");

            // On exécute la requête en précisant le paramètre :id_praticien
            $query->execute(['id_praticien' => $id]);

            //On fouille le résultat pour en extraire les données réelles du praticien
            $praticien = $query->fetch();

            return $praticien;

            echo 'Praticien trouvé';
        } catch (PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Supprime un praticien dans la base grâce à son identifiant
     * 
     * @param integer $id
     * @return void
     */

    public function delete(int $id): void
    {
        try {

            $query = $this->pdo->prepare('DELETE FROM praticien WHERE id = :id');
            $query->execute(['id' => $id]);

            echo 'Praticien supprimé';
        } catch (PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }
}
