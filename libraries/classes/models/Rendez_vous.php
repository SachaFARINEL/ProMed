<?php

namespace Models;

class Rendez_vous extends Model
{
    protected $table = 'rendez_vous';

    public function findRdv(int $id)
    {
        try { /* Essayer si cela fonctionne */
            date_default_timezone_set('Europe/Paris');
            $dateDuJour = date('Y-m-d H:i:s');
            // $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id_patient =:id AND dates >$dateDuJour");
            $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id_patient =:id AND date > NOW()");

            // dates > $dateDuJour and 
            // On exécute la requête en précisant le paramètre :id
            $query->execute(['id' => $id]);

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
