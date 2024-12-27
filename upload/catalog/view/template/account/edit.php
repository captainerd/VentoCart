<?= $header ?>
<div id="account-edit" class="container">
  <?= $breadcrumb ?>
  <div class="row"><?= $column_left ?>
    <div id="content" class="col  p-3 bg-white border"><?= $content_top ?>
      <h1><?= $this->e($heading_title) ?></h1>
      <form id="form-customer" action="<?= $save ?>" method="post" data-oc-toggle="ajax">
        <fieldset>
          <legend><?= $this->e($text_your_details) ?></legend>
          <div class="row mb-3 required">
            <label for="input-firstname" class="col-sm-2 col-form-label"><?= $this->e($entry_firstname) ?> </label>
            <div class="col-sm-10">
              <input type="text" name="firstname" value="<?= $this->e($firstname) ?>"
                placeholder="<?= $this->e($entry_firstname) ?>" id="input-firstname" class="form-control">
              <div id="error-firstname" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-lastname" class="col-sm-2 col-form-label"><?= $this->e($entry_lastname) ?></label>
            <div class="col-sm-10">
              <input type="text" name="lastname" value="<?= $this->e($lastname) ?>"
                placeholder="<?= $this->e($entry_lastname) ?>" id="input-lastname" class="form-control">
              <div id="error-lastname" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-email" class="col-sm-2 col-form-label"><?= $this->e($entry_email) ?></label>
            <div class="col-sm-10">
              <input type="email" name="email" value="<?= $this->e($email) ?>"
                placeholder="<?= $this->e($entry_email) ?>" id="input-email" class="form-control">
              <div id="error-email" class="invalid-feedback"></div>
            </div>
          </div>

          <?php if ($config_telephone_display): ?>
            <div class="row mb-3<?php if ($config_telephone_required): ?> required<?php endif; ?>">
              <label for="input-telephone" class="col-sm-2 col-form-label"><?= $this->e($entry_telephone) ?></label>
              <div class="col-sm-10">
                <input type="tel" name="telephone" value="<?= $this->e($telephone) ?>"
                  placeholder="<?= $this->e($entry_telephone) ?>" id="input-telephone" class="form-control">
                <div id="error-telephone" class="invalid-feedback"></div>
              </div>
            </div>
          <?php endif; ?>

          <?php foreach ($custom_fields as $custom_field): ?>

            <?php if ($custom_field['type'] == 'select'): ?>
              <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <select name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                    id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-select">
                    <option value=""><?= $this->e($text_select) ?></option>
                    <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                      <option value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>" <?php if ($account_custom_field[custom_field . custom_field_id] and custom_field_value . custom_field_value_id == $account_custom_field[custom_field . custom_field_id]): ?>
                          selected<?php endif; ?>><?= $this->e($custom_field_value['name']) ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
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
                        <input type="radio" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                          value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                          id="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                          class="form-check-input" <?php if ($account_custom_field[custom_field . custom_field_id] and custom_field_value . custom_field_value_id == $account_custom_field[custom_field . custom_field_id]): ?>
                            checked<?php endif; ?> /> <label
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
              <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field">
                <label class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <div id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>">
                    <?php foreach ($custom_field['custom_field_value'] as $custom_field_value): ?>
                      <div class="form-check">
                        <input type="checkbox" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>][]"
                          value="<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                          id="input-custom-value-<?= $this->e($custom_field_value['custom_field_value_id']) ?>"
                          class="form-check-input" <?php

                          if ($account_custom_field[$custom_field['custom_field_id']] && in_array($custom_field_value['custom_field_value_id'], $account_custom_field[$custom_field['custom_field_id']])): ?> checked<?php endif; ?> /> <label
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
              <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                    value="<?php if ($account_custom_field[custom_field . custom_field_id]): ?><?= $this->e($account_custom_field[custom_field . custom_field_id]) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>"
                    placeholder="<?= $this->e($custom_field['name']) ?>"
                    id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="form-control">
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'textarea'): ?>
              <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <textarea name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]" rows="5"
                    placeholder="<?= $this->e($custom_field['name']) ?>"
                    id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                    class="form-control"><?php if ($account_custom_field[custom_field . custom_field_id]): ?><?= $this->e($account_custom_field[custom_field . custom_field_id]) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?></textarea>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'file'): ?>
              <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field">
                <label class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <div>
                    <button type="button" data-oc-toggle="upload" data-oc-url="<?= $this->e($upload) ?>"
                      data-oc-size-max="<?= $this->e($config_file_max_size) ?>"
                      data-oc-size-error="<?= $this->e($error_upload_size) ?>"
                      data-oc-target="#input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                      class="btn btn-light"><i class="fa-solid fa-upload"></i> <?= $this->e($button_upload) ?></button>
                    <input type="hidden" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                      value="<?php if ($account_custom_field[custom_field . custom_field_id]): ?><?= $this->e($account_custom_field[custom_field . custom_field_id]) ?><?php endif; ?>"
                      id="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" />
                  </div>
                  <div id="error-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>" class="invalid-feedback">
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($custom_field['type'] == 'date'): ?>
              <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                      value="<?php if ($account_custom_field[custom_field . custom_field_id]): ?><?= $this->e($account_custom_field[custom_field . custom_field_id]) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>"
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
              <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                      value="<?php if ($account_custom_field[custom_field . custom_field_id]): ?><?= $this->e($account_custom_field[custom_field . custom_field_id]) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>"
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
              <div class="row mb-3<?php if ($custom_field['required']): ?> required<?php endif; ?> custom-field">
                <label for="input-custom-field-<?= $this->e($custom_field['custom_field_id']) ?>"
                  class="col-sm-2 col-form-label"><?= $this->e($custom_field['name']) ?></label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" name="custom_field[<?= $this->e($custom_field['custom_field_id']) ?>]"
                      value="<?php if ($account_custom_field[custom_field . custom_field_id]): ?><?= $this->e($account_custom_field[custom_field . custom_field_id]) ?><?php else: ?><?= $this->e($custom_field['value']) ?><?php endif; ?>"
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
        </fieldset>
        <div class="row">
          <div class="col">
            <a href="<?= $back ?>" class="btn btn-light"><?= $button_back ?></a>
          </div>
          <div class="col text-end">
            <button type="submit" class="btn btn-primary"><?= $button_continue ?></button>
          </div>
        </div>
      </form>
      <?= $content_bottom ?>
    </div>
    <?= $column_right ?>
  </div>
</div>
<?= $footer ?>