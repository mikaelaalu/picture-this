<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['old-password'], $_POST['new-password'], $_POST['confirm-password'])) {

    $password = $_POST['old-password'];
    $id = $_SESSION['user']['id'];


    $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');

    $statement->execute([
        ':id' => $id
    ]);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $user = $statement->fetch(PDO::FETCH_ASSOC);


    if (password_verify($password, $user['password']) && $_POST['new-password'] === $_POST['confirm-password']) {
        $id = $_SESSION['user']['id'];
        $newPassword = password_hash($_POST['new-password'], PASSWORD_DEFAULT);


        $query = 'UPDATE users SET password = :password WHERE id = :id';

        $statement = $pdo->prepare($query);

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->execute([
            ':id' => $id,
            ':password' => $newPassword
        ]);

        unset($user['password']);

        $_SESSION['message'] = ['Your password is updated'];
    } else {
        $_SESSION['error'] = ['Wrong pass'];
    }
}


redirect('/edit-profile.php');
