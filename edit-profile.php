<?php require __DIR__ . '/views/header.php';

if (!isset($_SESSION['user'])) {
    redirect('/');
}
?>

<?php if (isset($_SESSION['message'])) : ?>
    <?php foreach ($_SESSION['message'] as $message) : ?>
        <h4> <?php echo $message; ?></h4>
        <?php unset($_SESSION['message']) ?>
    <?php endforeach; ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])) : ?>
    <?php foreach ($_SESSION['error'] as $message) : ?>
        <h4> <?php echo $message; ?></h4>
        <?php unset($_SESSION['error']) ?>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Get the user from the database to frontend -->
<?php $getUser = getUser($_SESSION['user']['id']); ?>

<article>
    <h2>Edit your profile</h2>

    <form action="app/users/upload-avatar.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="avatar">Choose avatar images to upload</label>
            <input type="file" name="avatar" id="avatar" accept=".jpg, .jpeg, .png" required>
        </div>

        <button type="submit">Upload image</button>
    </form>

    <form action="app/users/edit-profile.php" method="post">
        <div>
            <label for="biography">Biography</label>
            <textarea type="text" name="biography" required><?php echo $getUser['biography']; ?></textarea>
            <small>Please provide the your biography.</small>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $getUser['email'] ?>" required>
            <small>Please provide the your email.</small>
        </div>
        <button type="submit"> Change</button>
    </form>

    <form action="app/users/edit-password.php" method="post">
        <div>
            <label for="old-password"> Old Password</label>
            <input type="password" name="old-password" required>
            <small>Please provide the your pass.</small>
        </div>
        <div>
            <label for="new-password">New Password</label>
            <input type="password" name="new-password" required>
            <small>Please provide the your pass.</small>
        </div>
        <div>
            <label for="confirm-password">Confirm Password</label>
            <input type="password" name="confirm-password" required>
            <small>Please provide the your pass.</small>
        </div>
        <button type="submit">Change password</button>
    </form>

</article>


<?php require __DIR__ . '/views/footer.php'; ?>