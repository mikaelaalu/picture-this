<?php require __DIR__ . '/views/header.php';


isLoggedIn();
?>

<p><?php checkForError(); ?></p>

<article>

    <h2>Upload a new post</h2>
    <form action="app/posts/new-post.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="image">Choose images to upload</label>
            <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" required>
        </div>

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" required>
            <small>Please provide the your title.</small>
        </div>

        <div>
            <label for="content">Content</label>
            <textarea type="text" name="content" required></textarea>
            <small>Please provide the your content.</small>
        </div>

        <button type="submit">Upload post</button>
    </form>

</article>


<?php require __DIR__ . '/views/footer.php'; ?>