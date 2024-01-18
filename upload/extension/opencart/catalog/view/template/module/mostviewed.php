<h3><?=  $heading_title  ?></h3>
<div class="row<?php if ($axis == 'horizontal'): ?> row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4<?php endif; ?>">
  <?php foreach ($products as $product): ?>
    <div class="col"><?=  $product  ?></div>
  <?php endforeach; ?>
</div>
