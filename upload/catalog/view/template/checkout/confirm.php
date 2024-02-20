 

<h3><?= $this->e($column_summary ) ?></h3>
<div class="table-responsivec">
  <div class="totalcontainer"> 
  <div class="styled-items">
    <?php foreach ($products as $product): ?>
      <div class="styled-item">
        <div class="styled-item-content">
          <div>
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
          <div class="text-end"><?= $this->e($product['total']) ?></div>
        </div>
      </div>
    <?php endforeach; ?>

   
      <?php foreach ($totals as $total): ?>
    <?php if (($total['text'] > 0 || $total['text'] < 0) && $total['code'] !== 'total'): ?>

       
          <div class="styled-item">
            <div class="styled-item-content">
              <div class="text-end"><?= $this->e($total['title']) ?></div>
              <div class="text-end">
           
                   <?= $this->e($total['text']) ?> 
        
               
              </div>
            </div>
          </div>
 
        <?php endif; ?>
      <?php endforeach; ?>
 
  </div>

  </div>
 
<?php foreach ($totals as $total): ?>
<?php if ($total['text'] > 0 and $total['code'] == 'total'): ?>
  <div class="styled-item">
    <div class="styled-item-content">
      <div class="text-end"><?= $this->e($total['title']) ?></div>
      <div class="text-end">
        <b><?= $this->e($total['text']) ?></b>
      </div>
    </div>
    </div>
 
<?php endif; ?>
<?php endforeach; ?>
</div>