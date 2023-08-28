<?php



try {
    $pdo = new PDO('mysql:host=127.0.0.1:3306;dbname=e-commerce;', 'root', '45222254');
} catch (PDOException $error) {
    print_r($error->getMessage());
}

return $pdo;
