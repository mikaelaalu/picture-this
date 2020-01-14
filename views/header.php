<?php
// Always start by loading the default application setup.
require __DIR__ . '/../app/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $config['title']; ?></title>

    <link rel="stylesheet" href="https://unpkg.com/sanitize.css@11.0.0/sanitize.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/styles/main.css">
    <link rel="stylesheet" href="/assets/styles/comments.css">
    <link rel="stylesheet" href="/assets/styles/forms.css">
    <link rel="stylesheet" href="/assets/styles/login.css">
    <link rel="stylesheet" href="/assets/styles/navigation.css">
    <link rel="stylesheet" href="/assets/styles/profile.css">
    <link rel="stylesheet" href="/assets/styles/posts.css">


</head>

<body>
    <div class="title">
        <img src="/icons/camera-icon.png" alt="camera">
        <a href="/index.php"><?php echo $config['title']; ?></a>
    </div>
    <?php require __DIR__ . '/navigation.php'; ?>