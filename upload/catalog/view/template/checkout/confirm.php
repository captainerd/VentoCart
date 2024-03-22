 

<h3 class="mt-3"><?= $this->e($column_summary ) ?></h3>
<div class="table-responsivec  p-3">
  <div class="totalcontainer"> 
  <div class="styled-items">
  <?php foreach ($products as $product): ?>
  <div class="styled-item mt-1">
    <div class="styled-item-content">
      <div class="row border-bottom">
        <div class="col-8">
          <?= $this->e($product['quantity']) ?> x <a href="<?= $product['href'] ?>"><?= $this->e($product['name']) ?></a>
          <?php foreach ($product['option'] as $option): ?>
            <br/>
            <small> - <?= $this->e($option['name']) ?>: <?= $this->e($option['value']) ?></small>
          <?php endforeach; ?>
          <?php if ($product['reward']): ?>
            <br/>
            <small> - <?= $this->e($text_points ) ?>: <?= $this->e($product['reward']) ?></small>
          <?php endif; ?>
          <?php if ($product['subscription']): ?>
            <br/>
            <small> - <?= $this->e($text_subscription ) ?> <?= $this->e($product['subscription']) ?></small>
          <?php endif; ?>
        </div>
        <div class="col-4 text-end">
          <span><?= $this->e($product['total']) ?></span>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

 
 
  </div>

  </div>
  <?php foreach ($totals as $index => $total): ?>
  <div class="styled-item">
    <div class="styled-item-content">
      <div class="row">
        <div class="col-8">
          <?php if ($index == count($totals) - 1): ?>
            <b><?= $this->e($total['title']) ?>:</b>
          <?php else: ?>
            <?= $this->e($total['title']) ?>:
          <?php endif; ?>
        </div>
        <div class="col-4 text-end">
          <?php if ($index == count($totals) - 1): ?>
            <b><?= $this->e($total['text']) ?></b>
          <?php else: ?> 
            <?= $this->e($total['text']) ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>



</div>