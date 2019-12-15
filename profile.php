<?php require __DIR__ . '/views/header.php';

if (!isset($_SESSION['user'])) {
    redirect('/');
}

$getUser = getUser($_SESSION['user']['id']);
$avatar = $getUser['avatar_name'];
$biography = $getUser['biography'];
?>

<a href="new-post.php"> <button>New post</button></a>
<a href="edit-profile.php"> <button>Edit Profile</button> </a>
<h1>Hej du är inloggad och på profilsidan</h1>

<?php echo $_SESSION['user']['name']; ?>

<img class="avatar" src="<?php echo "uploads/" . $avatar  ?>" alt="hello">

<p> <?php echo $biography  ?> </p>

<?php require __DIR__ . '/views/footer.php'; ?>