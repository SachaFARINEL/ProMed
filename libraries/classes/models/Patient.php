<?php

namespace Models;



class Patient extends Model
{
    protected $table = 'patient';


    public function findPatientByName(string $nom)
    {
        try { /* Essayer si cela fonctionne */

            $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE nom =:nom");

            // On exécute la requête en précisant le paramètre :id
            $query->execute(['nom' => $nom]);

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
