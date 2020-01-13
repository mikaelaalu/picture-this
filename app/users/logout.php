<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

unset($_SESSION['user']);

$_SESSION['message'] = ['See you soon!'];

redirect('/');
