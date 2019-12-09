<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['email'], $_POST['password'])) {
   $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

   $passwordHashed = password_hash($_POST['password']);

   $query = sprintf("INSERT INTO actors (name) VALUES ('%s')", $email);

}



//Redirect to index 
redirect('/');