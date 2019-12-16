<?php require __DIR__ . '/views/header.php';

if (!isset($_SESSION['user'])) {
    redirect('/');
}

$posts = editPost($_GET['id']);


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
    <form action="app/users/edit-post.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="image">Change image</label>
            <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" required>
        </div>

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" required>
            <small>Edit your title</small>
        </div>

        <div>
            <label for="content">Content</label>
            <textarea type="text" name="content" required></textarea>
            <small>Edit your content</small>
        </div>

        <button type="submit">Edit post</button>
    </form>


</article>




<?php require __DIR__ . '/views/footer.php'; ?>