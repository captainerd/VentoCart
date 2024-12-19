<?=  $header    ?>
<div id="account-subscription" class="container">
<?=  $breadcrumb  ?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <div id="subscription-list">
      <?=$subscription_list?>
</div>

      <div class="text-end"><a href="<?=  $continue  ?>" class="btn btn-primary"><?= $this->e($button_continue ) ?></a></div>
      <?=  $content_bottom  ?></div>
    <?=  $column_right  ?></div>
</div>

<script>
$(".cancelSubscBtn").click(function(event) {
    // Display the warning message
    var confirmed = confirm("<?= $text_warrning ?>");

    // If the user clicks Cancel, prevent the default action
    if (!confirmed) {
        event.stopPropagation();
        event.preventDefault();
    }
});
</script>


<script ><!--
$('#subscription-list').on('click', '.btn-danger, .resumeSubbtn', function (e) {
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
            $('.alert-dismissible').remove();

            if (json['error']) {
                $('#alert').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['error'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
            }

            if (json['success']) {
                $('#alert').prepend('<div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');

                $('#subscription-list').load('index.php?route=account/subscription.list&customer_token=<?= $this->e($customer_token ) ?>');
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});
//--></script>

<?=  $footer  ?>