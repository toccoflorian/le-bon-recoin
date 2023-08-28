<?php

$authentificator = require_once __DIR__ . '/database/security.php';

$articles = $authentificator->fetchAllArticles();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>

<body>
    <div class="content">
        <div class="container">
            <?php foreach ($articles as $article) : ?>
                <div class="article">
                    <h2><?= $article['title'] ?></h2>
                    <p><?= $article['state'] ?> | <?= $article['price'] ?> €</p>
                    <br><br>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</body>
</html>