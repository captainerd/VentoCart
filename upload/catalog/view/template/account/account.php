<?=  $header   ?>
<div id="account-account" class="container">
<?=  $breadcrumb  ?>
  <?php if ($success): ?>
    <div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> <?= $this->e($success ) ?></div>
  <?php endif; ?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($text_my_account ) ?></h1>
      <ul class="list-unstyled">
        <li><a href="<?=  $edit ?>"><?= $this->e($text_edit ) ?></a></li>
        <li><a href="<?=  $password ?>"><?= $this->e($text_password ) ?></a></li>
        <li><a href="<?=  $payment_method ?>"><?= $this->e($text_payment_method ) ?></a></li>
        <li><a href="<?=  $address ?>"><?= $this->e($text_address ) ?></a></li>
        <li><a href="<?=  $wishlist ?>"><?= $this->e($text_wishlist ) ?></a></li>
      </ul>
      <h2><?= $this->e($text_my_orders ) ?></h2>
      <ul class="list-unstyled">
        <li><a href="<?=  $order ?>"><?= $this->e($text_order ) ?></a></li>
        <li><a href="<?=  $subscription ?>"><?= $this->e($text_subscription ) ?></a></li>
        <li><a href="<?=  $download ?>"><?= $this->e($text_download ) ?></a></li>
        <?php if ($reward): ?>
          <li><a href="<?=  $reward ?>"><?= $this->e($text_reward ) ?></a></li>
        <?php endif; ?>
        <li><a href="<?=  $return ?>"><?= $this->e($text_return ) ?></a></li>
        <li><a href="<?=  $transaction ?>"><?= $this->e($text_transaction ) ?></a></li>
      </ul>
      <?php if ($affiliate): ?>
        <h2><?= $this->e($text_my_affiliate ) ?></h2>
        <ul class="list-unstyled">
          <?php if (!$tracking): ?>
            <li><a href="<?=  $affiliate ?>"><?= $this->e($text_affiliate_add ) ?></a></li>
          <?php else: ?>
            <li><a href="<?=  $affiliate ?>"><?= $this->e($text_affiliate_edit ) ?></a></li>
            <li><a href="<?=  $tracking ?>"><?= $this->e($text_tracking ) ?></a></li>
          <?php endif; ?>
        </ul>
      <?php endif; ?>
      <h2><?= $this->e($text_my_newsletter ) ?></h2>
      <ul class="list-unstyled">
        <li><a href="<?=  $newsletter ?>"><?= $this->e($text_newsletter ) ?></a></li>
      </ul>
      <?=  $content_bottom   ?></div>
    <?=  $column_right   ?></div>
</div>
<?=  $footer  ?>
