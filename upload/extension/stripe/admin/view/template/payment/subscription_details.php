<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?=$text_status_subscription?></h3>
                </div>
                <div class="card-body">
                    <p><strong><?php echo $status; ?></strong></p>
                    <p><strong>ID:</strong> <?php echo $full['id']; ?></p>
                     <a target="_blank" href="<?=$stripe_link?>" rel="noopener" class="btn btn-primary"><?=$text_open_on_stripe?></a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?=$text_current_period?></h3>
                </div>
                <div class="card-body">
                    <p><strong><?=$text_start?>:</strong> <?php echo $current_period_start; ?></p>
                    <p><strong><?=$text_end?>:</strong> <?php echo $current_period_end; ?></p>
                    <p><strong><?=$text_cancels_at?>:</strong> <?php echo $cancel_at; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?=$text_latest_invoice?></h3>
                </div>
                <div class="card-body">
                    <p><strong><?=$text_amount_due?>:</strong> <?php echo $latest_invoice['amount_due'] / 100; ?> <?=$latest_invoice['currency'];?></p>
                    <p><strong><?=$text_amount_paid?>:</strong> <?php echo $latest_invoice['amount_paid'] / 100; ?>  <?=$latest_invoice['currency'];?></p>
                    <p><strong><?=$text_collection_method?>:</strong> <?php echo $latest_invoice['collection_method']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?=$text_payment_method?></h3>
                </div>
                <div class="card-body">
                    <p><?php echo $payment_method['card_type']; ?> - <?php echo $payment_method['card_brand']; ?>, ***<?php echo $payment_method['last_four_digits']; ?></p>
                    <p><strong><?=$text_cardholder?>:</strong> <?php echo $payment_method['card_name']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
