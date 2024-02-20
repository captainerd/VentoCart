<?=  $header    ?>
<div id="account-affiliate" class="container">
<?=  $breadcrumb  ?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <form id="form-affiliate" action="<?=  $save   ?>" method="post" data-oc-toggle="ajax">

        <fieldset>
          <legend><?= $this->e($text_my_affiliate ) ?></legend>
          <div class="row mb-3">
            <label for="input-company" class="col-sm-2 col-form-label"><?= $this->e($entry_company ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="company" value="<?= $this->e($company ) ?>" placeholder="<?= $this->e($entry_company ) ?>" id="input-company" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label for="input-website" class="col-sm-2 col-form-label"><?= $this->e($entry_website ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="website" value="<?= $this->e($website ) ?>" placeholder="<?= $this->e($entry_website ) ?>" id="input-website" class="form-control">
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend><?= $this->e($text_payment ) ?></legend>
          <div class="row mb-3">
            <label for="input-tax" class="col-sm-2 col-form-label"><?= $this->e($entry_tax ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="tax" value="<?= $this->e($tax ) ?>" placeholder="<?= $this->e($entry_tax ) ?>" id="input-tax" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label"><?= $this->e($entry_payment_method ) ?></label>
            <div class="col-sm-10">
              <div class="form-check">
                <input type="radio" name="payment_method" value="cheque" id="input-payment-cheque" class="form-check-input"<?php if ($payment_method == 'cheque'): ?> checked<?php endif; ?>/>
                <label for="input-payment-cheque" class="form-check-label"><?= $this->e($text_cheque ) ?></label>
              </div>
              <div class="form-check">
                <input type="radio" name="payment_method" value="paypal" id="input-payment-paypal" class="form-check-input"<?php if ($payment_method == 'paypal'): ?> checked<?php endif; ?>/>
                <label for="input-payment-paypal" class="form-check-label"><?= $this->e($text_paypal ) ?></label>
              </div>
              <div class="form-check">
                <input type="radio" name="payment_method" value="bank" id="input-payment-bank" class="form-check-input"<?php if ($payment_method == 'bank'): ?> checked<?php endif; ?>/>
                <label for="input-payment-bank" class="form-check-label"><?= $this->e($text_bank ) ?></label>
              </div>
              <div id="error-payment-method" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required payment" id="payment-cheque">
            <label for="input-cheque" class="col-sm-2 col-form-label"><?= $this->e($entry_cheque ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="cheque" value="<?= $this->e($cheque ) ?>" placeholder="<?= $this->e($entry_cheque ) ?>" id="input-cheque" class="form-control">
              <div id="error-cheque" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required payment" id="payment-paypal">
            <label for="input-paypal" class="col-sm-2 col-form-label"><?= $this->e($entry_paypal ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="paypal" value="<?= $this->e($paypal ) ?>" placeholder="<?= $this->e($entry_paypal ) ?>" id="input-paypal" class="form-control">
              <div id="error-paypal" class="invalid-feedback"></div>
            </div>
          </div>
          <div id="payment-bank" class="payment">
            <div class="row mb-3">
              <label for="input-bank-name" class="col-sm-2 col-form-label"><?= $this->e($entry_bank_name ) ?></label>
              <div class="col-sm-10">
                <input type="text" name="bank_name" value="<?= $this->e($bank_name ) ?>" placeholder="<?= $this->e($entry_bank_name ) ?>" id="input-bank-name" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="input-bank-branch-number" class="col-sm-2 col-form-label"><?= $this->e($entry_bank_branch_number ) ?></label>
              <div class="col-sm-10">
                <input type="text" name="bank_branch_number" value="<?= $this->e($bank_branch_number ) ?>" placeholder="<?= $this->e($entry_bank_branch_number ) ?>" id="input-bank-branch-number" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="input-bank-swift-code" class="col-sm-2 col-form-label"><?= $this->e($entry_bank_swift_code ) ?></label>
              <div class="col-sm-10">
                <input type="text" name="bank_swift_code" value="<?= $this->e($bank_swift_code ) ?>" placeholder="<?= $this->e($entry_bank_swift_code ) ?>" id="input-bank-swift-code" class="form-control">
              </div>
            </div>
            <div class="row mb-3 required row">
              <label for="input-bank-account-name" class="col-sm-2 col-form-label"><?= $this->e($entry_bank_account_name ) ?></label>
              <div class="col-sm-10">
                <input type="text" name="bank_account_name" value="<?= $this->e($bank_account_name ) ?>" placeholder="<?= $this->e($entry_bank_account_name ) ?>" id="input-bank-account-name" class="form-control">
                <div id="error-bank-account-name" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="row mb-3 required row">
              <label for="input-bank-account-number" class="col-sm-2 col-form-label"><?= $this->e($entry_bank_account_number ) ?></label>
              <div class="col-sm-10">
                <input type="text" name="bank_account_number" value="<?= $this->e($bank_account_number ) ?>" placeholder="<?= $this->e($entry_bank_account_number ) ?>" id="input-bank-account-number" class="form-control">
                <div id="error-bank-account-number" class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <?php if (isset($custom_fields)) foreach ($custom_fields as $custom_field): ?>
            <?php if ($custom_field['location'] == 'affiliate'): ?>

              <?php if ($custom_field['type'] == 'select'): ?>
                <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field">
                  <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                  <div class="col-sm-10">
                    <select name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-select">
                      <option value=""><?= $this->e($text_select ) ?></option>
                      <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                        <option value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>"<?php if ($affiliate_custom_field[$custom_field['custom_field_id']] and custom_field_value.custom_field_value_id == $affiliate_custom_field[$custom_field['custom_field_id']]): ?> selected<?php endif; ?>><?= $this->e($custom_field_value['name']) ?></option>
                      <?php endforeach; ?>
                    </select>
                    <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
                  </div>
                </div>
              <?php endif; ?>

              <?php if ($custom_field['type'] == 'radio'): ?>
                <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field">
                  <label class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                  <div class="col-sm-10">
                    <div id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                      <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                        <div class="form-check">
                          <input type="radio" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>" id="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-input"<?php if ($affiliate_custom_field[$custom_field['custom_field_id']] and custom_field_value.custom_field_value_id == $affiliate_custom_field[$custom_field['custom_field_id']]): ?> checked<?php endif; ?>/> <label for="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-label"><?= $this->e($custom_field_value['name']) ?></label>
                        </div>
                      <?php endforeach; ?>
                      
                    </div>
                    <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
                  </div>
                </div>
              <?php endif; ?>

              <?php if ($custom_field['type'] == 'checkbox'): ?>
                <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field">
                  <label class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                  <div class="col-sm-10">
                    <div id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                      <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                        <div class="form-check">

                       <input
    type="checkbox"
    name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
    value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
    id="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
    class="form-check-input"
    <?= ($affiliate_custom_field[$custom_field['custom_field_id']] && in_array($custom_field_value['custom_field_value_id'], $affiliate_custom_field[$custom_field['custom_field_id']])) ? 'checked' : '' ?>
/>
<label for="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>" class="form-check-label">
    <?= $this->e($custom_field_value['name']) ?>
</label>

                     
                        </div>
                      <?php endforeach; ?>
                    </div>
                    <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
                  </div>
                </div>
              <?php endif; ?>

              <?php if ($custom_field['type'] == 'text'): ?>
                <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field">
                  <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                  <div class="col-sm-10">
                    <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($affiliate_custom_field[$custom_field['custom_field_id']]): ?><?= $this->e($affiliate_custom_field[$custom_field['custom_field_id']] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control">
                    <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
                  </div>
                </div>
              <?php endif; ?>

              <?php if ($custom_field['type'] == 'textarea'): ?>
                <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field">
                  <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                  <div class="col-sm-10">
                    <textarea name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" rows="5" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control"><?php if ($affiliate_custom_field[$custom_field['custom_field_id']]): ?><?= $this->e($affiliate_custom_field[$custom_field['custom_field_id']] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?></textarea>
                    <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
                  </div>
                </div>
              <?php endif; ?>

              <?php if ($custom_field['type'] == 'file'): ?>
                <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field">
                  <label class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                  <div class="col-sm-10">
                    <div>
                      <button type="button" data-oc-toggle="upload" data-oc-url="<?= $this->e($upload ) ?>" data-oc-size-max="<?= $this->e($config_file_max_size ) ?>" data-oc-size-error="<?= $this->e($error_upload_size ) ?>" data-oc-target="#input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="btn btn-light"><i class="fa-solid fa-upload"></i> <?= $this->e($button_upload ) ?></button>
                      <input type="hidden" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($affiliate_custom_field[$custom_field['custom_field_id']]): ?><?= $this->e($affiliate_custom_field[$custom_field['custom_field_id']] ) ?><?php endif; ?>" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"/>
                    </div>
                    <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
                  </div>
                </div>
              <?php endif; ?>

              <?php if ($custom_field['type'] == 'date'): ?>
                <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field">
                  <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($affiliate_custom_field[$custom_field['custom_field_id']]): ?><?= $this->e($affiliate_custom_field[$custom_field['custom_field_id']] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control date"/>
                      <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
                    </div>
                    <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
                  </div>
                </div>
              <?php endif; ?>

              <?php if ($custom_field['type'] == 'time'): ?>
                <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field">
                  <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($affiliate_custom_field[$custom_field['custom_field_id']]): ?><?= $this->e($affiliate_custom_field[$custom_field['custom_field_id']] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control time"/>
                      <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
                    </div>
                    <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
                  </div>
                </div>
              <?php endif; ?>

              <?php if ($custom_field['type'] == 'datetime'): ?>
                <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field">
                  <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" value="<?php if ($affiliate_custom_field[$custom_field['custom_field_id']]): ?><?= $this->e($affiliate_custom_field[$custom_field['custom_field_id']] ) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>" placeholder="<?= $this->e($custom_field['name']) ?>" id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control datetime"/>
                      <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
                    </div>
                    <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback"></div>
                  </div>
                </div>
              <?php endif; ?>

            <?php endif; ?>
          <?php endforeach; ?>
        </fieldset>
        <div class="text-end">
          <?php if ($text_agree): ?>
          <div class="form-check form-check-inline">
            <input type="checkbox" name="agree" value="1" id="input-agree" class="form-check-input">
            <label class="form-check-label" for="input-agree"><?=  $text_agree  ?></label>
        </div>
        
          <?php endif; ?>
          <button type="submit" class="btn btn-primary"><?= $this->e($button_continue ) ?></button>
        </div>
      </form>
      <?=  $content_bottom  ?></div>
    <?=  $column_right  ?></div>
</div>
<script ><!--
$('input[name=\'payment_method\']').on('change', function() {
    $('.payment').hide();

    $('#payment-' + this.value).show();
});

$('input[name=\'payment_method\']:checked').trigger('change');
//--></script>
<?=  $footer  ?>
