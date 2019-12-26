<nav>

    <ul>
        <?php if (isset($_SESSION['user']['id'])) : ?>
            <li>
                <a href="/index.php">
                    <img class="nav-icon" src="/icons/home.png" alt="home-page">
                </a>
            </li><!-- /nav-item -->
        <?php endif; ?>

        <!-- <li>
            <a href="/about.php">About</a>
        </li>/nav-item -->


        <?php if (isset($_SESSION['user'])) : ?>
            <li> <a href=" <?php echo "/profile.php?id=" . $_SESSION['user']['id'] ?> ">
                    <img class="nav-icon" src="/icons/avatar.png" alt="profile-page">
                </a> </li>
        <?php endif; ?>

        <li>
            <?php if (isset($_SESSION['user'])) : ?>
                <a href="/app/users/logout.php">
                    <img class="nav-icon" src="/icons/exit.png" alt="logout">
                </a>
            <?php else : ?>
                <a <?php echo $_SERVER['SCRIPT_NAME'] === '/login.php' ? 'active' : ''; ?>" href="login.php">Login</a>
            <?php endif; ?>
        </li>



    </ul><!-- /navbar-nav -->
</nav><!-- /navbar -->