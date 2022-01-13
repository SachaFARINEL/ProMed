<?php

/**
 * Retourne une connexion à la base de donnée
 */

function connexionPDO(): PDO
{
    $login = "root";
    $mdp = "";
    $bd = "db_promed";
    $serveur = "localhost";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
    ];

    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, $options);
        return $conn;
    } catch (PDOException $e) {

        die('Erreur : ' . $e->getMessage());
    }
}
