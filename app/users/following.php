<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

header('Content-Type: application/json');

if (isset($_POST['profile'])) {
    $profileId = (int) filter_var($_POST['profile'], FILTER_SANITIZE_NUMBER_INT);
    $userId = (int) $_SESSION['user']['id'];

    if (isFollowing($userId, $profileId, $pdo)) {

        // Delete from database if user already following
        $statement = $pdo->prepare('DELETE FROM following WHERE user_id = :user_id AND profile_id = :profile_id');

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->execute([
            ':user_id' => $userId,
            ':profile_id' => $profileId,
        ]);


        //json request
        $followers = followers($profileId, $pdo);

        $json = ([
            'followers' => 'Followers: ' . $followers,
            'button' => 'Follow'
        ]);

        echo json_encode($json);
    } else {

        // Insert into database if user not following
        $statement = $pdo->prepare('INSERT INTO following (user_id, profile_id) VALUES (:user_id, :profile_id)');

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->execute([
            ':user_id' => $userId,
            ':profile_id' => $profileId,
        ]);

        $followers = followers($profileId, $pdo);

        $json = ([
            'followers' => 'Followers: ' . $followers,
            'button' => 'Unfollow'
        ]);

        echo json_encode($json);
    }
}
