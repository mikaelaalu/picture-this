<?php

declare(strict_types=1);

if (!function_exists('redirect')) {
    /**
     * Redirect the user to given path.
     *
     * @param string $path
     *
     * @return void
     */
    function redirect(string $path)
    {
        header("Location: ${path}");
        exit;
    }
}


/**
 * Get a user from database to frontend
 *
 * @param string $bdPath
 * @param integer $userId
 * @return array
 */
function getUser(int $userId, string $dbPath = 'sqlite:app/database/database.db'): array
{
    $pdo = new PDO($dbPath);
    $query = 'SELECT *
    FROM users WHERE id = :id';

    $statement = $pdo->prepare($query);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->execute([
        ':id' => $userId
    ]);

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    return $user;
}

/**
 * Gets all posts from database to frontend by session id
 *
 * @param string $bdPath
 * @param integer $userId
 * @return array
 */
function getPost(int $userId, string $dbPath = 'sqlite:app/database/database.db'): array
{
    $pdo = new PDO($dbPath);
    $query = 'SELECT * FROM posts WHERE author_id = :id ORDER BY date DESC';

    $statement = $pdo->prepare($query);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->execute([
        ':id' => $userId
    ]);

    $post = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $post;
}

/**
 * Gets one post from database to frontend, with id from database
 *
 * @param string $bdPath
 * @param integer $postId
 * @return array
 */
function editPost(int $postId, string $dbPath = 'sqlite:app/database/database.db'): array
{
    $pdo = new PDO($dbPath);
    $query = 'SELECT * FROM posts WHERE id = :id';

    $statement = $pdo->prepare($query);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->execute([
        ':id' => $postId
    ]);

    $post = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $post;
}

/**
 * Check if there is any error in $_SESSION. 
 * If there is any, print them and then unset $_SESSION['error']
 *
 * @return array
 */
function checkForError()
{
    if (isset($_SESSION['error'])) {
        foreach ($_SESSION['error'] as $error) {
            echo $error;
        }
        unset($_SESSION['error']);
    }
}

/**
 * Check if there is any message in $_SESSION.
 * If there is any, print them and unset $_SESSION['message']
 * 
 */
function checkForConfirm()
{
    if (isset($_SESSION['message'])) {
        foreach ($_SESSION['message'] as $message) {
            echo $message;
        }
        unset($_SESSION['message']);
    }
}

/**
 * Check if user is logged in, if not, redirect to home page.
 *
 * @return boolean
 */
function isLoggedIn()
{
    if (!isset($_SESSION['user'])) {
        redirect('/');
    }
}
