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

        $this->model->insert(compact(
            'nom',
            'description',
            'prix',
            'duree',
        ));
    }
}
