<?=  $header    ?>
<div id="product-compare" class="container">
<?=  $breadcrumb  ?>
  <?php if ($success): ?>
    <div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> <?= $this->e($success ) ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <?php if ($products): ?>
        <table class="table table-bordered">
          <thead>
            <tr>
            <td colspan="<?= $this->e(count($products) + 1) ?>"><strong><?= $this->e($text_product) ?></strong></td>

            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?= $this->e($text_name ) ?></td>
              <?php foreach ($products as $product): ?>
                <td><a href="<?= $this->e($product['href']) ?>"><strong><?= $this->e($product['name']) ?></strong></a></td>
              <?php endforeach; ?>
            </tr>
            <tr>
              <td><?= $this->e($text_image ) ?></td>
              <?php foreach ($products as $product): ?>
                <td class="text-center"><?php if ($product['thumb']): ?> <img src="<?= $this->e($product['thumb']) ?>" alt="<?= $this->e($product['name']) ?>" title="<?= $this->e($product['name']) ?>" class="img-thumbnail"/> <?php endif; ?></td>
              <?php endforeach; ?>
            </tr>
            <tr>
              <td><?= $this->e($text_price ) ?></td>
              <?php foreach ($products as $product): ?>
                <td><?php if (!$product['special']): ?>
                    <?= $this->e($product['price']) ?>
                  <?php else: ?>
                    <span class="price-new"><?= $this->e($product['special']) ?></span> <span class="price-old"><?= $this->e($product['price']) ?></span>
                  <?php endif; ?></td>
              <?php endforeach; ?>
            </tr>
            <tr>
              <td><?= $this->e($text_model ) ?></td>
              <?php foreach ($products as $product): ?>
                <td><?= $this->e($product['model']) ?></td>
              <?php endforeach; ?>
            </tr>
            <tr>
              <td><?= $this->e($text_manufacturer ) ?></td>
              <?php foreach ($products as $product): ?>
                <td><?= $this->e($product['manufacturer']) ?></td>
              <?php endforeach; ?>
            </tr>
            <tr>
              <td><?= $this->e($text_availability ) ?></td>
              <?php foreach ($products as $product): ?>
                <td><?= $this->e($product['availability']) ?></td>
              <?php endforeach; ?>
            </tr>
            <?php if (isset($review_status)): ?>
              <tr>
                <td><?= $this->e($text_rating ) ?></td>
                <?php foreach ($products as $product): ?>
                  <td class="rating">
                  <?php foreach (range(1, 5) as $i): ?>
                    <?php if ($product['rating'] < $i): ?>
                        <span class="fa-stack"><i class="fa-regular fa-star fa-stack-1x"></i></span>
                      <?php else: ?>
                        <span class="fa-stack"><i class="fa-solid fa-star fa-stack-1x"></i><i class="fa-regular fa-star fa-stack-1x"></i></span>
                      <?php endif; ?>
                    <?php endforeach; ?>
                    <br/>
                    <?= $this->e($product['reviews']) ?>
                  </td>
                <?php endforeach; ?>
              </tr>
            <?php endif; ?>
            <tr>
              <td><?= $this->e($text_summary ) ?></td>
              <?php foreach ($products as $product): ?>
                <td class="description"><?= $this->e($product['description']) ?></td>
              <?php endforeach; ?>
            </tr>
            <tr>
              <td><?= $this->e($text_weight ) ?></td>
              <?php foreach ($products as $product): ?>
                <td><?= $this->e($product['weight']) ?></td>
              <?php endforeach; ?>
            </tr>
            <tr>
              <td><?= $this->e($text_dimension ) ?></td>
              <?php foreach ($products as $product): ?>
                <td><?= $this->e($product['length']) ?> x <?= $this->e($product['width']) ?> x <?= $this->e($product['height']) ?></td>
              <?php endforeach; ?> </tr>
          </tbody>
          <?php foreach ($attribute_groups as $attribute_group): ?>
            <thead>
              <tr>
                <td colspan="<?= $this->e($products|length + 1 ) ?>"><strong><?= $this->e($attribute_group['name']) ?></strong></td>
              </tr>
            </thead>
            <?php foreach ($attribute_group['attribute'] as $key => $attribute): ?>
              <tbody>
                <tr>
                  <td><?= $this->e($attribute['name']) ?></td>
                  <?php foreach ($products as $product): ?>
                    <td><?php if ($product['attribute']['key']): ?><?= $this->e($product['attribute']['key'] ) ?><?php endif; ?></td>
                  <?php endforeach; ?>
                </tr>
              </tbody>
            <?php endforeach; ?>
          <?php endforeach; ?>
          <tr>
            <td></td>
            <?php foreach ($products as $product): ?>
              <td class="text-center">
                <form action="<?= $add_to_cart  ?>" method="post" data-oc-toggle="ajax" data-oc-load="<?=  $cart   ?>" data-oc-target="#header-cart">
                  <button type="submit" id="button-confirm" class="btn btn-primary btn-block"><?= $this->e($button_cart ) ?></button>
                  <input type="hidden" name="product_id" value="<?= $this->e($product['product_id']) ?>"/> <input type="hidden" name="quantity" value="<?= $this->e($product['minimum']) ?>"/>
                  <a href="<?=  $product['remove']  ?>" class="btn btn-danger btn-block"><?= $this->e($button_remove ) ?></a>
                </form>
              </td>
            <?php endforeach; ?>
          </tr>
        </table>
      <?php else: ?>
        <p><?= $this->e($text_no_results ) ?></p>
        <div class="text-end"><a href="<?=  $continue  ?>" class="btn btn-primary"><?= $this->e($button_continue ) ?></a></div>
      <?php endif; ?>
      <?=  $content_bottom  ?></div>
    <?=  $column_right  ?></div>
</div>
<?=  $footer  ?> 
