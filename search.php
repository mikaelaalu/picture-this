<?php require __DIR__ . '/views/header.php'; ?>

<div class="search-container">
  <form class="search-form" method="post">
    <input class="search-input" name="search-input" type="text" placeholder="Search" autocomplete="off" require>
  </form>
</div>

<div class="search-output-container">
  <ul class="search-output">
  </ul>
</div>

<?php require __DIR__ . '/views/footer.php'; ?>