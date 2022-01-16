<?php

namespace Controllers;

class Praticien extends Controller
{
    protected $modelName = "Praticien";

    public function show()
    {
        $pageTitle = 'Espace praticien';
        \Renderer::render('praticien', compact('pageTitle'));
    }

    public function index()
    {
        $pageTitle = 'Espace praticien';
        \Renderer::render('accueil', compact('pageTitle'));
    }

    public function inscription()
    {
        $pageTitle = "Formulaire d'inscription Praticien";
        \Renderer::render('formulairePraticien', compact('pageTitle'));
    }
}
