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
                        <label class="col-sm-2 col-form-label"><?= $entry_status ?></label>
                        <div class="col-sm-10">
                            <div class="form-check form-switch form-switch-lg">
                                <input type="hidden" name="module_newsletter_status" value="0" />
                                <input type="checkbox" name="module_newsletter_status" value="1" id="input-status"
                                    class="form-check-input" <?php if ($module_newsletter_status)
                                        echo ' checked'; ?> />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $footer ?>