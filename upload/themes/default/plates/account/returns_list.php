<?= $header ?>
<div id="account-return" class="container">
  <?= $breadcrumb ?>
  <div class="row"><?= $column_left ?>
    <div id="content" class="col  p-3 bg-white border"><?= $content_top ?>
      <h1><?= $this->e($heading_title) ?></h1>
      <?php if ($returns): ?>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <td class="text-end"><?= $this->e($column_return_id) ?></td>
                <td class="text-start"><?= $this->e($column_status) ?></td>
                <td class="text-start"><?= $this->e($column_date_added) ?></td>
                <td class="text-end"><?= $this->e($column_order_id) ?></td>
                <td class="text-start"><?= $this->e($column_customer) ?></td>
                <td></td>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($returns as $return): ?>
                <tr>
                  <td class="text-end">#<?= $this->e($return['return_id']) ?></td>
                  <td class="text-start"><?= $this->e($return['status']) ?></td>
                  <td class="text-start"><?= $this->e($return['date_added']) ?></td>
                  <td class="text-end"><?= $this->e($return['order_id']) ?></td>
                  <td class="text-start"><?= $this->e($return['name']) ?></td>
                  <td class="text-end"><a href="<?= $return['href'] ?>" data-bs-toggle="tooltip"
                      title="<?= $this->e($button_view) ?>" class="btn btn-info"><i class="fa-solid fa-eye"></i></a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="row mb-3">
          <div class="col-sm-6 text-start"><?= $this->e($pagination) ?></div>
          <div class="col-sm-6 text-end"><?= $this->e($results) ?></div>
        </div>
      <?php else: ?>
        <p><?= $this->e($text_no_results) ?></p>
      <?php endif; ?>
      <div class="row">
        <div class="col">
          <a href="<?= $back ?>" class="btn btn-light"><?= $this->e($button_back) ?></a>
          <a href="<?= $request ?>" class="btn btn-secondary"><?= $this->e($button_request_return) ?></a>
        </div>
        <div class="col text-end">
          <a type="submit" href="<?= $continue ?>" class="btn btn-primary"><?= $this->e($button_continue) ?></a>
        </div>
      </div>
      <?= $content_bottom ?>
    </div>
    <?= $column_right ?>
  </div>
</div>
<?= $footer ?>