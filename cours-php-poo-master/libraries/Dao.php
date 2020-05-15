<?php

class Dao
{
    // On crée ce propriété pour pouvoir faire le pattern singleton
    private static $instance = null;

    /**
     * Returne une connecion à la base de données
     *
     * @return PDO
     */
    public static function getPdo(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'lutherblissett', 'Murcielago7-443', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }
       
        return self::$instance;
    }
}
