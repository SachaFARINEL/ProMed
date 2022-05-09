<?php

namespace Models;



class Adresse extends Model
{
    protected $table = 'adresse';

    public function findAdresseById($role, int $id)
    {
        try {

            $query = $this->pdo->prepare("SELECT * FROM {$this->table} A JOIN $role P ON A.id_user=P.id WHERE `id_user`=:id AND role = :role");

            $query->execute([':id' => $id, 'role' => $role]);

            $item = $query->fetchAll();

            return $item;

            echo "$this->table trouvé";
        } catch (\PDOException $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }
}
