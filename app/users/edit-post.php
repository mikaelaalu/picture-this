<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_FILES['image'])) {

    $image = $_FILES['image'];
    $fileName = $image['name'];
    $tmpName = $image['tmp_name'];
    $size = $image['size'];

    $error = $image['error'];

    $id = $_GET['id'];


    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {

        if ($error === 0) {

            if ($size <= 2097152) {

                $newFileName = date('Y-m-d H:i:s') . '.' . $fileActualExt;
                $fileDestination = '../../uploads/' . $newFileName;

                move_uploaded_file($tmpName, $fileDestination);

                $authorId = $_SESSION['user']['id'];
                $date = date("Y-m-d H:i:s");

                // Insert into database!!!!
                $statement = $pdo->prepare('UPDATE posts SET image_name = :image_name WHERE id = :id');

                if (!$statement) {
                    die(var_dump($pdo->errorInfo()));
                }

                $statement->execute([
                    ':id' => $id,
                    ':image_name' => $newFileName,

                ]);


                $_SESSION['message'] = ['The image was updated!'];
            } else {
                $_SESSION['error'] = ['The image is too big!'];
                redirect('/edit-post.php');
            }
        } else {
            $_SESSION['error'] = ['There was an error uploading this file. Try again!'];
            redirect('/edit-post.php');
        }
    } else {
        $_SESSION['error'] = ['Filetype is not allowed'];
        redirect('/edit-post.php');
    }
}













// redirect('/profile.php');
