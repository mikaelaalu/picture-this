<?php require __DIR__ . '/views/header.php'; ?>

<div class="search-container">
  <input class="search-input" name="search-input" type="text" placeholder="Search">
</div>

<div class="search-output">
  <ul>
    <?php foreach ($searchOutputs as $searchOutput) : ?>
      <li><img src="<?php echo $searchOutput['avatar_name'] ?>" alt="avatar"><?php echo $searchOutput['name'] ?></li>
    <?php endforeach; ?>
  </ul>
</div>

<?php require __DIR__ . '/views/footer.php'; ?>