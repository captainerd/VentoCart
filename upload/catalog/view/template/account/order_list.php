<?=  $header   ?>
<div id="account-order" class="container">
<?=  $breadcrumb  ?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top   ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <?php if ($orders): ?>
 
        <div class="container">
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
    <?php foreach ($orders as $order): ?>
      <div class="col">
        <div class="card shadow">
          <div class="card-header "><strong>OrderID: <?= $this->e($order['order_id']) ?></strong></div>
          <div class="card-body">
  <div class="row">
    <div class="col-12">
      <div class="row">
        <div class="col-6 border-bottom"><b><?= $this->e($column_product ) ?></b></div>
        <div class="col-6 border-bottom"><?= $this->e($order['products']) ?></div>
      </div>
      <div class="row">
        <div class="col-6 border-bottom"><b><?= $this->e($column_status ) ?></b></div>
        <div class="col-6 border-bottom"><?= $this->e($order['status']) ?></div>
      </div>
      <div class="row">
        <div class="col-6 border-bottom"><b><?= $this->e($column_total ) ?></b></div>
        <div class="col-6 border-bottom"><?= $this->e($order['total']) ?></div>
      </div>
      <div class="row">
        <div class="col-6 border-bottom"><b><?= $this->e($column_date_added ) ?></b></div>
        <div class="col-6 border-bottom"><?= $this->e($order['date_added']) ?></div>
      </div>
    </div>
    <div class="col-9 mt-3 d-flex align-items-end justify-content-end">
      <a href="<?= $order['view'] ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_view ) ?>" class="btn btn-info"><i class="fas  fa-folder-open"></i> <?=$button_view?></a>
    </div>
  </div>
</div>


        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

        <div class="row mb-3">
          <div class="col-sm-6 text-start"><?= $this->e($pagination ) ?></div>
          <div class="col-sm-6 text-end"><?= $this->e($results ) ?></div>
        </div>
      <?php else: ?>
        <p><?= $this->e($text_no_results ) ?></p>
      <?php endif; ?>
      <div class="text-end"><a href="<?=  $continue   ?>" class="btn btn-primary"><?= $this->e($button_continue ) ?></a></div>
      <?=  $content_bottom   ?></div>
    <?=  $column_right  ?></div>
</div>
<?=  $footer   ?>
