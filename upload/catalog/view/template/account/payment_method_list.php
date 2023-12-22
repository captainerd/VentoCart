<?php if (isset($payment_methods)): ?>
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th class="text-start"><?= $this->e($column_payment_method ) ?></th>
          <th></th>
          <th class="text-start"><?= $this->e($column_type ) ?></th>
          <th class="text-start"><?= $this->e($column_date_expire ) ?></th>
          <th class="text-end"><?= $this->e($column_action ) ?></th>
        </tr>
      </thead>
      <tbody>
      <tbody>
        <?php foreach ($payment_methods as $payment_method): ?>
          <tr>
            <td class="text-start"><?= $this->e($payment_method['name']) ?></td>
            <td class="text-start"><?= $this->e($payment_method['image']) ?></td>
            <td class="text-start"><?= $this->e($payment_method['type']) ?></td>
            <td class="text-start"><?= $this->e($payment_method['date_expire']) ?></td>
            <td class="text-end"><a href="<?=  $payment_method['delete']  ?>" class="btn btn-danger"><?= $this->e($button_delete ) ?></a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <p><?=  $text_no_results  ?></p>
<?php endif; ?>