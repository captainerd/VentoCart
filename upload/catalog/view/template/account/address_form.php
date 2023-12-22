<?= $header ?>
<div id="account-address" class="container">
<?php  $breadcrumb ?>
  <div class="row">
    <?= $column_left ?>
    <div id="content" class="col">
      <?= $content_top ?>
      <h1>
        <?= $this->e($text_address) ?>
      </h1>
      <form id="form-address" action="<?= $save ?>" method="post" data-oc-toggle="ajax">
        <fieldset>
          <div class="row mb-3 required">
            <label for="input-firstname" class="col-sm-2 col-form-label">
              <?= $this->e($entry_firstname) ?>
            </label>
            <div class="col-sm-10">
              <input type="text" name="firstname" value="<?= $this->e($firstname) ?>"
                placeholder="<?= $this->e($entry_firstname) ?>" id="input-firstname" class="form-control" />
              <div id="error-firstname" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-lastname" class="col-sm-2 col-form-label">
              <?= $this->e($entry_lastname) ?>
            </label>
            <div class="col-sm-10">
              <input type="text" name="lastname" value="<?= $this->e($lastname) ?>"
                placeholder="<?= $this->e($entry_lastname) ?>" id="input-lastname" class="form-control" />
              <div id="error-lastname" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3">
            <label for="input-company" class="col-sm-2 col-form-label">
              <?= $this->e($entry_company) ?>
            </label>
            <div class="col-sm-10">
              <input type="text" name="company" value="<?= $this->e($company) ?>"
                placeholder="<?= $this->e($entry_company) ?>" id="input-company" class="form-control" />
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-address-1" class="col-sm-2 col-form-label">
              <?= $this->e($entry_address_1) ?>
            </label>
            <div class="col-sm-10">
              <input type="text" name="address_1" value="<?= $this->e($address_1) ?>"
                placeholder="<?= $this->e($entry_address_1) ?>" id="input-address-1" class="form-control" />
              <div id="error-address-1" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3">
            <label for="input-address-2" class="col-sm-2 col-form-label">
              <?= $this->e($entry_phone) ?>
            </label>
            <div class="col-sm-10">
              <input type="text" name="phone" value="<?= $this->e($phone) ?>"
                placeholder="<?= $this->e($entry_phone) ?>" id="input-address-2" class="form-control" />
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-city" class="col-sm-2 col-form-label">
              <?= $this->e($entry_city) ?>
            </label>
            <div class="col-sm-10">
              <input type="text" name="city" value="<?= $this->e($city) ?>" placeholder="<?= $this->e($entry_city) ?>"
                id="input-city" class="form-control" />
              <div id="error-city" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-postcode" class="col-sm-2 col-form-label">
              <?= $this->e($entry_postcode) ?>
            </label>
            <div class="col-sm-10">
              <input type="text" name="postcode" value="<?= $this->e($postcode) ?>"
                placeholder="<?= $this->e($entry_postcode) ?>" id="input-postcode" class="form-control" />
              <div id="error-postcode" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-country" class="col-sm-2 col-form-label">
              <?= $this->e($entry_country) ?>
            </label>
            <div class="col-sm-10">
              <select name="country_id" id="input-country" class="form-select">
                <option value="0">
                  <?= $this->e($text_select) ?>
                </option>
                <?php foreach ($countries as $country): ?>
                  <option value="<?= $this->e($country['country_id']) ?>" <?php if ($country['country_id'] == $country_id): ?> selected<?php endif; ?>>
                    <?= $this->e($country['name']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <div id="error-country" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-zone" class="col-sm-2 col-form-label">
              <?= $this->e($entry_zone) ?>
            </label>
            <div class="col-sm-10">
              <select name="zone_id" id="input-zone" class="form-select"></select>
              <div id="error-zone" class="invalid-feedback"></div>
            </div>
          </div>

          <?php foreach ($custom_fields as $custom_field): ?>

            <?php if ($custom_field['type'] == 'select'): ?>
              <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?>">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="col-sm-2 col-form-label">
                  <?= $this->e($custom_field['name']) ?>
                </label>
                <div class="col-sm-10">
                  <select name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                    id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-select">
                    <option value="">
                      <?= $this->e($text_select) ?>
                    </option>
                    <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                      <option value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>" <?php if ($address_custom_field[$custom_field . $custom_field_id] && $custom_field_value . $custom_field_value_id == $address_custom_field[$custom_field . $custom_field_id]): ?>
                          selected<?php endif; ?>>
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
              <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?>">
                <label class="col-sm-2 col-form-label">
                  <?= $this->e($custom_field['name']) ?>
                </label>
                <div class="col-sm-10">
                  <div id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                    <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                      <div class="form-check">



                      <input
    type="checkbox"
    name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>][]"
    value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
    id="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
    class="form-check-input"
    <?php if (isset($address_custom_field['custom_field' . $custom_field['custom_field_id']]) && $custom_field_value['custom_field_value_id'] == $address_custom_field['custom_field' . $custom_field['custom_field_id']]): ?>
        checked
    <?php endif; ?>
/>
                            
                            
                            <label
                          for="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                          class="form-check-label">
                          <?= $this->e($custom_field_value['name']) ?>
                        </label>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'checkbox'): ?>
              <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?>">
                <label class="col-sm-2 col-form-label">
                  <?= $this->e($custom_field['name']) ?>
                </label>
                <div class="col-sm-10">
                  <div id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                    <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                      <div class="form-check">


                        <input type="checkbox" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>][]"
                          value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                          id="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                          class="form-check-input" <?php if (isset($address_custom_field[$custom_field['custom_field_id']]) && in_array($custom_field_value['custom_field_value_id'], $address_custom_field[$custom_field['custom_field_id']])): ?>checked<?php endif; ?> />
                        <label for="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                          class="form-check-label">
                          <?= $this->e($custom_field_value['name']) ?>
                        </label>


                      </div>
                    <?php endforeach; ?>
                  </div>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'text'): ?>
              <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?>">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="col-sm-2 col-form-label">
                  <?= $this->e($custom_field['name']) ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                    value="<?php if ($address_custom_field[$custom_field . $custom_field_id]): ?><?= $this->e($address_custom_field[$custom_field . $custom_field_id]) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>"
                    placeholder="<?= $this->e($custom_field['name']) ?>"
                    id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control" />
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'textarea'): ?>
              <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?>">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="col-sm-2 col-form-label">
                  <?= $this->e($custom_field['name']) ?>
                </label>
                <div class="col-sm-10">
                  <textarea name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" rows="5"
                    placeholder="<?= $this->e($custom_field['name']) ?>"
                    id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control">
                    <?php if ($address_custom_field[$custom_field . $custom_field_id]): ?>
                      <?= $this->e($address_custom_field[$custom_field . $custom_field_id]) ?>
                    <?php else: ?>
                      <?= $this->e($custom_field['value']) ?>
                    <?php endif; ?>
                  </textarea>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'file'): ?>
              <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?>">
                <label class="col-sm-2 col-form-label">
                  <?= $this->e($custom_field['name']) ?>
                </label>
                <div class="col-sm-10">
                  <div>
                    <button type="button" data-oc-toggle="upload" data-oc-url="<?= $this->e($upload) ?>"
                      data-oc-size-max="<?= $this->e($config_file_max_size) ?>"
                      data-oc-size-error="<?= $this->e($error_upload_size) ?>"
                      data-oc-target="#input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                      class="btn btn-light"><i class="fa-solid fa-upload"></i>
                      <?= $this->e($button_upload) ?>
                    </button>
                    <input type="hidden" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                      value="<?php if ($address_custom_field[$custom_field . $custom_field_id]): ?><?= $this->e($address_custom_field[$custom_field . $custom_field_id]) ?><?php endif; ?>"
                      id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" />
                  </div>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'date'): ?>
              <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?>">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="col-sm-2 col-form-label">
                  <?= $this->e($custom_field['name']) ?>
                </label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                      value="<?php if ($address_custom_field[$custom_field . $custom_field_id]): ?><?= $this->e($address_custom_field[$custom_field . $custom_field_id]) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>"
                      placeholder="<?= $this->e($custom_field['name']) ?>"
                      id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control date" />
                    <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
                  </div>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'time'): ?>
              <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?>">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="col-sm-2 col-form-label">
                  <?= $this->e($custom_field['name']) ?>
                </label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                      value="<?php if ($address_custom_field[$custom_field . $custom_field_id]): ?><?= $this->e($address_custom_field[$custom_field . $custom_field_id]) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>"
                      placeholder="<?= $this->e($custom_field['name']) ?>"
                      id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control time" />
                    <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
                  </div>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'datetime'): ?>
              <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?>">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="col-sm-2 col-form-label">
                  <?= $this->e($custom_field['name']) ?>
                </label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                      value="<?php if ($address_custom_field[$custom_field . $custom_field_id]): ?><?= $this->e($address_custom_field[$custom_field . $custom_field_id]) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>"
                      placeholder="<?= $this->e($custom_field['name']) ?>"
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

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">
              <?= $this->e($entry_default) ?>
            </label>
            <div class="col-sm-10">
              <div class="form-check-inline">
                <input type="radio" name="default" value="1" id="input-default-yes" class="form-check-input" <?php if ($default): ?> checked<?php endif; ?> /> <label for="input-default-yes" class="form-check-label">
                  <?= $this->e($text_yes) ?>
                </label>
              </div>
              <div class="form-check-inline">
                <input type="radio" name="default" value="0" id="input-default-no" class="form-check-input" <?php if (!$default): ?> checked<?php endif; ?> /> <label for="input-default-no" class="form-check-label">
                  <?= $this->e($text_no) ?>
                </label>
              </div>
            </div>
          </div>
        </fieldset>
        <div class="row">
          <div class="col">
            <a href="<?=  $back  ?>" class="btn btn-light">
              <?= $this->e($button_back) ?>
            </a>
          </div>
          <div class="col text-end">
            <button type="submit" class="btn btn-primary">
              <?= $button_continue  ?>
            </button>
          </div>
        </div>
      </form>
      <?= $content_bottom ?>
    </div>
    <?= $column_right ?>
  </div>
</div>
<script type="text/javascript"><!--
$('#input-country').on('change', function () {
    var element = this;

    $.ajax({
        url: 'index.php?route=localisation/country&country_id=' + this.value + '&language=<?= $this->e($language) ?>',
  dataType: 'json',
    beforeSend: function () {
      $(element).prop('disabled', true);
      $('#input-zone').prop('disabled', true);
    },
  complete: function () {
    $(element).prop('disabled', false);
    $('#input-zone').prop('disabled', false);
  },
  success: function (json) {
    if (json['postcode_required'] == '1') {
      $('#input-postcode').parent().parent().addClass('required');
    } else {
      $('#input-postcode').parent().parent().removeClass('required');
    }

    html = '<option value=""><?= $this->e( $text_select)  ?></option>';

    if (json['zone'] && json['zone'] != '') {
      for (i = 0; i < json['zone'].length; i++) {
        html += '<option value="' + json['zone'][i]['zone_id'] + '"';

        if (json['zone'][i]['zone_id'] == '<?= $this->e($zone_id) ?>') {
          html += ' selected';
        }

        html += '>' + json['zone'][i]['name'] + '</option>';
      }
    } else {
      html += '<option value="0" selected><?= $this->e( $text_none)  ?></option>';
    }

    $('#input-zone').html(html);
  },
  error: function (xhr, ajaxOptions, thrownError) {
    //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
  }
    });
});

  $('#input-country').trigger('change');
//--></script>
<?= $footer ?>