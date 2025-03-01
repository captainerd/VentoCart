<?= $header ?>
<div id="new-controller-area" class="container">
    <?= $breadcrumb ?>
    <div class="row">
        <?= $column_left ?>
        <div id="content" class="col">
            <?= $content_top ?>
            <!-- Main content for the newsletter subscription/unsubscription starts here -->

            <?php if ($var): ?>
                <div class="alert alert-<?= $alert_style ?> alert-dismissible fade show" role="alert">
                    <strong><?= $text_success ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="card shadow-sm">
                <div class="card-body">
                    <h1><?= $heading_title ?></h1>
                    <p><?= $text_description ?></p>

                    <!-- Combined subscription/unsubscription form -->
                    <form action="/index.php" method="get" class="mt-4">
                        <input type="hidden" name="route" value="guest/newsletter">
                        <div class="form-group">
                            <label for="email"><?= $entry_email ?></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group mt-3">
                            <label><?= $entry_action ?></label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" checked type="radio" name="action" id="subscribe"
                                        value="subscribe" required>
                                    <label class="form-check-label" for="subscribe">
                                        <?= $button_subscribe ?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="action" id="unsubscribe"
                                        value="unsubscribe" required>
                                    <label class="form-check-label" for="unsubscribe">
                                        <?= $button_unsubscribe ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">
                            <?= $button_submit ?>
                        </button>
                    </form>
                </div>
            </div>
            <?= $content_bottom ?>
        </div>
        <?= $column_right ?>
    </div>
</div>
<?= $footer ?>