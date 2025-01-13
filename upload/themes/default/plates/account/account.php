<?= $header ?>
<div id="account-account" class="container">
  <?= $breadcrumb ?>
  <?php if ($success): ?>
    <div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> <?= $this->e($success) ?>
    </div>
  <?php endif; ?>
  <div class="row"><?= $column_left ?>


    <div id="content" class="col"><?= $content_top ?>




      <div class="row">
        <div class="col-md-12 mb-2">
          <div class="card">
            <div class="card-header">
              <strong class="card-title"><?= $this->e($text_my_account) ?></strong>
            </div>
            <div class="card-body p-2    align-items-center text-center icon-cards">

              <a href="<?= $edit ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom"
                title="<?= $this->e($text_edit) ?>">
                <i class="fas fa-edit fa-2x"></i>
                <span class="d-block icon-text"><?= $this->e($text_edit) ?></span>
              </a>


              <a href="<?= $password ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom"
                title="<?= $this->e($text_password) ?>">
                <i class="fas fa-key fa-2x"></i>
                <span class="d-block"><?= $this->e($text_password) ?></span>
              </a>

              <a href="<?= $payment_method ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom"
                title="<?= $this->e($text_payment_method) ?>">
                <i class="fas fa-credit-card fa-2x"></i>
                <span class="d-block"><?= $this->e($text_payment_method) ?></span>
              </a>


              <a href="<?= $address ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom"
                title="<?= $this->e($text_address) ?>">
                <i class="fas fa-address-card fa-2x"></i>
                <span class="d-block"><?= $this->e($text_address) ?></span>
              </a>


              <a href="<?= $wishlist ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom"
                title="<?= $this->e($text_wishlist) ?>">
                <i class="fas fa-heart fa-2x"></i>
                <span class="d-block"><?= $this->e($text_wishlist) ?></span>
              </a>


              <a href="<?= $newsletter ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom"
                title="<?= $this->e($text_newsletter) ?>">
                <i class="fas fa-envelope-open-text fa-2x"></i>
                <span class="d-block"><?= $this->e($text_newsletter) ?></span>
              </a>

            </div>
          </div>
        </div>
      </div>




      <div class="row">
        <div class="col-md-12  mb-2">
          <div class="card">
            <div class="card-header">
              <strong class="card-title"><?= $this->e($text_my_orders) ?></strong>
            </div>
            <div class="card-body p-2   align-items-center text-center  icon-cards">

              <a href="<?= $order ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom"
                title="<?= $this->e($text_order) ?>">
                <i class="fas fa-shopping-basket fa-2x"></i>
                <span class="d-block"><?= $this->e($text_my_orders) ?></span>
              </a>

              <a href="<?= $subscription ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom"
                title="<?= $this->e($text_subscription) ?>">
                <i class="fas fa-box-open fa-2x"></i>
                <span class="d-block"><?= $this->e($text_subscription) ?></span>
              </a>

              <a href="<?= $giftcard_link ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom"
                title="<?= $this->e($text_giftcards) ?>">
                <i class="fas fa-gift fa-2x"></i>
                <span class="d-block"><?= $this->e($text_giftcards) ?></span>
              </a>

              <a href="<?= $download ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom"
                title="<?= $this->e($text_download) ?>">
                <i class="fas fa-download fa-2x"></i>
                <span class="d-block"><?= $this->e($text_download) ?></span>
              </a>

              <?php if ($reward): ?>

                <a href="<?= $reward ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom"
                  title="<?= $this->e($text_reward) ?>">
                  <i class="fas fa-gift fa-2x"></i>
                  <span class="d-block"><?= $this->e($text_reward) ?></span>
                </a>

              <?php endif; ?>

              <a href="<?= $return ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom"
                title="<?= $this->e($text_return) ?>">
                <i class="fas fa-undo fa-2x"></i>
                <span class="d-block"><?= $this->e($text_return) ?></span>
              </a>



            </div>
          </div>
        </div>
      </div>




      <div class="row">
        <?php if ($affiliate): ?>
          <div class="col-md-12  mb-2">
            <div class="card">
              <div class="card-header">
                <strong class="card-title"><?= $this->e($text_my_affiliate) ?></strong>
              </div>
              <div class="card-body  align-items-center text-center  p-2 icon-cards">

                <?php if (!$tracking): ?>

                  <a href="<?= $affiliate ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom"
                    title="<?= $this->e($text_affiliate_add) ?>">
                    <i class="fas fa-user-plus fa-2x"></i>
                    <span class="d-block"><?= $this->e($text_affiliate_add) ?></span>
                  </a>

                <?php else: ?>

                  <a href="<?= $affiliate ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom"
                    title="<?= $this->e($text_affiliate_edit) ?>">
                    <i class="fas fa-user-edit fa-2x"></i>
                    <span class="d-block"><?= $this->e($text_affiliate_edit) ?></span>
                  </a>


                  <a href="<?= $tracking ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom"
                    title="<?= $this->e($text_tracking) ?>">
                    <i class="fas fa-map-pin fa-2x"></i>
                    <span class="d-block"><?= $this->e($text_tracking) ?></span>
                  </a>
                  <a href="<?= $transaction ?>" class="btn btn-link" data-toggle="tooltip" data-placement="bottom"
                    title="<?= $this->e($text_transaction) ?>">
                    <i class="fas fa-money-bill-wave fa-2x"></i>
                    <span class="d-block"><?= $this->e($text_transaction) ?></span>
                  </a>

                <?php endif; ?>

              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>





      <?= $content_bottom ?>
    </div>
    <?= $column_right ?>
  </div>
</div>
<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>
<?= $footer ?>