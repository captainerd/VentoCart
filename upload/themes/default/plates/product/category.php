<?php if (!$ajax): ?>
  <?= $header ?>
  <div id="product-category" class="container shadow ">
    <?= $breadcrumb ?>
    <div class="row bg-white">
      <?= $column_left ?>
      <div id="content" class="col">
        <?= $content_top ?>
        <h5>
          <?= $heading_title ?>
        </h5>
        <?php if (isset($image) || isset($description)): ?>
          <div class="row">
            <?php if ($image): ?>
              <div class="col-3"><img src="<?= $this->e($image) ?>" alt="<?= $this->e($heading_title) ?>"
                  title="<?= $this->e($heading_title) ?>" class="img-thumbnail" /></div>
            <?php endif; ?>
            <?php if ($description): ?>
              <div class="col-9">
                <?= $description ?>
              </div>
            <?php endif; ?>
          </div>
          <hr />
        <?php endif; ?>
        <?php if (isset($categories)): ?>
          <h5>
            <?= $text_refine ?>
          </h5>
          <?php if (count($categories) <= 5): ?>
            <div class="row">
              <div class="col m-2">
              <ul style="list-style-type: none; padding: 0; margin: 0;">
              <?php foreach ($categories as $category): ?>
                  <li style="display: inline-block; margin-right: 15px;">
                  <a href="<?= $category['href'] ?>">
                  <?= $category['name'] ?>
                   </a>
                  </li>
                   <?php endforeach; ?>
                </ul>
              </div>
            </div>
          <?php else: ?>
            <div class="row row-cols-sm-2 row-cols-lg-4">
              <?php foreach (array_chunk($categories, ceil(count($categories) / 4)) as $categoryBatch): ?>
                <div class="col">
                  <ul>
                    <?php foreach ($categoryBatch as $category): ?>
                      <li><a href="<?= $category['href'] ?>">
                          <?= $category['name'] ?>
                        </a></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              <?php endforeach; ?>
            </div>
            <br />
          <?php endif; ?>
        <?php endif; ?>
        <?php if (!empty($products)): ?>
          <div id="display-control" class="row">
            <div class="col-lg-3">
            <div class="mb-3">
            <button class="btn    floating-button button-columnt-left" type="button" data-bs-toggle="offcanvas"
data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft">
<i class="fas fa-cog"></i>  
</button>
</div> 
            </div>
            <div class="col-lg-1 d-none d-lg-block">
              <div class="btn-group">
              <a href="<?= $compare ?>" id="compare-total" class="btn btn-primary  "><i
              data-bs-toggle="tooltip"
              title="<?=  $text_compare  ?>"  class="fa-solid fa-arrow-right-arrow-left"></i> <span class="d-none d-xl-inline">
                   
                  </span></a>
                <button type="button" id="button-list" class="btn btn-light" data-bs-toggle="tooltip"
                  title="<?= $this->e($button_list) ?>"><i class="fa-solid fa-table-list"></i></button>
                <button type="button" id="button-grid" class="btn btn-light" data-bs-toggle="tooltip"
                  title="<?= $this->e($button_grid) ?>"><i class="fa-solid fa-table-cells"></i></button>
              </div>
            </div>
            <div class="col-lg-4 offset-lg-1 col-6">
              <div class="input-group mb-3">
                <label for="input-sort" class="input-group-text">
                  <?= $text_sort ?>
                </label> <select id="input-sort" class="form-select">
                  <?php foreach ($sorts as $sortItem): ?>
                    <option value="<?= $sortItem['href'] ?>" <?= ($sortItem['value'] == sprintf('%s-%s', $sort, $order)) ? ' selected' : '' ?>>
                      <?= $sortItem['text'] ?>
                    </option>
                  <?php endforeach; ?>

                </select>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="input-group mb-3">
                <label for="input-limit" class="input-group-text">
                  <?= $this->e($text_limit) ?>
                </label>
                <select id="input-limit" class="form-select"  >
                  <?php foreach ($limits as $limititem): ?>
                    <option value="<?= $limititem['href'] ?>" <?php if ($limititem['value'] == $limit): ?> selected <?php endif; ?>>
                      <?= $this->e($limititem['text']) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>



          <div style="padding:0px;margin:0px" id="product-lista">


            <?php if ($infiniteScroll): ?>
              <div id="product-list" class="row <?= $listview ? 'row-cols-1 product-list' : 'row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4' ?>">
              </div>
            <?php endif; ?>

          </div>
          <div class="text-center" id="spinnerloader">
            <div class="spinner-border text-primary" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>




        <?php endif; ?>
        <?php if (empty($categories) && empty($products)): ?>
          <p>
            <?= $this->e($text_no_results) ?>
          </p>
          <div class="text-end"><a href="<?= $continue ?>" class="btn btn-primary">
              <?= $this->e($button_continue) ?>
            </a></div>
        <?php endif; ?>
        <?= $content_bottom ?>
      </div>
      <?= $column_right ?>
    </div>
  </div>
  <script>
    window.infiniteScroll = <?= $infiniteScroll ?>;
  </script>

  <script src="/themes/default/assets/core/js/category.js"></script>

  <?= $footer ?>

<?php endif ?>
<?php if ($ajax): ?>
  <?php if (!$infiniteScroll): ?>
    <div class="row">
      <div class="col-sm-6 text-start">
        <?= $pagination ?>
      </div>

    </div>
  <?php endif ?>
  <?php if (count($products) > 0): ?>
    <div id="product-list" class="row <?= $listview ? 'row-cols-1 product-list' : 'row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4' ?>">
      <?php foreach ($products as $product): ?>
        <div class="col mb-3">
          <?= $product ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif ?>
  <?php if (!$infiniteScroll): ?>
    <div class="row">
      <div class="col-sm-6 text-start">
        <?= $pagination ?>
      </div>
      <div class="col-sm-6 text-end">
        <?= $results ?>
      </div>
    </div>
  <?php endif ?>
<?php endif ?>
<?php if (count($products) == 0): ?>
  <div>
    <div id="no-more-results" class="alert alert-primary" role="alert">
      <?= $text_finished ?>
    </div>
  </div>
<?php endif; ?>