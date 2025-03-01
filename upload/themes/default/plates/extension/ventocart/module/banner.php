<div style="height: <?= $height ?>px !important;" id="carousel-banner-<?= $module ?>"
  class="splide splide-<?= $module ?>" aria-label="Banner Carousel">
  <div class="splide__track">
    <ul class="splide__list">
      <?php foreach (array_chunk($banners, $items) as $carousel): ?>
        <li class="splide__slide">
          <div class="row justify-content-center">
            <?php foreach ($carousel as $banner): ?>
              <div class="col-<?= round(12 / $items) ?> text-center">
                <?php if ($banner['link']): ?>
                  <a href="<?= $banner['link'] ?>">
                    <div class="banner"
                      style="background-image: url('<?= $banner['image'] ?>'); height: <?= $height ?>px !important; ">
                      <div class="banner-content">
                        <h2 class="banner-title"><?= $banner['title'] ?></h2>
                        <h3 class="banner-description"><?= $banner['description'] ?></h3>
                      </div>
                    </div>
                  </a>
                <?php else: ?>
                  <div class="banner"
                    style="background-image: url('<?= $banner['image'] ?>'); height: <?= $height ?>px !important; ">
                    <div class="banner-content">
                      <h2 class="banner-title"><?= $banner['title'] ?></h2>
                      <h3 class="banner-description"><?= $banner['description'] ?></h3>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    new Splide('.splide-<?= $module ?>', {
      type: 'slide',
      perPage: 1,
      perMove: 1,
      gap: 20,
      rewind: true,
      pagination: false,
      arrows: <?= !empty($controls) ? 'true' : 'false' ?>,
      autoplay: true,
      interval: <?= $interval ?>,
      pauseOnHover: true
    }).mount();
  });
</script>