<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

header('Content-Type: application/json');

if (isset($_POST['comment-by'], $_POST['comment-id'])) {

    $commentId = filter_var($_POST['comment-id'], FILTER_SANITIZE_NUMBER_INT);
    $commentBy =  filter_var($_POST['comment-by'], FILTER_SANITIZE_NUMBER_INT);
    $user =  $_SESSION['user']['id'];

    if ($commentBy === $user) {

        $statement = $pdo->prepare('DELETE FROM comments WHERE comment_id = :comment_id');

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->execute([
            ':comment_id' => $commentId,
        ]);

        // json rquest
        echo json_encode('Your comment was deleted');
    }
}
