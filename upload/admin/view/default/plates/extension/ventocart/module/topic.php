<?= $header ?><?= $column_left ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="float-end">
        <button type="submit" form="form-module" data-bs-toggle="tooltip" title="<?= $button_save ?>"
          class="btn btn-primary"><i class="fa-solid fa-save"></i></button>
        <a href="<?= $back ?>" data-bs-toggle="tooltip" title="<?= $button_back ?>" class="btn btn-light"><i
            class="fa-solid fa-reply"></i></a>
      </div>
      <h1><?= $heading_title ?></h1>
      <ol class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb): ?>
          <li class="breadcrumb-item"><a href="<?= $breadcrumb['href'] ?>"><?= $breadcrumb['text'] ?></a></li>
        <?php endforeach; ?>
      </ol>
    </div>
  </div>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header"><i class="fa-solid fa-pencil"></i> <?= $text_edit ?></div>
      <div class="card-body">
        <form id="form-module" action="<?= $save ?>" method="post" data-oc-toggle="ajax">
          <div class="row mb-3">
            <label for="input-name" class="col-sm-2 col-form-label"><?= $this->e($entry_name) ?></label>
            <div class="col-sm-10">
              <input type="text" name="name" value="<?= $this->e($name) ?>" placeholder="<?= $this->e($entry_name) ?>"
                id="input-name" class="form-control" />
              <div id="error-name" class="invalid-feedback"></div>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label"><?= $this->e($entry_status) ?></label>
            <div class="col-sm-10">
              <div class="form-check form-switch form-switch-lg">
                <input type="hidden" name="status" value="0" />
                <input type="checkbox" name="status" value="1" id="input-status" class="form-check-input" <?php if ($status): ?> checked<?php endif; ?> />
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label"><?= $this->e($entry_preview) ?></label>
            <div class="col-sm-10">
              <div class="form-check form-switch form-switch-lg">
                <input type="hidden" name="preview" value="0" />
                <input type="checkbox" name="preview" value="1" id="input-preview" class="form-check-input" <?php if ($preview): ?> checked<?php endif; ?> />
              </div>
            </div>
          </div>




          <div class="row mb-3">
            <label class="col-sm-2 col-form-label"><?= $this->e($entry_hide_date) ?></label>
            <div class="col-sm-10">
              <div class="form-check form-switch form-switch-lg">
                <input type="hidden" name="hidedate" value="0" />
                <input type="checkbox" name="hidedate" value="1" id="input-hidedate" class="form-check-input" <?php if ($hidedate): ?> checked<?php endif; ?> />
              </div>
            </div>
          </div>


          <input type="hidden" name="module_id" value="<?= $this->e($module_id) ?>" id="input-module-id" />

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label"><?= $this->e($entry_preview_word_count) ?></label>
            <div class="col-sm-10">
              <input type="text" name="preview_word_count" value="<?= $this->e($preview_word_count) ?>"
                class="form-control" />
            </div>
          </div>
          <div class="row mb-3">
            <label for="input-interval" class="col-sm-2 col-form-label"><?= $entry_interval ?></label>
            <div class="col-sm-10">
              <input type="text" name="interval" value="<?= $interval ?>" placeholder="<?= $entry_interval ?>"
                id="input-interval" class="form-control" />
              <div id="error-interval" class="invalid-feedback"></div>
            </div>
          </div>

          <div class="row mb-3">
            <label for="input-autoplay" class="col-sm-2 col-form-label"><?= $entry_autoplay ?></label>
            <div class="col-sm-10">
              <div class="form-check form-switch  form-switch-lg">
                <input type="hidden" name="autoplay" value="0">
                <input type="checkbox" name="autoplay" id="input-autoplay" class="form-check-input" value="1"
                  <?= $autoplay ? 'checked' : '' ?>>

              </div>
              <div id="error-autoplay" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label"><?= $this->e($entry_limit_topics) ?></label>
            <div class="col-sm-10">
              <input type="text" name="limit_topics" value="<?= $this->e($limit_topics) ?>" class="form-control" />
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

</div>
<?= $footer ?>