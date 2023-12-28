<?=  $header    ?>
<div id="account-reward" class="container">
aaa<?=  $breadcrumb  ?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <p><?= $this->e($text_total ) ?> <b><?= $this->e($total ) ?></b>.</p>
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="text-start"><?= $this->e($column_date_added ) ?></th>
              <th class="text-start"><?= $this->e($column_description ) ?></th>
              <th class="text-end"><?= $this->e($column_points ) ?></th>
            </tr>
          </thead>
          <tbody>
            <?php if ($rewards): ?>
              <?php foreach ($rewards as $reward): ?>
                <tr>
                  <td class="text-start"><?= $this->e($reward['date_added']) ?></td>
                  <td class="text-start"><?php if (isset($reward['order_id'])): ?> <a href="<?= $reward['href'] ?>"><?= $this->e($reward['description']) ?></a> <?php else: ?>
                      <?= $this->e($reward['description']) ?>
                    <?php endif; ?></td>
                  <td class="text-end"><?= $this->e($reward['points']) ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td class="text-center" colspan="3"><?= $this->e($text_no_results ) ?></td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      <div class="row mb-3">
        <div class="col-sm-6 text-start"><?= $this->e($pagination ) ?></div>
        <div class="col-sm-6 text-end"><?= $this->e($results ) ?></div>
      </div>
      <div class="text-end"><a href="<?= $continue   ?>" class="btn btn-primary"><?= $this->e($button_continue ) ?></a></div>
      <?=  $content_bottom  ?></div>
    <?=  $column_right  ?></div>
</div>
<?=  $footer  ?>
