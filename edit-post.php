<?php require __DIR__ . '/views/header.php';

if (!isset($_SESSION['user'])) {
    redirect('/');
}

$posts = editPost($_GET['id']);

if (isset($_SESSION['error'])) {
    foreach ($_SESSION['error'] as $error) {
        echo $error;
    }
    unset($_SESSION['error']);
}

if (isset($_SESSION['message'])) {
    foreach ($_SESSION['message'] as $message) {
        echo $message;
    }
    unset($_SESSION['message']);
}

?>

<article>

    <?php foreach ($posts as $post) : ?>
        <div class="post-container">
            <img class="post" src=" <?php echo 'uploads/' . $post['image_name'] ?> " alt="">
            <h3> <?php echo $post['title']; ?> </h3>
            <p> <?php echo $post['content']; ?> </p>
        </div>
    <?php endforeach; ?>



    <h2>Edit your post</h2>
    <form action="<?php echo 'app/users/edit-post.php?id=' . $post['id'] ?> " method="post" enctype="multipart/form-data">
        <div>
            <label for="image">Change image</label>
            <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" required>
        </div>
        <button type="submit">Edit picture</button>
    </form>

    <form action="app/users/edit-post.php" method="post">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" value="<?php echo $post['title']; ?> " required>
            <small>Edit your title</small>
        </div>

        <div>
            <label for="content">Content</label>
            <textarea type="text" name="content" required> <?php echo $post['content'] ?> </textarea>
            <small>Edit your content</small>
        </div>

        <button type="submit">Edit post</button>
    </form>


</article>




<?php require __DIR__ . '/views/footer.php'; ?>