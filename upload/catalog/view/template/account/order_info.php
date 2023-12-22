<?=  $header    ?>
<div id="account-order" class="container">
<?=  $breadcrumb  ?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <div class="row row-cols-md-2">
        <div class="col">
          <table class="table table-bordered table-hover">
            <?php if ($invoice_no): ?>
              <tr>
                <td><strong><?= $this->e($text_invoice_no ) ?></strong></td>
                <td><?= $this->e($invoice_no ) ?></td>
              </tr>
            <?php endif; ?>
            <tr>
              <td><strong><?= $this->e($text_order_id ) ?></strong></td>
              <td>#<?= $this->e($order_id ) ?></td>
            </tr>
            <tr>
              <td><strong><?= $this->e($text_order_status ) ?></strong></td>
              <td><?= $this->e($order_status ) ?></td>
            </tr>
          </table>
        </div>
        <div class="col">
          <table class="table table-bordered table-hover">
            <?php if ($shipping_method): ?>
              <tr>
                <td><strong><?= $this->e($text_shipping_method ) ?></strong></td>
                <td><?= $this->e($shipping_method ) ?></td>
              </tr>
            <?php endif; ?>
            <tr>
              <td><strong><?= $this->e($text_payment_method ) ?></strong></td>
              <td><?= $this->e($payment_method ) ?></td>
            </tr>
            <tr>
              <td><strong><?= $this->e($text_date_added ) ?></strong></td>
              <td><?= $this->e($date_added ) ?></td>
            </tr>
          </table>
        </div>
      </div>
      <?php if (isset($payment_address) || isset($shipping_address)): ?>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <?php if (isset($payment_address)): ?>
                <td class="text-start align-top"><strong><?=  $text_payment_address   ?></strong></td>
              <?php endif; ?>
              <?php if (isset($shipping_address)): ?>
                <td class="text-start align-top"><strong><?=  $text_shipping_address   ?></strong></td>
              <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php if (isset($payment_address)): ?>
                <td class="text-start align-top"><?=  $payment_address   ?></td>
              <?php endif; ?>
              <?php if (isset($shipping_address)): ?>
                <td class="text-start align-top"><?=  $shipping_address   ?></td>
              <?php endif; ?></tr>
          </tbody>
        </table>
      <?php endif; ?>
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <td class="text-start"><strong><?= $this->e($column_name ) ?></strong></td>
              <td class="text-start"><strong><?= $this->e($column_model ) ?></strong></td>
              <td class="text-end"><strong><?= $this->e($column_quantity ) ?></strong></td>
              <td class="text-end"><strong><?= $this->e($column_price ) ?></strong></td>
              <td class="text-end"><strong><?= $this->e($column_total ) ?></strong></td>
              <?php if ($products): ?>
                <td class="text-end"><strong><?= $this->e($column_action ) ?></strong></td>
              <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($products as $product): ?>
              <tr>
                <td class="text-start"><a href="<?= $this->e($product['href']) ?>"><?= $this->e($product['name']) ?></a>
                  <?php foreach ($product['option'] as $option): ?>
                    <br/>
                    <small> - <?= $this->e($option['name']) ?>: <?= $this->e($option['value']) ?></small>
                  <?php endforeach; ?>
                  <?php if (isset($product['reward'])): ?>
                    <br/>
                    <small> - <?= $this->e($text_points ) ?>: <?= $this->e($product['reward']) ?></small>
                  <?php endif; ?>
                  <?php if ($product['subscription']): ?>
                    <br/>
                    <small> - <?= $this->e($text_subscription ) ?>: <a href="<?= $this->e($product['subscription']) ?>" target="_blank"><?= $this->e($product['subscription_description']) ?></a></small>
                  <?php endif; ?>
                </td>
                <td class="text-start"><?= $this->e($product['model']) ?></td>
                <td class="text-end"><?= $this->e($product['quantity']) ?></td>
                <td class="text-end"><?= $this->e($product['price']) ?></td>
                <td class="text-end"><?= $this->e($product['total']) ?></td>
                <td class="text-end text-nowrap"><?php if (isset($product['reorder'])): ?><a href="<?= $this->e($product['reorder']) ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_reorder ) ?>" class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></a><?php endif; ?>
                  <a href="<?= $this->e($product['return']) ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_return ) ?>" class="btn btn-danger"><i class="fa-solid fa-reply"></i></a></td>
              </tr>
            <?php endforeach; ?>

            <?php foreach ($vouchers as $voucher): ?>
              <tr>
                <td class="text-start"><?= $this->e($voucher['description']) ?></td>
                <td class="text-start"></td>
                <td class="text-end">1</td>
                <td class="text-end"><?= $this->e($voucher['amount']) ?></td>
                <td class="text-end"><?= $this->e($voucher['amount']) ?></td>
                <?php if ($products): ?>
                  <td></td>
                <?php endif; ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <?php foreach ($totals as $total): ?>
              <tr>
                <td colspan="3"></td>
                <td class="text-end"><b><?= $this->e($total['title']) ?></b></td>
                <td class="text-end"><?= $this->e($total['text']) ?></td>
                <?php if ($products): ?>
                  <td></td>
                <?php endif; ?>
              </tr>
            <?php endforeach; ?>
          </tfoot>
        </table>
      </div>
      <?php if ($comment): ?>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <td class="text-start"><strong><?= $this->e($text_comment ) ?></strong></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-start"><?= $this->e($comment ) ?></td>
            </tr>
          </tbody>
        </table>
      <?php endif; ?>
      <h2><?= $this->e($text_history ) ?></h2>
      <div id="history"><?=  $history  ?></div>
      <div class="text-end mt-3"><a href="<?= $continue  ?>" class="btn btn-primary"><?= $this->e($button_continue ) ?></a></div>
      <?=  $content_bottom  ?></div>
    <?=  $column_right  ?></div>
</div>
<script type="text/javascript"><!--
$('#history').on('click', '.pagination a', function(e) {
    e.preventDefault();

    $('#history').load(this.href);
});
//--></script>
<?=  $footer  ?>