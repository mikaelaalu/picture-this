<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


header('Content-Type: application/json');


if (isset($_POST['id'])) {
    $postId = (int) filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $userId = (int) $_SESSION['user']['id'];


    if (isPostLiked($postId, $userId, $pdo)) {

        // If post is liked delete from database

        $statement = $pdo->prepare('DELETE FROM likes WHERE post_id = :post_id AND user_id = :user_id');

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->execute([
            ':post_id' => $postId,
            ':user_id' => $userId
        ]);

        //json request
        $number = displayLikes($postId, $pdo);
        $display = ([
            'number' => $number,
            'src' => 'http://localhost:8000/icons/unliked.png'
        ]);

        echo json_encode($display);
    } else {

        // If post is not liked, insert into database

        $statement = $pdo->prepare('INSERT INTO likes (post_id, user_id) VALUES (:post_id, :user_id)');

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->execute([
            ':post_id' => $postId,
            ':user_id' => $userId,
        ]);


        //json request
        $number = displayLikes($postId, $pdo);
        $display = ([
            'number' => $number,
            'src' => 'http://localhost:8000/icons/liked.png'
        ]);

        echo json_encode($display);
    }
}
