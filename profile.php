<?php require __DIR__ . '/views/header.php';

isLoggedIn();

$getUser = getUser($_GET['id'], $pdo);
$name = $getUser['name'];
$avatar = $getUser['avatar_name'];
$biography = $getUser['biography'];
$getPost = getPost($_GET['id'], $pdo);


$profileId = $_GET['id'];
$visitId = $_SESSION['user']['id'];

?>

<p><?php checkForError(); ?></p>
<p><?php checkForConfirm(); ?></p>

<?php if ($profileId === $visitId) : ?>

    <a href="new-post.php"> <button>New post</button></a>
    <a href="edit-profile.php"> <button>Edit Profile</button> </a>
<?php endif; ?>

<h1>Hej du är inloggad och på profilsidan</h1>

<?php echo $name; ?>

<img class="avatar" src="<?php echo "uploads/" . $avatar ?>" alt="hello">

<p> <?php echo $biography  ?> </p>


<?php foreach ($getPost as $post) : ?>
    <div class="post-container">
        <img class="post" src=" <?php echo "uploads/" . $post['image_name'] ?> " loading="lazy" alt="">
        <h3> <?php echo $post['title']; ?> </h3>
        <p> <?php echo $post['content']; ?> </p>
        <small><?php echo $post['date']; ?></small>

        <?php if ($profileId === $visitId) : ?>
            <a href=" <?php echo "edit-post.php?id=" . $post['id'] ?> "> <button class="edit-post"> Edit post </button> </a>
        <?php endif; ?>
    </div>
<?php endforeach; ?>


<?php require __DIR__ . '/views/footer.php'; ?>