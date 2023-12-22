<?php $header ?>
<div id="account-subscription" class="container">
<?php $breadcrumb?>
  <div class="row"><?php $column_left ?>
    <div id="content" class="col"><?php $content_top ?>
      <h1><?php $heading_title ?></h1>
      <div class="row row-cols-md-2">
        <div class="col">
          <table class="table table-bordered table-hover">
            <tr>
              <td><b><?php $text_subscription_id ?></b></td>
              <td>#<?php $subscription_id ?></td>
            </tr>
            <tr>
              <td><b><?php $text_status ?></b></td>
              <td><?php $subscription_status ?></td>
            </tr>
            <tr>
              <td><b><?php $text_order_id ?></b></td>
              <td>#<?php $order_id ?></td>
            </tr>
          </table>
        </div>
        <div class="col">
          <table class="table table-bordered table-hover">
          <?php if ($shipping_method): ?>
    <tr>
        <td><strong><?= $this->e($text_shipping_method) ?></strong></td>
        <td><?= $this->e($shipping_method) ?></td>
    </tr>
<?php endif; ?>
<tr>
    <td><strong><?= $this->e($text_payment_method) ?></strong></td>
    <td><?= $this->e($payment_method) ?></td>
</tr>
<tr>
    <td><b><?= $this->e($text_date_added) ?></b></td>
    <td><?= $this->e($date_added) ?></td>
</tr>
</table>
</div>
<?php if (isset($payment_address) || isset($shipping_address)): ?>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <?php if ($payment_address): ?>
                <td class="text-start align-top"><?= $this->e($text_payment_address) ?></td>
            <?php endif; ?>

            <?php if ($shipping_address): ?>
                <td class="text-start align-top"><?= $this->e($text_shipping_address) ?></td>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php if ($payment_address): ?>
                <td class="text-start align-top"><?= $this->e($payment_address) ?></td>
            <?php endif; ?>

            <?php if ($shipping_address): ?>
                <td class="text-start align-top"><?= $this->e($shipping_address) ?></td>
            <?php endif; ?>
        </tr>
        </tbody>
    </table>
<?php endif; ?>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-start w-50"><?php $text_description ?></td>
            <td class="text-start w-50"><?php $text_quantity ?></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-start"><a href="<?php $product ?>"><?php $name ?></a>
              <br/><?php $description ?></td>
            <td class="text-start"><?php $product_quantity ?></td>
          </tr>
        </tbody>
      </table>
      <h2><?php $text_history ?></h2>
      <div id="history"><?php $history ?></div>
      <h2><?php $text_order ?></h2>
      <div id="order"><?php $order ?></div>
      <div class="text-end mt-3"><a href="<?php $continue ?>" class="btn btn-primary"><?php $button_continue ?></a></div>
      <?php $content_bottom ?></div>
    <?php $column_right ?></div>
</div>
</div>
<script type="text/javascript"><!--
$('#history').on('click', '.pagination a', function(e) {
    e.preventDefault();

    $('#history').load(this.href);
});

$('#order').on('click', '.pagination a', function(e) {
    e.preventDefault();

    $('#order').load(this.href);
});
//--></script>
<?php $footer ?>
