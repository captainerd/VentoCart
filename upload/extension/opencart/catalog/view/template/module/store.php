<div class="card">
  <div class="card-header"><?= $heading_title ?></div>
  <p style="text-align: center;"><?= $text_store ?></p>
  <?php foreach ($stores as $store): ?>
      <?php if ($store['store_id'] == $store_id): ?>
          <a href="<?= $store['url'] ?>"><b><?= $store['name'] ?></b></a>
      <?php else: ?>
          <a href="<?= $store['url'] ?>"><?= $store['name'] ?></a>
      <?php endif; ?>
      <br/>
  <?php endforeach; ?>
  <br/>
</div>
