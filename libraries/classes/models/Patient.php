<?php

namespace Models;



class Patient extends Model
{
    protected $table = 'patient';

    public function PatientUpdate(array $data)
    {
        var_dump($data);
        die;
        extract($data);
        $setdata = "";
        $sql = "UPDATE {$this->table} SET ";
        foreach ($data as $key->$value) {
            $setdata .= $key . '=' . $value . ',';
        }

        $sql .= $data . "WHERE id= :id";

        try {
            $query = $this->pdo->prepare($sql);
            $query->execute(['id' => $data['id']]);
        } catch (\PDOException $e) {

            die('Erreur :' . $e->getMessage());
        }
    }
}
