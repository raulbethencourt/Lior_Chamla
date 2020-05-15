<?php

namespace Models;

require_once('libraries/models/Model.php');

class Comment extends Model
{
    protected $_table = 'comments';

    /**
     * find comment
     *
     * @param integer $id
     * @return array
     */
    public function findAll(int $id): array
    {
        $query = $this->_pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $id]);
        $commentaires = $query->fetchAll();
        return $commentaires;
    }

    /**
     * Insert a comment
     *
     * @param string $author
     * @param string $content
     * @param integer $article_id
     * @return void
     */
    public function insert(string $author, string $content, int $article_id): void
    {
        $query = $this->_pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }
}
