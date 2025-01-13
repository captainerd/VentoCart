<?= $header ?>
<div id="account-download" class="container">
    <?= $breadcrumb ?>
    <div class="row"><?= $column_left ?>
        <div id="content" class="col  p-3 bg-white border"><?= $content_top ?>
            <h1><?= $this->e($heading_title) ?></h1>
            <?php if ($downloads): ?>


                <div class="container">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                        <?php foreach ($downloads as $download): ?>
                            <div class="col">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <strong><?= $this->e($column_order_id) ?>:
                                            <?= $this->e($download['order_id']) ?></strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6 border-bottom"><b><?= $this->e($column_name) ?></b></div>
                                            <div class="col-6 border-bottom"><?= $this->e($download['name']) ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 border-bottom"><b><?= $this->e($column_size) ?></b></div>
                                            <div class="col-6 border-bottom"><?= $this->e($download['size']) ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 border-bottom"><b><?= $this->e($column_date_added) ?></b></div>
                                            <div class="col-6 border-bottom"><?= $this->e($download['date_added']) ?></div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="<?= $download['href'] ?>" data-bs-toggle="tooltip"
                                            title="<?= $this->e($button_download) ?>" class="btn btn-primary">
                                            <i class="fas fa-cloud-arrow-down"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>



                <div class="row mb-3">
                    <div class="col-sm-6 text-start"><?= $pagination ?></div>
                    <div class="col-sm-6 text-end"><?= $results ?></div>
                </div>
            <?php else: ?>
                <p><?= $this->e($text_no_results) ?></p>
            <?php endif; ?>
            <div class="text-end">
                <a href="<?= $continue ?>" class="btn btn-primary"><?= $this->e($button_continue) ?></a>
            </div>
            <?= $content_bottom ?>
        </div>
        <?= $column_right ?>
    </div>
</div>
<?= $footer ?>