<div class="btn-group  m-4 btn-breadcrumb">
  <?php foreach ($breadcrumbs as $index => $breadcrumb): ?>
    <a href="<?= $breadcrumb['href'] ?>"
      class="btn btn-primary <?= $index === count($breadcrumbs) - 1 ? 'active' : '' ?>">
      <?php if (isset($breadcrumb['icon'])): ?>
        <i class="fa <?= $breadcrumb['icon'] ?>"></i>
      <?php endif; ?>
      <?= $breadcrumb['text'] ?>
    </a>
  <?php endforeach; ?>
</div>