<?=  $header  ?>
<div id="information-contact" class="container">
<?=  $breadcrumb  ?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?=  $heading_title   ?></h1>
      <h3><?=  $text_location  ?></h3>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <?php if ($image): ?>
              <div class="col-sm-3"><img src="<?=  $image   ?>" alt="<?=  $store  ?>" title="<?=  $store  ?>" class="img-thumbnail"/></div>
            <?php endif; ?>
            <div class="col-sm-3"><strong><?=  $store   ?></strong>
              <br/>
              <address>
                <?=  $address  ?>
              </address>
              <?php if ($geocode): ?>
                <a href="https://maps.google.com/maps?q=<?= urlencode( $geocode )  ?>&hl=<?= $geocode_hl  ?>&t=m&z=15" target="_blank" class="btn btn-info"><i class="fa-solid fa-location-dot"></i> <?= $this->e($button_map ) ?></a>
              <?php endif; ?>
            </div>
            <?php if ($telephone): ?>
            <div class="col-sm-3"><strong><?=  $text_telephone   ?></strong>
              <br/>
              <?=  $telephone  ?>
              <br/>
              <br/>
            </div>
            <?php endif; ?>
            <div class="col-sm-3">
              <?php if ($open): ?>
                <strong><?=  $text_open  ?></strong>
                <br/>
                <?= $this->e($open ) ?>
                <br/>
                <br/>
              <?php endif; ?>
              <?php if ($comment): ?>
                <strong><?=  $text_comment  ?></strong>
                <br/>
                <?=  $comment   ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <?php if ($locations): ?>
        <h3><?= $this->e($text_store ) ?></h3>
        <div id="accordion" class="card-group">
          <?php foreach ($locations as $location): ?>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title pt-2"><a href="#collapse-location-<?= $this->e($location['location_id']) ?>" class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion"><?= $this->e($location['name']) ?> <i class="fa-solid fa-caret-down"></i></a></h4>
              </div>
              <div class="card-collapse collapse" id="collapse-location-<?= $this->e($location['location_id']) ?>">
                <div class="card-body">
                  <div class="row">
                    <?php if ($location.image): ?>
                      <div class="col-sm-3"><img src="<?= $this->e($location['image']) ?>" alt="<?= $this->e($location['name']) ?>" title="<?= $this->e($location['name']) ?>" class="img-thumbnail"/></div>
                    <?php endif; ?>
                    <div class="col-sm-3"><strong><?= $this->e($location['name']) ?></strong>
                      <br/>
                      <address>
                        <?= $this->e($location['address']) ?>
                      </address>
                      <?php if ($location['geocode']): ?>
                        <a href="https://maps.google.com/maps?q=<?= urlencode($this->e($location['geocode'])) ?>&hl=<?= $this->e($geocode_hl ) ?>&t=m&z=15" target="_blank" class="btn btn-info"><i class="fa-solid fa-location-dot"></i> <?= $this->e($button_map ) ?></a>
                      <?php endif; ?>
                    </div>
                    <div class="col-sm-3"><strong><?= $this->e($text_telephone ) ?></strong>
                      <br/>
                      <?=  $location['telephone']  ?>
                      <br/>
                      <br/>
                    </div>
                    <div class="col-sm-3">
                      <?php if ($location['open']): ?>
                        <strong><?=  $text_open  ?></strong>
                        <br/>
                        <?= $this->e($location['open']) ?>
                        <br/>
                        <br/>
                      <?php endif; ?>
                      <?php if ($location['comment']): ?>
                        <strong><?= $this->e($text_comment ) ?></strong>
                        <br/>
                        <?= $this->e($location['comment']) ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <form id="form-contact" action="<?= $send ?>" method="post" data-oc-toggle="ajax">
        <fieldset>
          <legend><?= $this->e($text_contact ) ?></legend>
          <div class="row mb-3 required">
            <label for="input-name" class="col-sm-2 col-form-label"><?= $this->e($entry_name ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="name" value="<?= $this->e($name ) ?>" id="input-name" class="form-control"/>
              <div id="error-name" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-email" class="col-sm-2 col-form-label"><?= $this->e($entry_email ) ?></label>
            <div class="col-sm-10">
              <input type="text" name="email" value="<?= $this->e($email ) ?>" id="input-email" class="form-control"/>
              <div id="error-email" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3 required">
            <label for="input-enquiry" class="col-sm-2 col-form-label"><?= $this->e($entry_enquiry ) ?></label>
            <div class="col-sm-10">
              <textarea name="enquiry" rows="10" id="input-enquiry" class="form-control"></textarea>
              <div id="error-enquiry" class="invalid-feedback"></div>
            </div>
          </div>
          <?=  $captcha   ?>
        </fieldset>
        <div class="text-end">
          <button type="submit" class="btn btn-primary"><?= $this->e($button_submit ) ?></button>
        </div>
      </form>
      <?=  $content_bottom   ?></div>
    <?=  $column_right   ?></div>
</div>
<?= $footer  ?>
