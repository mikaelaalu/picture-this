<?php require __DIR__ . '/views/header.php';

if (!isset($_SESSION['user'])) {
    redirect('/');
}

if (isset($_SESSION['message'])) {
    foreach ($_SESSION['message'] as $message) {
        echo $message;
    }
    unset($_SESSION['message']);
}

if (isset($_SESSION['error'])) {
    foreach ($_SESSION['error'] as $message) {
        echo $message;
    }
    unset($_SESSION['error']);
}

$getUser = getUser($_SESSION['user']['id']);
$avatar = $getUser['avatar_name'];
?>





<!-- Get the user from the database to frontend -->
<?php $getUser = getUser($_SESSION['user']['id']); ?>

<?php echo $_SESSION['user']['name']; ?>

<img class="avatar" src="<?php echo "uploads/" . $avatar  ?>" alt="avatar">
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