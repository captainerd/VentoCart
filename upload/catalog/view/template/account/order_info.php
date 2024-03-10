<?=  $header    ?>
<div id="account-order" class="container">
<?=  $breadcrumb  ?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <div class="row row-cols-sm-1 row-cols-md-2">
    <div class="col col-12 col-md-6  mb-3">
        <div class="card h-100">
            <div class="card-body">
                <?php if ($invoice_no): ?>
                    <div class="row">
                        <div class="col-sm-6 border-bottom"><strong><?= $this->e($text_invoice_no ) ?></strong></div>
                        <div class="col-sm-6  border-bottom"><?= $this->e($invoice_no ) ?></div>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-sm-6  border-bottom"><strong><?= $this->e($text_order_id ) ?></strong></div>
                    <div class="col-sm-6  border-bottom">#<?= $this->e($order_id ) ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-6  border-bottom"><strong><?= $this->e($text_order_status ) ?></strong></div>
                    <div class="col-sm-6  border-bottom"><?= $this->e($order_status ) ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col col-12 col-md-6 mb-3">
        <div class="card">
            <div class="card-body">
                <?php if ($shipping_method): ?>
                    <div class="row">
                        <div class="col-sm-6  border-bottom"><strong><?= $this->e($text_shipping_method ) ?></strong></div>
                        <div class="col-sm-6 border-bottom"><?= $this->e($shipping_method ) ?></div>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-sm-6 border-bottom"><strong><?= $this->e($text_payment_method ) ?></strong></div>
                    <div class="col-sm-6 border-bottom"><?= $this->e($payment_method ) ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-6 border-bottom"><strong><?= $this->e($text_date_added ) ?></strong></div>
                    <div class="col-sm-6 border-bottom"><?= $this->e($date_added ) ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

      <?php if (isset($payment_address) || isset($shipping_address)): ?>
        <div class="card mb-3 ">
          <div class="card-body">
            <div class="row">
              <?php if (isset($payment_address)): ?>
                <div class="col-sm-6  border-bottom"><strong><?=  $text_payment_address   ?></strong></div>
                <div class="col-sm-6  border-bottom"><?=  $payment_address   ?></div>
              <?php endif; ?>
              <?php if (isset($shipping_address)): ?>
                <div class="col-sm-6  border-bottom"><strong><?=  $text_shipping_address   ?></strong></div>
                <div class="col-sm-6  border-bottom"><?=  $shipping_address   ?></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
    <?php foreach ($products as $product): ?>
        <div class="col mb-4">
            <div class="card  h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-6 border-bottom"><b><?= $this->e($column_name) ?></b></div>
                                <div class="col-sm-6 border-bottom"><?= $this->e($product['name']) ?></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 border-bottom"><b><?= $this->e($column_model ) ?></b></div>
                                <div class="col-sm-6 border-bottom"><?= $this->e($product['model']) ?></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 border-bottom"><b><?= $this->e($column_quantity ) ?></b></div>
                                <div class="col-sm-6 border-bottom"><?= $this->e($product['quantity']) ?></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 border-bottom"><b><?= $this->e($column_price ) ?></b></div>
                                <div class="col-sm-6 border-bottom"><?= $this->e($product['price']) ?></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 border-bottom"><b><?= $this->e($column_total ) ?></b></div>
                                <div class="col-sm-6 border-bottom"><?= $this->e($product['total']) ?></div>
                            </div>
                        </div>
                        <div class="col-12 mt-3 h-100 d-flex align-items-start justify-content-start">
                            <?php if (isset($product['reorder'])): ?>
                                <a href="<?= $product['reorder'] ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_reorder ) ?>" class="btn mx-2 btn-primary"><i class="fas fa-cart-shopping"></i></a>
                            <?php endif; ?>
                            <a href="<?= $product['return'] ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_return ) ?>" class="btn mx-2 btn-danger"><i class="fas fa-reply"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

      <?php if ($comment): ?>
        <div class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-12"><strong><?= $text_comment ?></strong></div>
              <div class="col-12"><?= $comment ?></div>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <h2><?= $this->e($text_history ) ?></h2>
      <div id="history"><?= $history ?></div>
      <div class="text-end mt-3"><a href="<?= $continue ?>" class="btn btn-primary"><?= $this->e($button_continue ) ?></a></div>
      <?= $content_bottom ?></div>
    <?= $column_right ?></div>
</div>
<script><!--
$('#history').on('click', '.pagination a', function(e) {
    e.preventDefault();

    $('#history').load(this.href);
});
--></script>
<?= $footer ?>
