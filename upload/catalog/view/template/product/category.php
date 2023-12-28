<?= $header ?>
<div id="product-category" class="container">
  <?= $breadcrumb ?>
  <div class="row">
    <?= $column_left ?>
    <div id="content" class="col">
      <?= $content_top ?>
      <h1>
        <?= $this->e($heading_title) ?>
      </h1>
      <?php if (isset($image) || isset($description)): ?>
        <div class="row">
          <?php if ($image): ?>
            <div class="col-3"><img src="<?= $this->e($image) ?>" alt="<?= $this->e($heading_title) ?>"
                title="<?= $this->e($heading_title) ?>" class="img-thumbnail" /></div>
          <?php endif; ?>
          <?php if ($description): ?>
            <div class="col-9">
              <?= $this->e($description) ?>
            </div>
          <?php endif; ?>
        </div>
        <hr />
      <?php endif; ?>
      <?php if (isset($categories)): ?>
        <h3>
          <?= $this->e($text_refine) ?>
        </h3>
        <?php if (count($categories) <= 5): ?>
          <div class="row">
            <div class="col-sm-3">
              <ul>
                <?php foreach ($categories as $category): ?>
                  <li><a href="<?=  $category['href']  ?>">
                      <?= $this->e($category['name']) ?>
                    </a></li>
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
                    <li><a href="<?=  $category['href']  ?>">
                        <?=  $category['name']  ?>
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
              <a href="<?= $compare ?>" id="compare-total" class="btn btn-primary d-block"><i
                  class="fa-solid fa-arrow-right-arrow-left"></i> <span class="d-none d-xl-inline">
                  <?= $this->e($text_compare) ?>
                </span></a>
            </div>
          </div>
          <div class="col-lg-1 d-none d-lg-block">
            <div class="btn-group">
              <button type="button" id="button-list" class="btn btn-light" data-bs-toggle="tooltip"
                title="<?= $this->e($button_list) ?>"><i class="fa-solid fa-table-list"></i></button>
              <button type="button" id="button-grid" class="btn btn-light" data-bs-toggle="tooltip"
                title="<?= $this->e($button_grid) ?>"><i class="fa-solid fa-table-cells"></i></button>
            </div>
          </div>
          <div class="col-lg-4 offset-lg-1 col-6">
            <div class="input-group mb-3">
              <label for="input-sort" class="input-group-text">
                <?= $this->e($text_sort) ?>
              </label> <select id="input-sort" class="form-select" onchange="location = this.value;">
                <?php foreach ($sorts as $sorts): ?>
                  <option value="<?= $sorts['href']  ?>" <?= ($sorts['value'] == sprintf('%s-%s', $sort, $order)) ? ' selected' : '' ?>>
                    <?= $sorts['text'] ?>
                  </option>


                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="input-group mb-3">
              <label for="input-limit" class="input-group-text">
                <?=  $text_limit  ?>
              </label> <select id="input-limit" class="form-select" onchange="location = this.value;">
                <?php foreach ($limits as $limits): ?>
                  <option value="<?=  $limits['href']  ?>" <?php if ($limits['value'] == $limit): ?> selected<?php endif; ?>>
                    <?=  $limits['text']  ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
        <div id="product-list" class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">
          <?php foreach ($products as $product): ?>
            <div class="col mb-3">
              <?=  $product ?>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="row">
          <div class="col-sm-6 text-start">
            <?=  $pagination  ?>
          </div>
          <div class="col-sm-6 text-end">
            <?=  $results  ?>
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
<?= $footer ?>