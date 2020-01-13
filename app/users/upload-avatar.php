<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    $fileName = $avatar['name'];
    $tmpName = $avatar['tmp_name'];
    $size = $avatar['size'];
    $error = $avatar['error'];


    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($error === 0) {
            if ($size <= 2097152) {
                $newFileName = date('Y-m-dH:i:s') . '.' . $fileActualExt;
                $fileDestination = '../../uploads/' . $newFileName;
                move_uploaded_file($tmpName, $fileDestination);
                $id = $_SESSION['user']['id'];


                $_SESSION['message'] = ['The image was uploaded!'];


                $statement = $pdo->prepare('UPDATE users set avatar_name = :avatar_name WHERE id = :id');

                $statement->execute([
                    ':avatar_name' => $newFileName,
                    ':id' =>  $id
                ]);

                if (!$statement) {
                    die(var_dump($pdo->errorInfo()));
                }
            } else {
                $_SESSION['error'] = ['The image is too big!'];
            }
        } else {
            $_SESSION['error'] = ['There was an error uploading this file. Try again!'];
        }
    } else {
        $_SESSION['error'] = ['Filetype is not allowed'];
    }
}


redirect('/edit-profile.php');
