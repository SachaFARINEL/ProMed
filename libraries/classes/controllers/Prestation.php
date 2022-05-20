<?php

namespace Controllers;


class Prestation extends Controller
{
    protected $modelName = "Prestation";

    function addPrestation()
    {
        session_start(); //Besoin pour l'id praticien
        $nom_prestation = filter_input(INPUT_POST, 'nom_prestation', FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        $prix = filter_input(INPUT_POST, 'prix', FILTER_SANITIZE_EMAIL);

        $id_praticien = $_SESSION["id"];
        $this->model->insert(compact(
            'nom_prestation',
            'description',
            'prix',

            'id_praticien',
        ));
        \Http::redirect('?controller=praticien&task=profilPraticien');
    }

    function afficherPrestation()
    {
        session_start();
        $donnesPrestation = $this->model->findAll($_SESSION['id']);
        $prestationModel = new \Models\Prestation();
        $donnesPrestations = $prestationModel->findAll('id_praticien', $_SESSION['id']);
        $pageTitle = "Prestation";
        \Renderer::render('modifPrestation', compact('pageTitle', 'donnesPraticien', 'donnesPrestations'));
    }
}
