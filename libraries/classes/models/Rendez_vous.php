<?php

namespace Models;

class Rendez_vous extends Model
{
    protected $table = 'rendez_vous';

    /** 
     * Trouver un rendez-vous patient grâce à son id ($_SESSION)
     * 
     * @param integer $id
     * @return array
     */
    public function findRdv(int $id)
    {
        try {
            date_default_timezone_set('Europe/Paris');
            $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id_patient =:id AND date > NOW()");
            $query->execute(['id' => $id]);
            $item = $query->fetchAll();
            return $item;
            echo "$this->table trouvé";
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /** 
     * Trouver un rendez-vous de libre lors de la prise de rendez-vous avec l'id du praticien désiré et la date choisis
     * 
     * @param integer $id
     * @param string $dateRdvVoulu
     * @return array 
     */
    public function findRdvLibreByDateAndIdPraticien(int $id, string $dateRdvVoulu)
    {
        try {
            date_default_timezone_set('Europe/Paris');
            $tableauDesHoraires = ['09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00'];
            $query = $this->pdo->prepare("SELECT date FROM {$this->table} WHERE id_praticien =:id AND date LIKE '$dateRdvVoulu%'");
            $query->execute(['id' => $id]);
            $item = $query->fetchAll();
            $heure = [];
            foreach ($item as $premierTableau) {
                foreach ($premierTableau as $horaire) {
                    $heure[] .= strftime("%H:%M", strtotime($horaire));
                }
            }
            $horairesDispo = array_diff($tableauDesHoraires, $heure);
            return $horairesDispo;
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /** 
     * Retourner l'ensemble des rendez-vous du patient grâce à son $_SESSION['id'] et la période désirée (Rendez-vous passés ou à venir, en fonction du signe)
     * 
     * @param integer $id
     * @param string $signe
     * 
     * @return array 
     */
    public function retourneRdvPatient(int $id_patient, $signe)
    {
        try {
            date_default_timezone_set('Europe/Paris');
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

    /** 
     * Update un rendez-vous avec l'id patient, l'id praticien et la date désiré
     * 
     * @param integer $id
     * @param string $signe
     * 
     * @return array 
     */
    public function annulerUnRDV(int $id_patient, int $id_praticien, string $date)
    {
        try {
            $query = $this->pdo->prepare("UPDATE {$this->table} SET `isAnnule` = 1 WHERE id_patient = :id_patient AND id_praticien = :id_praticien AND date = :date");
            $query->execute([':id_patient' => $id_patient, ':id_praticien' => $id_praticien, ':date' => $date]);
        } catch (\PDOException $e) {
            die('Erreur :' . $e->getMessage());
        }
    }
}
