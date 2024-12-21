<div class="container bg-white  p-4 mt-5 mb-5 rounded shadow">
    <h3 class="p-2 multicolored-text "><?= $heading_title ?></h3>
    <div
        class="row<?php if ($axis == 'horizontal'): ?> row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4<?php endif; ?>">
        <?php foreach ($products as $product): ?>
            <div class="col mb-3"><?= $product ?></div>
        <?php endforeach; ?>
    </div>
</div>