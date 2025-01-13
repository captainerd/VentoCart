<?php if ($products): ?>
  <div class="offcanvas-body border overflow-hidden p-2">
    <div class="cart-side-items  ">
      <?php foreach ($products as $product): ?>
        <div class="border-bottom pb-3 p-2 mb-3 bg-light border rounded ">
          <div class="row">
            <!-- Product quantity and name on the same line -->
            <div class="col-12 text-truncate">
              <span class="text-muted small">x <?= $this->e($product['quantity']) ?></span>
              <a href="<?= $product['href'] ?>" class="fw-bold text-decoration-none">
                <?= $this->e($product['name']) ?>
              </a>
            </div>
          </div>
          <div class="row align-items-center mt-2">
            <!-- Thumbnail -->
            <div class="col-2 text-center">
              <?php if ($product['thumb']): ?>
                <?php
                $videoExtensions = ['mp4', 'avi', 'mkv'];
                $popupExtension = pathinfo($product['thumb'], PATHINFO_EXTENSION);
                $isVideo = in_array($popupExtension, $videoExtensions);
                ?>
                <a class="d-block" href="<?= $product['href'] ?>">
                  <?php if ($isVideo): ?>
                    <video class="img-thumbnail" style="pointer-events: none; width: 47px; height: 47px;" muted>
                      <source src="<?= $product['thumb'] ?>" type="video/<?= $popupExtension ?>">
                      Your browser does not support the video tag.
                    </video>
                  <?php else: ?>
                    <img src="<?= $this->e($product['thumb']) ?>" alt="<?= $this->e($product['name']) ?>"
                      title="<?= $this->e($product['name']) ?>" class="img-thumbnail" />
                  <?php endif; ?>
                </a>
              <?php endif; ?>
            </div>

            <!-- Product details -->
            <div class="col-7">
              <div class="small text-muted">
                <?php if ($product['option']): ?>
                  <?php foreach ($product['option'] as $option): ?>
                    <div>- <?= $this->e($option['name']) ?>: <?= $this->e($option['value']) ?></div>
                  <?php endforeach; ?>
                <?php endif; ?>

                <?php if ($product['reward']): ?>
                  <div>- <?= $this->e($text_points) ?>: <?= $this->e($product['reward']) ?></div>
                <?php endif; ?>

                <?php if ($product['subscription']): ?>
                  <div>- <?= $this->e($text_subscription) ?>: <?= $this->e($product['subscription']) ?></div>
                <?php endif; ?>
              </div>
            </div>

            <!-- Remove button -->
            <div class="col-2 text-end">
              <form action="<?= $product_remove ?>" method="post" data-oc-toggle="ajax"
                data-oc-load="<?= $this->e($list) ?>" data-oc-target="#header-cart">
                <input type="hidden" name="key" value="<?= $this->e($product['cart_id']) ?>">
                <button class="btn btn-light" type="submit" data-bs-toggle="tooltip" title="<?= $button_remove ?>">
                  <i class="fa-solid fa-trash text-danger"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="row">
      <div class="col-12 p-2">
        <ul class="list-unstyled  bg-light rounded p-2 list-cart-drawer mx-4">
          <?php foreach ($totals as $total): ?>
            <li class="d-flex justify-content-between">
              <span><strong><?= $this->e($total['title']) ?>:</strong></span>
              <span><?= $this->e($total['text']) ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <a href="<?= $cart ?>" class="btn btn-sm  btn-primary">
          <strong><i class="fa-solid fa-cart-shopping"></i> <?= $this->e($text_cart) ?></strong>
        </a>&nbsp;&nbsp;&nbsp;
        <a href="<?= $checkout ?>" class="btn btn btn-sm btn-secondary">
          <strong><i class="fa-solid fa-share"></i> <?= $this->e($text_checkout) ?></strong>
        </a>
      </div>
    </div>
  </div>
<?php else: ?>

  <?= $this->e($text_no_results) ?>

<?php endif; ?>
<? /* update badge */ ?>
<script>

  if (document.getElementById('cartbadge')) {


    if (parseInt("<?= $text_items ?>".split(" ")[0]) > 0) {
      document.getElementById('cartbadge').innerText = parseInt("<?= $text_items ?>".split(" ")[0]);
      document.getElementById('cartbadge').classList.remove('d-none');
    }
  }
</script>