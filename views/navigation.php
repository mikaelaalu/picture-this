

<nav >
  <a href="#"><?php echo $config['title']; ?></a>

  <ul>
      <li>
          <a href="/index.php">Home</a>
      </li><!-- /nav-item -->

      <li>
          <a href="/about.php">About</a>
      </li><!-- /nav-item -->

<li>
    <?php if (isset($_SESSION['user'])): ?>
        <a  href="/app/users/logout.php">Logout</a>
        <?php else: ?>
         <a <?php echo $_SERVER['SCRIPT_NAME'] === '/login.php' ? 'active' : ''; ?>" href="login.php">Login</a>
    <?php endif; ?>
</li> 
  
    
     
  </ul><!-- /navbar-nav -->
</nav><!-- /navbar -->
