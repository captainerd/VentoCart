<?= $header ?>
<div id="account-order" class="container">
    <?= $breadcrumb ?>
    <div class="row">
        <?= $column_left ?>
        <div id="content" class="col">
            <?= $content_top ?>
            <h1 class="mb-4"><?= $this->e($heading_title) ?></h1>
            <div class="row  m-4 mb-4">
                <!-- Order Details Table -->
                <table class="table   shadow-sm table-sm">
                    <tbody>
                        <?php if ($invoice_no): ?>
                            <tr>
                                <th style="width: 265px;" class="text-start custom-th"><?= $this->e($text_invoice_no) ?>
                                </th>
                                <td class="custom-td"><?= $this->e($invoice_no) ?></td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <th style="width: 265px;" class="text-start custom-th"><?= $this->e($text_order_id) ?></th>
                            <td class="custom-td">#<?= $this->e($order_id) ?></td>
                        </tr>
                        <tr>
                            <th class="text-start custom-th"><?= $this->e($text_order_status) ?></th>
                            <td class="custom-td"><strong><?= $this->e($order_status) ?></strong></td>
                        </tr>
                        <?php if ($shipping_method): ?>
                            <tr>
                                <th class="text-start custom-th"><?= $this->e($text_shipping_method) ?></th>
                                <td class="custom-td"><?= $this->e($shipping_method) ?></td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <th class="text-start custom-th"><?= $this->e($text_payment_method) ?></th>
                            <td class="custom-td"><?= $this->e($payment_method) ?></td>
                        </tr>
                        <tr>
                            <th class="text-start custom-th"><?= $this->e($text_date_added) ?></th>
                            <td class="custom-td"><?= $this->e($date_added) ?></td>
                        </tr>
                    </tbody>
                </table>

            </div>

            <!-- Address Details Table -->
            <?php if (isset($payment_address) || isset($shipping_address)): ?>
                <div class="row shadow-sm  mb-4">
                    <div class="col-12">

                        <div class="row">
                            <!-- Payment Address Column -->
                            <?php if (isset($payment_address)): ?>
                                <div class="col-12 col-md-6 mb-3">
                                    <h4 class="mb-2"><?= $this->e($text_payment_address) ?></h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm">
                                            <tbody>
                                                <tr>
                                                    <td><?= $payment_address ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Shipping Address Column -->
                            <?php if (isset($shipping_address)): ?>
                                <div class="col-12 col-md-6 mb-3">
                                    <h4 class="mb-2"><?= $this->e($text_shipping_address) ?></h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm">
                                            <tbody>
                                                <tr>
                                                    <td><?= $shipping_address ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Order History -->
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="mb-3"><?= $this->e($text_history) ?></h2>
                    <div id="history"><?= $history ?></div>

                </div>
            </div>

            <!-- Comment Section -->
            <?php if ($comment): ?>
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5><?= $this->e($text_comment) ?></h5>
                                <p><?= $comment ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Product Details -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                <?php foreach ($products as $product): ?>
                    <div class="col mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <h5 class="mb-2"><?= $this->e($column_name) ?>: <?= $this->e($product['name']) ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <strong><?= $this->e($column_sku) ?>:</strong> <?= $this->e($product['sku']) ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong><?= $this->e($column_quantity) ?>:</strong>
                                        <?= $this->e($product['quantity']) ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <strong><?= $this->e($column_price) ?>:</strong> <?= $this->e($product['price']) ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong><?= $this->e($column_total) ?>:</strong> <?= $this->e($product['total']) ?>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-auto">
                                        <?php if (isset($product['reorder'])): ?>
                                            <a href="<?= $product['reorder'] ?>" data-bs-toggle="tooltip"
                                                title="<?= $this->e($button_reorder) ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-cart-shopping"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-auto">
                                        <a href="<?= $product['return'] ?>" data-bs-toggle="tooltip"
                                            title="<?= $this->e($button_return) ?>" class="btn btn-danger btn-sm">
                                            <i class="fas fa-reply"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
            <div class="text-end mt-3">
                <a href="<?= $continue ?>" class="btn btn-primary"><?= $this->e($button_continue) ?></a>
            </div>
            <?= $content_bottom ?>
        </div>
        <?= $column_right ?>
    </div>
</div>

<script>
    $('#history').on('click', '.pagination a', function (e) {
        e.preventDefault();
        $('#history').load(this.href);
    });
</script>

<?= $footer ?>