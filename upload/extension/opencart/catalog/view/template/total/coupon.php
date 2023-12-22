


<div class="accordion" id="couponaccordion">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        <?= $this->e($heading_title ) ?>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse hide" aria-labelledby="headingOne" data-bs-parent="#couponaccordion">
      <div class="accordion-body">
        <form id="form-coupon" action="<?= $this->e($save ) ?>" method="post" data-oc-toggle="ajax" data-oc-load="<?= $this->e($list ) ?>" data-oc-target="#shopping-cart">
          <div class="row mb-3">
            <label for="input-coupon" class="col-md-4 col-form-label"><?= $this->e($entry_coupon ) ?></label>
            <div class="col-md-8">
              <input type="text" name="coupon" value="<?= $this->e($coupon ) ?>" placeholder="<?= $this->e($entry_coupon ) ?>" id="input-coupon" class="form-control"/>
            </div>
          </div>
          <div class="text-end"><button type="submit" class="btn btn-primary"><?= $this->e($button_coupon ) ?></button></div>
        </form>
      </div>
    </div>
  </div>
 
    </div>
