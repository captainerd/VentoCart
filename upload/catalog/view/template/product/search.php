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
      <div class="row">
        <div class="col"><label for="input-search" class="col-form-label">
            <?= $this->e($entry_search) ?>
          </label></div>
      </div>
      <div class="row row-cols-1 row-cols-md-2">

        <div class="col">
          <input type="text" name="search" value="<?= $this->e($search) ?>"
            placeholder="<?= $this->e($text_keyword) ?>" id="input-search" class="form-control mb-1" />
          <div class="form-check">
            <input type="checkbox" name="description" value="1" id="input-description" class="form-check-input" <?php if ($description): ?> checked<?php endif; ?> />
            <label for="input-description" class="form-check-label">
              <?= $this->e($entry_description) ?>
            </label>
          </div>
        </div>

        <div class="col">
          <select name="category_id" id="input-category" class="form-select mb-1">
            <option value="0">
              <?= $this->e($text_category) ?>
            </option>
            <?php foreach ($categories as $category_1): ?>
              <option value="<?= $this->e($category_1['category_id']) ?>" <?php if ($category_1['category_id'] == $category_id): ?> selected<?php endif; ?>>
                <?= $this->e($category_1['name']) ?>
              </option>
              <?php foreach ($category_1['children'] as $category_2): ?>
                <option value="<?= $this->e($category_2['category_id']) ?>" <?php if ($category_2['category_id'] == $category_id): ?> selected<?php endif; ?>>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <?= $this->e($category_2['name']) ?>
                </option>
                <?php foreach ($category_2['children'] as $category_3): ?>
                  <option value="<?= $this->e($category_3['category_id']) ?>" <?php if ($category_3['category_id'] == $category_id): ?> selected<?php endif; ?>>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?= $this->e($category_3['name']) ?>
                  </option>
                <?php endforeach; ?>
              <?php endforeach; ?>
            <?php endforeach; ?>
          </select>
          <div class="form-check">
            <input type="checkbox" name="sub_category" value="1" id="input-sub-category" class="form-check-input" <?php if (isset($sub_category)): ?> checked<?php endif; ?> /> <label for="input-sub-category"
              class="form-check-label">
              <?= $this->e($text_sub_category) ?>
            </label>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col text-end">
          <button type="button" id="button-search" class="btn btn-primary">
            <?= $this->e($button_search) ?>
          </button>
        </div>
      </div>
      <hr />

      <h2>
        <?= $this->e($text_search) ?>
      </h2>
      <?php if ($products): ?>
        <div id="display-control" class="row">

          <div class="col-md-3">
            <div class="mb-3">
              <a href="<?=  $compare ?>" id="compare-total" class="btn btn-primary d-block"><i
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
              </label>
              <select id="input-sort" class="form-select" onchange="location = this.value;">
                <?php foreach ($sorts as $sorts): ?>
                  <option value="<?=  $sorts['href']  ?>" <?= ($sorts['value'] == sprintf('%s-%s', $sort, $order)) ? ' selected' : '' ?>>
                    <?= $this->e($sorts['text']) ?>
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
              <select id="input-limit" class="form-select" onchange="location = this.value;">
                <?php foreach ($limits as $limits): ?>
                  <option value="<?=  $limits['href']  ?>" <?php if ($limits['value'] == $limit): ?> selected<?php endif; ?>>
                    <?= $this->e($limits['text']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

        </div>
        <div id="product-list" class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">
          <?php foreach ($products as $product): ?>
            <div class="col mb-3">
              <?=  $product  ?>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="row">
          <div class="col-sm-6 text-start">
            <?= $pagination ?>
          </div>
          <div class="col-sm-6 text-end">
            <?=  $results  ?>
          </div>
        </div>
      <?php else: ?>
        <p>
          <?= $this->e($text_no_results) ?>
        </p>
      <?php endif; ?>

      <?= $content_bottom ?>
    </div>
    <?= $column_right ?>
  </div>
</div>
<script type="text/javascript"><!--
$('#button-search').bind('click', function() {
    url = 'index.php?route=product/search&language=<?= $this->e($language) ?>';

  var search = $('#input-search').val();

  if (search) {
    url += '&search=' + encodeURIComponent(search);
  }

  var category_id = $('#input-category').prop('value');

  if (category_id > 0) {
    url += '&category_id=' + encodeURIComponent(category_id);
  }

  var sub_category = $('#input-sub-category:checked').prop('value');

  if (sub_category) {
    url += '&sub_category=1';
  }

  var description = $('#input-description:checked').prop('value');

  if (description) {
    url += '&description=1';
  }

  location = url;
});

  $('#input-search').bind('keydown', function (e) {
    if (e.keyCode == 13) {
      $('#button-search').trigger('click');
    }
  });

  $('#input-category').on('change', function () {
    $('#input-sub-category').prop('disabled', (this.value == '0' ? true : false));
  });

  $('#input-category').trigger('change');
//--></script>
<?= $footer ?>