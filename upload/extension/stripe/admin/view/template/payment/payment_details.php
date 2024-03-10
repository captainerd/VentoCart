<div class="card">
    <div class="card-header">
        <?php echo $text_payment_details; ?>
    </div>
    <div class="card-body">
        <h5 class="card-title">
            <?php echo $text_payment_information; ?>
        </h5>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>
                    <?php echo $text_payment_id; ?>:
                </strong>
                <?php echo $charge['id']; ?>
            </li>
            <li class="list-group-item"><strong>
                    <?php echo $text_amount; ?>:
                </strong>
                <?php echo number_format($charge['amount'] / 100,2); ?>
                <?php echo strtoupper($charge['currency']); ?>
            </li>
            <li class="list-group-item"><strong>
                    <?php echo $text_description; ?>:
                </strong>
                <?php echo $charge['description']; ?>
            </li>
            <li class="list-group-item"><strong>
                    <?php echo $text_amount_captured; ?>:
                </strong>
                <?php echo number_format($charge['amount_captured'] / 100,2); ?>
            </li>
            <li class="list-group-item"><strong>
                    <?php echo $text_amount_refunded; ?>:
                </strong>
                <?php echo number_format($charge['amount_refunded'] / 100,2); ?>
            </li>
            <li class="list-group-item"><strong>
                    <?php echo $text_authorized_amount; ?>:
                </strong>
                <?php echo number_format($charge['payment_method_details']['card']['amount_authorized'] / 100,2); ?>
            </li>
            <li class="list-group-item"><strong>
                    <?php echo $text_brand; ?>:
                </strong>
                <?php echo $charge['payment_method_details']['card']['brand']; ?>
            </li>
            <li class="list-group-item"><strong>
                    <?php echo $text_checks; ?>:
                </strong>
                <?php echo $text_address_line1_check . ': ' . $charge['payment_method_details']['card']['checks']['address_line1_check']; ?>,
                <?php echo $text_postal_code_check . ': ' . $charge['payment_method_details']['card']['checks']['address_postal_code_check']; ?>
            </li>
            <li class="list-group-item"><strong>
                    <?php echo $text_funding; ?>:
                </strong>
                <?php echo $charge['payment_method_details']['card']['funding']; ?>
            </li>
            <li class="list-group-item"><strong>
                    <?php echo $text_outcome; ?>:
                </strong>
                <?php echo $charge['outcome']['seller_message']; ?>
            </li>
            <li class="list-group-item"><strong>
                    <?php echo $text_risk_level; ?>:
                </strong>
                <?php echo $charge['outcome']['risk_level']; ?>
            </li>
            <li class="list-group-item"><strong>
                    <?php echo $text_risk_score; ?>:
                </strong>
                <?php echo $charge['outcome']['risk_score']; ?>
            </li>
        </ul>
        <?php if ($charge['amount_refunded'] < $charge['amount_captured']): ?>
            <div class="card mt-3" style="max-width: 400px;">
                <div class="card-header">
                    <?php echo $text_refund; ?>
                </div>
                <div class="card-body">
                    <div class="mt-3">
                        <label for="refundAmount">
                            <?php echo $text_amount_to_refund; ?>
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="refundAmount"
                                placeholder="<?php echo $text_amount_to_refund; ?>">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="maxRefund">
                                    <?php echo $text_max; ?>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="reasonSelect">
                            <?php echo $text_reason; ?>
                        </label>
                        <select class="form-select" id="reasonSelect">
                            <option value="duplicate">
                                <?php echo $text_reason_duplicate; ?>
                            </option>
                            <option value="fraudulent">
                                <?php echo $text_reason_fraudulent; ?>
                            </option>
                            <option selected value="requested_by_customer">
                                <?php echo $text_reason_requested_by_customer; ?>
                            </option>
                        </select>
                    </div>
                    <button class="btn btn-danger mt-3" id="refundButton">
                        <?php echo $text_refund; ?>
                    </button>
                </div>
            </div>
        <?php endif; ?>


    </div>
    <div class="card-footer text-muted">
        <?php echo $text_payment_completed_on . ' ' . date('Y-m-d H:i:s', $charge['created']); ?>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#maxRefund').on('click', function () {
            // Get the captured amount from the charge object
            var capturedAmount = <?php echo ($charge['amount_captured'] - $charge['amount_refunded']) / 100; ?>;

            // Set the captured amount as the value of the refund input
            $('#refundAmount').val(capturedAmount);
        });

        $('#refundButton').on('click', function () {
            if (confirm('<?php echo $text_refund_confirm; ?>')) {
                let charge_id = '<?php echo $charge['id']; ?>';
                let  amount = parseFloat($('#refundAmount').val()) * 100;
                let  reason = $('#reasonSelect').val();

                $.ajax({
                    url: 'index.php?route=extension/stripe/payment/stripe.refund&user_token=<?= $user_token ?>',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        charge_id: charge_id,
                        amount: amount,
                        reason: reason

                    },
                    success: function (response) {
                        if (response.status == 'succeeded')
                        alert('<?=$refund_issued?>');
                        location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(errorThrown)
                    }
                });

            }
        });
    });
</script>