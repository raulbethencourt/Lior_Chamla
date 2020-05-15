<?php

namespace Models;

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
        $this->_pdo = \Dao::getPdo();
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
}
