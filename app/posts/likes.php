<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['like'])) {

    $postId = $_GET['id'];
    $userId = $_SESSION['user']['id'];

    $statement = $pdo->prepare('INSERT INTO likes (post_id, user_id)
    VALUES (:post_id, :user_id)');

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->execute([
        ':post_id' => $postId,
        ':user_id' => $userId,
    ]);
}
