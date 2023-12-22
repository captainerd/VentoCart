<?=  $header    ?>
<div id="account-voucher" class="container">
<?=  $breadcrumb  ?>
  <?php if (isset($error_warning)): ?>
    <div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> <?= $this->e($error_warning ) ?></div>
  <?php endif; ?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <p><?= $this->e($text_description ) ?></p>
      <form id="form-voucher" action="<?= $this->e($save ) ?>" method="post" data-oc-toggle="ajax">
        <div class="row mb-3 required">
          <label for="input-to-name" class="col-sm-2 col-form-label"><?= $this->e($entry_to_name ) ?></label>
          <div class="col-sm-10">
            <input type="text" name="to_name" value="<?= isset($to_name) ? $this->e($to_name ) : '' ?>" placeholder="<?= $this->e($entry_to_name ) ?>" id="input-to-name" class="form-control"/>
            <div id="error-to-name" class="invalid-feedback"></div>
          </div>
        </div>
        <div class="row mb-3 required">
          <label for="input-to-email" class="col-sm-2 col-form-label"><?= $this->e($entry_to_email ) ?></label>
          <div class="col-sm-10">
            <input type="text" name="to_email" value="<?= isset($to_email) ?   $this->e($to_email)  : ''   ?>" placeholder="<?= $this->e($entry_to_email ) ?>" id="input-to-email" class="form-control"/>
            <div id="error-to-email" class="invalid-feedback"></div>
          </div>
        </div>
        <div class="row mb-3 required">
          <label for="input-from-name" class="col-sm-2 col-form-label"><?= $this->e($entry_from_name ) ?></label>
          <div class="col-sm-10">
            <input type="text" name="from_name" value="<?= $this->e($from_name ) ?>" placeholder="<?= $this->e($entry_from_name ) ?>" id="input-from-name" class="form-control"/>
            <div id="error-from-name" class="invalid-feedback"></div>
          </div>
        </div>
        <div class="row mb-3 required">
          <label for="input-from-email" class="col-sm-2 col-form-label"><?= $this->e($entry_from_email ) ?></label>
          <div class="col-sm-10">
            <input type="text" name="from_email" value="<?= $this->e($from_email ) ?>" placeholder="<?= $this->e($entry_from_email ) ?>" id="input-from-email" class="form-control"/>
            <div id="error-from-email" class="invalid-feedback"></div>
          </div>
        </div>
        <div class="row mb-3 required">
          <label class="col-sm-2 col-form-label"><?= $this->e($entry_theme ) ?></label>
          <div class="col-sm-10">
            <div id="input-theme">
              <?php foreach ($voucher_themes as $voucher_theme): ?>
                <div class="form-check">
                <?php
if (isset($voucher_theme['voucher_theme_id'], $voucher_theme['name'])):
    $inputId = $this->e($voucher_theme['voucher_theme_id']);
?>
    <input type="radio" name="voucher_theme_id" 
           value="<?= $this->e($inputId ) ?>" 
           id="input-theme-<?= $inputId ?>" class="form-check-input"<?php if (isset($voucher_theme_id) && $inputId == $voucher_theme_id): ?> checked<?php endif; ?>/> 
    <label for="input-theme-<?= $inputId ?>" class="form-check-label"><?= $this->e($voucher_theme['name']) ?></label>
<?php else: ?>
    <!-- Handle the case when $voucher_theme_id is not set -->
    <input type="radio" name="voucher_theme_id" value="0" id="input-theme-0" class="form-check-input" checked/>
    <label for="input-theme-0" class="form-check-label">Default Theme</label>
<?php endif; ?>
                  </div>
              <?php endforeach; ?>
            </div>
            <div id="error-theme" class="invalid-feedback"></div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="input-message" class="col-sm-2 col-form-label"><span data-bs-toggle="tooltip" title="<?= $this->e($help_message ) ?>" class="col-sm-2 col-form-label"><?= $this->e($entry_message ) ?></span></label>
          <div class="col-sm-10">
            <textarea name="message" cols="40" rows="5" placeholder="<?= $this->e($entry_message ) ?>" id="input-message" class="form-control"><?= isset($message ) ? $this->e($message ) : ''?></textarea>
          </div>
        </div>
        <div class="row mb-3 required">
          <label for="input-amount" class="col-sm-2 col-form-label"><span data-bs-toggle="tooltip" title="<?= $this->e($help_amount ) ?>"><?= $this->e($entry_amount ) ?></span></label>
          <div class="col-sm-10">
            <input type="text" name="amount" value="<?= $this->e($amount ) ?>" placeholder="<?= $this->e($entry_amount ) ?>" id="input-amount" class="form-control" size="5"/>
            <div id="error-amount" class="invalid-feedback"></div>
          </div>
        </div>

        <div class="text-end">
    <div class="form-check form-switch form-switch-lg form-check-reverse form-check-inline">
        <input type="hidden" name="agree" value="0"/>
        <input type="checkbox" name="agree" value="1" class="form-check-input"/>
        <label class="form-check-label"><?= $this->e($text_agree) ?></label>
    </div>
    <button type="submit" class="btn btn-primary"><?= $this->e($button_continue) ?></button>
</div>

      </form>
      <?=  $content_bottom  ?></div>
    <?=  $column_right  ?></div>
</div>
<?=  $footer  ?>
