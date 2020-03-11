<?php require __DIR__ . '/views/header.php';

isLoggedIn();

$getUser = getUser($_GET['id'], $pdo);
$name = $getUser['name'];
$userId = $getUser['id'];
$avatar = $getUser['avatar_name'];
$biography = $getUser['biography'];
$getPost = getPost($_GET['id'], $pdo);
$profileId = $_GET['id'];
$visitId = $_SESSION['user']['id'];

checkForError();
checkForConfirm();


?>


<article class="posts-wrapper">

  <div class="profile-info-box">


    <?php if (!$avatar) : ?>

      <img class="avatar" src="/icons/persona.png" alt="avatar">

    <?php else : ?>

      <img class="avatar" src="<?php echo "uploads/" . $avatar ?>" alt="avatar">

    <?php endif; ?>

    <div class="profile-text">
      <p class="user-name"> <?php echo $name; ?> </p>
      <p class="user-bio"> <?php echo $biography  ?> </p>

      <div class="follow-box">
        <div class="follow-info">
          <?php $followers = followers($profileId, $pdo); ?>
          <small class="followers">Followers: <?php echo $followers ?> </small>
        </div>

        <div class="follow-info">
          <?php $following = following($userId, $pdo); ?>
          <small class="following">Following: <?php echo $following ?> </small>
        </div>
      </div>

      <!-- Follow -->
      <?php if ($profileId !== $visitId) : ?>

        <form class="following" action="app/users/following.php" method="post">

          <input type="hidden" name="profile" value="<?php echo $profileId ?> ">

          <button class="followBtn styled-btn" type="submit">

            <?php if (isFollowing($visitId, $profileId, $pdo)) : ?>

              Unfollow

            <?php else :   ?>
              Follow

            <?php endif; ?>

          </button>
        </form>
      <?php endif; ?>
    </div>

    <?php if ($profileId === $visitId) : ?>
      <div class='edit-profile'>
        <a class="edit" href="edit-profile.php">
          <img class="nav-icon" src="/icons/settings.png" alt="logout">
        </a>
      </div>
    <?php endif; ?>
  </div>

  <!-- If user has no posts.. -->
  <?php if (empty($getPost)) : ?>
    <p class="info-message"> You dont have any posts yet..</p>
  <?php endif; ?>


  <!-- Print all posts to page from database  -->
  <?php foreach ($getPost as $post) : ?>
    <div class="post-container">

      <div class="author">
        <a class="user-name" href=" <?php echo 'profile.php?id=' . $post['author_id'] ?> ">
          <?php echo $name ?>
        </a>

        <?php if (!$avatar) : ?>

          <img class="avatar-small" src="/icons/persona.png" alt="profile-page">

        <?php else : ?>

          <img class="avatar-small" src="<?php echo "uploads/" . $avatar ?>" alt="avatar">

        <?php endif; ?> </div>

      <div class="<?php echo $post['filter'] ?>">
        <img class="post-img" src=" <?php echo "uploads/" . $post['image_name'] ?> " loading="lazy" alt="">
      </div>

      <div class="about-post">
        <div class="title-content-box">
          <h3 class="title-post"> <?php echo $post['title']; ?> </h3>
          <p class="content"> <?php echo $post['content']; ?> </p>
        </div>

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

              <img class="like-icon" src="/icons/liked.png" alt="like">

            <?php else : ?> <img class="like-icon" src="/icons/unliked.png" alt="unlike">

            <?php endif; ?></button>
        </form>
      </div>

      <div class="edit-post-wrapper">
        <?php $dateWithTime = $post['date'];
        $dateArray = explode(' ', $dateWithTime);
        $dateWithoutTime = $dateArray[0]; ?>
        <small class="date"><?php echo 'Published: ' . $dateWithoutTime; ?></small>
        <?php if ($profileId === $visitId) : ?>
          <a href=" <?php echo "edit-post.php?id=" . $post['id'] ?> "> <button class="edit-post"> Edit post </button> </a>
        <?php endif; ?>
      </div>

      <!-- Comments -->
      <?php $comments = getAllComments((int) $post['id'], $pdo); ?>
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