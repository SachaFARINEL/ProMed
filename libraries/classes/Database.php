<?php

class Database
{
    // Création du singleton
    private static $instance = null;
    /**
     * Retourne une instance de PDO
     * Attention, on précise ici deux options :
     * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir violament quand on fait une connerie ;-)
     * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
     *
     * @param integer $errorMode Une constante de PDO pour le mode d'erreur (par défaut ERRMODE_EXCEPTION)
     * @param integer $fetchMode Une constante de PDO pour le mode d'exploitation (par défaut FETCH_ASSOC)
     * @param integer $innitCommand Une constante de PDO pour afficher les caractères spéciaux propre à la langue française.
     * 
     * 
     * @return PDO
     */
    public static function getPdo(): PDO
    {
        $login = "dev";
        $loginHome = "root";
        $mdp = "SuperUser@sio56";
        $mdpHome = "";
        $bd = "gr3";
        $bdHome = "db_promed";
        $serveur = "172.16.120.2";
        $serveurHome = "localhost";
        $port = "3307";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ];
        try {
            if (self::$instance === null) {
                self::$instance = new PDO("mysql:host=$serveur;port=$port;dbname=$bd", $login, $mdp, $options);
                // self::$instance = new PDO("mysql:host=$serveurHome;dbname=$bdHome", $loginHome, $mdpHome, $options);
            }
            return self::$instance;
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
