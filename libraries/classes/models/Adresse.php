<?php

namespace Models;



class Adresse extends Model
{
    protected $table = 'adresse';

    /** 
     * Permet de retourner une adresse grâce au rôle de l'utilisateur et à son identifiant
     * 
     * @param string $role
     * @param integer $id
     * @return array
     * 
     */
    public function findAdresseById($role, int $id)
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM {$this->table} A JOIN $role P ON A.id_user=P.id WHERE `id_user`=:id AND role = :role");
            $query->execute([':id' => $id, 'role' => $role]);
            $items = $query->fetchAll();
            return $items;
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function findAdresseWithRole($role, int $id)
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE `id_user`=:id AND role = :role");
            $query->execute([':id' => $id, 'role' => $role]);
            $items = $query->fetchAll();
            return $items;
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
