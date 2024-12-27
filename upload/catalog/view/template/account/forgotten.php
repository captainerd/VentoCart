<?= $header ?>
<div id="account-forgotten" class="container">
  <?= $breadcrumb ?>
  <div class="row"><?= $column_left ?>
    <div id="content" class="col  p-3 bg-white border"><?= $content_top ?>
      <h1><?= $this->e($heading_title) ?></h1>
      <p><?= $this->e($text_email) ?></p>
      <form id="form-forgotten" action="<?= $confirm ?>" method="post" data-oc-toggle="ajax">
        <fieldset>
          <legend><?= $this->e($text_your_email) ?></legend>
          <div class="row mb-3 required">
            <label for="input-email" class="col-sm-2 col-form-label"><?= $this->e($entry_email) ?></label>
            <div class="col-sm-10">
              <input type="text" name="email" value="" placeholder="<?= $this->e($entry_email) ?>" id="input-email"
                class="form-control">
              <div id="error-email" class="invalid-feedback"></div>
            </div>
          </div>
        </fieldset>
        <div class="row">
          <div class="col">
            <a href="<?= $back ?>" class="btn btn-light"><?= $this->e($button_back) ?></a>
          </div>
          <div class="col text-end">
            <button type="submit" class="btn btn-primary"><?= $this->e($button_continue) ?></button>
          </div>
        </div>
      </form>
      <?= $content_bottom ?>
    </div>
    <?= $column_right ?>
  </div>
</div>
<?= $footer ?>