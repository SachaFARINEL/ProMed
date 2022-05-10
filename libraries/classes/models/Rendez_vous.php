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

    public function findRdvLibreByDateAndIdPraticien(int $id, string $dateRdvVoulu)
    {
        try { /* Essayer si cela fonctionne */
            date_default_timezone_set('Europe/Paris');
            $dateDuJour = date('Y-m-d H:i:s');
            $tableauDesHoraires = ['9:00', '9:30', '10:00', '10:30', '11:00', '11:30', '12:00', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00'];
            // $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id_patient =:id AND dates >$dateDuJour");
            $query = $this->pdo->prepare("SELECT date FROM {$this->table} WHERE id_praticien =:id AND date LIKE '$dateRdvVoulu%'");

            // dates > $dateDuJour and 
            // On exécute la requête en précisant le paramètre :id
            $query->execute(['id' => $id]);

            //On fouille le résultat pour en extraire les données réelles de la table
            $item = $query->fetchAll();
            $heure = [];
            foreach ($item as $premierTableau) {
                foreach ($premierTableau as $horaire) {
                    $heure[] .= strftime("%H:%M", strtotime($horaire));
                }
            }
            // var_dump($heure);
            // exit;
            $horairesDispo = array_diff($tableauDesHoraires, $heure);

            // On retourne (principe d'une fonction) ce que l'on à trouvé.
            return $horairesDispo;

            //On affiche à l'écran un message (pour le développement)
            echo "$this->table trouvé";
        } catch (\PDOException $e) { /* Sinon afficher l'erreur en question */
            /* Dans ce cas j'utilise '\PDOException' à la place de 'PDOException' car 
            nous sommes dans un namespace. PDOException n'est donc pas défini ici*/
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function retourneRdvPatient(int $id_patient, $signe)
    {
        try {

            date_default_timezone_set('Europe/Paris');
            $dateDuJour = date('Y-m-d H:i:s');

            // $query = $this->pdo->prepare("SELECT * FROM rendez_vous JOIN id_praticien ON 
            // id_praticien.rendez_vous = id_praticien.praticien AND JOIN id_prestation 
            // ON id_prestation.rendez_vous = id.prestation WHERE date =< NOW() AND id_patient =:sessionid");
            $query = $this->pdo->prepare("SELECT * FROM rendez_vous JOIN praticien 
            ON rendez_vous.id_praticien=praticien.id
            JOIN prestation
            ON rendez_vous.id_prestation=prestation.id
            WHERE date $signe NOW()
            AND id_patient = :id_patient");

            $query->execute([':id_patient' => $id_patient]);
            $item = $query->fetchAll();
            return $item;
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
