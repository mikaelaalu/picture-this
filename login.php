<?php require __DIR__ . '/views/header.php';

?>

<?php checkForConfirm(); ?>

<article class="login">
    <h1>Login</h1>

    <form class="login-form" action="app/users/login.php" method="post">
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="email@yrgo.com" required>
            <small>Please provide the your email address.</small>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="password" required>
            <small>Please provide the your password (passphrase).</small>
        </div>

        <div clsss="btn-box">
            <button class="login-btn" type="submit">Login</button>
        </div>
    </form>

    <div class='new-user-box'>
        <a clsss="new-user" href='new-user.php'> Not a member yet? Create account here..</a>
    </div>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>