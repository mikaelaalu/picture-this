<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_SESSION['user']['id'], $_GET['author_id'], $_GET['id'], $_GET['image'])) {

    $authorId = $_GET['author_id'];
    $loggedIn = $_SESSION['user']['id'];
    $postId = $_GET['id'];
    $image = $_GET['image'];

    $path = __DIR__ . '/../../uploads/' . $image;

    if ($authorId === $loggedIn) {

        $statement = $pdo->prepare('DELETE FROM posts WHERE id = :id');

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->execute([
            ':id' => $postId,
        ]);

        //unlink delete image from file
        if (!unlink($path)) {
            $_SESSION['error'] = ['It was an error deleting this file!'];
        }
    }
}

$_SESSION['message'] = ['The post was deleted!'];

redirect('/profile.php?id=' . $_SESSION['user']['id']);
