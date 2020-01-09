<?php require __DIR__ . '/views/header.php'; ?>

<p><?php checkForError(); ?></p>

<article class="new-user">
    <h1>Create new account</h1>

    <form action="app/users/new-user.php" method="post">
        <div>
            <label for="name">Name</label>
            <input type="name" name="name" placeholder="Enter you name" required>
            <small>Please provide your name.</small>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="yrgo@email.com" required>
            <small>Please provide your email address.</small>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="password" required>
            <small>Please provide your password (passphrase).</small>
        </div>

        <div>
            <label for="password-confirm">Confirm password</label>
            <input type="password" name="password-confirm" placeholder="password" required>
            <small>Please provide your password (passphrase).</small>
        </div>

        <div clsss="btn-box">
            <button class="login-btn start-account" type="submit">Create account</button>
        </div>
    </form>
</article>



<?php require __DIR__ . '/views/footer.php'; ?>