<?php

namespace Models;




class Prestation extends Model
{
    protected $table = 'prestation';

    /** 
     * à supprimer Elouan s'il te plaît ...
     * 
     */
    public function updatePraticien($id, $nom_prestation, $description, $prix)
    {
        try {

            $query = $this->pdo->prepare("UPDATE praticien SET  nom_prestation= :nom_prestation, description= :description, prix= :prix WHERE id =:id");

            $query->execute(array('id' => $id, 'nom_prestation' => $nom_prestation, 'description' => $description, 'prix' => $prix));


            echo "$this->table modifié";
        } catch (\PDOException $e) {


            die('Erreur : ' . $e->getMessage());
        }
    }
}
