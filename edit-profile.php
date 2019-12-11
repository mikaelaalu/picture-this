<?php require __DIR__ . '/views/header.php';

if (!isset($_SESSION['user'])) {
    redirect('/');
}
?>

<article>


    <form action="app/users/edit-profile.php" method="post">
        <h2>Edit your profile</h2>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>" required>
            <small>Please provide the your email.</small>
        </div>
        <button type="submit"> Change</button>
    </form>

    <form action="app/users/edit-password.php" method="post">
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" required>
            <small>Please provide the your pass.</small>
        </div>
        <button type="submit">Change password</button>
    </form>

</article>


<?php require __DIR__ . '/views/footer.php'; ?>