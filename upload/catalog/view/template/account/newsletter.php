<?=  $header    ?>
<div id="account-newsletter" class="container">
<?=  $breadcrumb  ?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <form id="form-newsletter" action="<? $save  ?>" method="post" data-oc-toggle="ajax">
        <fieldset>
          <div class="row mb-3 mb-0">
            <label class="col-md-3 col-form-label"><?= $this->e($entry_newsletter ) ?></label>
            <div class="col-md-9">
              <div class="form-check form-switch form-switch-lg">
                <input type="hidden" name="newsletter" value="0"/>
                <input type="checkbox" name="newsletter" value="1" id="input-newsletter" class="form-check-input"<?php if ($newsletter): ?> checked<?php endif; ?>/>
              </div>
            </div>
          </div>
        </fieldset>
        <div class="row">
          <div class="col">
            <a href="<?=  $back   ?>" class="btn btn-light"><?= $this->e($button_back ) ?></a>
          </div>
          <div class="col text-end">
            <button type="submit" class="btn btn-primary"><?= $this->e($button_continue ) ?></button>
          </div>
        </div>
      </form>
      <?=  $content_bottom  ?>
    </div>
    <?=  $column_right  ?></div>
</div>
<?=  $footer  ?>
