<?=  $header    ?>
<div id="account-download" class="container">
<?=  $breadcrumb  ?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <?php if ($downloads): ?>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <td class="text-end"><strong><?= $this->e($column_order_id ) ?></strong></td>
                <td class="text-start"><strong><?= $this->e($column_name ) ?></strong></td>
                <td class="text-start"><strong><?= $this->e($column_size ) ?></strong></td>
                <td class="text-start"><strong><?= $this->e($column_date_added ) ?></strong></td>
                <td></td>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($downloads as $download): ?>
                <tr>
                  <td class="text-end"><?= $this->e($download['order_id']) ?></td>
                  <td class="text-start"><?= $this->e($download['name']) ?></td>
                  <td class="text-start"><?= $this->e($download['size']) ?></td>
                  <td class="text-start"><?= $this->e($download['date_added']) ?></td>
                  <td><a href="<?=  $download['href'] ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_download ) ?>" class="btn btn-primary"><i class="fa-solid fa-cloud-arrow-down"></i></a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="row mb-3">
          <div class="col-sm-6 text-start"><?=  $pagination   ?></div>
          <div class="col-sm-6 text-end"><?=  $results   ?></div>
        </div>
      <?php else: ?>
        <p><?= $this->e($text_no_results ) ?></p>
      <?php endif; ?>
      <div class="text-end">
        <a href="<?=  $continue   ?>" class="btn btn-primary"><?= $this->e($button_continue ) ?></a>
      </div>
      <?=  $content_bottom  ?></div>
    <?=  $column_right  ?></div>
</div>
<?=  $footer  ?>
