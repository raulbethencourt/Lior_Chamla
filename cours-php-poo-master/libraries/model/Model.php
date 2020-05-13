<?php

require_once('libraries/database.php');

class Model
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
    public function __construct($table)
    {
        $this->_pdo      = getPdo();
        $this->_table    = $table;
    }

    /**
     * Return item
     *
     * @param integer $id
     * @return array
     */
    public function find(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->_table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();

        return $item;
    }
}
