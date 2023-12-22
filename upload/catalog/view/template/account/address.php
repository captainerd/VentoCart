<?=  $header    ?>
<div id="account-address" class="container">
<?=  $breadcrumb  ?>
  <?php if ($success): ?>
    <div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> <?= $this->e($success ) ?></div>
  <?php endif; ?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($text_address_book ) ?></h1>
      <div id="address"><?=  $list   ?></div>
      <div class="row">
        <div class="col">
          <a href="<?= $back   ?>" class="btn btn-light"><?= $this->e($button_back ) ?></a>
        </div>
        <div class="col text-end">
          <a href="<?=  $add   ?>" class="btn btn-primary"><?= $this->e($button_new_address ) ?></a>
        </div>
      </div>
      <?=  $content_bottom  ?></div>
    <?=  $column_right  ?></div>
</div>
<script type="text/javascript"><!--
$('#address').on('click', '.btn-danger', function (e) {
    e.preventDefault();

    var element = this;

    $.ajax({
        url: $(element).attr('href'),
        dataType: 'json',
        beforeSend: function () {
            $(element).prop('disabled', true);
        },
        complete: function () {
            $(element).prop('disabled', false);
        },
        success: function (json) {
            //x console.log(json);

            $('.alert-dismissible').remove();

            if (json['error']) {
                $('#address').before('<div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['error'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
            }

            if (json['success']) {
                $('#address').before('<div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');

                $('#address').load('index.php?route=account/address.list&language=<?= $this->e($language ) ?>&customer_token=<?=  $customer_token   ?>');
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});
//--></script>
<?=  $footer  ?>
