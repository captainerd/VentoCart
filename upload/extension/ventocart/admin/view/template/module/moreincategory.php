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
                        <label for="input-name" class="col-sm-2 col-form-label"><?= $entry_name ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="<?= $name ?>" placeholder="<?= $entry_name ?>"
                                id="input-name" class="form-control" />
                            <div id="error-name" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input-axis" class="col-sm-2 col-form-label"><?= $entry_axis ?></label>
                        <div class="col-sm-10">
                            <select name="axis" id="input-axis" class="form-select">
                                <option value="horizontal" <?php if ($axis == 'horizontal')
                                    echo ' selected'; ?>>
                                    <?= $text_horizontal ?>
                                </option>
                                <option value="vertical" <?php if ($axis == 'vertical')
                                    echo ' selected'; ?>>
                                    <?= $text_vertical ?>
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input-limit" class="col-sm-2 col-form-label"><?= $entry_limit ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="limit" value="<?= $limit ?>" placeholder="<?= $entry_limit ?>"
                                id="input-limit" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input-width" class="col-sm-2 col-form-label"><?= $entry_width ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="width" value="<?= $width ?>" placeholder="<?= $entry_width ?>"
                                id="input-width" class="form-control" />
                            <div id="error-width" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input-height" class="col-sm-2 col-form-label"><?= $entry_height ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="height" value="<?= $height ?>" placeholder="<?= $entry_height ?>"
                                id="input-height" class="form-control" />
                            <div id="error-height" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"><?= $entry_autoplay ?></label>
                        <div class="col-sm-10">
                            <div class="form-check form-switch form-switch-lg">
                                <input type="hidden" name="autoplay" value="0" />
                                <input type="checkbox" name="autoplay" value="1" id="input-autoplay"
                                    class="form-check-input" <?php if ($autoplay)
                                        echo ' checked'; ?> />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"><?= $entry_status ?></label>
                        <div class="col-sm-10">
                            <div class="form-check form-switch form-switch-lg">
                                <input type="hidden" name="status" value="0" />
                                <input type="checkbox" name="status" value="1" id="input-status"
                                    class="form-check-input" <?php if ($status)
                                        echo ' checked'; ?> />
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="module_id" value="<?= $module_id ?>" id="input-module-id" />
                </form>
            </div>
        </div>
    </div>
</div>
<?= $footer ?>