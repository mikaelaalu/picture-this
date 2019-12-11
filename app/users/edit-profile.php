<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $id = $_SESSION['user']['id'];

    $query = 'UPDATE users
    SET email = :email WHERE id = :id';

    $statement = $pdo->prepare($query);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->execute([
        ':email' => $email,
        ':id' => $id

    ]);
}


redirect('/edit-profile.php');
