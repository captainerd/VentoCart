<?php $header ?>
<div id="account-reset" class="container">
<?php $breadcrumb?>
  <div class="row"><?php $column_left ?>
    <div id="content" class="col"><?php $content_top ?>
      <h1><?php $heading_title ?></h1>
      <form id="form-reset" action="<?php $save ?>" method="post" data-oc-toggle="ajax">
        <fieldset>
          <legend><?php $text_password ?></legend>
          <div class="row mb-3">
            <label for="input-password" class="col-sm-2 col-form-label"><?php $entry_password ?></label>
            <div class="col-sm-10">
              <input type="password" name="password" value="" id="input-password" class="form-control"/>
              <div id="error-password" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3">
            <label for="input-confirm" class="col-sm-2 col-form-label"><?php $entry_confirm ?></label>
            <div class="col-sm-10">
              <input type="password" name="confirm" value="" id="input-confirm" class="form-control"/>
              <div id="error-confirm" class="invalid-feedback"></div>
            </div>
          </div>
        </fieldset>
        <div class="row">
          <div class="col">
            <a href="<?php $back ?>" class="btn btn-light"><?php $button_back ?></a>
          </div>
          <div class="col text-end">
            <button type="submit" class="btn btn-primary"><?php $button_continue ?></button>
          </div>
        </div>
      </form>
      <?php $content_bottom ?></div>
    <?php $column_right ?></div>
</div>
<?php $footer ?>
