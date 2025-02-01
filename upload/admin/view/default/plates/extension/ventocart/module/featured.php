<?= $header ?><?= $column_left ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="float-end">
        <button type="submit" form="form-module" data-bs-toggle="tooltip" title="<?= $button_save ?>"
          class="btn btn-primary"><i class="fa-solid fa-save"></i></button>
        <a href="<?= $back ?>" data-bs-toggle="tooltip" title="<?= $button_back ?>" class="btn btn-light"><i
            class="fa-solid fa-reply"></i></a>
      </div>
      <h1><?= $this->e($heading_title) ?></h1>
      <ol class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb): ?>
          <li class="breadcrumb-item"><a
              href="<?= $this->e($breadcrumb['href']) ?>"><?= $this->e($breadcrumb['text']) ?></a></li>
        <?php endforeach; ?>
      </ol>
    </div>
  </div>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header"><i class="fa-solid fa-pencil"></i> <?= $this->e($text_edit) ?></div>
      <div class="card-body">
        <form id="form-module" action="<?= $this->e($save) ?>" method="post" data-oc-toggle="ajax">
          <div class="row mb-3">
            <label for="input-name" class="col-sm-2 col-form-label"><?= $this->e($entry_name) ?></label>
            <div class="col-sm-10">
              <input type="text" name="name" value="<?= $this->e($name) ?>" placeholder="<?= $this->e($entry_name) ?>"
                id="input-name" class="form-control" />
              <div id="error-name" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label"><?= $this->e($entry_product) ?></label>
            <div class="col-sm-10">
              <input type="text" name="product" value="" placeholder="<?= $this->e($entry_product) ?>"
                id="input-product" data-oc-target="autocomplete-product" class="form-control" autocomplete="off" />
              <ul id="autocomplete-product" class="dropdown-menu"></ul>
              <div class="form-control p-0" style="height: 150px; overflow: auto;">
                <table id="featured-product" class="table m-0">
                  <tbody>
                    <?php foreach ($products as $product): ?>
                      <tr id="featured-product-<?= $this->e($product['product_id']) ?>">
                        <td><?= $this->e($product['name']) ?><input type="hidden" name="product[]"
                            value="<?= $this->e($product['product_id']) ?>" /></td>
                        <td class="text-end"><button type="button" class="btn btn-danger"><i
                              class="fa-solid fa-circle-minus"></i></button></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="form-text text-muted"><?= $this->e($help_product) ?></div>
            </div>
          </div>
          <div class="row mb-3">
            <label for="input-interval" class="col-sm-2 col-form-label"><?= $entry_interval ?></label>
            <div class="col-sm-10">
              <input type="text" name="interval" value="<?= $interval ?>" placeholder="<?= $entry_interval ?>"
                id="input-interval" class="form-control" />
              <div id="error-interval" class="invalid-feedback"></div>
            </div>
          </div>

          <div class="row mb-3">
            <label for="input-autoplay" class="col-sm-2 col-form-label"><?= $entry_autoplay ?></label>
            <div class="col-sm-10">
              <div class="form-check form-switch  form-switch-lg">
                <input type="checkbox" name="autoplay" id="input-autoplay" class="form-check-input" value="1"
                  <?= $autoplay ? 'checked' : '' ?>>

              </div>
              <div id="error-autoplay" class="invalid-feedback"></div>
            </div>
          </div>

          <div class="row mb-3">
            <label for="input-width" class="col-sm-2 col-form-label"><?= $this->e($entry_width) ?></label>
            <div class="col-sm-10">
              <input type="text" name="width" value="<?= $this->e($width) ?>"
                placeholder="<?= $this->e($entry_width) ?>" id="input-width" class="form-control" />
              <div id="error-width" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3">
            <label for="input-height" class="col-sm-2 col-form-label"><?= $this->e($entry_height) ?></label>
            <div class="col-sm-10">
              <input type="text" name="height" value="<?= $this->e($height) ?>"
                placeholder="<?= $this->e($entry_height) ?>" id="input-height" class="form-control" />
              <div id="error-height" class="invalid-feedback"></div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label"><?= $this->e($entry_status) ?></label>
            <div class="col-sm-10">
              <div class="form-check form-switch form-switch-lg">
                <input type="hidden" name="status" value="0" />
                <input type="checkbox" name="status" value="1" id="input-status" class="form-check-input" <?php if ($status): ?> checked<?php endif; ?> />
              </div>
            </div>
          </div>
          <input type="hidden" name="module_id" value="<?= $this->e($module_id) ?>" id="input-module-id" />
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
$('#input-product').autocomplete({
    source: function (request, response) {
        $.ajax({
            url: 'index.php?route=catalog/product.autocomplete&user_token=<?= $this->e($user_token) ?>& filter_name=' + encodeURIComponent(request),
  dataType: 'json',
    success: function (json) {
      response($.map(json, function (item) {
        return {
          label: item['name'],
          value: item['product_id']
        }
      }));
    }
        });
    },
  select: function (item) {
    $('#input-product').val('');

    $('#featured-product-' + item['value']).remove();

    html = '<tr id="featured-product-' + item['value'] + '">';
    html += '  <td>' + item['label'] + '<input type="hidden" name="product[]" value="' + item['value'] + '"/></td>';
    html += '  <td class="text-end"><button type="button" class="btn btn-danger"><i class="fa-solid fa-circle-minus"></i></button></td>';
    html += '</tr>';

    $('#featured-product tbody').append(html);
  }
});

  $('#featured-product').on('click', '.btn', function () {
    $(this).parent().parent().remove();
  });
  //--></script>
<?= $footer ?>