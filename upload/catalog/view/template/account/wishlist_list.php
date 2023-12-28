<?php if ($products): ?>
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <td class="text-center"><strong><?= $this->e($column_image ) ?></strong></td>
          <td class="text-start"><strong><?= $this->e($column_name ) ?></strong></td>
          <td class="text-start"><strong><?= $this->e($column_model ) ?></strong></td>
          <td class="text-end"><strong><?= $this->e($column_stock ) ?></strong></td>
          <td class="text-end"><strong><?= $this->e($column_price ) ?></strong></td>
          <td class="text-end"><strong><?= $this->e($column_action ) ?></strong></td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $product): ?>
          <tr>
            <td class="text-center"><?php if ($product['thumb']): ?><a href="<?= $product['href'] ?>"><img src="<?= $this->e($product['thumb']) ?>" alt="<?= $this->e($product['name']) ?>" title="<?= $this->e($product['name']) ?>"/></a><?php endif; ?></td>
            <td class="text-start"><a href="<?= $product['href'] ?>"><?= $this->e($product['name']) ?></a></td>
            <td class="text-start"><?= $this->e($product['model']) ?></td>
            <td class="text-end"><?= $this->e($product['stock']) ?></td>
            <td class="text-end">
              <?php if ($product['price']): ?>
                <div class="price">
                  <?php if (!$product['special']): ?>
                    <?= $this->e($product['price']) ?>
                  <?php else: ?>
                    <b><?= $this->e($product['special']) ?></b> <s><?= $this->e($product['price']) ?></s>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </td>
            <td class="text-end">
              <form method="post" data-oc-toggle="ajax" data-oc-load="<?= $this->e($wishlist ) ?>" data-oc-target="#wishlist">
                <input type="hidden" name="product_id" value="<?= $this->e($product['product_id']) ?>"/> <input type="hidden" name="quantity" value="<?= $this->e($product['minimum']) ?>"/>
                <button type="submit" formaction="<?= $this->e($add_to_cart ) ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_cart ) ?>" class="btn btn-primary"><i class="fa-solid fa-cart-shopping fa-fw"></i></button>
                <button type="submit" formaction="<?= $this->e($remove ) ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_remove ) ?>" class="btn btn-danger"><i class="fa-solid fa-circle-xmark fa-fw"></i></button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <p><?= $this->e($text_no_results ) ?></p>
<?php endif; ?>
