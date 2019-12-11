<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_SESSION['user'], $_POST['id'])) {
    redirect('/');
}

// In this file we delete new posts in the database.

redirect('/');
