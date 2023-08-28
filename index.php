<?php


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $JSText = $_POST['text'];
//     echo 'Données reçus dans le php: ' . $JSText;
// } else {
//     $messageEnvoyer = "Depuis le php: ok !!!";
//     echo $messageEnvoyer;
// }


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Appli</title>
    <link rel="stylesheet" href="./public/css/styles.css">
    <link rel="stylesheet" href='./public/css/index.css'>
    </link>
    <!-- <link rel="stylesheet" href="./public/fonts/Smasher\ 312\ Custom.ttf"> -->
</head>

<body>
    <div class="content">
        <h1>BIENVENUE</h1>
        <div class="container">

            <div class="icon" id="register">
                <h2>Inscription</h2>
            </div>

            <div class="icon" id="edit">
                <h2>Editer une annonce</h2>
            </div>

            <div class="icon" id="profil">
                <h2>Mon profil</h2>
            </div>

            <div class="icon" id="login">
                <h2>Se connecter</h2>
            </div>

            <div class="icon" id="logout">
                <h2>Se deconnecter</h2>
            </div>

            <div class="icon" id="articles">
                <h2>Les Articles</h2>
            </div>



        </div>

        <script src="./public/js/index.js"></script>

    </div>
</body>

</html>