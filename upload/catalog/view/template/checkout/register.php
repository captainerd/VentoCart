 
<form id="form-register">
  
  <fieldset>
    <legend><i class="fas fa-user"></i> <?= $this->e($heading_title ) ?></legend>
   
 
 <div class="col mb-3 <?= $this->e(count($customer_groups)) <= 1 ? 'd-none' : ''; ?>">
    <label class="form-label"><?= $this->e($entry_customer_group) ?></label>
    <select name="customer_group_id" id="input-customer-group" class="form-select">
        <?php foreach ($customer_groups as $customer_group): ?>
            <option value="<?= $this->e($customer_group['customer_group_id']) ?>"<?= $customer_group['customer_group_id'] == $customer_group_id ? ' selected' : '' ?>>
                <?= $this->e($customer_group['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

   
    <div class="row row-cols-1 row-cols-md-2">
      <div class="col mb-3 required">
        <label for="input-firstname" class="form-label"><?= $this->e($entry_firstname ) ?></label>
        <input type="text" name="firstname" value="<?= $this->e($firstname ) ?>" placeholder="<?= $this->e($entry_firstname ) ?>" id="input-firstname" class="form-control"/>
        <div id="error-firstname" class="invalid-feedback"></div>
      </div>
      <div class="col mb-3 required">
        <label for="input-lastname" class="form-label"><?= $this->e($entry_lastname ) ?></label>
        <input type="text" name="lastname" value="<?= $this->e($lastname ) ?>" placeholder="<?= $this->e($entry_lastname ) ?>" id="input-lastname" class="form-control"/>
        <div id="error-lastname" class="invalid-feedback"></div>
      </div>
 

    
      <?php foreach ($custom_fields as $custom_field): ?>

        <?php if ($custom_field['location'] == 'account'): ?>

          <?php if ($custom_field['type'] == 'select'): ?>
            <div class="col mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label> <select name="custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" id="input-customer-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-select">
                <option value=""><?= $this->e($text_select ) ?></option>
                <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                  <option value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>"<?php if ($account_custom_field[custom_field.custom_field_id] and custom_field_value.custom_field_value_id == $account_custom_field[custom_field.custom_field_id]): ?> selected<?php endif; ?>><?= $this->e($custom_field_value['name']) ?></option>
                <?php endforeach; ?>
              </select>
              <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'radio'): ?>
            <div class="col mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                  <div class="form-check">
                    <input type="radio" name="custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>" id="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-input"<?php if ($account_custom_field[custom_field.custom_field_id] and custom_field_value.custom_field_value_id == $account_custom_field[custom_field.custom_field_id]): ?> checked<?php endif; ?>/>
                    <label for="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-label"><?= $this->e($custom_field_value['name']) ?></label>
                  </div>
                <?php endforeach; ?>
              </div>
              <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'checkbox'): ?>
            <div class="col mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                  <div class="form-check">

               <input type="checkbox" name="custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>][]" value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>" id="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-input"<?= isset($account_custom_field[$custom_field['custom_field_id']]) && in_array($custom_field_value['custom_field_value_id'], $account_custom_field[$custom_field['custom_field_id']]) ? ' checked' : '' ?>/>
<label for="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-label"><?= $this->e($custom_field_value['name']) ?></label>

                  </div>
                <?php endforeach; ?>
              </div>
              <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'text'): ?>
            <div class="col mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <input type="text" name="custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($account_custom_field[custom_field.custom_field_id]): ?><?= $this->e($account_custom_field[custom_field.custom_field_id] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control"/>
              <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'textarea'): ?>
            <div class="col mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label> <textarea name="custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" rows="5" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control"><?php if ($account_custom_field[custom_field.custom_field_id]): ?><?= $this->e($account_custom_field[custom_field.custom_field_id] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?></textarea>
              <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'file'): ?>
            <div class="col mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div>
                <button type="button" data-oc-toggle="upload" data-oc-url="<?= $this->e($upload ) ?>" data-oc-size-max="<?= $this->e($config_file_max_size ) ?>" data-oc-size-error="<?= $this->e($error_upload_size ) ?>" data-oc-target="#input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="btn btn-light"><i class="fa-solid fa-upload"></i> <?= $this->e($button_upload ) ?></button>
                <input type="hidden" name="custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($account_custom_field[custom_field.custom_field_id]): ?><?= $this->e($account_custom_field[custom_field.custom_field_id] ) ?><?php endif; ?>" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"/>
              </div>
              <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'date'): ?>
            <div class="col mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div class="input-group">
                <input type="text" name="custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($account_custom_field[custom_field.custom_field_id]): ?><?= $this->e($account_custom_field[custom_field.custom_field_id] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control date"/>
                <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
              </div>
              <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'time'): ?>
            <div class="col mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div class="input-group">
                <input type="text" name="custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($account_custom_field[custom_field.custom_field_id]): ?><?= $this->e($account_custom_field[custom_field.custom_field_id] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control time"/>
                <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
              </div>
              <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'datetime'): ?>
            <div class="col mb-3 custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div class="input-group">
                <input type="text" name="custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($account_custom_field[custom_field.custom_field_id]): ?><?= $this->e($account_custom_field[custom_field.custom_field_id] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control datetime"/>
                <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
              </div>
              <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

        <?php endif; ?>
      <?php endforeach; ?>
 </div>
 
      <div class="row row-cols-1 row-cols-md-2 ">
        <div id="company_field" class="col mb-3 ">
          <label for="input-payment-company" class="form-label"><?= $this->e($entry_company ) ?></label> <input type="text" name="payment_company[0]" value="<?= $this->e($payment_company ) ?>" placeholder="<?= $this->e($entry_company ) ?>" id="input-payment-company" class="form-control"/>
          <div id="error-payment-company" class="invalid-feedback"></div>
        </div>
        <div class="col mb-3 required">
          <label for="input-payment-address-1" class="form-label"><?= $this->e($entry_address_1 ) ?></label> <input type="text" name="payment_address_1" value="<?= $this->e($payment_address_1 ) ?>" placeholder="<?= $this->e($entry_address_1 ) ?>" id="input-payment-address-1" class="form-control"/>
          <div id="error-payment-address-1" class="invalid-feedback"></div>
        </div>
        <div class="col mb-3 required">
          <label for="input-payment-city" class="form-label"><?= $this->e($entry_city ) ?></label> <input type="text" name="payment_city" value="<?= $this->e($payment_city ) ?>" placeholder="<?= $this->e($entry_city ) ?>" id="input-payment-city" class="form-control"/>
          <div id="error-payment-city" class="invalid-feedback"></div>
        </div>
        <div class="col mb-3 required">
          <label for="input-payment-postcode" class="form-label"><?= $this->e($entry_postcode ) ?></label> <input type="text" name="payment_postcode" value="<?= $this->e($payment_postcode ) ?>" placeholder="<?= $this->e($entry_postcode ) ?>" id="input-payment-postcode" class="form-control"/>
          <div id="error-payment-postcode" class="invalid-feedback"></div>
        </div>
  
        <div class="col mb-3 required">
        
          <label for="input-payment-country" class="form-label"><?= $this->e($entry_country ) ?></label> 
          
     
          <select name="payment_country_id" id="input-payment-country" class="form-select  ">
            <option value=""><?= $this->e($text_select ) ?></option>
            <?php foreach ($countries as $country): ?>
            <option value="<?= $this->e($country['country_id']) ?>"<?php if ($pre_select_country_id != 0 and $country['country_id'] == $pre_select_country_id or ($pre_select_country_id == 0 and $country['country_id'] == $payment_country_id)): ?> selected<?php endif; ?>>
              <?= $this->e($country['name']) ?>
            </option>
            <?php endforeach; ?>
          </select>
          <div id="error-payment-country" class="invalid-feedback"></div>
        </div>
        <div id="zone-field" class="col mb-3 required">
          <label for="input-payment-zone" class="form-label"><?= $this->e($entry_zone ) ?></label>
        
          <select name="payment_zone_id" id="input-payment-zone" class="form-select" data-oc-value="<?= $this->e($payment_zone_id ) ?>"></select>
          <div id="error-payment-zone" class="invalid-feedback"></div>
        </div>
        <div class="col mb-3 required">
          <label for="input-email" class="form-label"><?= $this->e($entry_email ) ?></label>
          <input type="text" name="email" value="<?= $this->e($email ) ?>" placeholder="<?= $this->e($entry_email ) ?>" id="input-email" class="form-control"/>
          <div id="error-email" class="invalid-feedback"></div>
        </div>
        <div class="col mb-3 required">
          <label for="input-payment-phone" class="form-label"><?= $this->e($entry_phone ) ?></label> 
          <input   type="text" name="payment_phone" value="<?= $this->e($payment_phone ) ?>" placeholder="<?= $this->e($entry_phone ) ?>" id="input-payment-phone" class="form-control shortPhone"/>
          <div id="error-payment-phone" class="invalid-feedback"></div>
        </div>  
        <?php foreach ($custom_fields as $custom_field): ?>
          <?php if ($custom_field['location'] == 'address'): ?>

            <?php if ($custom_field['type'] == 'select'): ?>
              <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label for="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label> <select name="payment_custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" id="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-select">
                  <option value=""><?= $this->e($text_select ) ?></option>
                  <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                    <option value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>"<?php if ($payment_custom_field[custom_field.custom_field_id] and custom_field_value.custom_field_value_id == $payment_custom_field[custom_field.custom_field_id]): ?> selected<?php endif; ?>><?= $this->e($custom_field_value['name']) ?></option>
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
                      <input type="radio" name="payment_custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>" id="input-payment-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-input"<?php if ($payment_custom_field[custom_field.custom_field_id] and custom_field_value.custom_field_value_id == $payment_custom_field[custom_field.custom_field_id]): ?> checked<?php endif; ?>/> <label for="input-payment-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-label"><?= $this->e($custom_field_value['name']) ?></label>
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
                    <input type="checkbox" name="payment_custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>][]" value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>" id="input-payment-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-input"<?= isset($address_custom_field[$custom_field['custom_field_id']]) && in_array($custom_field_value['custom_field_value_id'], $address_custom_field[$custom_field['custom_field_id']]) ? ' checked' : '' ?>/>
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
                <input type="text" name="payment_custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($address_custom_field[custom_field.custom_field_id]): ?><?= $this->e($address_custom_field[custom_field.custom_field_id] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control"/>
                <div id="error-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
              </div>
            <?php endif; ?>
            <?php if ($custom_field['type'] == 'textarea'): ?>
              <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label for="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label> <textarea name="payment_custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" rows="5" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control"><?php if ($address_custom_field[custom_field.custom_field_id]): ?><?= $this->e($address_custom_field[custom_field.custom_field_id] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?></textarea>
                <div id="error-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
              </div>
            <?php endif; ?>
            <?php if ($custom_field['type'] == 'file'): ?>
              <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label class="form-label"><?= $this->e($custom_field['name']) ?></label>
                <div>
                  <button type="button" data-oc-toggle="upload" data-oc-url="<?= $this->e($upload ) ?>" data-oc-size-max="<?= $this->e($config_file_max_size ) ?>" data-oc-size-error="<?= $this->e($error_upload_size ) ?>" data-oc-target="#input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="btn btn-light"><i class="fa-solid fa-upload"></i> <?= $this->e($button_upload ) ?></button>
                  <input type="hidden" name="payment_custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($payment_custom_field[custom_field.custom_field_id]): ?><?= $this->e($payment_custom_field[custom_field.custom_field_id] ) ?><?php endif; ?>" id="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"/>
                </div>
                <div id="error-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
              </div>
            <?php endif; ?>
            <?php if ($custom_field['type'] == 'date'): ?>
              <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label for="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="input-group">
                  <input type="text" name="payment_custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($payment_custom_field[custom_field.custom_field_id]): ?><?= $this->e($payment_custom_field[custom_field.custom_field_id] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control date"/>
                  <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
                </div>
                <div id="error-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
              </div>
            <?php endif; ?>
            <?php if ($custom_field['type'] == 'time'): ?>
              <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label for="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="input-group">
                  <input type="text" name="payment_custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($payment_custom_field[custom_field.custom_field_id]): ?><?= $this->e($payment_custom_field[custom_field.custom_field_id] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control time"/>
                  <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
                </div>
                <div id="error-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'datetime'): ?>
              <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <label for="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="input-group">
                  <input type="text" name="payment_custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($payment_custom_field[custom_field.custom_field_id]): ?><?= $this->e($payment_custom_field[custom_field.custom_field_id] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control datetime"/>
                  <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
                </div>
                <div id="error-payment-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
              </div>
            <?php endif; ?>

          <?php endif; ?>
        <?php endforeach; ?>

 

      </div>
    
  <fieldset id="shipping-address" style="display: <?php if (!$config_checkout_payment_address): ?>block<?php else: ?>none<?php endif; ?>;">
    <legend><?= $this->e($text_shipping_address ) ?></legend>
    <div class="row row-cols-1 row-cols-md-2">
      <?php if ($config_checkout_payment_address): ?>
        <div class="col mb-3 required">
          <label for="input-shipping-firstname" class="form-label"><?= $this->e($entry_firstname ) ?></label>
          <input type="text" name="shipping_firstname" value="<?= $this->e($shipping_firstname ) ?>" placeholder="<?= $this->e($entry_firstname ) ?>" id="input-shipping-firstname" class="form-control"/>
          <div id="error-shipping-firstname" class="invalid-feedback"></div>
        </div>
        <div class="col mb-3 required">
          <label for="input-shipping-lastname" class="form-label"><?= $this->e($entry_lastname ) ?></label>
          <input type="text" name="shipping_lastname" value="<?= $this->e($shipping_lastname ) ?>" placeholder="<?= $this->e($entry_lastname ) ?>" id="input-shipping-lastname" class="form-control"/>
          <div id="error-shipping-lastname" class="invalid-feedback"></div>
        </div>
      <?php endif; ?>
      <div class="col mb-3 d-none">
        <label for="input-shipping-company" class="form-label"><?= $this->e($entry_company ) ?></label>
        <input type="text" name="shipping_company" value="<?= $this->e($shipping_company ) ?>" placeholder="<?= $this->e($entry_company ) ?>" id="input-shipping-company" class="form-control"/>
      </div>
      <div class="col mb-3 required">
        <label for="input-shipping-address-1" class="form-label"><?= $this->e($entry_address_1 ) ?></label>
        <input type="text" name="shipping_address_1" value="<?= $this->e($shipping_address_1 ) ?>" placeholder="<?= $this->e($entry_address_1 ) ?>" id="input-shipping-address-1" class="form-control"/>
        <div id="error-shipping-address-1" class="invalid-feedback"></div>
      </div>
   

      <div class="col mb-3 required">
        <label for="input-shipping-city" class="form-label"><?= $this->e($entry_city ) ?></label>
        <input type="text" name="shipping_city" value="<?= $this->e($shipping_city ) ?>" placeholder="<?= $this->e($entry_city ) ?>" id="input-shipping-city" class="form-control"/>
        <div id="error-shipping-city" class="invalid-feedback"></div>
      </div>

      <div class="col mb-3 required">
        <label for="input-shipping-postcode" class="form-label"><?= $this->e($entry_postcode ) ?></label>
        <input type="text" name="shipping_postcode" value="<?= $this->e($shipping_postcode ) ?>" placeholder="<?= $this->e($entry_postcode ) ?>" id="input-shipping-postcode" class="form-control"/>
        <div id="error-shipping-postcode" class="invalid-feedback"></div>
      </div>
    
  
  
      <div class="col mb-3 required">
        <label for="input-shipping-country" class="form-label"><?= $this->e($entry_country ) ?></label>
        <select name="shipping_country_id" id="input-shipping-country" class="form-select">
          <option value=""><?= $this->e($text_select ) ?></option>
          <?php foreach ($countries as $country): ?>
            <option value="<?= $this->e($country['country_id']) ?>"<?php if ($country['country_id'] == $$shipping_country_id): ?> selected<?php endif; ?>><?= $this->e($country['name']) ?></option>
          <?php endforeach; ?>
        </select>
        <div id="error-shipping-country" class="invalid-feedback"></div>
      </div>
       <div class="col mb-3 required">
        <label for="input-shipping-zone" class="form-label"><?= $this->e($entry_zone ) ?></label>
        <select name="shipping_zone_id" id="input-shipping-zone" class="form-select" data-oc-value="<?= $this->e($shipping_zone_id ) ?>"></select>
        <div id="error-shipping-zone" class="invalid-feedback"></div>
      </div> 
      <div class="col mb-3 required">
        <label for="input-shipping-phone" class="form-label"><?= $this->e($entry_phone ) ?></label>
        <input type="text" name="shipping_phone" value="<?= $this->e($shipping_phone ) ?>" placeholder="<?= $this->e($entry_phone ) ?>" id="input-shipping-phone" class="form-control shortPhone"/>
        <div id="error-shipping-phone" class="invalid-feedback"></div>
      </div> 
      <?php foreach ($custom_fields as $custom_field): ?>
        <?php if ($custom_field['location'] == 'address'): ?>

          <?php if ($custom_field['type'] == 'select'): ?>
            <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <select name="shipping_custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" id="input-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-select">
                <option value=""><?= $this->e($text_select ) ?></option>
                <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                  <option value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>"<?php if ($shipping_custom_field[custom_field.custom_field_id] and custom_field_value.custom_field_value_id == $shipping_custom_field[custom_field.custom_field_id]): ?> selected<?php endif; ?>><?= $this->e($custom_field_value['name']) ?></option>
                <?php endforeach; ?>
              </select>
              <div id="error-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'radio'): ?>
            <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div id="input-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                  <div class="form-check">
 

 <input type="radio" name="shipping_custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>" id="input-shipping-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-input"<?= isset($shipping_custom_field[$custom_field['custom_field_id']]) && in_array($custom_field_value['custom_field_value_id'], $shipping_custom_field[$custom_field['custom_field_id']]) ? ' checked' : '' ?>/>

                    <label for="input-shipping-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-label"><?= $this->e($custom_field_value['name']) ?></label>
              
                  </div>
                <?php endforeach; ?>
              </div>
              <div id="error-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'checkbox'): ?>
            <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div id="input-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                  <div class="form-check">
                  <input type="checkbox" name="shipping_custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>][]" value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>" id="input-shipping-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-input"<?= $shipping_custom_field[$this->e($custom_field['custom_field_id'])] && in_array($this->e($custom_field_value['custom_field_value_id']), $shipping_custom_field[$this->e($custom_field['custom_field_id'])]) ? ' checked' : '' ?>/>

                   
                    <label for="input-shipping-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-label"><?= $this->e($custom_field_value['name']) ?></label>
                  </div>
                <?php endforeach; ?>
              </div>
              <div id="error-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'text'): ?>
            <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <input type="text" name="shipping_custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($shipping_custom_field[custom_field.custom_field_id]): ?><?= $this->e($shipping_custom_field[custom_field.custom_field_id] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control"/>
              <div id="error-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'textarea'): ?>
            <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <textarea name="shipping_custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" rows="5" placeholder="<?php if ($shipping_custom_field[custom_field.custom_field_id]): ?><?= $this->e($shipping_custom_field[custom_field.custom_field_id] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>" id="input-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control"><?= $this->e($custom_field['value']) ?></textarea>
              <div id="error-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>
          <?php if ($custom_field['type'] == 'file'): ?>
            <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div>
                <button type="button" data-oc-toggle="upload" data-oc-url="<?= $this->e($upload ) ?>" data-oc-size-max="<?= $this->e($config_file_max_size ) ?>" data-oc-size-error="<?= $this->e($error_upload_size ) ?>" data-oc-target="#input-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="btn btn-light"><i class="fa-solid fa-upload"></i> <?= $this->e($button_upload ) ?></button>
                <input type="hidden" name="shipping_custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($shipping_custom_field[custom_field.custom_field_id]): ?><?= $this->e($shipping_custom_field[custom_field.custom_field_id] ) ?><?php endif; ?>" id="input-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"/>
                <div id="error-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
              </div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'date'): ?>
            <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div class="input-group">
                <input type="text" name="shipping_custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($shipping_custom_field[custom_field.custom_field_id]): ?><?= $this->e($shipping_custom_field[custom_field.custom_field_id] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control date"/>
                <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
              </div>
              <div id="error-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'time'): ?>
            <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div class="input-group">
                <input type="text" name="shipping_custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($shipping_custom_field[custom_field.custom_field_id]): ?><?= $this->e($shipping_custom_field[custom_field.custom_field_id] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control time"/>
                <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
              </div>
              <div id="error-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>

          <?php if ($custom_field['type'] == 'datetime'): ?>
            <div class="col mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
              <label for="input-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-label"><?= $this->e($custom_field['name']) ?></label>
              <div class="input-group">
                <input type="text" name="shipping_custom_field[<?= $this->e($custom_field['location']) ?>][<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($shipping_custom_field[custom_field.custom_field_id]): ?><?= $this->e($shipping_custom_field[custom_field.custom_field_id] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control datetime"/>
                <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
              </div>
              <div id="error-shipping-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
            </div>
          <?php endif; ?>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>

    
  </fieldset>

  <div id class="row row-cols-1 row-cols-md-2">
    <div id="password" class="col mb-3 required d-none">
      <fieldset>
        <legend><?= $this->e($text_your_password ) ?></legend>
        <div class="row">
          <div class="col mb-3 required">
            <label for="input-password" class="form-label"><?= $this->e($entry_password ) ?></label> <input type="password" name="password" value="" placeholder="<?= $this->e($entry_password ) ?>" id="input-password" class="form-control"/>
            <div id="error-password" class="invalid-feedback"></div>
          </div>
  
        </div>
        <button type="submit" id="button-register" class="btn btn-primary mt-2"><?= $this->e($text_register ) ?></button> 
      </fieldset>
    </div>
    <div class="col mb-3 required"><?=  $captcha  ?></div>
  </div>

  <div id class="row">
    <div class="col">
      <?php if ($config_checkout_guest): ?>
  
      <hr/>
      <div class="form-check    ">
        <input type="checkbox" name="account" value="1" id="input-register-acc" class="form-check-input" /> 
        <label for="input-register-acc" class="form-check-label"><?= $this->e($text_register ) ?></label>
      </div>
  
  
    
    
  <?php endif; ?>
 
 
      <?php if ($shipping_required): ?>
 
      <div class="form-check    ">
        <input type="hidden" name="address_match" id="address-match-hd" value="1">
        <input type="checkbox" name="address_match_sw" value="1" id="input-address-match" class="form-check-input" /> <label for="input-address-match" class="form-check-label"><?= $this->e($entry_match ) ?></label>
      </div>
  
  <?php endif; ?>

 
 

      <div class="form-check  ">
        <label for="input-newsletter" class="form-check-label"><?= $this->e($entry_newsletter ) ?></label>
        <input type="checkbox" name="newsletter" value="1" checked id="input-newsletter" class="form-check-input"/>
      </div>
      <?php if ($text_agree): ?>
        <div class="form-check  ">
          <label class="form-check-label"><?=  $text_agree  ?></label>
          <input checked type="checkbox" name="agree" value="1" id="input-register-agree" class="form-check-input"<?php if (isset($agree)): ?> checked<?php endif; ?>/>
        </div>
      <?php endif; ?>
    
    </div>
  </div>

</form>
 
<script type="text/javascript">
     // Populate shipping methods and payment methods on page load
    $(document).ready(function() {
      window.lang = '<?= $this->e($language) ?>';
      window.text_select = '<?= $this->e($text_select ) ?>';
      window.text_none = '<?= $this->e($text_select ) ?>';
      window.checkoutInit = new AddressCheckOut("register", $);
 
 

 

  });

 

</script>

  <script src="catalog/view/javascript/checkout.js" type="text/javascript"></script>