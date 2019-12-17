<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we logout users.

unset($_SESSION['user']);

$_SESSION['message'] = ['We already miss you! See you soon!'];

redirect('/');
