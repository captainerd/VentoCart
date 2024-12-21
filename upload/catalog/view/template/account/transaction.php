<?=  $header    ?>
<div id="account-transaction" class="container">
<?=  $breadcrumb  ?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <p><?= $this->e($text_total ) ?> <b><?= $this->e($total ) ?></b>.</p>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-start"><?= $this->e($column_date_added ) ?></td>
            <td class="text-start"><?= $this->e($column_description ) ?></td>
            <td class="text-end"><?= $this->e($column_amount ) ?></td>
          </tr>
        </thead>
        <tbody>
          <?php if ($transactions): ?>
            <?php foreach ($transactions as $transaction): ?>
              <tr>
                <td class="text-start"><?= $this->e($transaction['date_added']) ?></td>
                <td class="text-start"><?= $this->e($transaction['description']) ?></td>
                <td class="text-end"><?= $this->e($transaction['amount']) ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td class="text-center" colspan="5"><?= $this->e($text_no_results ) ?></td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
      <div class="row mb-3">
        <div class="col-sm-6 text-start"><?= $this->e($pagination ) ?></div>
        <div class="col-sm-6 text-end"><?= $this->e($results ) ?></div>
      </div>
      <div class="text-end"><a href="<?= $continue  ?>" class="btn btn-primary"><?= $this->e($button_continue ) ?></a></div>
      <?=  $content_bottom  ?></div>
    <?=  $column_right  ?></div>
</div>
<?=  $footer  ?>
