<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';

    $statement = $pdo->prepare($query);

    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $hashedPassword);

    $statement->execute();

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
}




//Redirect to index 
redirect('/');
