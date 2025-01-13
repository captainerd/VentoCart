<?= $header ?>
<div id="account-wishlist" class="container">
  <?= $breadcrumb ?>
  <div class="row"><?= $column_left ?>
    <div id="content" class="col  p-3 bg-white border"><?= $content_top ?>
      <h1><?= $this->e($heading_title) ?></h1>
      <div id="wishlist"><?= $list ?></div>
      <div class="text-end"><a href="<?= $continue ?>" class="btn btn-primary"><?= $this->e($button_continue) ?></a>
      </div>
      <?= $content_bottom ?>
    </div>
    <?= $column_right ?>
  </div>
</div>
<?= $footer ?>