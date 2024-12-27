<?= $header ?>

<div id="checkout-checkout" class="container">
  <div id="overlay_loaderv" class="overlay">
    <div id="overlay_loader">
      Loading...
      <i class="fas spinner-checkout fa-spinner fa-pulse"></i>
    </div>
  </div>


  <div class="row"><?= $column_left ?>
    <div id="content" class="col  border bg-white mb-3 rounded shadow-sm p-4 "><?= $content_top ?>


      <div class="row">

        <?php if ($register || $payment_address || $shipping_address): ?>

          <div class="col-md-6 mb-3">
            <?php if ($register): ?>
              <div id="checkout-register"><?= $register ?></div>
            <?php endif; ?>
            <?php if ($payment_address): ?>
              <div id="checkout-payment-address"><?= $payment_address ?></div>
            <?php endif; ?>
            <?php if ($shipping_address): ?>
              <div id="checkout-shipping-address"><?= $shipping_address ?></div>
            <?php endif; ?>
          </div>

        <?php endif; ?>

        <div class="col">
          <?= $shipping_payment_methods ?>

          <div class="my-3">
            <?= $coupon ?>
          </div>
        </div>
      </div>
    </div>



    <div id="checkout-confirm" class="mb-3  border bg-white  rounded shadow-sm p-4 ">
      <button type="button" style="flex-grow: 1;" id="button-confirm" class="btn btn-danger ">
        <?= $text_fill_the_form ?>
      </button>
      <?= $confirm ?>
    </div>
    <div class=" border bg-white  d-flex justify-content-center align-items-center rounded shadow-sm p-4 mb-3"
      id="checkout-payment">


    </div>

    <?= $content_bottom ?>
  </div>
  <?= $column_right ?>
</div>
<?= $footer ?>

<script>
  $(document).ready(function () {
    $("#checkout-payment").html('');
    window.btntxt = "<?= $this->e($button_confirm) ?>";
  });

  window.onload = function () {
    var spinner = document.getElementById('overlay_loaderv');
    if (spinner) {
      spinner.style.display = 'none';
    }
  }
</script>