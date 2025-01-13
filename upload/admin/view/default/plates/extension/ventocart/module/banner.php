<?=  $header    ?><?=  $column_left  ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="float-end">
        <button type="submit" form="form-module" data-bs-toggle="tooltip" title="<?= $this->e($button_save ) ?>" class="btn btn-primary"><i class="fa-solid fa-save"></i></button>
        <a href="<?= $this->e($back ) ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_back ) ?>" class="btn btn-light"><i class="fa-solid fa-reply"></i></a></div>
      <h1><?= $this->e($heading_title ) ?></h1>
      <ol class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb): ?>
          <li class="breadcrumb-item"><a href="<?= $this->e($breadcrumb['href']) ?>"><?= $this->e($breadcrumb['text']) ?></a></li>
        <?php endforeach; ?>
      </ol>
    </div>
  </div>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header"><i class="fa-solid fa-pencil"></i> <?= $this->e($text_edit ) ?></div>
      <div class="card-body">
        <form id="form-module" action="<?= $this->e($save ) ?>" method="post" data-oc-toggle="ajax">
          <div class="row mb-3 required">
            <label for="input-name" class="col-sm-2 col-form-label"><?= $this->e($entry_name ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="name" value="<?= $this->e($name ) ?>" placeholder="<?= $this->e($entry_name ) ?>" id="input-name" class="form-control"/>
              <div id="error-name" class="invalid-feedback"></div>
            </div>
          </div>
          
          <div class="row mb-3">
            <label for="input-banner" class="col-sm-2 col-form-label"><?= $this->e($entry_banner ) ?></label>
            <div class="col-sm-10">
              <select name="banner_id" id="input-banner" class="form-select">
                <?php foreach ($banners as $banner): ?>
                  <option value="<?= $this->e($banner['banner_id']) ?>"<?php if ($banner['banner_id'] == $banner_id): ?> selected<?php endif; ?>><?= $this->e($banner['name']) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="input-effect" class="col-sm-2 col-form-label"><?= $this->e($entry_effect ) ?></label>
            <div class="col-sm-10">
              <select name="effect" id="input-effect" class="form-select">
                <option value="slide"<?php if ($effect == 'slide'): ?> selected<?php endif; ?>><?= $this->e($text_slide ) ?></option>
                <option value="fade"<?php if ($effect == 'fade'): ?> selected<?php endif; ?>><?= $this->e($text_fade ) ?></option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="input-items" class="col-sm-2 col-form-label"><?= $this->e($entry_items ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="items" value="<?= $this->e($items ) ?>" placeholder="<?= $this->e($entry_items ) ?>" id="input-items" class="form-control"/>
              <div class="form-text text-muted"><?= $this->e($help_items ) ?></div>
            </div>
          </div>
          <div class="row mb-3">
            <label for="input-controls" class="col-sm-2 col-form-label"><?= $this->e($entry_controls ) ?></label>
            <div class="col-sm-10">
              <select name="controls" id="input-controls" class="form-select">
                <option value="1"<?php if ($controls == 1): ?> selected<?php endif; ?>><?= $this->e($text_yes ) ?></option>
                <option value="0"<?php if ($controls == 0): ?> selected<?php endif; ?>><?= $this->e($text_no ) ?></option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="input-indicators" class="col-sm-2 col-form-label"><?= $this->e($entry_indicators ) ?></label>
            <div class="col-sm-10">
              <select name="indicators" id="input-indicators" class="form-select">
                <option value="1"<?php if ($indicators == 1): ?> selected<?php endif; ?>><?= $this->e($text_yes ) ?></option>
                <option value="0"<?php if ($indicators == 0): ?> selected<?php endif; ?>><?= $this->e($text_no ) ?></option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="input-interval" class="col-sm-2 col-form-label"><?= $this->e($entry_interval ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="interval" value="<?= $this->e($interval ) ?>" placeholder="<?= $this->e($entry_interval ) ?>" id="input-interval" class="form-control"/>
              <div id="error-interval" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-width" class="col-sm-2 col-form-label"><?= $this->e($entry_width ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="width" value="<?= $this->e($width ) ?>" placeholder="<?= $this->e($entry_width ) ?>" id="input-width" class="form-control"/>
              <div id="error-width" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-height" class="col-sm-2 col-form-label"><?= $this->e($entry_height ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="height" value="<?= $this->e($height ) ?>" placeholder="<?= $this->e($entry_height ) ?>" id="input-height" class="form-control"/>
              <div id="error-height" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label"><?= $this->e($entry_status ) ?></label>
            <div class="col-sm-10">
              <div class="form-check form-switch form-switch-lg">
                <input type="hidden" name="status" value="0"/>
                <input type="checkbox" name="status" value="1" id="input-status" class="form-check-input"<?php if ($status): ?> checked<?php endif; ?>/>
              </div>
            </div>
          </div>
          <input type="hidden" name="module_id" value="<?= $this->e($module_id ) ?>" id="input-module-id"/>
        </form>
      </div>
    </div>
  </div>
</div>
<?=  $footer  ?>

