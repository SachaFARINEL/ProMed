<?php

namespace Controllers;


class Adresse extends Controller
{
  protected $modelName = "Adresse";

  function save()
  {
    //Adresse
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_SPECIAL_CHARS);
    $type_de_voie = filter_input(INPUT_POST, 'type_de_voie', FILTER_SANITIZE_SPECIAL_CHARS);
    $adresse = filter_input(INPUT_POST, 'adresse', FILTER_SANITIZE_SPECIAL_CHARS);
    $code_postal = filter_input(INPUT_POST, 'code_postal', FILTER_SANITIZE_NUMBER_INT);
    $ville = filter_input(INPUT_POST, 'ville', FILTER_SANITIZE_SPECIAL_CHARS);
    $departement = filter_input(INPUT_POST, 'departement', FILTER_SANITIZE_SPECIAL_CHARS);
    $pays = filter_input(INPUT_POST, 'pays', FILTER_SANITIZE_SPECIAL_CHARS);

    $this->model->insert(compact(
      'numero',
      'type_de_voie',
      'adresse',
      'code_postal',
      'ville',
      'departement',
      'pays',
    ));


    \Http::redirect('?controller=praticien&task=afficherMonProfil');
  }
}
