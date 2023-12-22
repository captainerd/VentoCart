<div class="list-group mb-3">
  <?php foreach ($categories as $category): ?>
    <?php if ($category['category_id'] == $category_id): ?>
      <a href="<?= $this->e($category['href']) ?>" class="list-group-item active"><?= $this->e($category['name']) ?></a>
      <?php if (isset($category['children'])): ?>
        <?php foreach ($category['children'] as $child): ?>
          <?php if ($child['category_id'] == $child_id): ?>
            <a href="<?= $this->e($child['href']) ?>" class="list-group-item active">&nbsp;&nbsp;&nbsp;- <?= $this->e($child['name']) ?></a>
          <?php else: ?>
            <a href="<?= $this->e($child['href']) ?>" class="list-group-item">&nbsp;&nbsp;&nbsp;- <?= $this->e($child['name']) ?></a>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endif; ?>
    <?php else: ?> <a href="<?= $this->e($category['href']) ?>" class="list-group-item"><?= $this->e($category['name']) ?></a>
    <?php endif; ?>
  <?php endforeach; ?>
</div>
