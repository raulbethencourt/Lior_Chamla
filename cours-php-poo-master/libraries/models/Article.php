<?php

namespace Models;

require_once('libraries/models/Model.php');

class Article extends Model
{
    /**
     * Data for Model methods
     *
     * @var string
     */
    protected $_table = 'articles';

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
