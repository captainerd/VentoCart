<?= $header ?>

<div id="checkout-cart" class="container shadow   bg-white pb-5 p-2">


  <?= $breadcrumb ?>

  <?php if ($attention): ?>
    <div class="alert alert-info"><i class="fa-solid fa-circle-info"></i> <?= $attention ?> <button type="button"
        class="btn-close" data-bs-dismiss="alert"></button></div>
  <?php endif; ?>
  <?php if ($success): ?>
    <div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> <?= $success ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>
  <?php if (!empty($error_warning)): ?>
    <div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i>
      <?= $error_warning ?> <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
  <?php endif; ?>
  <div class="row"><?= $column_left ?>
    <?= $content_top ?>
    <div id="content " class="col border m-2   rounded p-4">
      <h3><?= $heading_title ?><?php if ($weight): ?> (<?= $weight ?>)<?php endif; ?></h3>
      <div class=" " id="shopping-cart"><?= $list ?></div>


      <br />
      <div class="row">
        <div class="col"><a href="<?= $continue ?>" class="btn btn-light"><?= $button_shopping ?></a></div>
        <div class="col text-end"><a href="<?= $checkout ?>"
            class="btn btn-primary btn-wide"><?= $button_checkout ?></a></div>
      </div>
      <?= $content_bottom ?>
    </div>
    <?= $column_right ?>
  </div>
</div>
<script><!--
$('#shopping-cart').on('submit', 'form', function (e) {
    e.preventDefault();

    var element = this;

    if (e.originalEvent !== undefined && e.originalEvent.submitter !== undefined) {
        var button = e.originalEvent.submitter;
    } else {
        var button = '';
    }

    $.ajax({
        url: $(button).attr('formaction'),
        type: 'post',
        data: $(element).serialize(),
        dataType: 'json',
        beforeSend: function () {
            $(button).button('loading');
        },
        complete: function () {
            $(button).button('reset');
        },
        success: function (json) {
          //  //x console.log(json);

            if (json['redirect']) {
                location = json['redirect'];
            }

            if (json['error']) {
                $('#alert').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['error'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
            }

            if (json['success']) {
                $('#alert').prepend('<div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
            }

            $('#shopping-cart').load("index.php?route=checkout/cart.list&language=<?= $this->e($language) ?>", {}, function () {
  $('#header-cart').load("index.php?route=common/cart.info&language=<?= $this->e($language) ?>");
            });
        },
  error: function (xhr, ajaxOptions, thrownError) {
    //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
  }
    });
});
  //--></script>
<?= $footer ?>