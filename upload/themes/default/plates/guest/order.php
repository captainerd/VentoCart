<?= $header ?>
<div id="new-controller-area" class="container">
    <?= $breadcrumb ?>
    <div class="row">
        <?= $column_left ?>
        <div id="content" class="col">
            <?= $content_top ?>
            <!-- Main content for the new controller starts here -->

            <?php if (isset($not_found) && $not_found): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> <?= $text_no_results ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="card shadow-sm">
                <div class="card-body">
                    <h1><?= $heading_title ?></h1>
                    <p><?= $text_description ?></p>

                    <!-- Form starts here -->
                    <form action="?route=guest/order.get" method="post" class="mt-4 ">
                        <div class="form-group">
                            <label for="order-id"><?= $entry_order_id ?? 'Enter Order ID' ?></label>
                            <input type="text" class="form-control" id="order-id" name="order_id" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">
                            <?= $button_track ?? 'Track Order' ?>
                        </button>
                    </form>
                    <!-- Form ends here -->
                </div>
            </div>
            <!-- Main content for the new controller ends here -->
            <?= $content_bottom ?>
        </div>
        <?= $column_right ?>
    </div>
</div>
<?= $footer ?>