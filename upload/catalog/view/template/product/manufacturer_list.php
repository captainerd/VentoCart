<?=  $header    ?>
<div id="product-manufacturer" class="container">
<?=  $breadcrumb  ?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <?php if (isset($categories)): ?>
        <p><strong><?= $this->e($text_index ) ?></strong>
          <?php foreach ($categories as $category): ?>
            &nbsp;&nbsp;&nbsp;<a href="<?= $this->e($category['href']) ?>#<?= $this->e($category['name']) ?>"><?= $this->e($category['name']) ?></a>
          <?php endforeach; ?>
        </p>
        <?php foreach ($categories as $category): ?>
          <h2 id="<?= $this->e($category['name']) ?>"><?= $this->e($category['name']) ?></h2>
          <?php if (isset($category['manufacturer'])): ?>
            <?php foreach (array_chunk($category['manufacturer'], 4) as $manufacturers): ?>
              <div class="row mb-3">
                <?php foreach ($manufacturers as $manufacturer): ?>
                  <div class="col-sm-3"><a href="<?= $this->e($manufacturer['href']) ?>"><?= $this->e($manufacturer['name']) ?></a></div>
                <?php endforeach; ?>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php else: ?>
        <p><?= $this->e($text_no_results ) ?></p>
        <div class="text-end"><a href="<?= $this->e($continue ) ?>" class="btn btn-primary"><?= $this->e($button_continue ) ?></a></div>
      <?php endif; ?>
      <?=  $content_bottom  ?></div>
    <?=  $column_right  ?></div>
</div>
<?=  $footer  ?>