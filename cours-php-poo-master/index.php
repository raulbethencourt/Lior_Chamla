<?php

/**
 * CE FICHIER A POUR BUT D'AFFICHER LA PAGE D'ACCUEIL !
 * 
 * On va donc se connecter à la base de données, récupérer les articles du plus récent au plus ancien (SELECT * FROM articles ORDER BY created_at DESC)
 * puis on va boucler dessus pour afficher chacun d'entre eux
 */
require_once('libraries/database.php');
require_once('libraries/utils.php');
require_once('libraries/model/Article.php');

$modelA = new Article('articles');

/**
 * 2. Récupération des articles
 */
$articles = $modelA->findAll();

/**
 * 3. Affichage
 */
$pageTitle = "Accueil";

render('articles/index', compact('pageTitle', 'articles'));
