
<?php

require_once __DIR__ . '/database.php';

class Authentificator
{
    private PDOStatement $registerStatement;
    private PDOStatement $fetchUsersStatement;
    private PDOStatement $getSessionsStatement;
    private PDOStatement $fetchArticlesStatement;

    function __construct(private $pdo)
    {
        $this->pdo = $pdo;
        $this->registerStatement = $pdo->prepare('INSERT INTO users (
            id, 
            name, 
            email, 
            password
            ) VALUES (
                DEFAULT,
                :name,
                :email, 
                :password
            )');
        $this->fetchUsersStatement = $pdo->prepare('SELECT * FROM users WHERE id=:id');
        $this->getSessionsStatement = $pdo->prepare('SELECT * FROM sessions WHERE idsession=:idsession');
        $this->fetchArticlesStatement = $pdo->prepare('SELECT articles.*, users.name FROM articles JOIN users ON articles.author=users.id');
    }

    function login(string $email, string $password)
    {
        $statement = $this->pdo->prepare('SELECT * FROM users WHERE email=:email');
        $statement->bindValue(':email', $email);
        $statement->execute();
        $DBUser = $statement->fetch();
        if ($DBUser) {
            $DBPassword = $DBUser['password'];

            if ($DBPassword === $password) {
                $userid = $DBUser['id'];
                $sessionId = bin2hex(random_bytes(64));
                $signature = hash_hmac('sha256', $sessionId, 'lkeazncxucdzdzedezdzaezkzjchdzzkjndekjeand');
                setcookie('session', $sessionId,  time() + 60 * 60 * 24 * 15);
                setcookie('signature', $signature, time() + 60 * 60 * 24 * 15);
                $statement = $this->pdo->prepare("INSERT INTO sessions (idsession, iduser)  VALUES (:idsession, :iduser)");
                $statement->bindValue(':idsession', $sessionId);
                $statement->bindValue(':iduser', $userid);
                $statement->execute();
                return true;
            }
        }
        return false;
    }


    function register(array $user)
    {
        $this->registerStatement->bindValue(':name', $user['name']);
        $this->registerStatement->bindValue(':email', $user['email']);
        $this->registerStatement->bindValue(':password', $user['password']);
        $this->registerStatement->execute();
    }


    // function fetchUser(int $id)
    // {
    //     $this->fetchUsersStatement->bindValue(':id', $id);
    //     $this->fetchUsersStatement->execute();
    //     return $this->fetchUsersStatement->fetch();
    // }

    function fetchAllArticles()
    {
        $this->fetchArticlesStatement->execute();
        return $this->fetchArticlesStatement->fetchAll();
    }

    function isLogged()
    {
        $submitSessionID = $_COOKIE['session'];
        $submitSignature = $_COOKIE['signature'];
        $testSignature = hash_hmac('sha256', $submitSessionID, 'lkeazncxucdzdzedezdzaezkzjchdzzkjndekjeand');
        if ($submitSignature === $testSignature) {

            $this->getSessionsStatement->bindValue(':idsession', $submitSessionID);
            $this->getSessionsStatement->execute();
            $session = $this->getSessionsStatement->fetch();
            $userID = $session['iduser'];
            $this->fetchUsersStatement->bindValue(':id', $userID);
            $this->fetchUsersStatement->execute();
            return $this->fetchUsersStatement->fetch();
        } else {
            return false;
        }
    }
}

return new Authentificator($pdo);
