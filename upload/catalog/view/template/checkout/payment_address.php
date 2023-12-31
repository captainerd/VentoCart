<fieldset>
  <legend><?= $this->e($heading_title ) ?></legend>
  <div id="payment-addresses" style="display: <?php if ($addresses): ?>block<?php else: ?>none<?php endif; ?>;">
    <div class="form-check">
      <input type="radio" name="payment_existing" value="1" id="input-payment-existing" class="form-check-input"<?php if ($addresses): ?> checked<?php endif; ?>/>
      <label for="input-payment-existing" class="form-check-label"><?= $this->e($text_address_existing ) ?></label>
    </div>
    <div class="form-check">
      <input type="radio" name="payment_existing" value="0" id="input-payment-new" class="form-check-input"<?php if (!$addresses): ?> checked<?php endif; ?>>
      <label for="input-payment-new" class="form-check-label"><?= $this->e($text_address_new ) ?></label>
    </div>
  </div>
  <div id="payment-existing" style="display: <?php if ($addresses): ?>block<?php else: ?>none<?php endif; ?>;">
    <select name="address_id" id="input-payment-address" class="form-select">
      <option value=""><?= $this->e($text_select ) ?></option>
      <?php foreach ($addresses as $address): ?>
        <option value="<?= $this->e($address['address_id']) ?>"<?php if ($address['address_id'] == $address_id): ?> selected<?php endif; ?>><?= $this->e($address['firstname']) ?> <?= $this->e($address['lastname']) ?>,<?php if ($address['company']): ?> <?= $this->e($address['company']) ?>,<?php endif; ?> <?= $this->e($address['address_1']) ?>, <?= $this->e($address['city']) ?>, <?= $this->e($address['zone']) ?>, <?= $this->e($address['country']) ?></option>
      <?php endforeach; ?>
    </select>
    <div id="error-payment-address" class="invalid-feedback"></div>
  </div>
  <br/>
  <div id="payment-new" style="display: <?php if (!$addresses): ?>block<?php else: ?>none<?php endif; ?>;">
    <form id="form-payment-address">
      <div class="row row-cols-1 row-cols-md-2">
        <div class="col mb-3 required">
          <label for="input-payment-firstname" class="form-label"><?= $this->e($entry_firstname ) ?></label>
          <input type="text" name="firstname" value="" placeholder="<?= $this->e($entry_firstname ) ?>" id="input-payment-firstname" class="form-control"/>
          <div id="error-payment-firstname" class="invalid-feedback"></div>
        </div>
        <div class="col mb-3 required">
          <label for="input-payment-lastname" class="form-label"><?= $this->e($entry_lastname ) ?></label>
          <input type="text" name="lastname" value="" placeholder="<?= $this->e($entry_lastname ) ?>" id="input-payment-lastname" class="form-control"/>
          <div id="error-payment-lastname" class="invalid-feedback"></div>
        </div>
        <div  id="company_field" class="col mb-3  ">
          <label for="input-payment-company" class="form-label"><?= $this->e($entry_company ) ?></label>
          <input type="text" name="company" value="" placeholder="<?= $this->e($entry_company ) ?>" id="input-payment-company" class="form-control"/>
        </div>
        <div class="col mb-3 required">
          <label for="input-payment-address-1" class="form-label"><?= $this->e($entry_address_1 ) ?></label>
          <input type="text" name="address_1" value="" placeholder="<?= $this->e($entry_address_1 ) ?>" id="input-payment-address-1" class="form-control"/>
          <div id="error-payment-address-1" class="invalid-feedback"></div>
        </div>
    
        <div class="col mb-3 required">
          <label for="input-payment-city" class="form-label"><?= $this->e($entry_city ) ?></label>
          <input type="text" name="city" value="" placeholder="<?= $this->e($entry_city ) ?>" id="input-payment-city" class="form-control"/>
          <div id="error-payment-city" class="invalid-feedback"></div>
        </div>
        <div class="col mb-3 required">
          <label for="input-payment-postcode" class="form-label"><?= $this->e($entry_postcode ) ?></label>
          <input type="text" name="postcode" value="" placeholder="<?= $this->e($entry_postcode ) ?>" id="input-payment-postcode" class="form-control"/>
          <div id="error-payment-postcode" class="invalid-feedback"></div>
        </div>
        <div class="col mb-3 required">
          <label for="input-payment-country" class="form-label"><?= $this->e($entry_country ) ?></label>
     
          <select name="country_id" id="input-payment-country" class="form-select country-select">
        
            <option value="0"><?= $this->e($text_select ) ?></option>
            <?php foreach ($countries as $country): ?>
            <option value="<?= $this->e($country['country_id']) ?>"<?php if ($pre_select_country_id != 0 && $country['country_id'] == $pre_select_country_id || (isset($payment_country_id) && $pre_select_country_id == 0 && $country['country_id'] == $payment_country_id)): ?> selected<?php endif; ?>>
              <?= $this->e($country['name']) ?>
            </option>
            <?php endforeach; ?>
          </select>
          <div id="error-payment-country" class="invalid-feedback"></div>
        </div>
        <div class="col mb-3 required">
          <label for="input-payment-zone" class="form-label"><?= $this->e($entry_zone ) ?></label>
        
          <select name="zone_id" id="input-payment-zone" class="form-select"></select>
          <div id="error-payment-zone" class="invalid-feedback"></div>
        </div>
        <div class="col mb-3 required">
          <label for="input-payment-phone" class="form-label"><?= $this->e($entry_phone ) ?></label>
          <input type="text" name="payment_phone" value="" placeholder="<?= $this->e($entry_phone ) ?>" id="input-payment-phone" class="form-control"/>
          <div id="error-payment-phone" class="invalid-feedback"></div>
        </div>
     
        <?php foreach ($custom_fields as $custom_field): ?>

          <?php if ($custom_field['type'] == 'select'): ?>
            <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <select name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" id="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-select">
                <option value=""><?= $this->e($text_select ) ?></option>
                <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                  <option value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>"><?= $this->e($custom_field_value['name']) ?></option>
                <?php endforeach; ?>
              </select>
              <div id="error-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'radio'): ?>
            <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div id="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                  <div class="form-check">
                    <input type="radio" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>" id="input-payment-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-input"/>
                    <label for="input-payment-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-label"><?= $this->e($custom_field_value['name']) ?></label>
                  </div>
                <?php endforeach; ?>
              </div>
              <div id="error-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'checkbox'): ?>
            <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div id="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                  <div class="form-check">
                    <input type="checkbox" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>][]" value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>" id="input-payment-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-input"/>
                    <label for="input-payment-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-label"><?= $this->e($custom_field_value['name']) ?></label>
                  </div>
                <?php endforeach; ?>
              </div>
              <div id="error-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'text'): ?>
            <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?= $this->e($custom_field['value']) ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control"/>
              <div id="error-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'textarea'): ?>
            <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <textarea name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" rows="5" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control"><?= $this->e($custom_field['value']) ?></textarea>
              <div id="error-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'file'): ?>
            <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div>
                <button type="button" data-oc-toggle="upload" data-oc-url="<?= $this->e($upload ) ?>" data-oc-size-max="<?= $this->e($config_file_max_size ) ?>" data-oc-size-error="<?= $this->e($error_upload_size ) ?>" data-oc-target="#input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="btn btn-light"><i class="fa-solid fa-upload"></i> <?= $this->e($button_upload ) ?></button>
                <input type="hidden" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value="" id="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"/>
              </div>
              <div id="error-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'date'): ?>
            <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div class="input-group">
                <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?= $this->e($custom_field['value']) ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control date"/>
                <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
              </div>
              <div id="error-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'time'): ?>
            <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">-
              <label for="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div class="input-group">
                <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?= $this->e($custom_field['value']) ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control time"/>
                <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
              </div>
              <div id="error-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'datetime'): ?>
            <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div class="input-group">
                <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?= $this->e($custom_field['value']) ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control datetime"/>
                <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
              </div>
              <div id="error-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

        <?php endforeach; ?>
      </div>
      
      <div class="text-end mb-3">
        <button type="submit" id="button-payment-address" class="btn btn-primary"><?= $this->e($button_continue ) ?></button>
      </div>
    </form>
  </div>
</fieldset>
 
<script type="text/javascript">
$('input[name=\'payment_existing\']').on('change', function() {
    if ($(this).val() == 1) {
        $('#payment-existing').show();
        $('#payment-new').hide();
    } else {
        $('#payment-existing').hide();
        $('#payment-new').show();
 
    }
});

// Existing Payment Address
$('#input-payment-address').on('change', function() {
    var element = this;

    chain.attach(function() {
        return $.ajax({
            url: 'index.php?route=checkout/payment_address.address&language=<?= $this->e($language ) ?>&address_id=' + $(element).val(),
            dataType: 'json',
            beforeSend: function() {
                $(element).prop('disabled', true);
            },
            complete: function() {
                $(element).prop('disabled', false);
            },
            success: function(json) {
                //x console.log(json);

                $('#input-payment-address').removeClass('is-invalid');
                $('#error-payment-address').removeClass('d-block');

                if (json['redirect']) {
                    location = json['redirect'];
                }

                if (json['error']) {
                    $('#input-payment-address').addClass('is-invalid');
                    $('#error-payment-address').html(json['error']).addClass('d-block');
                }

                if (json['success']) {
                    $('#alert').prepend('<div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');

                    $('#input-shipping-method').val('');
                    $('#input-payment-method').val('');

                   // $('#checkout-confirm').load('index.php?route=checkout/confirm.confirm&language=<?= $this->e($language ) ?>');
                   populatePaymentAndShippingMethods();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
});

// New Payment Address
$('#form-payment-address').on('submit', function(e) {
    e.preventDefault();

    chain.attach(function() {
        return $.ajax({
            url: 'index.php?route=checkout/payment_address.save&language=<?= $this->e($language ) ?>',
            type: 'post',
            data: $('#form-payment-address').serialize(),
            dataType: 'json',
            contentType: 'application/x-www-form-urlencoded',
            beforeSend: function() {
                $('#button-payment-address').button('loading');
            },
            complete: function() {
                $('#button-payment-address').button('reset');
            },
            success: function(json) {
                //x console.log(json);

                $('#form-payment-address').find('.is-invalid').removeClass('is-invalid');
                $('#form-payment-address').find('.invalid-feedback').removeClass('d-block');

                if (json['redirect']) {
                    location = json['redirect'];
                }

                if (json['error']) {
                    if (json['error']['warning']) {
                        $('#alert').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['error']['warning'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                    }

                    for (i in json['error']) {
                        for (key in json['error']) {
                         // //x console.log("found: " + '#input-payment-' + key.replaceAll('_', '-'));
                            $('#input-payment-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                            $('#error-payment-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                        }
                    }
                }

                if (json['success']) {
                    $('#alert').prepend('<div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');

                    $('#form-payment-address')[0].reset();

                    var html = '<option value=""><?= $this->e($text_select ) ?></option>';

                    if (json['addresses']) {
                        for (i in json['addresses']) {
                            html += '<option value="' + json['addresses'][i]['address_id'] + '">' + json['addresses'][i]['firstname'] + ' ' + json['addresses'][i]['lastname'] + ', ' + (json['addresses'][i]['company'] ? json['addresses'][i]['company'] + ', ' : '') + json['addresses'][i]['address_1'] + ', ' + json['addresses'][i]['city'] + ', ' + json['addresses'][i]['zone'] + ', ' + json['addresses'][i]['country'] + '</option>';
                        }
                    }

                    // Payment Address
                    $('#input-payment-address').html(html);

                    $('#input-payment-address').val(json['address_id']);

                    $('#payment-addresses').css({display: 'block'});

                    $('#input-payment-existing').trigger('click');

                    // Shipping Address
                    var shipping_address_id = $('#input-shipping-address').val();

                    $('#input-shipping-address').html(html);

                    if (shipping_address_id) {
                        $('#input-shipping-address').val(shipping_address_id);
                    }

                    $('#shipping-address').css({display: 'block'});
                    $('#shipping-addresses').css({display: 'block'});

                    $('#input-shipping-existing').trigger('click');

                    $('#input-shipping-method').val('');
                    $('#input-payment-method').val('');
                    populatePaymentAndShippingMethods();
                   // $('#checkout-confirm').load('index.php?route=checkout/confirm.confirm&language=<?= $this->e($language ) ?>');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
});


 </script>
 


<script type="text/javascript">
 
 
  // Populate shipping methods and payment methods on page load
  $(document).ready(function() {
    window.lang = '<?= $this->e($language) ?>';
      window.text_select = '<?= $this->e($text_select ) ?>';
      window.text_none = '<?= $this->e($text_select ) ?>';
    
   if (typeof window.checkoutInit == 'undefined') window.checkoutInit = new AddressCheckOut("form-payment-address",   $);
});
</script>

<script src="catalog/view/javascript/checkout.js" type="text/javascript"></script>
