<?php if ($modules): ?>
<aside id="column-right" class="col-3 d-none d-md-block">
  <?php foreach ($modules as $module): ?>
  <?=  $module   ?>
  <?php endforeach; ?>
</aside>
<?php endif; ?>