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
     * Retourne un résultat d'items grâce à son identifiant et indiquant dans quel colonne nous cherchons l'id
     * 
     * @param string $colonne
     * @param integer $id
     * 
     * @return array
     */
    public function find($colonne, int $id)
    {
        try { /* Essayer si cela fonctionne */

            /* Afin de sécuriser au maximum notre application, avant d'injecter directement le résultat de la variable colonne,
            nous pourrions créer une "white list" des posibilités sous la forme : 

                $allowed = ['id', 'nom', ...];

                if (!in_array($colonne, $allowed)) {
                throw new Exception("Invalid column name");
                }
                */
            $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE $colonne = :id");
            // On exécute la requête en précisant le paramètre :id
            $query->execute([':id' => $id]);

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
     * Retourne plusieurs tableaux d'items grâce à son identifiant et indiquant dans quel colonne nous cherchons l'id
     * 
     * @param string $colonne
     * @param integer $id
     * 
     * @return array
     */
    public function findWithFetchAll($colonne, int $id)
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE $colonne = :id");
            $query->execute([':id' => $id]);
            $items = $query->fetchAll();
            return $items;
            echo "$this->table trouvé";
        } catch (\PDOException $e) {
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
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Comparer dans la base la ligne ayant le même mail que l'input utilisateur et retourne l'ensemble de cette ligne (afin de comparer les mots de passes)
     * 
     * @param string $mail
     * @return array
     */
    public function checkAuth(string $mail)
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE mail =:mail");
            $query->execute(['mail' => $mail]);
            $item = $query->fetch();
            return $item;
            echo "Requète trouvée";
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Permet d'insérer dans la base de donnée une array de data
     * 
     * @param array $data
     * @return void
     */
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
        } catch (\PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Retourne la liste des item classés ou non par $order.
     * 
     * @param string $order
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
            $items = $resultats->fetchAll();
            return $items;
            echo "Toute la table $this->table trouvé";
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /** 
     * Retourne le dernier id crée (sert dans la création de ligne dans la table adresse pour indiquer l'id_utilisateur)
     * 
     * @return integer id
     * 
     */
    public function findLastInsertId()
    {
        try {
            $resultat = $this->pdo->query("SELECT LAST_INSERT_ID() as id_user"); //Utilisation d'un alias sinon c'est chiant
            $item = $resultat->fetch();
            return $item;
            echo "$this->table trouvé";
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /** 
     * Retourne l'ensemble des utilisateurs où le nom commence par $datauser
     * 
     * @param string $dataUser
     * @return array
     * 
     */
    public function findByName(string $dataUser)
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE nom LIKE '$dataUser%' OR prenom LIKE '$dataUser%' ORDER BY `nom`");
            $query->execute(['dataUser' => $dataUser]);
            $item = $query->fetchAll();
            return $item;
            echo "$this->table trouvé";
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /** 
     * Retourne les patients du praticien actif
     * 
     * @param string $dataUser
     * @param integer $idUser
     * 
     * @return array
     * 
     */
    public function findMyPatients(string $dataUser, int $idUser)
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM patient JOIN rendez_vous ON patient.id=rendez_vous.id_patient WHERE 'id_praticien' = :id_praticien AND nom LIKE '$dataUser%' OR prenom LIKE '$dataUser%' ORDER BY `nom`");
            $query->execute(['id_praticien' => $idUser, 'dataUser' => $dataUser]);
            $item = $query->fetchAll();
            return $item;
            echo "$this->table trouvé";
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /** 
     * Met à jour les données passée en argument dans la base de donnée
     * 
     * @param array $data
     * 
     * @return void
     * 
     */
    public function update(array $data)
    {
        $isUpdated = null;
        $setData = [];
        $sql = "UPDATE {$this->table} SET ";
        foreach ($data as $key => $value) {

            $setData[] .= $key . ' = ' . '"' . $value . '"';
        }
        $setData = implode(',', $setData);
        $sql .= $setData . " WHERE id = :id";
        try {
            $query = $this->pdo->prepare($sql);
            $query->execute([':id' => $data['id']]);

            $isUpdated = true;
        } catch (\PDOException $e) {
            $isUpdated = false;
            die('Erreur :' . $e->getMessage());
        }
        return $isUpdated;
    }

    /** 
     * Met à jour les données passée en argument dans la base de donnée avec un ID
     * 
     * @param array $data
     * 
     * @return void
     * 
     */
    public function updateWithId(array $data, $idUser, $role)
    {
        $isUpdated = null;
        $setData = [];

        $sql = "UPDATE {$this->table} SET ";
        foreach ($data as $key => $value) {

            $setData[] .= $key . ' = ' . "'" . $value . "'";
        }
        $setData = implode(',', $setData);
        $sql .= $setData . " WHERE `id_user` = :id AND `role` = '" . $role . "'";
        // var_dump($sql);
        // exit;
        try {
            $query = $this->pdo->prepare($sql);
            $query->execute([':id' => $idUser]);
            $isUpdated = true;
        } catch (\PDOException $e) {
            $isUpdated = false;
            die('Erreur :' . $e->getMessage());
        }
        return $isUpdated;
    }
}
