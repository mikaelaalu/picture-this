<?php require __DIR__ . '/views/header.php';

?>
<p><?php checkForError(); ?></p>
<article>
    <h1>Login</h1>

    <form action="app/users/login.php" method="post">
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="email@email.com" required>
            <small>Please provide the your email address.</small>
        </div><!-- /form-group -->

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" required>
            <small>Please provide the your password (passphrase).</small>
        </div><!-- /form-group -->

        <div clsss="btn-box">
            <button type="submit">Login</button>
        </div>
    </form>

    <div clsss="btn-box">
        <a href='new-user.php'> <button> Create account</button> </a></div>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>