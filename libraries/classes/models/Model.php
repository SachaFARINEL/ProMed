<?php

namespace Models;



abstract class Model
{

    /**
     * Déclaration de mes attributs protected (héritage pour les classes) 
     */
    protected $pdo; // Connexion à la base de donnée
    protected $table; // Indiquer sur quelle table nous voulons SELECT / INSERT INTO

    /**
     * Création de mon constructeur
     */

    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }

    /** 
     * Retourne un item grâce à son identifiant
     * 
     * @param integer $id
     * 
     */
    public function find(int $id)
    {
        try { /* Essayer si cela fonctionne */

            $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id =:id");

            // On exécute la requête en précisant le paramètre :id
            $query->execute(['id' => $id]);

            //On fouille le résultat pour en extraire les données réelles de la table
            $item = $query->fetch();

            // On retourne (principe d'une fonction) ce que l'on à trouvé.
            return $item;

            //On affiche à l'écran un message (pour le développement)
            echo "$this->table trouvé";
        } catch (\PDOException $e) { /* Sinon afficher l'erreur en question */
            /* Dans ce cas j'utilise '\PDOException' à la place de 'PDOException' car 
            nous sommes dans un namespace. PDOException n'est donc pas défini ici*/
            die('Erreur : ' . $e->getMessage());
        }
    }


    /**
     * Supprime une entrée dans la base grâce à son identifiant
     * 
     * @param integer $id
     * @return void
     */

    public function delete(int $id): void
    {
        try {

            $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id =:id");
            $query->execute(['id' => $id]);

            echo "$this->table supprimé";
        } catch (\PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }

    public function checkAuth(string $mail)
    {
        try {

            $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE mail =:mail");

            $query->execute(['mail' => $mail]);

            //On fouille le résultat pour en extraire les données réelles de la table
            $item = $query->fetch();

            // On retourne (principe d'une fonction) ce que l'on à trouvé.
            return $item;


            echo "Requète trouvée";
        } catch (\PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }

    public function insert(array $data): void
    {

        // 1. Création de la chaine SQL
        // Exemple : INSERT INTO patient (
        $sql = "INSERT INTO {$this->table} (";

        // 2. Récupération du nom des champs
        $fields = array_keys($data);

        // 3. On ajoute les fields à la requête
        // Exemple : INSERT INTO patient (title, slug) VALUES (
        $sql .= implode(",", $fields) . ") VALUES (";

        // 4. On créé les paramètres PDO
        $params = array_map(function ($field) {
            return ":$field";
        }, $fields);
        $sql .= implode(", ", $params) . ")";

        // 5. On prépare et on exécute la requête
        try {
            $query = $this->pdo->prepare($sql);
            $query->execute($data);

            echo "$this->table ajouté";
        } catch (\PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Retourne la liste des item classés ou non par $order.
     * 
     * @return array
     */
    public function findAll(?string $order = ""): array
    /* ?string signifie variable string non obligatoire, utile ici si l'on n'a pas besoin de classer nos résultats */
    {
        $sql = "SELECT * FROM {$this->table}";

        if ($order) {
            $sql .= " ORDER BY " . $order;
        }
        try {

            $resultats = $this->pdo->query($sql);

            // On fouille le résultat pour en extraire les données réelles
            $items = $resultats->fetchAll();

            return $items;

            echo "Toute la table $this->table trouvé";
        } catch (\PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }

    /** 
     * Retourne le dernier id crée
     * 
     * @param integer $id
     * 
     */
    public function findLastInsertId()
    {
        try { /* Essayer si cela fonctionne */

            $resultat = $this->pdo->query("SELECT LAST_INSERT_ID() as id_user"); //Utilisation d'un alias sinon c'est chiant

            // On exécute la requête en précisant le paramètre :id

            //On fouille le résultat pour en extraire les données réelles de la table
            $item = $resultat->fetch();

            // On retourne (principe d'une fonction) ce que l'on à trouvé.
            return $item;

            //On affiche à l'écran un message (pour le développement)
            echo "$this->table trouvé";
        } catch (\PDOException $e) { /* Sinon afficher l'erreur en question */
            /* Dans ce cas j'utilise '\PDOException' à la place de 'PDOException' car 
            nous sommes dans un namespace. PDOException n'est donc pas défini ici*/

            die('Erreur : ' . $e->getMessage());
        }
    }

    public function findByName(string $dataUser)
    {
        try { /* Essayer si cela fonctionne */

            $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE nom LIKE '$dataUser%' OR prenom LIKE '$dataUser%'");

            // On exécute la requête en précisant le paramètre :id
            $query->execute(['dataUser' => $dataUser]);

            //On fouille le résultat pour en extraire les données réelles de la table
            $item = $query->fetchAll();
            // On retourne (principe d'une fonction) ce que l'on à trouvé.
            return $item;
            //On affiche à l'écran un message (pour le développement)
            echo "$this->table trouvé";
        } catch (\PDOException $e) { /* Sinon afficher l'erreur en question */
            /* Dans ce cas j'utilise '\PDOException' à la place de 'PDOException' car 
            nous sommes dans un namespace. PDOException n'est donc pas défini ici*/

            die('Erreur : ' . $e->getMessage());
        }
    }
}
