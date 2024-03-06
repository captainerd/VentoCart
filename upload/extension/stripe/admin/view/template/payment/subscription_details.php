<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3><?=$text_status_subscription?></h3>
            <p><?php echo $status; ?></p>
        </div>
        <div class="col-md-6">
            <h3><?=$text_current_period?></h3>
            <p><?=$text_start?>: <?php echo $current_period_start; ?></p>
            <p><?=$text_end?>: <?php echo $current_period_end; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3><?=$text_latest_invoice?></h3>
            <p><?=$text_amount_due?>: <?php echo $latest_invoice['amount_due'] / 100; ?> <?=$latest_invoice['currency'];?></p>
            <p><?=$text_amount_paid?>: <?php echo $latest_invoice['amount_paid'] / 100; ?>  <?=$latest_invoice['currency'];?></p>
            <p><?=$text_collection_method?>: <?php echo $latest_invoice['collection_method']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3><?=$text_payment_method?></h3>
            <p><?php echo $payment_method['card_type']; ?> - <?php echo $payment_method['card_brand']; ?>, ***<?php echo $payment_method['last_four_digits']; ?></p>
            <p><?=$text_cardholder?>: <?php echo $payment_method['card_name']; ?></p>
        </div>
    </div>
</div>
