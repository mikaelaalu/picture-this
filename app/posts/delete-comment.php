<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

header('Content-Type: application/json');

if (isset($_POST['comment-by'], $_POST['comment-id'])) {


    $commentId = $_POST['comment-id'];
    $commentBy =  $_POST['comment-by'];
    $user =  $_SESSION['user']['id'];

    // die(var_dump($commentBy));

    if ($commentBy === $user) {

        $statement = $pdo->prepare('DELETE FROM comments WHERE comment_id = :comment_id');

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->execute([
            ':comment_id' => $commentId,
        ]);

        // $_SESSION['message'] = ['Your comment was deleted!'];


        // json rquest


        echo json_encode('Your comment was deleted');
    }
}



// redirect('/');
