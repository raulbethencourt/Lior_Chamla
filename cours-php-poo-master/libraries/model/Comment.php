<?php

class Comment
{

    /**
     * Undocumented function
     *
     * @param integer $id
     * @return array
     */
    public function findAll(int $id): array
    {
        $pdo = getPdo();
        $query = $pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $id]);
        $commentaires = $query->fetchAll();
        return $commentaires;
    }

    /**
     * cherche un commentaire
     *
     * @param integer $id
     * @return array
     */
    public function find(int $id)
    {
        $pdo = getPdo();
        $query = $pdo->prepare('SELECT * FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
        $comment = $query->fetch();

        return $comment;
    }

    /**
     * suprime le commentaire
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $pdo = getPdo();
        $query = $pdo->prepare('DELETE FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
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
        $pdo = getPdo();
        $query = $pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }
}