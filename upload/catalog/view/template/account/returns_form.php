<?=  $header ?>
<div id="account-return" class="container">
  <ul class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb): ?>
      <li class="breadcrumb-item"><a href="<?= $breadcrumb['href'] ?>"> <?= $this->e($breadcrumb['text']) ?></a></li>
    <?php endforeach; ?>
  </ul>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <p><?= $this->e($text_description ) ?></p>
      <form id="form-return" action="<?= $save  ?>" method="post" data-oc-toggle="ajax">
        <fieldset>
          <legend><?= $this->e($text_order ) ?></legend>
          <div class="row mb-3 required">
            <label for="input-firstname" class="col-sm-2 col-form-label"><?= $this->e($entry_firstname ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="firstname" value="<?= $this->e($firstname ) ?>" placeholder="<?= $this->e($entry_firstname ) ?>" id="input-firstname" class="form-control"/>
              <div id="error-firstname" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-lastname" class="col-sm-2 col-form-label"><?= $this->e($entry_lastname ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="lastname" value="<?= $this->e($lastname ) ?>" placeholder="<?= $this->e($entry_lastname ) ?>" id="input-lastname" class="form-control"/>
              <div id="error-lastname" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-email" class="col-sm-2 col-form-label"><?= $this->e($entry_email ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="email" value="<?= $this->e($email ) ?>" placeholder="<?= $this->e($entry_email ) ?>" id="input-email" class="form-control"/>
              <div id="error-email" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-telephone" class="col-sm-2 col-form-label"><?= $this->e($entry_telephone ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="telephone" value="<?= $this->e($telephone ) ?>" placeholder="<?= $this->e($entry_telephone ) ?>" id="input-telephone" class="form-control"/>
              <div id="error-telephone" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-order-id" class="col-sm-2 col-form-label"><?= $this->e($entry_order_id ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="order_id" value="<?= $this->e($order_id ) ?>" placeholder="<?= $this->e($entry_order_id ) ?>" id="input-order-id" class="form-control"/>
              <div id="error-order-id" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3">
            <label for="input-date-ordered" class="col-sm-2 col-form-label"><?= $this->e($entry_date_ordered ) ?></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group">
                <input type="text" name="date_ordered" value="<?= $this->e($date_ordered ) ?>" placeholder="<?= $this->e($entry_date_ordered ) ?>" id="input-date-ordered" class="form-control date"/>
                <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
              </div>
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend><?= $this->e($text_product ) ?></legend>
          <div class="row mb-3 required">
            <label for="input-product" class="col-sm-2 col-form-label"><?= $this->e($entry_product ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="product" value="<?= $this->e($product ) ?>" placeholder="<?= $this->e($entry_product ) ?>" id="input-product" class="form-control"/> <input type="hidden" name="product_id" value="<?= $this->e($product_id ) ?>"/>
              <div id="error-product" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-model" class="col-sm-2 col-form-label"><?= $this->e($entry_model ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="model" value="<?= $this->e($model ) ?>" placeholder="<?= $this->e($entry_model ) ?>" id="input-model" class="form-control"/>
              <div id="error-model" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3">
            <label for="input-quantity" class="col-sm-2 col-form-label"><?= $this->e($entry_quantity ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="quantity" value="1" placeholder="<?= $this->e($entry_quantity ) ?>" id="input-quantity" class="form-control"/>
            </div>
          </div>
          <div class="row mb-3 required">
            <label class="col-sm-2 col-form-label"><?= $this->e($entry_reason ) ?></label>
            <div class="col-sm-10">
              <div id="input-reason">
                <?php foreach ($return_reasons as $return_reason): ?>
                  <div class="form-check">
                    <input type="radio" name="return_reason_id" value="<?= $this->e($return_reason['return_reason_id']) ?>" id="input-return-reason-<?= $this->e($return_reason['return_reason_id']) ?>" class="form-check-input"/> <label for="input-return-reason-<?= $this->e($return_reason['return_reason_id']) ?>" class="form-check-label"><?= $this->e($return_reason['name']) ?></label>
                  </div>
                <?php endforeach; ?>
              </div>
              <div id="error-reason" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label class="col-sm-2 col-form-label"><?= $this->e($entry_opened ) ?></label>
            <div class="col-sm-10">
              <div class="form-check form-check-inline">
                <input type="radio" name="opened" value="1" id="input-opened-yes" class="form-check-input" checked/>
                <label for="input-opened-yes" class="form-check-label"><?= $this->e($text_yes ) ?></label>
              </div>
              <div class="form-check form-check-inline">
                <input type="radio" name="opened" value="0" id="input-opened-no" class="form-check-input"/>
                <label for="input-opened-no" class="form-check-label"><?= $this->e($text_no ) ?></label>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label for="input-comment" class="col-sm-2 col-form-label"><?= $this->e($entry_fault_detail ) ?></label>
            <div class="col-sm-10">
              <textarea name="comment" rows="5" placeholder="<?= $this->e($entry_fault_detail ) ?>" id="input-comment" class="form-control"></textarea>
            </div>
          </div>
          <?= $this->e($captcha ) ?>
        </fieldset>
        <div class="row">
          <div class="col-3"><a href="<?= $back  ?>" class="btn btn-light"><?= $this->e($button_back ) ?></a></div>
          <div class="col text-end">
            <?php if ($text_agree): ?>
              <div class="form-check form-switch form-switch-lg form-check-reverse form-check-inline">
                <label class="form-check-label"><?= $this->e($text_agree ) ?></label>
                <input type="hidden" name="agree" value="0"/>
                <input type="checkbox" name="agree" value="1" id="input-agree" class="form-check-input"/>
              </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary"><?= $this->e($button_submit ) ?></button>
          </div>
        </div>
      </form>
      <?=  $content_bottom  ?></div>
    <?=  $column_right   ?></div>
</div>
<?=  $footer  ?>
