<?php

/**
 * Returne une connecion à la base de données
 *
 * @return PDO
 */
function getPdo(): PDO
{
    $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'lutherblissett', 'Murcielago7-443', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
}


