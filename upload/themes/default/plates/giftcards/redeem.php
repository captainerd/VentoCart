<div id="redeem-container">
    <!-- Redeem Form -->
    <div id="redeem-form" style="max-width: 370px;" class="mb-4 p-3 shadow border rounded bg-light">
        <label for="redeem-card" class="form-label fw-bold">
            <?= $entry_redeem_code ?>: <div style="display: none;"
                class="spinner-border redeem-spinner  spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </label>
        <input type="text" id="redeem-card" class="form-control" placeholder="VEXX-XXXX-XXXX-XXXX" maxlength="19" />


        <div id="redeem-success" class="text-success mt-2" style="display: none;">

        </div>
        <div id="redeem-error" class="text-danger mt-2" style="display: none;">
            <?= $error_invalid_code ?>
        </div>
    </div>

    <!-- Redeem Details Table -->
    <div id="redeem-details" style="display: none;">
        <div class="container border mt-4">
            <!-- Data Section -->
            <div class="row bg-light text-dark py-2  ">
                <div class="col-12 fw-bold"><?= $text_card_found ?></div>

            </div>
            <div class="row py-2 border-bottom">
                <div class="col-6 fw-bold"><?= $text_sender_email ?></div>
                <div class="col-6" id="senderemail213"></div>
            </div>
            <div class="row py-2 border-bottom">
                <div class="col-6 fw-bold"><?= $text_receiver_name ?></div>
                <div class="col-6" id="receivername213"></div>
            </div>
            <div class="row py-2 border-bottom">
                <div class="col-6 fw-bold"><?= $text_message ?></div>
                <div class="col-6" id="message213"></div>
            </div>
            <div class="row py-2 border-bottom">
                <div class="col-6 fw-bold"><?= $text_amount ?></div>
                <div class="col-6" id="amount213"></div>
            </div>
            <div class="row py-2 border-bottom">
                <div class="col-6 fw-bold"><?= $text_code ?></div>
                <div class="col-6" id="giftcardcode213"></div>
            </div>
        </div>




        <div class="text-muted p-3">
            <?= $text_redeem_info ?>
        </div>
        <!-- Action Buttons -->
        <div style="margin-top: 20px; text-align: right;">
            <button id="redeem-button" class="btn btn-success px-4 py-2"><?= $button_redeem ?>

                <div style="display: none;" class="spinner-border redeem-spinner  spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

            </button>
            <button id="cancel-button" class="btn btn-danger px-4 py-2"><?= $button_cancel ?></button>

        </div>
    </div>



</div>
</div>

<script>
    $(document).ready(function () {
        const $input = $('#redeem-card');
        const $error = $('#redeem-error');
        const $success = $('#redeem-success');
        const $redeemForm = $('#redeem-form');
        const $redeemDetails = $('#redeem-details');
        const validPattern = /^VE[A-Z0-9]{2}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{4}$/;



        $input.on('input', function () {
            $success.hide();
            if (<?= $customer_id ?> == 0) {
                $input.val('');
                alert('You need an account to redeem cards');
                return;
            }
            let value = $input.val().toUpperCase().replace(/[^A-Z0-9]/g, '');
            const formattedValue = [];

            for (let i = 0; i < value.length; i += 4) {
                formattedValue.push(value.substring(i, i + 4));
            }

            $input.val(formattedValue.join('-').substring(0, 19));

            if (!value.startsWith('VE')) {
                $error.text('<?= $error_invalid_start ?>').show();
            } else if (value.length === 19 && !validPattern.test($input.val())) {
                $error.text('<?= $error_invalid_format ?>').show();
            } else {
                $error.hide();
            }

            if ($input.val().length === 19 && validPattern.test($input.val())) {
                doPost();
            }
        });

        $('#cancel-button').on('click', function () {
            $redeemDetails.hide();
            $redeemForm.show();
            $input.val('');
        });

        $('#redeem-button').on('click', function () {

            doPost(true);
        });
        function doPost(finalpost = false) {
            $('.redeem-spinner').show();
            $.post('/?route=giftcards/redeem.redeem', { code: $input.val(), redeem: finalpost })
                .done(function (response) {
                    if (response.success) {

                        if (response.success.giftcard_code) {
                            // Hide the redeem form and show details table
                            $redeemForm.hide();
                            $redeemDetails.show();

                            // Populate table data
                            $('#senderemail213').text(response.success.sender_email);
                            $('#receivername213').text(response.success.receiver_name);
                            $('#message213').text(response.success.message || '');
                            $('#amount213').text(response.success.amount);
                            $('#giftcardcode213').text(response.success.giftcard_code);

                        } else {
                            if (typeof window.fetchGiftCards == 'function') {
                                window.fetchGiftCards();
                            }
                            $redeemDetails.hide();
                            $redeemForm.show();
                            $input.val('');
                            $success.text(response.success);
                            $success.show();


                        }
                    } else {
                        $error.text(response.error).show();
                    }
                    $('.redeem-spinner').hide();
                })
                .fail(function () {
                    $('.redeem-spinner').hide();
                    $error.text('<?= $error_redeem_failed ?>').show();
                });
        }
    });
</script>