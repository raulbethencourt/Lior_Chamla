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

/**
 * Retourne la liste des articles classés par date de création
 *
 * @return array
 */
function findAllArticles(): array
{
    $pdo = getPdo();
    // On utilisera ici la méthode query (pas besoin de préparation car aucune variable n'entre en jeu)
    $resultats = $pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
    // On fouille le résultat pour en extraire les données réelles
    $articles = $resultats->fetchAll();

    return $articles;
}

/**
 * Returne
 *
 * @param integer $id
 * @return array
 */
function findArticle(int $id)
{
    $pdo = getPdo();
    $query = $pdo->prepare("SELECT * FROM articles WHERE id = :article_id");

    // On exécute la requête en précisant le paramètre :article_id 
    $query->execute(['article_id' => $id]);

    // On fouille le résultat pour en extraire les données réelles de l'article
    $article = $query->fetch();

    return $article;
}

/**
 * Undocumented function
 *
 * @param integer $id
 * @return array
 */
function findAllComments(int $id): array
{
    $pdo = getPdo();
    $query = $pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
    $query->execute(['article_id' => $id]);
    $commentaires = $query->fetchAll();
    return $commentaires;
}

/**
 * Suprime un article de la liste
 *
 * @param integer $id
 * @return void
 */
function deletArticle(int $id): void
{
    $pdo = getPdo();
    $query = $pdo->prepare('DELETE FROM articles WHERE id = :id');
    $query->execute(['id' => $id]);
}

/**
 * cherche un commentaire
 *
 * @param integer $id
 * @return array
 */
function findComment(int $id)
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
function deletComment(int $id): void
{
    $pdo = getPdo();
    $query = $pdo->prepare('DELETE FROM comments WHERE id = :id');
    $query->execute(['id' => $id]);
}


function insertComment(string $author, string $content, int $article_id): void
{
    $pdo = getPdo();
    $query = $pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
    $query->execute(compact('author', 'content', 'article_id'));
}
