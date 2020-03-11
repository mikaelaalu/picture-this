<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_FILES['image'], $_POST['title'], $_POST['content'])) {
    $image = $_FILES['image'];
    $fileName = $image['name'];
    $tmpName = $image['tmp_name'];
    $size = $image['size'];
    $error = $image['error'];


    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($error === 0) {
            if ($size <= 2097152) {
                $newFileName = date('Y-m-dH:i:s') . '.' . $fileActualExt;
                $fileDestination = '../../uploads/' . $newFileName;

                move_uploaded_file($tmpName, $fileDestination);

                $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
                $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
                $authorId = $_SESSION['user']['id'];
                $date = date("Y-m-d H:i:s");
                $filter = filter_var($_POST['filter'], FILTER_SANITIZE_STRING);

                $statement = $pdo->prepare('INSERT INTO posts (title, content, author_id, image_name, date, filter)
                 VALUES (:title, :content, :author_id, :image_name, :date, :filter)');

                if (!$statement) {
                    die(var_dump($pdo->errorInfo()));
                }

                $statement->execute([
          ':title' => $title,
          ':content' => $content,
          ':author_id' =>  $authorId,
          ':image_name' => $newFileName,
          ':date' => $date,
          ':filter' => $filter
        ]);


                $_SESSION['message'] = ['The post was uploaded!'];
            } else {
                $_SESSION['error'] = ['The image is too big!'];
                redirect('/new-post.php');
            }
        } else {
            $_SESSION['error'] = ['There was an error uploading this file. Try again!'];
            redirect('/new-post.php');
        }
    } else {
        $_SESSION['error'] = ['Filetype is not allowed'];
        redirect('/new-post.php');
    }
}


redirect('/profile.php?id=' . $_SESSION['user']['id']);
