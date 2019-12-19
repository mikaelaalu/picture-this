<?php

require __DIR__ . '/views/header.php';

?>

<p><?php checkForError(); ?></p>
<p><?php checkForConfirm(); ?></p>

<article>

    <h1><?php echo $config['title']; ?></h1>
    <p>This is the home page.</p>

    <?php if (isset($_SESSION['user'])) : ?>
        <?php $user = $_SESSION['user'];
        echo "Welcome " . $user['name']; ?>

        <a href="new-post.php"> <button>New post</button> </a>

        <?php $allPosts = getAllPosts($pdo); ?>

        <?php foreach ($allPosts as $post) : ?>
            <div class="post-container">
                <?php $likes = displayLikes((int) $post['id'], $pdo); ?>
                <?php foreach ($likes as $like) : ?>



                    <h3> <?php echo $post['title']; ?> </h3>
                    <img class="post" src=" <?php echo "uploads/" . $post['image_name'] ?> " loading="lazy">
                    <p> <?php echo $post['content']; ?> </p>


                    <form class="like-form" action="app/posts/likes.php" method="post">
                        <input type="hidden" name="id" value=" <?php echo $post['id'] ?> ">
                        <button data-set="<?php echo $post['id'] ?> " class="like-btn"> Like me</button>
                        <p> <?php echo $like ?> </p>
                    </form>



                    <small><?php echo $post['date']; ?></small>

                    <p>Author: <a href=" <?php echo 'profile.php?id=' . $post['author_id'] ?> ">
                            <?php echo $post['name'] ?>
                        </a></p>

            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>

<?php endif; ?>

</article>


<?php require __DIR__ . '/views/footer.php'; ?>