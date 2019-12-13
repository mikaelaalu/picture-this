<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);


    // Checks if email exists in database

    $emailStatement = $pdo->prepare('SELECT * FROM users WHERE email = :email');

    $emailStatement->execute([
        ':email' => $email,
    ]);

    $emailExist = $emailStatement->fetch(PDO::FETCH_ASSOC);

    if (!$emailStatement) {
        die(var_dump($pdo->errorInfo()));
    }

    //If email exist
    if ($emailExist) {

        $_SESSION['error'] = ["Email is already taken"];

        redirect('/new-user.php');
    }


    // Insert into database
    $statement = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');

    $statement->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $hashedPassword,
    ]);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
}
//Redirect to index 
redirect('/');
