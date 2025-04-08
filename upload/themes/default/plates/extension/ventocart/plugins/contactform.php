<form class="form-contact-v-plug" action="<?= $send ?>" method="post">
    <fieldset>
        <legend><?= $this->e($text_contact) ?></legend>
        <div class="row mb-3 required">
            <label for="input-name" class="col-sm-2 col-form-label"><?= $this->e($entry_name) ?></label>
            <div class="col-sm-10">
                <input type="text" name="name" value="<?= $this->e($name) ?>" id="input-name" class="form-control">
                <div class="invalid-feedback error-name"></div>
            </div>
        </div>
        <div class="row mb-3 required">
            <label for="input-<?= $email_field ?>" class="col-sm-2 col-form-label"><?= $this->e($entry_email) ?></label>
            <div class="col-sm-10">
                <input type="text" name="<?= $email_field ?>" value="<?= $this->e($email) ?>" id="<?= $email_field ?>"
                    class="form-control">
                <div class="invalid-feedback error-<?= $email_field ?>"></div>
            </div>
        </div>

        <div class="row mb-3 d-none">
            <label for="input-email" class="col-sm-2 col-form-label"><?= $this->e($entry_email) ?></label>
            <div class="col-sm-10">
                <input type="text" name="email" value="<?= $this->e($email) ?>" id="input-email" class="form-control">
                <div class="invalid-feedback error-email"></div>
            </div>
        </div>

        <div class="row mb-3 required">
            <label for="input-enquiry" class="col-sm-2 col-form-label"><?= $this->e($entry_enquiry) ?></label>
            <div class="col-sm-10">
                <textarea name="enquiry" rows="10" id="input-enquiry" class="form-control"></textarea>
                <div class="invalid-feedback error-enquiry"></div>
            </div>
        </div>
        <?= $captcha ?>
    </fieldset>
    <div class="text-end">
        <button type="submit" class="btn btn-primary"><?= $this->e($button_submit) ?></button>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        $(document).on('submit', '.form-contact-v-plug', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            const $form = $(this);
            const actionUrl = $form.attr('action');

            // Clear previous errors and alerts/spinners
            $form.find('.invalid-feedback').empty().hide();
            $form.find('.form-control').removeClass('is-invalid');
            $form.next('.form-spinner, .alert').remove();

            // Show spinner
            const $spinner = $(`
            <div class="text-center w-100 my-5 form-spinner">
                <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        `);

            $form.after($spinner);

            $.post(actionUrl, $form.serialize(), 'json')
                .done(function (response) {
                    $spinner.remove();

                    if (response.error) {
                        // Handle and display field errors
                        for (let key in response.error) {
                            const errorMessage = response.error[key];
                            const $errorField = $form.find(`.error-${key}`);
                            const $input = $form.find(`[name="${key}"]`);

                            if ($errorField.length) {
                                $errorField.text(errorMessage).show();
                                $input.addClass('is-invalid');
                            }
                        }
                    } else {
                        // No errors, success case
                        $form.hide();
                        const $alert = $(`
    <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
        <?= $text_message ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
`);
                        $form.after($alert);

                        // Auto-dismiss after 3 seconds with fade-out
                        setTimeout(function () {
                            $alert.fadeOut(500, function () {
                                $(this).remove();
                            });
                        }, 3000);

                    }
                })
                .fail(function (xhr) {
                    $spinner.remove();
                    const $alert = $(`
                    <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                        Error
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `);
                    $form.after($alert);
                });

            return false;
        });
    });
</script>