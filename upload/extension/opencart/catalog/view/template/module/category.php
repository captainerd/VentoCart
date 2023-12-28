<div class="list-group mb-3">
  <?php foreach ($categories as $category): ?>
    <?php if ($category['category_id'] == $category_id): ?>
      <a href="<?= $category['href'] ?>" class="list-group-item active"><?= $category['name'] ?></a>
      <?php if (isset($category['children'])): ?>
        <?php foreach ($category['children'] as $child): ?>
          <?php if ($child['category_id'] == $child_id): ?>
            <a href="<?= $child['href'] ?>" class="list-group-item active">&nbsp;&nbsp;&nbsp;- <?= $child['name'] ?></a>
          <?php else: ?>
            <a href="<?= $child['href'] ?>" class="list-group-item">&nbsp;&nbsp;&nbsp;- <?= $child['name'] ?></a>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endif; ?>
    <?php else: ?> <a href="<?= $category['href'] ?>" class="list-group-item"><?= $category['name'] ?></a>
    <?php endif; ?>
  <?php endforeach; ?>
</div>
