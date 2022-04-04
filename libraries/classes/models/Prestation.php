<?php

namespace Models;




class Prestation extends Model
{
    protected $table = 'prestation';

    /** 
     * Retourne un item grâce à son identifiant
     * 
     * @param integer $id
     * 
     */
    public function findPrestations(int $id_praticien)
    {
        try { /* Essayer si cela fonctionne */

            $query = $this->pdo->prepare("SELECT nom, description, duree, prix FROM {$this->table} WHERE id_praticien =:session_id");

            // On exécute la requête en précisant le paramètre :id_praticien
            $query->execute(['session_id' => $id_praticien]);

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
