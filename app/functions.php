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
 * @param integer $userId
 * @param PDO $pdo
 * @return array
 */
function getUser(int $userId, PDO $pdo): array
{

    $query = 'SELECT * FROM users WHERE id = :id';

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
 * Gets all posts by one author from database to frontend by session id
 *
 * @param integer $userId
 * @param PDO $pdo
 * @return array
 */
function getPost(int $userId, PDO $pdo): array
{

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
 * @param integer $postId
 * @param PDO $pdo
 * @return array
 */
function editPost(int $postId, PDO $pdo): array
{

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
 * Get all posts from database
 *
 * @param PDO $pdo
 * @return array
 */
function getAllPosts(PDO $pdo): array
{

    $query = 'SELECT posts.*, users.name, users.avatar_name  FROM posts INNER JOIN users WHERE author_id = users.id ORDER BY date DESC;';

    $statement = $pdo->prepare($query);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->execute();

    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $posts;
}


/**
 * Checks if a specific user has liked a specific post 
 *
 * @param integer $postId
 * @param integer $userId
 * @param PDO $pdo
 * @return boolean
 */
function isPostLiked(int $postId, int $userId,  PDO $pdo): bool
{

    $query = 'SELECT * FROM likes WHERE post_id = :post_id AND user_id = :user_id';

    $statement = $pdo->prepare($query);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->execute([
        ':post_id' => $postId,
        ':user_id' => $userId
    ]);

    $like = $statement->fetch(PDO::FETCH_ASSOC);

    if ($like) {
        return true;
    } else {
        return false;
    }
}

/**
 * Display all likes on specific post, get all likes from database
 *
 * @param integer $postId
 * @param PDO $pdo
 * @return string
 */
function displayLikes(int $postId, PDO $pdo): string
{
    $query = 'SELECT COUNT(*) FROM likes WHERE post_id = :post_id';

    $statement = $pdo->prepare($query);

    $statement->execute([
        ':post_id' => $postId
    ]);

    $likes = $statement->fetch()[0];

    return $likes;
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
 * @return array
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
        redirect('/login.php');
    }
}
