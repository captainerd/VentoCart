<?= $header ?>
<div id="common-success" class="container">
  <?= $breadcrumb ?>
  <div class="row">
    <?= $column_left ?>
    <div id="content" class="col">
      <?= $content_top ?>
      <h1>
        <?= $this->e($heading_title) ?>
      </h1>
      <?= $text_message ?>
      <div class="text-end"><a href="<?= $continue ?>" class="btn btn-primary">
          <?= $button_continue ?>
        </a></div>
      <?= $content_bottom ?>
    </div>
    <?= $column_right ?>
  </div>
</div>
<?php if (!empty($clearStorage)): ?>
  <script>
    localStorage.clear();
  </script>
<?php endif; ?>

<?= $footer ?>