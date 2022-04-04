<?php

namespace Controllers;


class Prestation extends Controller
{
    protected $modelName = "Prestation";

    function addPrestation()
    {
        session_start(); //Besoin pour l'id praticien
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        $prix = filter_input(INPUT_POST, 'prix', FILTER_SANITIZE_EMAIL);
        $duree = filter_input(INPUT_POST, 'duree', FILTER_SANITIZE_EMAIL);
        $id_praticien = $_SESSION["id"];
        $this->model->insert(compact(
            'nom',
            'description',
            'prix',
            'duree',
            'id_praticien',
        ));
        \Http::redirect('?controller=praticien&task=afficherMonProfil');
    }
}
