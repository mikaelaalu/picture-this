<?php require __DIR__ . '/views/header.php';

isLoggedIn();

$getUser = getUser($_SESSION['user']['id'], $pdo);
$avatar = $getUser['avatar_name'];
$biography = $getUser['biography'];
$name = $getUser['name'];
?>


<p><?php echo checkForError(); ?></p>
<p><?php echo checkForConfirm(); ?></p>


<!-- Get the user from the database to frontend -->
<?php $getUser = getUser($_SESSION['user']['id'], $pdo); ?>


<div class="profile-info">
    <img class="avatar" src="<?php echo "uploads/" . $avatar ?>" alt="hello">

    <div class="profile-text">
        <p class="user-name"> <?php echo $name; ?> </p>
        <p class="user-bio"> <?php echo $biography  ?> </p>
    </div>
</div>


<article>
    <h2>Edit your profile</h2>

    <form action="app/users/upload-avatar.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="avatar">Choose avatar images to upload</label>
            <input type="file" name="avatar" id="avatar" accept=".jpg, .jpeg, .png" required>
        </div>
        <div clsss="btn-box">
            <button type="submit">Upload image</button></div>
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
        <div clsss="btn-box">
            <button type="submit"> Change</button></div>
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
        <div clsss="btn-box">
            <button type="submit">Change password</button></div>
    </form>

</article>


<?php require __DIR__ . '/views/footer.php'; ?>