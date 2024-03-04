<?= $header ?>
<div id="account-subscription" class="container">
    <?= $breadcrumb ?>
    <div class="row">
        <?= $column_left ?>
        <div id="content" class="col">
            <?= $content_top ?>
            <h1>
                <?= $heading_title ?>
            </h1>
            <div class="row row-cols-md-2">
                <div class="col">
                    <table class="table table-bordered table-hover">
                        <?php if ($shipping_method): ?>
                            <tr>
                                <td><strong>
                                        <?= $text_shipping_method ?>
                                    </strong></td>
                                <td>
                                    <?= $shipping_method ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <td><strong>
                                    <?= $text_payment_method ?>
                                </strong></td>
                            <td>

                                <div class="input-group">
                                    <select class="form-select" id="payment-method-select" name="payment-method">
                                        <?php foreach ($saved_methods as $key => $method): ?>
                                            <option value="<?php echo $method['id']; ?>" <?php if ($method['id'] === $default_payment_method): ?>selected<?php endif; ?>>
                                                <?php echo $method['name'] . " " . $method['description']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <button class="btn addpayment btn-outline-secondary" type="button">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>



                            </td>
                        </tr>
                        <tr>
                            <td><b>
                                    <?= $text_date_added ?>
                                </b></td>
                            <td>
                                <?= $date_added ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <?php if (isset($payment_address) || isset($shipping_address)): ?>
                    <div class="col">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <?php if ($payment_address): ?>
                                        <th class="text-start align-top">
                                            <?= $text_payment_address ?>
                                        </th>
                                    <?php endif; ?>

                                    <?php if ($shipping_address): ?>
                                        <th class="text-start align-top">
                                            <?= $text_shipping_address ?>
                                        </th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php if ($payment_address): ?>
                                        <td class="text-start align-top">
                                            <?= $payment_address ?>
                                        </td>
                                    <?php endif; ?>

                                    <?php if ($shipping_address): ?>
                                        <td class="text-start align-top">
                                            <?= $shipping_address ?>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-start w-50">
                            <?= $text_description ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-start"><a href="<?= $product ?>">
                                <?= $name ?>
                            </a><br>
                            <?= $description ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?= $content_bottom ?>
            <div class="text-end mt-3">
                <button class="btn btn-success btn-apply"><i class="fas fa-save"></i>
                    <?= $button_save ?>
                </button>

                <a href="<?= $continue ?>" class="btn btn-primary">
                    <?= $button_continue ?>
                </a>

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