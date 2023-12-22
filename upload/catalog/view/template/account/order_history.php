<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <td class="text-start"><strong><?= $this->e($column_date_added ) ?></strong></td>
        <td class="text-start"><strong><?= $this->e($column_comment ) ?></strong></td>
        <td class="text-start"><strong><?= $this->e($column_status ) ?></strong></td>
      </tr>
    </thead>
    <tbody>
      <?php if (isset($histories)): ?>
        <?php foreach ($histories as $history): ?>
          <tr>
            <td class="text-start"><?= $this->e($history['date_added']) ?></td>
            <td class="text-start"><?= $this->e($history['comment']) ?></td>
            <td class="text-start"><?= $this->e($history['status']) ?></td>
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
<div class="row">
  <div class="col-sm-6 text-start"><?= $this->e($pagination ) ?></div>
  <div class="col-sm-6 text-end"><?= $this->e($results ) ?></div>
</div>
