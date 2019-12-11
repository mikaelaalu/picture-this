<?php require __DIR__ . '/views/header.php';

if (!isset($_SESSION['user'])) {
    redirect('/');
}
?>


<h1>Hej du är inloggad och på profilsidan</h1>

<?php echo $_SESSION['user']['name']; ?>

<a href="edit-profile.php"> <button>Edit Profile</button> </a>

<?php require __DIR__ . '/views/footer.php'; ?>