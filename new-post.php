<?php require __DIR__ . '/views/header.php';

isLoggedIn();
checkForError(); ?>

<article class="form-box">

    <h1>Upload new post</h1>
    <form action="app/posts/new-post.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="image">Choose a image to upload</label>
            <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" required>
        </div>

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" required>
            <small>Please provide a title.</small>
        </div>

        <div>
            <label for="content">Description</label>
            <textarea class="content-box" type="text" name="content" required></textarea>
            <small>Please provide a description.</small>
        </div>
        <div clsss="btn-box">
            <button class="styled-btn" type="submit">Upload post</button></div>
    </form>

</article>


<?php require __DIR__ . '/views/footer.php'; ?>