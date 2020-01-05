<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if ($_POST['profile']) {

    $profile =  $_POST['profile'];
    $userId = $_SESSION['user']['id'];

    $statement = $pdo->prepare('INSERT INTO following (user_id, following) VALUES (:user_id, :profile)');

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->execute([
        ':user_id' => $userId,
        ':profile' => $profile,
    ]);
}


// redirect('/');
