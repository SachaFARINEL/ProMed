<?php

namespace Models;



class Praticien extends Model
{
    protected $table = 'praticien';

    /** 
     * à supprimer Elouan s'il te plaît ...
     * 
     */
    public function updatePraticien($id, $nom, $prenom, $mail, $profession, $tel, $num_adelie, $nom_cabinet)
    {
        try {

            $query = $this->pdo->prepare("UPDATE praticien SET  nom= :nom, prenom= :prenom, mail= :mail, profession= :profession, tel= :tel, num_adelie= :num_adelie, nom_cabinet= :nom_cabinet WHERE id =:id");

            $query->execute(array('id' => $id, 'nom' => $nom, 'prenom' => $prenom, 'mail' => $mail, 'profession' => $profession, 'tel' => $tel, 'num_adelie' => $num_adelie, 'nom_cabinet' => $nom_cabinet));


            echo "$this->table modifié";
        } catch (\PDOException $e) {


            die('Erreur : ' . $e->getMessage());
        }
    }

    /** 
     * à supprimer Elouan s'il te plaît ...
     * 
     */
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
