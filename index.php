<?php

require __DIR__ . '/views/header.php';


?>

<p><?php checkForError(); ?></p>
<p><?php checkForConfirm(); ?></p>

<article>
    <!-- 
    <h1><?php echo $config['title']; ?></h1> -->

    <?php if (isset($_SESSION['user'])) : ?>
        <?php $user = $_SESSION['user'];
        echo "Welcome " . $user['name']; ?>

        <a href="new-post.php"> <button>New post</button> </a>

        <?php $allPosts = getAllPosts($pdo); ?>

        <?php foreach ($allPosts as $post) : ?>
            <div class="post-container">
                <?php $likes = displayLikes((int) $post['id'], $pdo); ?>

                <?php $displayLikes = displayLikes($post['id'], $pdo); ?>

                <div class="author">
                    <a href=" <?php echo 'profile.php?id=' . $post['author_id'] ?> ">
                        <?php echo $post['name'] ?>
                    </a>
                    <img class="avatar-small" src="<?php echo "uploads/" . $avatar ?>" alt="avatar">
                </div>
                <img class="post-img" src=" <?php echo "uploads/" . $post['image_name'] ?> " loading="lazy">
                <h3> <?php echo $post['title']; ?> </h3>
                <p> <?php echo $post['content']; ?> </p>


                <form class="like-form" action="app/posts/likes.php" method="post">

                    <input type="hidden" name="id" value=" <?php echo $post['id'] ?> ">

                    <button data-set="<?php echo $post['id'] ?> " class="like-btn">
                        <?php if (isPostLiked($post['id'], $_SESSION['user']['id'], $pdo)) : ?>

                            <?php echo 'unlike'; ?>
                        <?php else : echo 'like'; ?>
                        <?php endif; ?></button>

                    <p class="like-counter"> <?php echo $displayLikes ?> </p>
                </form>


                <small><?php echo $post['date']; ?></small>



            </div>

        <?php endforeach; ?>

    <?php endif; ?>

</article>


<?php require __DIR__ . '/views/footer.php'; ?>