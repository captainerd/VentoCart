<?=  $header    ?>
<div id="account-return" class="container">
<?=  $breadcrumb  ?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-start" colspan="2"><?= $this->e($text_return_detail ) ?></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-start" style="width: 50%;"><b><?= $this->e($text_return_id ) ?></b> #<?= $this->e($return_id ) ?>
              <br/>
              <b><?= $this->e($text_date_added ) ?></b> <?= $this->e($date_added ) ?></td>
            <td class="text-start" style="width: 50%;"><b><?= $this->e($text_orders_id ) ?></b> #<?= $this->e($order_id ) ?>
              <br/>
              <b><?= $this->e($text_date_ordered ) ?></b> <?= $this->e($date_ordered ) ?></td>
          </tr>
        </tbody>
      </table>
      <h3><?= $this->e($text_product ) ?></h3>
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <td class="text-start" style="width: 33.3%;"><?= $this->e($column_product ) ?></td>
              <td class="text-start" style="width: 33.3%;"><?= $this->e($column_model ) ?></td>
              <td class="text-end" style="width: 33.3%;"><?= $this->e($column_quantity ) ?></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-start"><?= $this->e($product ) ?></td>
              <td class="text-start"><?= $this->e($model ) ?></td>
              <td class="text-end"><?= $this->e($quantity ) ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <h3><?= $this->e($text_reason ) ?></h3>
      <div class="table-responsive">
        <table class="list table table-bordered table-hover">
          <thead>
            <tr>
              <td class="text-start" style="width: 33.3%;"><?= $this->e($column_reason ) ?></td>
              <td class="text-start" style="width: 33.3%;"><?= $this->e($column_opened ) ?></td>
              <td class="text-start" style="width: 33.3%;"><?= $this->e($column_action ) ?></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-start"><?= $this->e($reason ) ?></td>
              <td class="text-start"><?= $this->e($opened ) ?></td>
              <td class="text-start"><?= $this->e($action ) ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <?php if ($comment): ?>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <td class="text-start"><?= $this->e($text_comment ) ?></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-start"><?= $this->e($comment ) ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
      <h3><?= $this->e($text_history ) ?></h3>
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <td class="text-start" style="width: 33.3%;"><?= $this->e($column_date_added ) ?></td>
              <td class="text-start" style="width: 33.3%;"><?= $this->e($column_status ) ?></td>
              <td class="text-start" style="width: 33.3%;"><?= $this->e($column_comment ) ?></td>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($histories)): ?>
              <?php foreach ($histories as $history): ?>
                <tr>
                  <td class="text-start"><?= $this->e($history['date_added']) ?></td>
                  <td class="text-start"><?= $this->e($history['status']) ?></td>
                  <td class="text-start"><?= $this->e($history['comment']) ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="3" class="text-center"><?= $this->e($text_no_results ) ?></td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      <div class="text-end"><a href="<?=  $continue   ?>" class="btn btn-primary"><?= $this->e($button_continue ) ?></a></div>
      <?=  $content_bottom  ?></div>
    <?=  $column_right  ?></div>
</div>
<?=  $footer  ?>
