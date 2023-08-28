<?php

$authentificator = require_once __DIR__ . '/database/security.php';

$user = $authentificator->isLogged();

if (!$user) {
    header('location: /');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon profil</title>
</head>

<body>
    <h1>Profil</h1>
    <h2>Infos: <?= $user['name'] ?> , <?= $user['email'] ?>, type <?= gettype($user) ?></h2>

</body>

</html>