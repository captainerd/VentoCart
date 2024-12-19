<div id="carousel-banner-<?= $module ?>"
  class="carousel slide<?php if ($effect == 'fade'): ?> carousel-fade<?php endif; ?>" data-bs-ride="carousel">
  <?php if (!empty($indicators) && count(array_chunk($banners, $items)) > 1): ?>
    <div class="carousel-indicators">
      <?php $banner_row = 0; ?>
      <?php foreach (array_chunk($banners, $items) as $banner): ?>
        <button type="button" data-bs-target="#carousel-banner-<?= $module ?>" data-bs-slide-to="<?= $banner_row ?>" <?php if ($banner_row == 0): ?> class="active" <?php endif; ?>></button>
        <?php $banner_row = $banner_row + 1; ?>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
  <div class="carousel-inner">
    <?php $banner_row = 0; ?>
    <?php foreach (array_chunk($banners, $items) as $carousel): ?>
      <div class="carousel-item<?php if ($banner_row == 0): ?> active<?php endif; ?>">
        <div class="row justify-content-center">
          <?php foreach ($carousel as $banner): ?>
            <div class="col-<?= round(12 / $items) ?> text-center">
              <?php if ($banner['link']): ?>
                <a href="<?= $banner['link'] ?>">
                  <div class="banner" style="background-image: url('<?= $banner['image'] ?>'); height: <?= $height ?>px;">
                    <div class="banner-content">
                      <h2 class="banner-title"><?= $banner['title'] ?></h2>
                      <h3 class="banner-description"><?= $banner['description'] ?></h3>
                    </div>
                  </div>

                </a>
              <?php else: ?>

                <div class="banner" style="background-image: url('<?= $banner['image'] ?>'); height: <?= $height ?>px;">
                  <div class="banner-content">
                    <h2 class="banner-title"><?= $banner['title'] ?></h2>
                    <h3 class="banner-description"><?= $banner['description'] ?></h3>
                  </div>
                </div>




              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php $banner_row = $banner_row + 1; ?>
    <?php endforeach; ?>
  </div>
  <?php if (!empty($controls) && count(array_chunk($banners, $items)) > 1): ?>
    <button type="button" class="carousel-control-prev" data-bs-target="#carousel-banner-<?= $module ?>"
      data-bs-slide="prev"><span class="fa-solid fa-chevron-left"></span></button>
    <button type="button" class="carousel-control-next" data-bs-target="#carousel-banner-<?= $module ?>"
      data-bs-slide="next"><span class="fa-solid fa-chevron-right"></span></button>
  <?php endif; ?>
</div>

<script><!--
$(document).ready(function () {
    new bootstrap.Carousel(document.querySelector('#carousel-banner-<?= $module ?>'), {
  ride: 'carousel',
    interval: <?= $interval ?>,
      wrap: true
    });
});
//--></script>