<?=  $header    ?>
<div id="account-subscription" class="container">
<?=  $breadcrumb  ?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <?php if ($subscriptions): ?>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <td class="text-end"><?= $this->e($column_subscription_id ) ?></td>
                <td class="text-start"><?= $this->e($column_product ) ?></td>
                <td class="text-start"><?= $this->e($column_status ) ?></td>
                <td class="text-start"><?= $this->e($column_date_added ) ?></td>
                <td class="text-end"></td>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($subscriptions as $subscription): ?>
                <tr>
                  <td class="text-end">#<?= $this->e($subscription['subscription_id']) ?></td>
                  <td class="text-start"><a href="<?= $subscription['product'] ?>"><?= $this->e($subscription['product_name']) ?></a>
                    <br/>
                    <?= $this->e($subscription['description']) ?>
                  </td>
                  <td class="text-start"><?= $this->e($subscription['status']) ?></td>
                  <td class="text-start"><?= $this->e($subscription['date_added']) ?></td>
                  <td class="text-end"><a href="<?= $subscription['view'] ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_view ) ?>" class="btn btn-info"><i class="fa-solid fa-eye"></i></a></td>
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
      <div class="text-end"><a href="<?=  $continue  ?>" class="btn btn-primary"><?= $this->e($button_continue ) ?></a></div>
      <?=  $content_bottom  ?></div>
    <?=  $column_right  ?></div>
</div>
<?=  $footer  ?>