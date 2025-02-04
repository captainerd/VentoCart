<?= $header ?>
<div id="account-reset" class="container">
  <?= $breadcrumb ?>
  <div class="row"><?= $column_left ?>
    <div id="content" class="col  p-3 bg-white border"><?= $content_top ?>
      <h1><?= $heading_title ?></h1>
      <form id="form-reset" action="<?= $save ?>" method="post" data-oc-toggle="ajax">
        <fieldset>
          <legend><?= $text_password ?></legend>
          <div class="row mb-3">
            <label for="input-password" class="col-sm-2 col-form-label"><?= $entry_password ?></label>
            <div class="col-sm-10">
              <input type="password" name="password" value="" id="input-password" class="form-control">
              <div id="error-password" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3">
            <label for="input-confirm" class="col-sm-2 col-form-label"><?= $entry_confirm ?></label>
            <div class="col-sm-10">
              <input type="password" name="confirm" value="" id="input-confirm" class="form-control">
              <div id="error-confirm" class="invalid-feedback"></div>
            </div>
          </div>
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