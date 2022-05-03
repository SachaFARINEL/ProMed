<?php

namespace Models;



class Praticien extends Model
{
    protected $table = 'praticien';

    public function findPraticienByName(string $dataUser)
    {
        try { /* Essayer si cela fonctionne */

            $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE nom LIKE '$dataUser%'");

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
    public function updatePraticien($id, $nom, $prenom, $mail, $profession, $tel, $num_adelie)
    {
        try {

            $query = $this->pdo->prepare("UPDATE praticien SET  nom= :nom, prenom= :prenom, mail= :mail, profession= :profession, tel= :tel, num_adelie= :num_adelie WHERE id =:id");

            $query->execute(array('id' => $id, 'nom' => $nom, 'prenom' => $prenom, 'mail' => $mail, 'profession' => $profession, 'tel' => $tel, 'num_adelie' => $num_adelie));





            echo "$this->table modifié";
        } catch (\PDOException $e) {


            die('Erreur : ' . $e->getMessage());
        }
    }

    public function updatePraticien2(array $data): void
    {

        // 1. Création de la chaine SQL
        // Exemple : INSERT INTO patient (
        $sql = "UPDATE {$this->table} (";

        // 2. Récupération du nom des champs
        $fields = array_keys($data);

        // 3. On ajoute les fields à la requête
        // Exemple : INSERT INTO patient (title, slug) VALUES (
        $sql .= implode(",", $fields);

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
}
