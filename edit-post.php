<?php require __DIR__ . '/views/header.php';

isLoggedIn();

$posts = editPost($_GET['id'], $pdo);

?>

<article>
    <?php foreach ($posts as $post) : ?>
        <div class="edit-post-container">
            <img class="edit-img" src=" <?php echo 'uploads/' . $post['image_name'] ?> " alt="">
            <h3> <?php echo $post['title']; ?> </h3>
            <p> <?php echo $post['content']; ?> </p>
        </div>
    <?php endforeach; ?>


    <h2>Edit your post</h2>


    <form action="<?php echo 'app/posts/edit-post.php?id=' . $post['id'] ?> " method="post" enctype="multipart/form-data">
        <div>
            <label for="image">Change image</label>
            <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" required>
        </div>
        <div clsss="btn--box">
            <button type="submit">Edit picture</button></div>
    </form>

    <form action="<?php echo 'app/posts/edit-post.php?id=' . $post['id'] ?>" method="post">
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
        <div clsss="btn--box">
            <button type="submit">Edit post</button></div>
    </form>

    <form action="<?php echo 'app/posts/delete-post.php?author_id=' . $post['author_id'] . '&id=' . $post['id'] . '&image=' . $post['image_name'] ?>" method="post">
        <div clsss="btn--box">
            <button type="submit">Delete post</button></div>
    </form>
</article>




<?php require __DIR__ . '/views/footer.php'; ?>