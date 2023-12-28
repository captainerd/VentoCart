<div class="container">
  <div class="row justify-content-center overflow-hidden">
    <div class="col-md">
      <div class="border p-2 rounded">
        <?php foreach ($products as $product): ?>
        <div class="row">
            <div class="col-md-2 col-12 p-2 text-center">
              <?php if ($product['thumb']): ?>

                <?php
                $videoExtensions = ['mp4', 'avi', 'mkv'];
                $popupExtension = pathinfo($product['thumb'], PATHINFO_EXTENSION);
                $isVideo = in_array($popupExtension, $videoExtensions);

                ?>

                <a href="<?= $product['href'] ?>">

                <?php if ($isVideo): ?>

                <video   class="img-thumbnail" style="pointer-events: none; width: 47px; height: 47px;"   muted >
                    <source src="<?=$product['thumb']?>" type="video/<?= $popupExtension ?>">
                    Your browser does not support the video tag.
                </video>
              


               
                  <?php else: ?>
                <img src="<?= $this->e($product['thumb']) ?>" alt="<?= $this->e($product['name']) ?>" title="<?= $this->e($product['name']) ?>" class="img-thumbnail"/>
                <?php endif; ?>
              </a>


              <?php endif; ?>
            </div>
            <div class="col-md-6 col-12">
              <a href="<?= $product['href'] ?>" class="text-decoration-none"><?=  $product['name'] ?></a>
              <?php if (!$product['stock']): ?>
                <span class="text-danger">***</span>
              <?php endif; ?>
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
                <small> - <?= $this->e($text_subscription ) ?>: <?= $this->e($product['subscription']) ?></small>
              <?php endif; ?>
            </div>
            <div class="col-md-2 col-12 p-2">
              <form method="post" data-oc-target="#shopping-cart" class="d-flex flex-nowrap">
                <div class="input-group d-flex flex-nowrap">
                  <input type="text" name="quantity" value="<?= $this->e($product['quantity']) ?>" size="1" class="form-control">
                  <input type="hidden" name="key" value="<?= $this->e($product['cart_id']) ?>">
                  <button type="submit" formaction="<?= $this->e($product_edit ) ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_update ) ?>" class="btn btn-primary"><i class="fa-solid fa-rotate"></i></button>
                  <button type="submit" formaction="<?= $this->e($product_remove ) ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_remove ) ?>" class="btn btn-danger"><i class="fa-solid fa-circle-xmark"></i></button>
                </div>
              </form>
            </div>
            
            <div class="col-md-2 col-12 text-end">
              <div  class="d-flex flex-column text-end">
                <div class="mb-2">
                  <strong><?= $this->e($column_total ) ?></strong> <?= $this->e($product['total']) ?>
                </div>
                <div>
                  <strong><?= $this->e($column_price ) ?></strong> <?= $this->e($product['price']) ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        <?php foreach ($vouchers as $voucher): ?>
          <div class="row ">
            <div class="col-md-2 col-12"></div>
            <div class="col-md-2 col-12 text-wrap">
              <?= $this->e($voucher['description']) ?>
            </div>
            <div class="col-md-4 col-12">
              <form method="post" data-oc-target="#shopping-cart">
                <div class="input-group">
                  <input type="text" name="quantity" value="1" size="1" class="form-control" disabled/>
                  <button type="submit" formaction="<?= $this->e($voucher_remove ) ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_remove ) ?>" class="btn btn-danger"><i class="fa-solid fa-circle-xmark"></i></button>
                </div>
                <input type="hidden" name="key" value="<?= $this->e($voucher['key']) ?>"/>
              </form>
            </div>
            <div class="col-md-4 col-12 text-end">
              <div class="d-flex p-2  flex-column justify-content-center">
                <div><?= $this->e($voucher['amount']) ?></div>
                <div><?= $this->e($voucher['amount']) ?></div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="row">
      <div class="border p-2 rounded">
     
        <?php foreach ($totals as $total): ?>
          <div class="row">
            <div class="col-md-12 text-end">
              <div class="d-flex flex-column justify-content-center">
                <div>
                  <strong><?= $this->e($total['title']) ?></strong> <?= $this->e($total['text']) ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
