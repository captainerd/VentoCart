<div class="dropdown d-grid">
  <button type="button" data-bs-toggle="dropdown" class="btn  btn-sm btn-dark btn-block dropdown-toggle">
    <i class="fa-solid fa-cart-shopping"></i> <?= $this->e($text_items ) ?>
  </button>

  <ul class="dropdown-menu dropdown-menu-end p-2 overflow-hidden">
   <?php if ($products || $vouchers): ?>
      <li>
        <?php foreach ($products as $product): ?>
          <div class="border-bottom mb-2 pb-2">
            <div class="row">
              <div class="col-4 col-md-2 text-center">
                <?php if ($product['thumb']): ?>
                 
                  <?php
                $videoExtensions = ['mp4', 'avi', 'mkv'];
                $popupExtension = pathinfo($product['thumb'], PATHINFO_EXTENSION);
                $isVideo = in_array($popupExtension, $videoExtensions);

                ?>




                  <a class="d-block" href="<?= $this->e($product['href']) ?>">
                  
                  <?php if ($isVideo): ?>
                    
                    <video   class="img-thumbnail" style="pointer-events: none; width: 47px; height: 47px; "   muted >
                    <source src="<?=$product['thumb']?>" type="video/<?= $popupExtension ?>">
                    Your browser does not support the video tag.
                </video>
                  

                     <?php else: ?>
                  
                  
                  <img src="<?= $this->e($product['thumb']) ?>" alt="<?= $this->e($product['name']) ?>" title="<?= $this->e($product['name']) ?>" class="img-thumbnail"/> 
                  <?php endif; ?>
                  </a>
                  <?php endif; ?>
              </div>
              <div class="col-7 col-md-4 text-start text-truncate overflow-hidden"  style="max-height: 60px;">
                <a href="<?= $this->e($product['href']) ?>"><?= $this->e($product['name']) ?></a>

                <?php if ($product['option']): ?>
                  <?php foreach ($product['option'] as $option): ?>
                    <br/>
                    <small> - <?= $this->e($option['name']) ?>: <?= $this->e($option['value']) ?></small>
                  <?php endforeach; ?>
                  
                <?php endif; ?>

                <?php if ($product['reward']): ?>
                  <br/>
                  <small> - <?= $this->e($text_points ) ?>: <?= $this->e($product['reward']) ?></small>
                <?php endif; ?>

                <?php if ($product['subscription']): ?>
                  <br/>
                  <small> - <?= $this->e($text_subscription ) ?>: <?= $this->e($product['subscription']) ?></small>
                <?php endif; ?>
              </div>
              <div class="col-4 col-md-2 text-end">x <?= $this->e($product['quantity']) ?></div>
              <div class="col-4 col-md-1 text-end"><?= $this->e($product['total']) ?></div>
              <div class="col-4 col-md-3 text-end">  <form action="<?= $product_remove  ?>" method="post" data-oc-toggle="ajax" data-oc-load="<?= $this->e($list ) ?>" data-oc-target="#header-cart">
                <input type="hidden" name="key" value="<?= $this->e($product['cart_id']) ?>">
                <button type="submit" data-bs-toggle="tooltip" title="<?= $button_remove  ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-circle-xmark"></i></button>
              </form></div>
            </div>

       
          </div>
        <?php endforeach; ?>

        <?php foreach ($vouchers as $voucher): ?>
          <div class="border-bottom mb-2 pb-2">
            <div class="row">
              <div class="col-3 col-md-2 text-center"></div>
              <div class="col-7 col-md-8 text-start"><?= $this->e($voucher['description']) ?></div>
              <div class="col-2 col-md-1 text-end">x 1</div>
              <div class="col-12 col-md-1 text-end"><?= $this->e($voucher['amount']) ?></div>
            </div>

            <div class="row">
              <div class="col-12 text-end">
                <form action="<?= $voucher_remove  ?>" method="post" data-oc-toggle="ajax" data-oc-load="<?= $this->e($list ) ?>" data-oc-target="#header-cart">
                  <input type="hidden" name="key" value="<?= $this->e($voucher['key']) ?>"/>
                  <button type="submit" data-bs-toggle="tooltip" title="<?= $this->e($button_remove ) ?>" class="btn  btn-sm btn-danger"><i class="fa-solid fa-circle-xmark"></i></button>
                </form>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        <div class="row">
          <div class="col-12 p-2 text-end">
            
            <?php foreach ($totals as $total): ?>
                <small><strong><?= $this->e($total['title']) ?>:</strong> <?= $this->e($total['text']) ?></small> <br/>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="row">
          <div class="col-12 text-end">
            <a href="<?=  $cart  ?>" class="btn  btn-sm btn-primary"><strong><i class="fa-solid fa-cart-shopping"></i> <?= $this->e($text_cart ) ?></strong></a>&nbsp;&nbsp;&nbsp;
            <a href="<?=  $checkout   ?>" class="btn  btn-sm btn-success"><strong><i class="fa-solid fa-share"></i> <?= $this->e($text_checkout ) ?></strong></a>
          </div>
        </div>
      </li>
    <?php else: ?>
      <li class="text-center p-4"><?= $this->e($text_no_results ) ?></li>
    <?php endif; ?>
  </ul>
</div>
