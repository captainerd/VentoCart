<div class="d-flex justify-content-center align-items-center  ">
    <div class="bg-light subscribe-module p-3 shadow-sm border mb-3" style="max-width: 600px;">
        <form action="" method="get">
            <div class="alert alert-info d-flex align-items-center p-3" role="alert">
                <i class="fa-solid fa-exclamation-circle fa-2x me-3"></i> <?= $text_promo ?>
            </div>

            <input type="hidden" name="route" value="guest/newsletter">
            <label for="email"><?= $entry_email ?></label>
            <div class="form-group btn-group">
                <input type="email" class="form-control" id="email" name="email" required>
                <input class="form-check-input d-none" checked type="radio" name="action" id="subscribe"
                    value="subscribe" required>
                <button type="submit" class="btn btn-primary ">
                    <?= $button_subscribe ?>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('form').submit(function (e) {
            e.preventDefault();  // Prevent the default form submission

            var formData = $(this).serialize();  // Serialize the form data

            $.ajax({
                url: '?route=guest/newsletter',
                type: 'GET',
                data: formData + '&json=true',
                dataType: 'json',
                success: function (json) {

                    if (json['success']) {

                        $('#alert').prepend('<div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');


                        $('.subscribe-module').fadeOut();
                    }
                },
                error: function () {
                    // Handle errors here (optional)
                    alert('Something went wrong.');
                }
            });
        });
    });

</script>