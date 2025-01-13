<?php if (!$ajax): ?>
  <?= $header ?>
  <div id="product-search" class="container">
    <?= $breadcrumb ?>
    <div class="row">
      <?= $column_left ?>
      <div id="content" class="col">
        <?= $content_top ?>
        <h1>
          <?= $this->e($heading_title) ?>
        </h1>
        <?php if ($products): ?>
          <div id="display-control" class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <a href="<?= $compare ?>" id="compare-total" class="btn btn-primary d-block"><i
                    class="fa-solid fa-arrow-right-arrow-left"></i> <span class="d-inline d-md-none d-lg-inline">
                    <?= $this->e($text_compare) ?>
                  </span></a>
              </div>
            </div>
            <div class="col-md-1 d-none d-md-block">
              <div class="btn-group">
                <button type="button" id="button-list" class="btn btn-light" data-bs-toggle="tooltip"
                  title="<?= $this->e($button_list) ?>"><i class="fa-solid fa-table-list"></i></button>
                <button type="button" id="button-grid" class="btn btn-light" data-bs-toggle="tooltip"
                  title="<?= $this->e($button_grid) ?>"><i class="fa-solid fa-table-cells"></i></button>
              </div>
            </div>
            <div class="col-md-4 offset-md-1 col-6">
              <div class="input-group mb-3">
                <label for="input-sort" class="input-group-text">
                  <?= $this->e($text_sort) ?>
                </label> <select id="input-sort" class="form-select"  >
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
                    <option value="<?= $limititem['href'] ?>" <?php if ($limititem['value'] == $limit): ?> selected<?php endif; ?>>
                      <?= $this->e($limititem['text']) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>


          <div style="padding:0px;margin:0px" id="product-lista">


            <?php if ($infiniteScroll): ?>
              <div id="product-list" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
              </div>
            <?php endif; ?>

          </div>
          <div class="text-center" id="spinnerloader">
            <div class="spinner-border text-primary" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>



        <?php else: ?>
          <p>
            <?= $text_no_results ?>
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
    <div id="product-list" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
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
<?php if (count($products) == 0): ?>
  <div>
    <div id="no-more-results" class="alert alert-primary" role="alert">
      <?= $text_finished ?>
    </div>
  </div>
<?php endif; ?>
<?php endif ?>