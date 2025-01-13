<?php if ($addresses): ?>
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <?php foreach ($addresses as $address): ?>
        <tr>
          <td class="text-start"><?= $address['address'] ?></td>
          <td class="text-end"><a href="<?=  $address['edit']  ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_edit ) ?>" class="btn btn-primary"><i class="fa-regular fa-solid fa-pencil"></i></a> <a href="<?=  $address['delete']  ?>" data-bs-toggle="tooltip" title="<?= $this->e($button_delete ) ?>" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
<?php else: ?>
  <p><?=  $text_no_results   ?></p>
<?php endif; ?>