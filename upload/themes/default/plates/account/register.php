<?= $header ?>
<div id="account-register" class="container">
  <?= $breadcrumb ?>
  <div class="row">
    <?= $column_left ?>
    <div id="content" class="col  p-3 bg-white border"><?= $content_top ?>
      <h1><?= $heading_title ?></h1>
      <p><?= $text_account_already ?></p>
      <form id="<?= $form_name ?>" action="<?= $register ?>" method="post" data-oc-toggle="ajax">
        <fieldset id="account">
          <legend><?= $text_your_details ?></legend>
          <?php if (count($customer_groups) > 1): ?>
            <div class="row mb-3 required">
              <label class="col-sm-2 col-form-label"><?= $entry_customer_group ?></label>
              <div class="col-sm-10">
                <select name="customer_group_id" id="input-customer-group" class="form-select">
                  <?php foreach ($customer_groups as $customer_group): ?>
                    <option value="<?= $this->e($customer_group['customer_group_id']) ?>" <?php if ($customer_group['customer_group_id'] == $$customer_group_id): ?> selected<?php endif; ?>>
                      <?= $this->e($customer_group['name']) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          <?php endif; ?>
          <div class="row mb-3 required">
            <label for="input-firstname" class="col-sm-2 col-form-label"><?= $this->e($entry_firstname) ?></label>
            <div class="col-sm-10">
              <input type="text" name="firstname" value="" placeholder="<?= $this->e($entry_firstname) ?>"
                id="input-firstname" class="form-control">
              <div id="error-firstname" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-lastname" class="col-sm-2 col-form-label"><?= $this->e($entry_lastname) ?></label>
            <div class="col-sm-10">
              <input type="text" name="lastname" value="" placeholder="<?= $this->e($entry_lastname) ?>"
                id="input-lastname" class="form-control">
              <div id="error-lastname" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-<?= $email_field ?>" class="col-sm-2 col-form-label"><?= $this->e($entry_email) ?></label>
            <div class="col-sm-10">
              <input type="text" name="<?= $email_field ?>" value="" placeholder="<?= $this->e($entry_email) ?>"
                id="input-<?= $email_field ?>" class="form-control">

              <input type="text" style="display: none;" name="email" value=""
                placeholder="<?= $this->e($entry_email) ?>" id="input-email" class="form-control">
              <div id="error-email" class="invalid-feedback"></div>
            </div>
          </div>

          <?php if ($config_telephone_display): ?>
            <div class="row mb-3<?php if ($config_telephone_required): ?> required<?php endif; ?>">
              <label for="input-telephone" class="col-sm-2 col-form-label"><?= $this->e($entry_telephone) ?></label>
              <div class="col-sm-10">
                <input type="tel" name="telephone" value="" placeholder="<?= $this->e($entry_telephone) ?>"
                  id="input-telephone" class="form-control">
                <div id="error-telephone" class="invalid-feedback"></div>
              </div>
            </div>
          <?php endif; ?>

          <?php foreach ($custom_fields as $custom_field): ?>

            <?php if ($custom_field['type'] == 'select'): ?>
              <div class="row mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <select name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                    id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-select">
                    <option value=""><?= $this->e($text_select) ?></option>
                    <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                      <option value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>">
                        <?= $this->e($custom_field_value['name']) ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'radio'): ?>
              <div class="row mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <div id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                    <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                      <div class="form-check">
                        <input type="radio" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                          value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                          id="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                          class="form-check-input"> <label
                          for="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                          class="form-check-label"><?= $this->e($custom_field_value['name']) ?></label>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'checkbox'): ?>
              <div class="row mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <div id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                    <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                      <div class="form-check">
                        <input type="checkbox" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>][]"
                          value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                          id="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                          class="form-check-input"> <label
                          for="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                          class="form-check-label"><?= $this->e($custom_field_value['name']) ?></label>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'text'): ?>
              <div class="row mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                    value="<?= $this->e($custom_field['value']) ?>" placeholder="<?= $this->e($custom_field['name']) ?>"
                    id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control">
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'textarea'): ?>
              <div class="row mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <textarea name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" rows="5"
                    placeholder="<?= $this->e($custom_field['name']) ?>"
                    id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                    class="form-control"><?= $this->e($custom_field['value']) ?></textarea>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'file'): ?>
              <div class="row mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <div>
                    <button type="button" data-oc-toggle="upload" data-oc-url="<?= $this->e($upload) ?>"
                      data-oc-size-max="<?= $this->e($config_file_max_size) ?>"
                      data-oc-size-error="<?= $this->e($error_upload_size) ?>"
                      data-oc-target="#input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                      class="btn btn-light"><i class="fa-solid fa-upload"></i> <?= $this->e($button_upload) ?></button>
                    <input type="hidden" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value=""
                      id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" />
                  </div>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'date'): ?>
              <div class="row mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                      value="<?= $this->e($custom_field['value']) ?>" placeholder="<?= $this->e($custom_field['name']) ?>"
                      id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control date" />
                    <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
                  </div>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'time'): ?>
              <div class="row mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                      value="<?= $this->e($custom_field['value']) ?>" placeholder="<?= $this->e($custom_field['name']) ?>"
                      id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control time" />
                    <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
                  </div>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'datetime'): ?>
              <div class="row mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                      value="<?= $this->e($custom_field['value']) ?>" placeholder="<?= $this->e($custom_field['name']) ?>"
                      id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                      class="form-control datetime" />
                    <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
                  </div>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

          <?php endforeach; ?>
        </fieldset>

        <fieldset>
          <legend><?= $text_your_password ?></legend>
          <div class="row mb-3 required">
            <label for="input-password" class="col-sm-2 col-form-label"><?= $entry_password ?></label>
            <div class="col-sm-10 position-relative">
              <input type="password" name="password" value="" placeholder="<?= $entry_password ?>" id="input-password"
                class="form-control" oninput="showFirstChar()">
              <div id="error-password" class="invalid-feedback"></div>
              <span id="toggle-password" class="position-absolute top-50 end-0 me-3"
                style="transform: translateY(-50%); cursor: pointer;">
                <i class="fas fa-eye-slash" id="eye-icon"></i>
              </span>
            </div>
          </div>
        </fieldset>

        <fieldset>
          <?= $captcha ?>


          <div class="row mb-3 required">
            <div class="col d-flex flex-column align-items-end">
              <!-- Newsletter Switch -->
              <div class="d-flex form-switch-lg align-items-center  ">
                <label class="form-check-label me-2" for="input-newsletter">
                  <?= $entry_newsletter ?>
                </label>
                <div class="form-check form-switch  ">
                  <input type="hidden" name="newsletter" value="0" />
                  <input type="checkbox" checked class="form-check-input" name="newsletter" value="1"
                    id="input-newsletter" />
                </div>
              </div>

              <!-- Agree Switch -->
              <div class="d-flex form-switch-lg align-items-center">
                <label class="form-check-label me-2" for="input-agree">
                  <?= $text_agree ?>
                </label>
                <div class="form-check form-switch  ">
                  <input type="checkbox" class="form-check-input" name="agree" value="1" id="input-agree" />
                </div>
              </div>

            </div>

          </div>
          <div class="row mb-3 required">
            <div class="col d-flex flex-column align-items-end">

              <button type="submit" class="btn btn-primary"><?= $button_continue ?></button>
            </div>
          </div>


















      </form>
      <?= $content_bottom ?>
    </div>
    <?= $column_right ?>
  </div>
</div>
<script><!--
$('#input-customer-group').on('change', function() {
    $.ajax({
        url: 'index.php?route=account/custom_field&customer_group_id=' + this.value + '&language=<?= $this->e($language) ?>',
  dataType: 'json',
    success: function(json) {
      $('.custom-field').hide();
      $('.custom-field').removeClass('required');

      for (i = 0; i < json.length; i++) {
        custom_field = json[i];

        $('.custom-field-' + custom_field['custom_field_id']).show();

        if (custom_field['required']) {
          $('.custom-field-' + custom_field['custom_field_id']).addClass('required');
        }
      }
    },
  error: function(xhr, ajaxOptions, thrownError) {
    //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
  }
    });
});

  $('#input-customer-group').trigger('change');

  $(document).ready(function () {
    $('#<?= $form_name ?>').append($('<input>', { type: 'hidden', name: '<?= $register_token_field ?>', value: '<?= $register_token ?>' }));
  });

  //--></script>

<script>
  let passwordInput = document.getElementById('input-password');
  let eyeIcon = document.getElementById('eye-icon');
  let togglePassword = document.getElementById('toggle-password');

  // Toggle password visibility
  togglePassword.addEventListener('click', function () {
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      eyeIcon.classList.remove('fa-eye-slash');
      eyeIcon.classList.add('fa-eye');
    } else {
      passwordInput.type = 'password';
      eyeIcon.classList.remove('fa-eye');
      eyeIcon.classList.add('fa-eye-slash');
    }
  });

  // Show the first character for 2 seconds when typing
  function showFirstChar() {
    if (passwordInput.value.length > 0) {
      passwordInput.setAttribute('type', 'text'); // Make it visible initially
      setTimeout(function () {
        passwordInput.setAttribute('type', 'password'); // Hide it after 2 seconds
      }, 700);
    }
  }
</script>


<?= $footer ?>