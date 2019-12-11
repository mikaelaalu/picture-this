<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['password'])) {

    $id = $_SESSION['user']['id'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = 'UPDATE users
    SET password = :password WHERE id = :id';

    $statement = $pdo->prepare($query);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->execute([
        ':id' => $id,
        ':password' => $password
    ]);
}


redirect('/edit-profile.php');
