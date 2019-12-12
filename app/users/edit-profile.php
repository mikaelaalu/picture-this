<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['email'], $_POST['biography'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $biography = filter_var($_POST['biography'], FILTER_SANITIZE_STRING);
    $id = $_SESSION['user']['id'];

    $query = 'UPDATE users
    SET email = :email, biography = :biography WHERE id = :id';

    $statement = $pdo->prepare($query);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->execute([
        ':email' => $email,
        ':id' => $id,
        ':biography' => $biography

    ]);
}


redirect('/edit-profile.php');
