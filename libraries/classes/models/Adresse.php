<?php
require_once "libraries/classes/models/Model.php";

class Adresse extends Model
{
    /**
     * Retourne la liste des adresses classés par leurs identifiants
     * 
     * @return array
     */

    public function findAll(): array
    {
        try {

            $resultats = $this->pdo->query('SELECT * FROM adresse ORDER BY id ');

            // On fouille le résultat pour en extraire les données réelles
            $adresses = $resultats->fetchAll();

            return $adresses;

            echo 'Toutes les adresses trouvées';
        } catch (PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }

    /** 
     * Retourne une adresse grâce à son identifiant
     * 
     * @param integer $id
     * @return array
     */

    public function find(int $id)
    {
        try {

            $query = $this->pdo->prepare("SELECT * FROM adresse WHERE id = :id_adresse");

            // On exécute la requête en précisant le paramètre :id_adresse
            $query->execute(['id_adresse' => $id]);

            //On fouille le résultat pour en extraire les données réelles de l'adresse
            $adresse = $query->fetch();

            return $adresse;

            echo 'Adresse trouvée';
        } catch (PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Supprime un adresse dans la base grâce à son identifiant
     * 
     * @param integer $id
     * @return void
     */

    public function delete(int $id): void
    {
        try {

            $query = $this->pdo->prepare('DELETE FROM adresse WHERE id = :id');
            $query->execute(['id' => $id]);

            echo 'Adresse supprimée ';
        } catch (PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }
}
