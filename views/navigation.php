<nav>
    <ul>
        <?php if (isset($_SESSION['user']['id'])) : ?>
            <li>
                <a href="/index.php">

                    <img class="nav-icon" src="/icons/home.png" alt="home-page">


                </a>
            </li>
        <?php endif; ?>

        <?php if (isset($_SESSION['user']['id'])) : ?>
            <li>
                <a href="/following.php">
                    <img class="nav-icon" src="/icons/unliked.png" alt="home-page">
                </a>
            </li>
        <?php endif; ?>


        <?php if (isset($_SESSION['user']['id'])) : ?>
            <li>
                <a href="/new-post.php">
                    <img class="nav-icon" src="/icons/add.png" alt="new post">
                </a>
            </li>
        <?php endif; ?>



        <?php if (isset($_SESSION['user'])) : ?>
            <li> <a href=" <?php echo "/profile.php?id=" . $_SESSION['user']['id'] ?> ">
                    <img class="nav-icon" src="/icons/avatar.png" alt="profile-page">
                </a> </li>
        <?php endif; ?>

    </ul><!-- /navbar-nav -->
</nav><!-- /navbar -->