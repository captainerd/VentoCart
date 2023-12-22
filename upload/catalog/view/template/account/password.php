<?=  $header    ?>
<div id="account-password" class="container">
<?=  $breadcrumb?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <form id="form-password" action="<?= $save ?>" method="post" data-oc-toggle="ajax">
        <fieldset>
          <legend><?= $this->e($text_password ) ?></legend>
          <div class="row mb-3 required">
            <label for="input-password" class="col-md-3 col-form-label"><?= $this->e($entry_password ) ?></label>
            <div class="col-md-9">
              <input type="password" name="password" value="<?=  isset($password) ? $password : ''  ?>" placeholder="<?= $this->e($entry_password ) ?>" id="input-password" class="form-control" autocomplete="new-password"/>
              <div id="error-password" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-confirm" class="col-md-3 col-form-label"><?= $this->e($entry_confirm ) ?></label>
            <div class="col-md-9">
              <input type="password" name="confirm" value="<?=  isset($confirm) ? $confirm : '' ?>" placeholder="<?= $this->e($entry_confirm ) ?>" id="input-confirm" class="form-control"/>
              <div id="error-confirm" class="invalid-feedback"></div>
            </div>
          </div>
        </fieldset>
        <div class="row">
          <div class="col">
            <a href="<?=   $back   ?>" class="btn btn-light"><?=  $button_back   ?></a>
          </div>
          <div class="col text-end">
            <button type="submit" class="btn btn-primary"><?=  $button_continue   ?></button>
          </div>
        </div>
      </form>
      <?=  $content_bottom  ?></div>
    <?=  $column_right  ?></div>
</div>
<?=  $footer  ?>
