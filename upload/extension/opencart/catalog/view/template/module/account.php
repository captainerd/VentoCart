<div class="list-group mb-3">
  <?php if (!$logged): ?>
    <a href="<?=  $login   ?>" class="list-group-item"><?= $this->e($text_login ) ?></a> <a href="<?= $this->e($register ) ?>" class="list-group-item">
    <?= $this->e($text_register ) ?></a> 
    <a href="<?=  $forgotten   ?>" class="list-group-item"><?= $this->e($text_forgotten ) ?></a>
  <?php endif; ?>
  <a href="<?=  $account  ?>" class="list-group-item"><?= $this->e($text_account ) ?></a>
  <?php if ($logged): ?>
    <a href="<?= $edit   ?>" class="list-group-item"><?= $this->e($text_edit ) ?></a>
     <a href="<?= $password  ?>" class="list-group-item">
    <?= $this->e($text_password ) ?></a>
  <?php endif; ?>
  <a href="<?=  $address  ?>" class="list-group-item"><?= $this->e($text_address ) ?></a> 
  <a href="<?=  $wishlist ?>" class="list-group-item"><?= $this->e($text_wishlist ) ?></a> 
  <a href="<?=  $order   ?>" class="list-group-item"><?= $this->e($text_order ) ?></a> 
  <a href="<?=  $download   ?>" class="list-group-item"><?= $this->e($text_download ) ?></a>
  <a href="<?=  $subscription   ?>" class="list-group-item">
  <?= $this->e($text_subscription ) ?></a> 
  <a href="<?=  $reward   ?>" class="list-group-item"><?= $this->e($text_reward ) ?></a> 
  <a href="<?=  $return  ?>" class="list-group-item"><?= $this->e($text_return ) ?></a>
   <a href="<?=  $transaction   ?>" class="list-group-item"><?= $this->e($text_transaction ) ?></a> 
   <a href="<?=  $newsletter  ?>" class="list-group-item"><?= $this->e($text_newsletter ) ?></a>
  <?php if ($logged): ?>
    <a href="<?=  $logout   ?>" class="list-group-item"><?= $this->e($text_logout ) ?></a>
  <?php endif; ?>
</div>
