<?php

require __DIR__ . '/views/header.php';

isLoggedIn();

checkForError();
checkForConfirm(); ?>


<article class="posts-wrapper">

  <?php $allPosts = getAllPosts($pdo); ?>

  <?php if (empty($allPosts)) : ?>
    <p class="info-message"> There are no posts yet.. Be the first to upload one!</p>
  <?php endif; ?>

  <!-- Print all posts to page -->
  <?php foreach ($allPosts as $post) : ?>
    <div class="post-container">

      <div class="author">
        <a class="user-name" href=" <?php echo 'profile.php?id=' . $post['author_id'] ?> ">
          <?php echo $post['name'] ?>
        </a>
        <?php $avatar = $post['avatar_name'] ?>
        <?php if (!$avatar) : ?>
          <img class="avatar-small" src="/icons/persona.png" alt="avatar">
        <?php else : ?>
          <img class="avatar-small" src="<?php echo "uploads/" . $avatar ?>" alt="avatar">
        <?php endif; ?>
      </div>

      <div class="<?php echo $post['filter'] ?>">
        <img class="post-img" src=" <?php echo "uploads/" . $post['image_name'] ?> " loading="lazy">
      </div>

      <div class="about-post">
        <div class="title-content-box">
          <h3 class="title-post"> <?php echo $post['title']; ?> </h3>
          <p class="content"> <?php echo $post['content']; ?> </p>
        </div>


        <!-- Like button -->
        <?php $displayLikes = displayLikes((int) $post['id'], $pdo); ?>
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
      <?php $dateWithTime = $post['date'];

      $dateArray = explode(' ', $dateWithTime);
      $dateWithoutTime = $dateArray[0]; ?>

      <small class="date"><?php echo 'Published: ' .  $dateWithoutTime ?></small>

      <!-- Comments -->
      <?php $comments = getAllComments((int) $post['id'], $pdo); ?>
      <?php foreach ($comments as $comment) : ?>
        <div class="comments">
          <p class="display-user"> <?php echo $comment['name']; ?> </p>
          <p class="display-comment"> <?php echo $comment['comment']; ?> </p>

          <?php if ($_SESSION['user']['id'] === (string) $comment['comment_by']) : ?>

            <form class="delete-comment-form" action="app/posts/delete-comment.php" method="post">
              <input type="hidden" name="comment-id" value="<?php echo $comment['comment_id'] ?>">

              <input type="hidden" name="comment-by" value="<?php echo $comment['comment_by'] ?>">

              <button class="delete-comment" type="submit">Delete comment</button>
            </form>
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