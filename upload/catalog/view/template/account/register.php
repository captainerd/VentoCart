<?= $header   ?>
<div id="account-register" class="container">
<?=  $breadcrumb  ?>
  <div class="row">
    <?=  $column_left   ?>
    <div id="content" class="col"><?=  $content_top ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <p><?= $text_account_already  ?></p>
      <form id="form-register" action="<?= $register  ?>" method="post" data-oc-toggle="ajax">
        <fieldset id="account">
          <legend><?= $this->e($text_your_details ) ?></legend>
          <?php if (count($customer_groups) > 1): ?>
            <div class="row mb-3 required">
              <label class="col-sm-2 col-form-label"><?= $this->e($entry_customer_group ) ?></label>
              <div class="col-sm-10">
                <select name="customer_group_id" id="input-customer-group" class="form-select">
                  <?php foreach ($customer_groups as $customer_group): ?>
                    <option value="<?= $this->e($customer_group['customer_group_id']) ?>"<?php if ($customer_group['customer_group_id'] == $$customer_group_id): ?> selected<?php endif; ?>><?= $this->e($customer_group['name']) ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          <?php endif; ?>
          <div class="row mb-3 required">
            <label for="input-firstname" class="col-sm-2 col-form-label"><?= $this->e($entry_firstname ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="firstname" value="" placeholder="<?= $this->e($entry_firstname ) ?>" id="input-firstname" class="form-control">
              <div id="error-firstname" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-lastname" class="col-sm-2 col-form-label"><?= $this->e($entry_lastname ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="lastname" value="" placeholder="<?= $this->e($entry_lastname ) ?>" id="input-lastname" class="form-control">
              <div id="error-lastname" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-email" class="col-sm-2 col-form-label"><?= $this->e($entry_email ) ?></label>
            <div class="col-sm-10">
              <input type="email" name="email" value="" placeholder="<?= $this->e($entry_email ) ?>" id="input-email" class="form-control">
              <div id="error-email" class="invalid-feedback"></div>
            </div>
          </div>

          <?php if ($config_telephone_display): ?>
            <div class="row mb-3<?php if ($config_telephone_required): ?> required<?php endif; ?>">
              <label for="input-telephone" class="col-sm-2 col-form-label"><?= $this->e($entry_telephone ) ?></label>
              <div class="col-sm-10">
                <input type="tel" name="telephone" value="" placeholder="<?= $this->e($entry_telephone ) ?>" id="input-telephone" class="form-control">
                <div id="error-telephone" class="invalid-feedback"></div>
              </div>
            </div>
          <?php endif; ?>

          <?php foreach ($custom_fields as $custom_field): ?>

            <?php if ($custom_field['type'] =='select'): ?>
              <div class="row mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <select name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-select">
                    <option value=""><?= $this->e($text_select ) ?></option>
                    <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                      <option value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>"><?= $this->e($custom_field_value['name']) ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] =='radio'): ?>
              <div class="row mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <div id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                  <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                      <div class="form-check">
                        <input type="radio" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>" id="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-input"> <label for="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-label"><?= $this->e($custom_field_value['name']) ?></label>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] =='checkbox'): ?>
              <div class="row mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <div id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                  <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                      <div class="form-check">
                        <input type="checkbox" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>][]" value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>" id="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-input"> <label for="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-label"><?= $this->e($custom_field_value['name']) ?></label>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] =='text'): ?>
              <div class="row mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?= $this->e($custom_field['value']) ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control">
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] =='textarea'): ?>
              <div class="row mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <textarea name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" rows="5" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control"><?= $this->e($custom_field['value']) ?></textarea>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] =='file'): ?>
              <div class="row mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <div>
                    <button type="button" data-oc-toggle="upload" data-oc-url="<?= $this->e($upload ) ?>" data-oc-size-max="<?= $this->e($config_file_max_size ) ?>" data-oc-size-error="<?= $this->e($error_upload_size ) ?>" data-oc-target="#input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="btn btn-light"><i class="fa-solid fa-upload"></i> <?= $this->e($button_upload ) ?></button>
                    <input type="hidden" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value="" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"/>
                  </div>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] =='date'): ?>
              <div class="row mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?= $this->e($custom_field['value']) ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control date"/>
                    <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
                  </div>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] =='time'): ?>
              <div class="row mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?= $this->e($custom_field['value']) ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control time"/>
                    <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
                  </div>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] =='datetime'): ?>
              <div class="row mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?= $this->e($custom_field['value']) ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control datetime"/>
                    <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
                  </div>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
                </div>
              </div>
            <?php endif; ?>

          <?php endforeach; ?>
        </fieldset>

        <fieldset>
          <legend><?= $this->e($text_your_password ) ?></legend>
          <div class="row mb-3 required">
            <label for="input-password" class="col-sm-2 col-form-label"><?= $this->e($entry_password ) ?></label>
            <div class="col-sm-10">
              <input type="password" name="password" value="" placeholder="<?= $this->e($entry_password ) ?>" id="input-password" class="form-control">
              <div id="error-password" class="invalid-feedback"></div>
            </div>
          </div>
        </fieldset>

        <fieldset>
          <legend><?= $this->e($text_newsletter ) ?></legend>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label"><?= $this->e($entry_newsletter ) ?></label>
            <div class="col-sm-10">
              <div class="form-check form-switch form-switch-lg">
                <input type="hidden" name="newsletter" value="0"/> <input type="checkbox" name="newsletter" value="1" id="input-newsletter" class="form-check-input">
              </div>
            </div>
          </div>
        </fieldset>
        <?= $this->e($captcha ) ?>
        <div class="text-end">
          <?php if ($text_agree): ?>
            <div class="form-check form-switch form-switch-lg form-check-reverse form-check-inline">
              <label class="form-check-label"><?=  $text_agree   ?></label> <input type="checkbox" name="agree" value="1" class="form-check-input">
            </div>
          <?php endif; ?>
          <button type="submit" class="btn btn-primary"><?= $this->e($button_continue ) ?></button>
        </div>
      </form>
      <?=  $content_bottom   ?>
    </div>
    <?=  $column_right   ?>
  </div>
</div>
<script ><!--
$('#input-customer-group').on('change', function() {
    $.ajax({
        url: 'index.php?route=account/custom_field&customer_group_id=' + this.value + '&language=<?= $this->e($language ) ?>',
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
//--></script>
<?=  $footer ?>
