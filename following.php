<?php require __DIR__ . '/views/header.php';
isLoggedIn(); ?>

<article class="posts-wrapper">

    <h1>Following</h1>

    <?php $follwing = displayFollowing($_SESSION['user']['id'], $pdo);  ?>

    <?php foreach ($follwing as $follow) : ?>

        <div class="post-container">

            <?php $user = getUser((int) $follow['profile_id'], $pdo); ?>

            <div class="author">
                <a href=" <?php echo 'profile.php?id=' . $follow['author_id'] ?> ">
                    <?php echo $user['name'] ?>
                </a>

                <?php $avatar = $user['avatar_name'] ?>

                <?php if (!$avatar) : ?>

                    <img class="avatar-small" src="/icons/persona.png" alt="avatar">

                <?php else : ?>

                    <img class="avatar-small" src="<?php echo "uploads/" . $avatar ?>" alt="avatar">

                <?php endif; ?>
            </div>

            <img class="post-img" src=" <?php echo "uploads/" . $follow['image_name'] ?> " loading="lazy">

            <div class="about-post">
                <div class="title-content-box">
                    <h3 class="title-post"> <?php echo $follow['title']; ?> </h3>
                    <p class="content"> <?php echo $follow['content']; ?> </p>
                </div>

                <?php $displayLikes = displayLikes((int) $follow['id'], $pdo); ?>

                <!-- Like button -->
                <form class="like-form" action="app/posts/likes.php" method="post">

                    <input type="hidden" name="id" value=" <?php echo $follow['id'] ?> ">

                    <p class="like-counter"> <?php

                                                if ($displayLikes === "0") {
                                                    echo ' ';
                                                } else {
                                                    echo $displayLikes;
                                                } ?> </p>

                    <button class="like-btn">

                        <?php if (isPostLiked($follow['id'], $_SESSION['user']['id'], $pdo)) : ?>

                            <img class="like-icon" src="/icons/liked.png" alt="liked">

                        <?php else : ?>

                            <img class="like-icon" src="/icons/unliked.png" alt="unliked">

                        <?php endif; ?>
                    </button>

                </form>
            </div>
            <?php $dateWithTime = $follow['date'];

            $dateArray = explode(' ', $dateWithTime);
            $dateWithoutTime = $dateArray[0]; ?>

            <small class="date"><?php echo 'Published: ' .  $dateWithoutTime ?></small>


            <!-- Comments -->
            <?php $comments = getAllComments((int) $follow['id'], $pdo); ?>
            <?php foreach ($comments as $comment) : ?>
                <div class="comments">
                    <p class="display-user"> <?php echo $comment['name']; ?> </p>
                    <p class="display-comment"> <?php echo $comment['comment']; ?> </p>

                    <?php if ($_SESSION['user']['id'] === $comment['comment_by']) : ?>

                        <form class="delete-comment-form" action="app/posts/delete-comment.php" method="post">
                            <input type="hidden" name="comment-id" value="<?php echo $comment['comment_id'] ?>">

                            <input type="hidden" name="comment-by" value="<?php echo $comment['comment_by'] ?>">

                            <button class="delete-comment" type="submit">Delete comment</button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

            <form class="comments-form" action="app/posts/comment-post.php" method="post">
                <input type="hidden" name="post-id" value="<?php echo $follow['id'] ?> ">

                <div class="comments">
                    <p class="comment-by"> </p>
                    <p class="comment"> </p>
                </div>

                <div class="comment-input">
                    <div class="add-comment">
                        <input class="comment-text" type="text" name="comment" placeholder="Add comment..">
                    </div>
                    <div class="send-comment">
                        <button class="comment-submit" type="submit">Send</button>
                    </div>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
</article>
<?php require __DIR__ . '/views/footer.php'; ?>