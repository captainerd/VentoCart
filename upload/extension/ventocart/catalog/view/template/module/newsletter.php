<?php if (!$is_home): ?>
    <div class="d-flex justify-content-center align-items-center">
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
<?php endif; ?>
<?php if ($is_home): ?>
    <!-- Modal structure -->
    <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  ">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="subscribeModalLabel"><?= $text_subscribe ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <!-- Your subscription form -->
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
        </div>
    </div>
<?php endif; ?>

<script>
    $(document).ready(function () {
        <?php if ($is_home): ?>
            // Check if the modal was already closed in the past
            if (!localStorage.getItem('modalClosed')) {
                // Show the modal if it hasn't been closed before
                var myModal = new bootstrap.Modal(document.getElementById('subscribeModal'));
                myModal.show();
            }

            // Event listener for when the modal is closed
            document.getElementById('subscribeModal').addEventListener('hidden.bs.modal', function () {
                // Store the flag in localStorage to remember that the modal was closed
                localStorage.setItem('modalClosed', 'true');
            });
        <?php endif; ?>

        // AJAX form submission for subscription
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
                    alert('Something went wrong.');
                }
            });
        });
    });
</script>