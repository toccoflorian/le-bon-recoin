<?php

$authentificator = require_once __DIR__ . '/database/security.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_POST = filter_input_array(INPUT_POST, [
        'email' => FILTER_SANITIZE_EMAIL,
        'password' => null
    ]);

    $email = $_POST['email'];
    $password = $_POST['password'];

    $authentificator->login($email, $password);
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="content">
        <div class="container">

            <h1>Connexion</h1>

            <form action="">

                <label for="email">Email</label>
                <input type="text" name="email" id="email">

                <br><br>

                <label for="password">Mot de passe</label>
                <input type="text" name="password" id="password">

                <br><br>

                <button id="register">Je n'ai pas de compte.</button>
                <button id="submit">Valider</button>

            </form>

            <script src="./public/js/login.js"></script>
        </div>
    </div>
</body>

</html>