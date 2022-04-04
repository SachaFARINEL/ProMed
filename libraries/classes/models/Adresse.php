<?php

namespace Models;



class Adresse extends Model
{
    protected $table = 'adresse';

    /** 
     * Retourne un toutes les informations de la table adresse avec l'id d'un utilisateur
     * 
     * @param integer $id
     * 
     */
    public function findAdresse(int $id)
    {
        try { /* Essayer si cela fonctionne */

            $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id_user =:id");

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
}
