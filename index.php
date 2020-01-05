<?php

require __DIR__ . '/views/header.php';

?>


<p><?php checkForError(); ?></p>
<p><?php checkForConfirm(); ?></p>

<article class="posts-wrapper">

    <?php if (!isset($_SESSION['user']['id'])) : ?>

        <?php redirect('/login.php'); ?>

        <!-- <a <?php echo $_SERVER['SCRIPT_NAME'] === '/login.php' ? 'active' : ''; ?>" href="login.php">Login</a> -->

    <?php endif; ?>




    <?php if (isset($_SESSION['user'])) : ?>


        <?php $allPosts = getAllPosts($pdo); ?>

        <?php foreach ($allPosts as $post) : ?>



            <div class="post-container">


                <?php $displayLikes = displayLikes((int) $post['id'], $pdo); ?>

                <div class="author">
                    <a href=" <?php echo 'profile.php?id=' . $post['author_id'] ?> ">
                        <?php echo $post['name'] ?>
                    </a>

                    <?php $avatar = $post['avatar_name'] ?>

                    <?php if (!$avatar) : ?>

                        <img class="avatar-small" src="/icons/persona.png" alt="avatar">

                    <?php else : ?>

                        <img class="avatar-small" src="<?php echo "uploads/" . $avatar ?>" alt="avatar">

                    <?php endif; ?>
                </div>

                <img class="post-img" src=" <?php echo "uploads/" . $post['image_name'] ?> " loading="lazy">


                <div class="about-post">

                    <div class="title-content-box">
                        <h3 class="title-post"> <?php echo $post['title']; ?> </h3>
                        <p class="content"> <?php echo $post['content']; ?> </p>

                    </div>


                    <!-- Like button -->
                    <form class="like-form" action="app/posts/likes.php" method="post">

                        <input type="hidden" name="id" value=" <?php echo $post['id'] ?> ">

                        <p class="like-counter"> <?php

                                                    if ($displayLikes === "0") {
                                                        echo ' ';
                                                    } else {
                                                        echo $displayLikes;
                                                    } ?> </p>

                        <button class="like-btn">

                            <?php if (isPostLiked($post['id'], $_SESSION['user']['id'], $pdo)) : ?>

                                <img class="like-icon" src="/icons/liked.png" alt="liked">

                            <?php else : ?>

                                <img class="like-icon" src="/icons/unliked.png" alt="unliked">

                            <?php endif; ?>
                        </button>

                    </form>
                </div>

                <small class="date"><?php echo $post['date']; ?></small>

                <!-- Comments -->


                <?php $comments = getAllComments((int) $post['id'], $pdo); ?>
                <?php foreach ($comments as $comment) : ?>
                    <div class="comments">
                        <p class="display-user"> <?php echo $comment['name']; ?> </p>
                        <p class="display-comment"> <?php echo $comment['comment']; ?> </p>

                        <?php if ($_SESSION['user']['id'] === $comment['comment_by']) : ?>

                            <a href="<?php echo "app/posts/delete-comment.php?comment-id=" . $comment['comment_id'] . '&comment-by=' . $comment['comment_by'] ?> " class="delete-comment">Delete comment</a>
                        <?php endif; ?>
                    </div>

                <?php endforeach; ?>


                <form class="comments-form" action="app/posts/comment-post.php" method="post">
                    <input type="hidden" name="post-id" value="<?php echo $post['id'] ?> ">

                    <div class="comments">
                        <p class="comment-by"> </p>
                        <p class="comment"> </p>

                    </div>

                    <div class="comment-input">
                        <div class="add-comment">
                            <!-- <label for="comment"></label> -->
                            <input type="text" name="comment" placeholder="Add comment..">
                        </div>
                        <div class="send-comment">
                            <button type="submit">Send</button>
                        </div>

                    </div>
                </form>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>

</article>


<?php require __DIR__ . '/views/footer.php'; ?>