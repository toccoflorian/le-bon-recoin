<?php

$authentificator = require_once __DIR__ . '/database/security.php';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, [
        'name' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
        'password' => null
    ]);
    $newUser = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ];
    $authentificator->register($newUser);
}



?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <div class="content">
        <div class="container">

            <h1>Inscription</h1>

            <form action="">

                <label for="name">Nom</label>
                <input type="text" name="name" id="name">

                <br><br>

                <label for="email">Email</label>
                <input type="text" name="email" id="email">

                <br><br>

                <label for="password">Mot de passe</label>
                <input type="text" name="password" id="password">

                <br><br>

                <button>Valider</button>

            </form>
            <p>
                <?php if ($errors) {
                    foreach ($error as $errors) {
                        echo $error;
                    }
                }
                ?>
            </p>

            <script src="./public/js/register.js"></script>
        </div>
    </div>
</body>

</html>