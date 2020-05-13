
<?php

require_once('libraries/model/Model.php');

class Article extends Model
{
    /**
     * Retourne la liste des articles classés par date de création
     *
     * @return array
     */
    public function findAll(): array
    {        
        // On utilisera ici la méthode query (pas besoin de préparation car aucune variable n'entre en jeu)
        $resultats = $this->pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
        // On fouille le résultat pour en extraire les données réelles
        $articles = $resultats->fetchAll();

        return $articles;
    }

  

    /**
     * Suprime un article de la liste
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $query = $this->pdo->prepare('DELETE FROM articles WHERE id = :id');
        $query->execute(['id' => $id]);
    }
}
