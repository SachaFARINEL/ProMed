<?php
require_once "libraries/classes/Database.php";

class Model
{

    /**
     * Déclaration de mon attribut proteced (héritage pour les classes) $pdo afin de gérer l'accès à la base de donné dans toutes mes Classes
     */
    protected $pdo;

    /**
     * Création de mon constructeur
     */

    public function __construct()
    {
        $this->pdo = getPdo();
    }
}
