<div class="accordion-item">
  <h2 class="accordion-header"><button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse-voucher"><?= $this->e($heading_title ) ?></button></h2>
  <div id="collapse-voucher" class="accordion-collapse collapse" data-bs-parent="#accordion">
    <div class="accordion-body">
      <form id="form-voucher" action="<?= $this->e($save ) ?>" method="post" data-oc-toggle="ajax" data-oc-load="<?= $this->e($list ) ?>" data-oc-target="#shopping-cart">
        <div class="row mb-3">
          <label for="input-voucher" class="col-md-4 col-form-label"><?= $this->e($entry_voucher ) ?></label>
          <div class="col-md-8">
            <input type="text" name="voucher" value="<?= $this->e($voucher ) ?>" placeholder="<?= $this->e($entry_voucher ) ?>" id="input-voucher" class="form-control"/>
          </div>
        </div>
        <div class="text-end"><button type="submit" class="btn btn-primary"><?= $this->e($button_voucher ) ?></button></div>
      </form>
    </div>
  </div>
</div>
