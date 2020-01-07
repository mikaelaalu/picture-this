<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

header('Content-Type: application/json');

if (($_SESSION['user']['id'] === $_GET['comment-by'])) {
    $commentId = $_GET['comment-id'];
    $author = $_SESSION['user']['id'];


    $statement = $pdo->prepare('DELETE FROM comments WHERE comment_id = :comment_id');

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->execute([
        ':comment_id' => $commentId,
    ]);

    // $_SESSION['message'] = ['Your comment was deleted!'];


    // json rquest

    $message = ('Your comment was deleted');

    echo json_encode('Your comment was deleted');
}

// redirect('/');
