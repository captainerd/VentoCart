<style>
  /* Custom CSS for the styled div */
  .styled-item {
    padding: 10px;
    border-bottom: 1px solid #e1e1e1;
    border-radius: 4px; /* Adding border-radius to soften the edges */
    transition: background-color 0.2s ease; /* Adding a smooth transition effect */
  }

  .styled-item:hover {
    background-color: #f6f6f6;
  }

  .styled-item-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .table-responsivec {
    border-radius: 9px;
    padding: 3px;
    border: 0px solid #ccc;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); /* Adding box-shadow for 3D effect */
    margin-bottom: 10px;
    display: inline-block;
    margin-top: 10px;
 width: 100%;
 font-size: 14px;
 
  }

  .styled-totals {
    /* Add the following styles to move the totals outside the scrollable container */
    padding: 10px; /* Add some padding for spacing */
    border: 1px solid #e1e1e1;
    border-radius: 4px;
    margin-top: 10px;
  }
  .totalcontainer {
    max-height: 190px;
    overflow-y: auto;
  }
</style>

<legend id="paytitle"><?= $this->e($column_summary ) ?></legend>
<div class="table-responsivec">
  <div class="totalcontainer"> 
  <div class="styled-items">
    <?php foreach ($products as $product): ?>
      <div class="styled-item">
        <div class="styled-item-content">
          <div>
            <?= $this->e($product['quantity']) ?> x <a href="<?= $this->e($product['href']) ?>"><?= $this->e($product['name']) ?></a>
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
  </div>
<?php endif; ?>
<?php endforeach; ?>