<fieldset class="<?= ($type == 'shipping') ? 'd-none shipping-address-form' : ' ' ?>">
  <legend><?= $this->e($heading_title) ?></legend>
  <div id="<?= $type; ?>-addresses" style="display: <?php if ($addresses): ?>block<?php else: ?>none<?php endif; ?>;">
    <div class="form-check ">
      <input type="radio" name="<?= $type; ?>_existing" value="1" id="input-<?= $type; ?>-existing"
        class="form-check-input" <?php if ($addresses): ?> checked<?php endif; ?> />
      <label for="input-<?= $type; ?>-existing" class="form-check-label"><?= $this->e($text_address_existing) ?></label>
    </div>
    <div class="form-check">
      <input type="radio" name="<?= $type; ?>_existing" value="0" id="input-<?= $type; ?>-new" class="form-check-input"
        <?php if (!$addresses): ?> checked<?php endif; ?>>
      <label for="input-<?= $type; ?>-new" class="form-check-label"><?= $this->e($text_address_new) ?></label>
    </div>
  </div>
  <div id="<?= $type; ?>-existing" style="display: <?php if ($addresses): ?>block<?php else: ?>none<?php endif; ?>;">
    <select name="address_id" id="input-<?= $type; ?>-address" data-type="<?= $type; ?>"
      class="form-select address-select">
      <option value=""><?= $this->e($text_select) ?></option>
      <?php foreach ($addresses as $address): ?>

        <option value="<?= $this->e($address['address_id']) ?>" <?php if ($address['address_id'] == $address_id): ?>
            selected <?php endif; ?>><?= $this->e($address['firstname']) ?>
          <?= $this->e($address['lastname']) ?>,<?php if ($address['company']): ?>
            <?= $this->e($address['company']) ?>,<?php endif; ?>   <?= $this->e($address['address_1']) ?>,
          <?= $this->e($address['city']) ?>, <?= $this->e($address['zone']) ?>, <?= $this->e($address['country']) ?>
        </option>
      <?php endforeach; ?>
    </select>
    <div id="error-<?= $type; ?>-address" class="invalid-feedback"></div>
  </div>
  <br />
  <div id="<?= $type; ?>-new" style="display: <?php if (!$addresses): ?>block<?php else: ?>none<?php endif; ?>;">
    <form id="form-<?= $type; ?>-address" class="address-form" data-type="<?= $type; ?>">
      <div class="row row-cols-1 row-cols-md-2">
        <div class="col mb-3 required">
          <label for="input-<?= $type; ?>-firstname" class="form-label"><?= $this->e($entry_firstname) ?></label>
          <input type="text" name="firstname" value="" placeholder="<?= $this->e($entry_firstname) ?>"
            id="input-<?= $type; ?>-firstname" class="form-control">
          <div id="error-<?= $type; ?>-firstname" class="invalid-feedback"></div>
        </div>
        <div class="col mb-3 required">
          <label for="input-<?= $type; ?>-lastname" class="form-label"><?= $this->e($entry_lastname) ?></label>
          <input type="text" name="lastname" value="" placeholder="<?= $this->e($entry_lastname) ?>"
            id="input-<?= $type; ?>-lastname" class="form-control">
          <div id="error-<?= $type; ?>-lastname" class="invalid-feedback"></div>
        </div>
        <div id="company_field" class="col mb-3  ">
          <label for="input-<?= $type; ?>-company" class="form-label"><?= $this->e($entry_company) ?></label>
          <input type="text" name="company" value="" placeholder="<?= $this->e($entry_company) ?>"
            id="input-<?= $type; ?>-company" class="form-control">
        </div>
        <div class="col mb-3 required">
          <label for="input-<?= $type; ?>-address-1" class="form-label"><?= $this->e($entry_address_1) ?></label>
          <input type="text" name="address_1" value="" placeholder="<?= $this->e($entry_address_1) ?>"
            id="input-<?= $type; ?>-address-1" class="form-control">
          <div id="error-<?= $type; ?>-address-1" class="invalid-feedback"></div>
        </div>

        <div class="col mb-3 required">
          <label for="input-<?= $type; ?>-city" class="form-label"><?= $this->e($entry_city) ?></label>
          <input type="text" name="city" value="" placeholder="<?= $this->e($entry_city) ?>"
            id="input-<?= $type; ?>-city" class="form-control">
          <div id="error-<?= $type; ?>-city" class="invalid-feedback"></div>
        </div>
        <div class="col mb-3 required">
          <label for="input-<?= $type; ?>-postcode" class="form-label"><?= $this->e($entry_postcode) ?></label>
          <input type="text" name="postcode" value="" placeholder="<?= $this->e($entry_postcode) ?>"
            id="input-<?= $type; ?>-postcode" class="form-control">
          <div id="error-<?= $type; ?>-postcode" class="invalid-feedback"></div>
        </div>
        <div class="col mb-3 required">
          <label for="input-<?= $type; ?>-country" class="form-label"><?= $this->e($entry_country) ?></label>

          <select name="country_id" id="input-<?= $type; ?>-country" class="form-select country-select">

            <option value=""><?= $this->e($text_select) ?></option>
            <?php foreach ($countries as $country): ?>
              <option value="<?= $this->e($country['country_id']) ?>" <?php if ($pre_select_country_id != 0 && $country['country_id'] == $pre_select_country_id || (isset($payment_country_id) && $pre_select_country_id == 0 && $country['country_id'] == $payment_country_id)): ?> selected<?php endif; ?>>
                <?= $this->e($country['name']) ?>
              </option>
            <?php endforeach; ?>
          </select>
          <div id="error-<?= $type; ?>-country" class="invalid-feedback"></div>
        </div>
        <div class="col mb-3 required">
          <label for="input-<?= $type; ?>-zone" class="form-label"><?= $this->e($entry_zone) ?></label>

          <select name="zone_id" id="input-<?= $type; ?>-zone" class="form-select">
            <option value=""><?= $this->e($text_select) ?></option>
          </select>
          <div id="error-<?= $type; ?>-zone" class="invalid-feedback"></div>
        </div>
        <div class="col mb-3 required">
          <label for="input-<?= $type; ?>-phone" class="form-label"><?= $this->e($entry_phone) ?></label>
          <input type="text" name="phone" value="" placeholder="<?= $this->e($entry_phone) ?>"
            id="input-<?= $type; ?>-phone" class="form-control shortPhone" />
          <div id="error-<?= $type; ?>-phone" class="invalid-feedback"></div>
        </div>

        <?php foreach ($custom_fields as $custom_field): ?>

          <?php if ($custom_field['type'] == 'select'): ?>
            <div
              class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <select name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                id="input-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-select">
                <option value=""><?= $this->e($text_select) ?></option>
                <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                  <option value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>">
                    <?= $this->e($custom_field_value['name']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <div id="error-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'radio'): ?>
            <div
              class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div id="input-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                  <div class="form-check">
                    <input type="radio" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                      value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                      id="input-<?= $type; ?>-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                      class="form-check-input">
                    <label
                      for="input-<?= $type; ?>-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                      class="form-check-label"><?= $this->e($custom_field_value['name']) ?></label>
                  </div>
                <?php endforeach; ?>
              </div>
              <div id="error-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'checkbox'): ?>
            <div
              class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div id="input-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                  <div class="form-check">
                    <input type="checkbox" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>][]"
                      value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                      id="input-<?= $type; ?>-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                      class="form-check-input">
                    <label
                      for="input-<?= $type; ?>-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                      class="form-check-label"><?= $this->e($custom_field_value['name']) ?></label>
                  </div>
                <?php endforeach; ?>
              </div>
              <div id="error-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'text'): ?>
            <div
              class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                value="<?= $this->e($custom_field['value']) ?>" placeholder="<?= $this->e($custom_field['name']) ?>"
                id="input-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                class="form-control">
              <div id="error-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'textarea'): ?>
            <div
              class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <textarea name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" rows="5"
                placeholder="<?= $this->e($custom_field['name']) ?>"
                id="input-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                class="form-control"><?= $this->e($custom_field['value']) ?></textarea>
              <div id="error-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'file'): ?>
            <div
              class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div>
                <button type="button" data-oc-toggle="upload" data-oc-url="<?= $this->e($upload) ?>"
                  data-oc-size-max="<?= $this->e($config_file_max_size) ?>"
                  data-oc-size-error="<?= $this->e($error_upload_size) ?>"
                  data-oc-target="#input-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="btn btn-light"><i class="fa-solid fa-upload"></i> <?= $this->e($button_upload) ?></button>
                <input type="hidden" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value=""
                  id="input-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" />
              </div>
              <div id="error-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'date'): ?>
            <div
              class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div class="input-group">
                <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                  value="<?= $this->e($custom_field['value']) ?>" placeholder="<?= $this->e($custom_field['name']) ?>"
                  id="input-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="form-control date" />
                <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
              </div>
              <div id="error-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'time'): ?>
            <div
              class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              -
              <label for="input-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div class="input-group">
                <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                  value="<?= $this->e($custom_field['value']) ?>" placeholder="<?= $this->e($custom_field['name']) ?>"
                  id="input-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="form-control time" />
                <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
              </div>
              <div id="error-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'datetime'): ?>
            <div
              class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div class="input-group">
                <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                  value="<?= $this->e($custom_field['value']) ?>" placeholder="<?= $this->e($custom_field['name']) ?>"
                  id="input-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="form-control datetime" />
                <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
              </div>
              <div id="error-<?= $type; ?>-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

        <?php endforeach; ?>




      </div>


      <div class="text-end mb-3">
        <button type="submit" id="button-<?= $type; ?>-address"
          class="btn btn-primary"><?= $this->e($button_continue) ?></button>
      </div>


  </div>
</fieldset>


<?php if ($type == "payment" && $HasShipping == 1): ?>
  <div class="col mb-4 required">
    <div class="form-check">
      <input type="checkbox" name="sameaddress" id="input-sameaddress" class="form-check-input">
      <label class="form-check-label" for="input-sameaddress"><?= $entry_match ?></label>
    </div>
  </div>


  <?php if ($type == "payment" && $text_agree_checkout): ?>
    <div class="form-check">
      <label for="input-register-agree-checkout" class="form-check-label"><?= $text_agree_checkout ?></label>
      <input checked type="checkbox" name="agree_checkout" value="1" id="input-register-agree-checkout"
        class="form-check-input" <?php if (isset($agree_checkout)): ?> checked<?php endif; ?> />
    </div>
  <?php endif; ?>



<?php endif; ?>


</form>




<script>


  // Populate shipping methods and payment methods on page load
  $(document).ready(function () {
    window.lang = '<?= $this->e($language) ?>';
    window.text_select = '<?= $this->e($text_select) ?>';
    window.text_none = '<?= $this->e($text_select) ?>';

    if (typeof window.checkoutInit == 'undefined') {

      window.checkoutInit = new AddressCheckOut("<?= $type; ?>-address", $);

    }
  });
</script>