<?php if ($modules): ?>
  <aside id="column-left" class="col-3  bg-white m-4 p-3   d-md-block">



    <!-- Offcanvas for mobile -->
    <div class="offcanvas offcanvas-start offcanvas-column-left" tabindex="-1" id="offcanvasLeft"
      aria-labelledby="offcanvasLeftLabel">
      <div class="offcanvas-header">

        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="p-4 column-left offcanvas-body" id="offcanvas-left">

        <?php foreach ($modules as $module): ?>
          <?= $module ?>
        <?php endforeach; ?>
      </div>
    </div>





  </aside>

<?php endif; ?>