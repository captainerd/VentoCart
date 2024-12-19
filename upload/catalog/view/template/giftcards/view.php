<?= $header ?>
<div id="giftcards-controller-area" class="container my-4">
    <?= $breadcrumb ?>
    <div class="row">
        <?= $column_left ?>
        <div id="content" class="col">
            <?= $content_top ?>

            <!-- Page Heading -->
            <h1><?= $heading_title ?></h1>

            <!-- Gift Card Template -->
            <div class="container d-flex flex-column flex-md-row shadow p-4 rounded">
                <!-- Gift Card Display -->
                <div class="col giftcard-template p-3">
                    <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                        <div style="background: url('/image/<?= $card['theme_image'] ?>')" class="card-background">
                            <h5 class="card-title giftcard-title  "><?= $card['card_name'] ?></h5>
                            <p class="giftcard-holder  "><span><?= $text_holder ?></span>
                              <?= $text_someone_loved ?></p>
                            <p class="giftcard-code  ">VEXX-XXXX-XXXX-XXXX</p>
                            <p class="giftcard-site  "><?= $siteurl ?> <?= $text_giftcard ?></p>
                        </div>
                    </div>
                </div>

                <!-- Form Section -->
                <div class="col-12 col-md-6 mt-4 mt-md-0">
                    <form id="giftcard-form" method="post" data-card-id="<?=$giftcardId?>" >
                        <!-- Receiver Info -->
                        <div class="form-group mb-3">
                            <label for="receiver_name"><?= $text_receiver_name ?></label>
                            <input type="text" class="form-control" id="receiver_name" name="receiver_name" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="receiver_email"><?= $text_receiver_email ?></label>
                            <input type="email" class="form-control" id="receiver_email" name="receiver_email" required>
                        </div>

                        <!-- Sender Info -->
                        <div class="form-group mb-3">
                            <label for="sender_name"><?= $text_sender_name ?></label>
                            <input type="text" class="form-control" id="sender_name" name="sender_name" 
                                <?= $sender_name ? 'readonly value="' . $sender_name . '"' : '' ?> 
                                <?= !$sender_name ? 'required' : '' ?>>
                        </div>

                        <div class="form-group mb-3">
                            <label for="sender_email"><?= $text_sender_email ?></label>
                            <input type="email" class="form-control" id="sender_email" name="sender_email" 
                                <?= $sender_email ? 'readonly value="' . $sender_email . '"' : '' ?> 
                                <?= !$sender_email ? 'required' : '' ?>>
                        </div>

                        <!-- Message -->
                        <div class="form-group mb-3">
                            <label for="message"><?= $text_message ?></label>
                            <textarea class="form-control" id="message" name="message" rows="4"></textarea>
                        </div>

                        <!-- Ship Physically -->
                        <?php if ($card['physical'] == 1): ?>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="ship_physical" name="ship_physical">
                                <label class="form-check-label" for="ship_physical"><?= $text_ship_physical ?></label>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Amount Selection --> 
                        <?php if ($card['fixed'] == 1): ?>
                            <label><?= $text_choose_amount ?></label>
                            <?php foreach ($card['amount'] as $index => $amount): ?>
    <div class="form-check form-check-inline">
        <input class="form-check-input visually-hidden" type="radio" name="amount" id="amount_<?= $amount ?>" value="<?= $card['amountcl'][$index+1] ?>" required>
        <label class="btn btn-outline-primary amount-button" for="amount_<?= $amount ?>"><?= $amount ?></label>
    </div>
<?php endforeach; ?>
                        <?php else: ?>
                            <div class="form-group mb-3">
                                <label for="amount"><?= $text_enter_amount ?></label>
                                <input type="number" class="form-control" id="amount" name="amount" required>
                            </div>
                        <?php endif; ?>


                        <!-- Agreement to Terms -->
<?php if (!empty($agree_label)): ?>
    <div class="form-check mt-4 mb-4">
        <input class="form-check-input" type="checkbox" id="agree_terms" name="agree_terms">
        <label class="form-check-label" for="agree_terms"><?= $agree_label ?></label>
    </div>
<?php endif; ?>


                        <!-- Submit Button -->
                        <button type="submit" class="btn mt-4 btn-primary w-100"><?= $text_add_to_cart ?></button>
                    </form>
                </div>
            </div>

            <?= $content_bottom ?>
        </div>
        <?= $column_right ?>
    </div>
</div>

 
<script>

 


$(document).ready(function () {
    $('#giftcard-form').on('submit', function (e) {
        e.preventDefault();

        // Serialize form data
        var formData = $(this).serialize();

        // Get the card ID from the URL or a hidden field
        var cardId = $(this).data('card-id');

        // AJAX call to add the gift card to the cart
        $.ajax({
            url: 'index.php?route=giftcards/giftcard.addtocart&card=' + cardId,
            type: 'POST',
            data: formData,
            dataType: 'json',
            beforeSend: function () {
                // Optional: Add a loading spinner or disable the button
                $('#submit-button').prop('disabled', true).text('Processing...');
            },
            success: function (response) {
                // Handle success
                if (response.success) {
                    $('#alert').append(
                                '<div class="alert alert-success alert-dismissible">' +
                                '<i class="fa-solid fa-exclamation-circle"></i>  ' + response.success +
                                '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                                '</div>'
                            );
                            setTimeout(() => {
                                window.location.href = 'index.php?route=checkout/cart';
                            }, 1000);
                 
                } else if (response.error) {
                    // Handle error
                    $('#alert').append(
                                '<div class="alert alert-danger alert-dismissible">' +
                                '<i class="fa-solid fa-exclamation-circle"></i>  ' + response.error +
                                '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                                '</div>'
                            );
                }
            },
            error: function (xhr, status, error) {
                // Generic error handling
                console.error(error);
                alert('An error occurred while processing your request. Please try again later.');
            },
            complete: function () {
                // Re-enable the button and reset text
                $('#submit-button').prop('disabled', false).text('Add to Cart');
            }
        });
    });
});

</script>
<?= $footer ?>
