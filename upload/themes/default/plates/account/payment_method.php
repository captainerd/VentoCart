<?= $header ?>
<div id="account-payment-method" class="container">
    <?= $breadcrumb ?>
    <div class="row"><?= $column_left ?>
        <div id="content" class="col  p-3 bg-white border"><?= $content_top ?>
            <h1><?= $this->e($heading_title) ?></h1>

            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <i class="fas fa-shield-alt fa-2x"></i>
                <?= $text_payment_storage ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div id="payment-method"><?= $list ?></div>
            <a href="#" class="btn btn-primary m-4 addpayment"><i class="fas fa-plus-circle"></i> <?= $button_add ?></a>
            <div class="text-end"><a href="<?= $continue ?>"
                    class="btn btn-primary"><?= $this->e($button_continue) ?></a></div>
            <?= $content_bottom ?>
        </div>
        <?= $column_right ?>
    </div>
</div>
<script><!--
$('#payment-method').on('click', '.btn-danger', function (e) {
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

                $('#payment-method').load('index.php?route=account/payment_method.list&customer_token=<?= $this->e($customer_token) ?>');
            }
        },
    error: function (xhr, ajaxOptions, thrownError) {
        //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    }
    });
});
    //--></script>


<script>
    $(document).ready(function () {
        $('.addpayment').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            $.ajax({
                url: 'index.php?route=checkout/cart.add&language=en-gb',
                type: 'POST',
                data: {
                    product_id: -1,
                    quantity: 1,
                    virual_product_name: 'Add New Payment Method',
                    virual_product_info: '0',
                    virtual_price: 0
                },
                dataType: 'json',
                success: function (response) {
                    // On success
                    if (response.success) {
                        // Redirect to checkout page
                        window.location.href = 'index.php?route=checkout/checkout&language=en-gb';
                    }
                },
                error: function (xhr, status, error) {
                    // On error
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

<?= $footer ?>