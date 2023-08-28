<?php

$pdo = require_once __DIR__ . '/database/database.php';
$authentificator = require_once __DIR__ . '/database/security.php';

$user = $authentificator->isLogged();

if (!$user) {
    header('location: /');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, [
        'title' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'category' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'state' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'description' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'price' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);
    $article = $_POST;

    $statement = $pdo->prepare('INSERT INTO articles (
        title, 
        category, 
        state, 
        price, 
        description,
        author
        ) VALUES (
            :title, 
            :category, 
            :state, 
            :price, 
            :description,
            :author
            )');
    $statement->bindValue(':title', $_POST['title']);
    $statement->bindValue(':category', $_POST['category']);
    $statement->bindValue(':state', $_POST['state']);
    $statement->bindValue(':price', $_POST['price']);
    $statement->bindValue(':description', $_POST['description']);
    $statement->bindValue(':author', $user['id']);
    $statement->execute();
    echo 'article enregistré';
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale</title>
    <link rel="stylesheet" href="./public/css/styles.css">
    <link rel="stylesheet" href="./public/css/home-sale.css">
</head>

<body>
    <header>
        <div class="header-container">
            <p>Mon Profil</p>
            <p>Mes Annonces</p>
            <p>Nouvelle Annonce</p>
            <p>Déconnexion</p>
        </div>
    </header>
    <div class="content">
        <div class="container">
            <form action="">

                <label for="title">Nom de l'article</label><br>
                <input type="text" name="title" id="title" value="skate"><br><br>

                <label for="category">Categorie</label><br>
                <input type="text" name="category" id="category" value="sport"><br><br>

                <label for="state">Etat</label><br>
                <input type="text" name="state" id="state" value="moyen"><br><br>

                <label for="price">Prix</label><br>
                <input type="text" name="price" id="price" value="75"><br><br>

                <label for="description">Description</label><br>
                <textarea type="textarea" name="description" id="description">Super skate qui roule et qui jump</textarea><br><br>

                <button>Submit</button>
            </form>
            <script src="/public/js/create-article.js"></script>
        </div>
    </div>
</body>

</html>