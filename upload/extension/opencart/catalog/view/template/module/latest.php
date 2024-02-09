<div class="container">
<h3><?=  $heading_title  ?></h3>
<div class="row<?php if ($axis == 'horizontal'): ?> row-cols-1 row-cols-sm-3 row-cols-md-4 row-cols-xl-5<?php endif; ?>">
    <?php foreach ($products as $product): ?>
        <div class="col mb-3"><?=   $product  ?></div>
    <?php endforeach; ?>
</div>
</div>