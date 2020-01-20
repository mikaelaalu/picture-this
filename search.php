<?php require __DIR__ . '/views/header.php'; ?>

<div class="search-container">
  <form class="search-form" action="app/users/search.php" method="post">
    <input class="search-input" name="search-input" type="text" placeholder="Search">
  </form>
</div>

<div class="search-output-container">
  <ul class="search-output">
  </ul>
</div>

<?php require __DIR__ . '/views/footer.php'; ?>