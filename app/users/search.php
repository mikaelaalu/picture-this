<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

header('Content-Type: application/json');

if (isset($_POST['search-input'])) {
  $searchInput = filter_var($_POST['search-input'], FILTER_SANITIZE_STRING);

  if ($searchInput === "") {
    redirect('/search.php');
  }

  $statement = $pdo->prepare('SELECT id, email, name, avatar_name FROM users WHERE name LIKE :name');

  $statement->execute([
    ':name' => "%$searchInput%"
  ]);

  $searchOutput = $statement->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($searchOutput);
}
