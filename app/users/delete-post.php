<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$creatorId = $_GET['id'];
$loggedInId = $_SESSION['user']['id'];

if ($creatorId === $loggedInId) {
    //   ADD DELETE CODE
}


// redirect('/');
