<?php if ($modules): ?>
<aside id="column-left" class="col-3   d-md-block">
  <div class="sidemenu ">
<button class="navbar-toggler  close-sidemenu side-closed" type="button" ><i class="fa-solid fa-bars"></i></button>
</div>
  <div class="column-left">
  <?php foreach ($modules as $module): ?>
  <?=  $module   ?>
  <?php endforeach; ?>
  </div>
</aside>
<?php endif; ?>
 

 