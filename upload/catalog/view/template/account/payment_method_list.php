<?php if (isset($payment_methods)): ?>
 

  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
  <?php foreach ($payment_methods as $payment_method): ?>
    <div class="col mb-2">
      <div class="card shadow">
      <h5 class="card-header border-bottom"><?= $this->e($payment_method['name']) ?></h5>
        <div class="card-body">
 
          <p class="card-text border-bottom">           <?= $this->e($column_type) ?> <?= $this->e($payment_method['type']) ?></p>
          <p class="card-text border-bottom">        <?= $this->e($column_date_expire) ?> <?= $this->e($payment_method['date_expire']) ?></p>
          <div class="text-end">
            <a href="<?= $payment_method['delete'] ?>" class="btn deletepayBtn btn-danger">
              <?= $this->e($button_delete) ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>





<?php else: ?>
  <p>
    <?= $text_no_results ?>
  </p>
<?php endif; ?>

<script>
$(".deletepayBtn").click(function(event) {
    // Display the warning message
    var confirmed = confirm("<?= $text_delete_warning ?>");

    // If the user clicks Cancel, prevent the default action
    if (!confirmed) {
        event.stopPropagation();
        event.preventDefault();
    }
});
</script>