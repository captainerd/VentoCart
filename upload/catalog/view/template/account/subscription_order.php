<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <td class="text-end"><?= $this->e($column_order_id) ?></td>
                <td class="text-start"><?= $this->e($column_status) ?></td>
                <td class="text-end"><?= $this->e($column_total) ?></td>
                <td class="text-start"><?= $this->e($column_date_added) ?></td>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($orders)): ?>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td class="text-end"><a href="<?= $order['view'] ?>" target="_blank"><?= $this->e($order['order_id']) ?></a></td>
                        <td class="text-start"><?= $this->e($order['status']) ?></td>
                        <td class="text-end"><?= $this->e($order['total']) ?></td>
                        <td class="text-start"><?= $this->e($order['date_added']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td class="text-center" colspan="4"><?= $text_no_results ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-sm-6 text-start"><?= $pagination ?></div>
    <div class="col-sm-6 text-end"><?= $results ?></div>
</div>
