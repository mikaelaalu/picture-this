<?php require __DIR__ . '/views/header.php';

if (isset($_SESSION['error'])) {
    foreach ($_SESSION['error'] as $error) {
        echo $error;
        unset($_SESSION['error']);
    }
} ?>

<article>

    <h1><?php echo $config['title']; ?></h1>
    <p>This is the home page.</p>

    <?php if (isset($_SESSION['user'])) : ?>
        <?php $user = $_SESSION['user'];
            echo "Welcome " . $user['name']; ?>


        <a href="new-post.php"> <button>New post</button> </a>

    <?php endif; ?>





</article>

<?php require __DIR__ . '/views/footer.php'; ?>