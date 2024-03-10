<?= $header ?>
<div id="account-subscription" class="container">
    <?= $breadcrumb ?>
    <div class="row">
        <?= $column_left ?>
        <div id="content" class="col">
            <?= $content_top ?>
            <h1><?= $heading_title ?></h1>
            <div class="row row-cols-md-2">
                <?php if (!empty( $shipping_method)):?>
                <div class="col mb-3">
                    <div class="card h-100">
                        <div class="card-header"><strong><?= $text_shipping_method ?></strong></div>
                        <div class="card-body">
                            <?= $shipping_method ?>
                        </div>
                    </div>
                </div>
                <?php endif?>
                <?php if (!empty($payment_address) || !empty($shipping_address)): ?>
                    <?php if (!empty($payment_address)): ?>
                    <div class="col-12 col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-header"><strong><?= $text_payment_address ?></strong></div>
                            <div class="card-body">
                                <?= $payment_address ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($shipping_address)): ?>
                    <div class="col-12 col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-header"><strong><?= $text_shipping_address ?></strong></div>
                            <div class="card-body">
                                <?= $shipping_address ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="card mb-3">
                <div class="card-header"><strong><?= $text_payment_method ?></strong></div>
                <div class="card-body">
                    <div class="input-group">
                        <select class="form-select" id="payment-method-select" name="payment-method">
                            <?php foreach ($saved_methods as $key => $method): ?>
                                <option value="<?= $method['id']; ?>" <?php if ($method['id'] === $default_payment_method): ?>selected<?php endif; ?>>
                                    <?= $method['name'] . " - " . $method['description'] . " ***" . $method['last_four']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <button class="btn addpayment btn-outline-secondary" type="button">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header"><strong><?= $text_description ?></strong></div>
                <div class="card-body">
                    <a href="<?= $product ?>"><?= $name ?></a><br>
                    <?= $description ?>
                </div>
            </div>
            <?= $content_bottom ?>
            <div class="text-end mt-3">
                <button class="btn btn-success btn-apply"><i class="fas fa-save"></i> <?= $button_save ?></button>
                <a href="<?= $continue ?>" class="btn btn-primary"><?= $button_continue ?></a>
            </div>
        </div>
        <?= $column_right ?>
    </div>
</div>

<script>
 $(document).ready(function(){
    $('#history').on('click', '.pagination a', function(e) {
        e.preventDefault();

        $('#history').load(this.href);
    });

    $('#order').on('click', '.pagination a', function(e) {
        e.preventDefault();

        $('#order').load(this.href);
    });

    $('.btn-apply').on('click', function(e) {
    e.preventDefault();

 
    let selectedPaymentMethod = $('#payment-method-select').val();
 
    $.ajax({
        url: 'index.php?route=account/subscription.edit',
        type: 'POST', 
        dataType: 'json',
        data: { 
            paymentMethod: selectedPaymentMethod, 
            method_code: '<?= $method_code ?>',
    track_id: '<?= $track_id ?>',
        },
    success: function(json) {
        if (json['error']) {
            $('#alert').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['error'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
        }

        if (json['success']) {
            $('#alert').prepend('<div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');

        }
    },
    error: function(xhr, status, error) {
        // Handle error response here if needed
        console.error(xhr.responseText);
    }
    });
});
   
 
    $('.addpayment').on('click', function(e) {
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
            success: function(response) {
                // On success
                if(response.success) {
                    // Redirect to checkout page
                    window.location.href = 'index.php?route=checkout/checkout&language=en-gb';
                }
            },
            error: function(xhr, status, error) {
                // On error
                console.error(xhr.responseText);
            }
        });
    });
});

</script>
<?= $footer ?>