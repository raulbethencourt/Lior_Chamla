<?php

namespace Models;

require_once('libraries/database.php');

abstract class Model
{
    /**
     * Data for the Class
     *
     * @var PDO
     */
    protected $_pdo;
    protected $_table;


    /**
     * function construct
     */
    public function __construct()
    {
        $this->_pdo      = getPdo();
    }

    /**
     * Return item
     *
     * @param integer $id
     * @return array
     */
    public function find(int $id)
    {
        $query = $this->_pdo->prepare("SELECT * FROM {$this->_table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();

        return $item;
    }

    /**
     * Suprime un article de la liste
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $query = $this->_pdo->prepare("DELETE FROM {$this->_table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }

    /**
     * Retourne la liste des articles classés par date de création
     *
     * @return array
     */
    public function findAll(?string $order = ""): array
    {
        $sql = "SELECT * FROM {$this->_table}";
        
        if ($order) {
            $sql .= " ORDER BY " . $order;
        }
        
        $resultats = $this->_pdo->query($sql);
        // On fouille le résultat pour en extraire les données réelles
        $articles = $resultats->fetchAll();

        return $articles;
    }
}
