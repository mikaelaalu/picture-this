<?php require __DIR__ . '/views/header.php'; ?>

<p><?php checkForError(); ?></p>

<article>
    <h1>Create new account</h1>

    <form action="app/users/new-user.php" method="post">
        <div>
            <label for="name">Name</label>
            <input type="name" name="name" placeholder="Enter you name" required>
            <small>Please provide the your name.</small>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="email@email.com" required>
            <small>Please provide the your email address.</small>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" required>
            <small>Please provide the your password (passphrase).</small>
        </div>
        <div clsss="btn--box">
            <button type="submit">Create account</button>
        </div>
    </form>
</article>



<?php require __DIR__ . '/views/footer.php'; ?>