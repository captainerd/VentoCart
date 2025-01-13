<?= $header ?>
<div id="account-tracking" class="container">
  <?= $breadcrumb ?>
  <div class="row"><?= $column_left ?>
    <div id="content" class="col  p-3 bg-white border"><?= $content_top ?>
      <h1><?= $this->e($heading_title) ?></h1>
      <p><?= $this->e($text_description) ?></p>
      <form>
        <div class="row mb-3">
          <label for="input-code" class="col-md-2 col-form-label"><?= $this->e($entry_code) ?></label>
          <div class="col-md-10">
            <textarea cols="40" rows="5" placeholder="<?= $this->e($entry_code) ?>" id="input-code"
              class="form-control"><?= $this->e($code) ?></textarea>
          </div>
        </div>
        <div class="row mb-3">
          <label for="input-generator" class="col-md-2 col-form-label"><?= $this->e($entry_generator) ?></label>
          <div class="col-md-10">
            <input type="text" name="product" value="" placeholder="<?= $this->e($entry_generator) ?>"
              id="input-generator" data-oc-target="autocomplete-generator" class="form-control" autocomplete="off" />
            <ul id="autocomplete-generator" class="dropdown-menu"></ul>
            <div class="text-muted"><?= $this->e($help_generator) ?></div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="input-link" class="col-md-2 col-form-label"><?= $this->e($entry_link) ?></label>
          <div class="col-md-10">
            <textarea name="link" cols="40" rows="5" placeholder="<?= $this->e($entry_link) ?>" id="input-link"
              class="form-control"></textarea>
          </div>
        </div>
      </form>
      <div class="text-end"><a href="<?= $continue ?>" class="btn btn-primary"><?= $this->e($button_continue) ?></a>
      </div>
      <?= $content_bottom ?>
    </div>
    <?= $column_right ?>
  </div>
</div>
<script><!--
$('#input-generator').autocomplete({
    'source': function(request, response) {
        return $.ajax({
            url: 'index.php?route=account/tracking.autocomplete&customer_token=<?= $this->e($customer_token) ?>& search=' + encodeURIComponent(request) + ' & tracking=' + encodeURIComponent($('#input - code').val()) + ' & language=<?= $this->e($language) ?>',
  dataType: 'json',
    success: function(json) {
      response($.map(json, function (item) {
        return {
          label: item['name'],
          value: item['link']
        }
      }));
    }
        });
    },
  'select': function(item) {
    $('#input-link').val(item['value']);
  }
});
  //--></script>
<?= $footer ?>