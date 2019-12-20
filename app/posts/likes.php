<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


header('Content-Type: application/json');


if (isset($_POST['id'])) {

    $postId = (int) $_POST['id'];
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
            'text' => 'like',
        ]);

        echo json_encode($display);
    } else {

        // If not liked, insert into database

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
            'text' => 'unlike',
        ]);

        echo json_encode($display);
    }

    //count all likes for one post
    // $query = 'SELECT COUNT(*) FROM likes WHERE post_id = :post_id';

    // $statement = $pdo->prepare($query);

    // $statement->execute([
    //     ':post_id' => $postId
    // ]);

    // $likes = $statement->fetchAll();

    // foreach ($likes as $like) {
    //     $like;
    // }




    //     $hej = ['hej' => 'd'];
    //     echo json_encode($likes);
}

// redirect('/');
