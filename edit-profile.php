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

<article class="form-box">

    <div class="profile-info">
        <?php if (!$avatar) : ?>

            <img class="avatar" src="/icons/persona.png" alt="avatar">

        <?php else : ?>

            <img class="avatar" src="<?php echo "uploads/" . $avatar ?>" alt="avatar">

        <?php endif; ?>

        <div class="profile-text">
            <p class="user-name"> <?php echo $name; ?> </p>
            <p class="user-bio"> <?php echo $biography  ?> </p>
        </div>
    </div>

    <h2>Edit your profile</h2>

    <form action="app/users/upload-avatar.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="avatar">Choose avatar images to upload</label>
            <input class="upload-avatar" type="file" name="avatar" id="avatar" accept=".jpg, .jpeg, .png" required>
        </div>
        <div clsss="btn-box">
            <button class="styled-btn" type="submit">Upload image</button></div>
    </form>

    <form action="app/users/edit-profile.php" method="post">
        <div>
            <label for="biography">Biography</label>
            <textarea class="biography" type="text" name="biography" required><?php echo $getUser['biography']; ?></textarea>
            <small>Please provide the your biography.</small>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $getUser['email'] ?>" required>
            <small>Please provide your email.</small>
        </div>
        <div clsss="btn-box">
            <button class="styled-btn" type="submit"> Change</button></div>
    </form>

    <form action="app/users/edit-password.php" method="post">
        <div>
            <label for="old-password"> Old Password</label>
            <input type="password" name="old-password" required>
            <small>Please provide your old password.</small>
        </div>
        <div>
            <label for="new-password">New Password</label>
            <input type="password" name="new-password" required>
            <small>Please provide your new password.</small>
        </div>
        <div>
            <label for="confirm-password">Confirm Password</label>
            <input type="password" name="confirm-password" required>
            <small>Please provide your new password.</small>
        </div>
        <div clsss="btn-box">
            <button class="styled-btn" type="submit">Change password</button></div>

    </form>

    <div class="logout-box">
        <a href="/app/users/logout.php">
            <button class="warning-btn logout">Log out</button>
        </a>
    </div>

</article>

<?php require __DIR__ . '/views/footer.php'; ?>