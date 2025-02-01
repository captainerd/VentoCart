<div class="container bg-white p-4 mt-5 mb-5 rounded shadow">
  <h3 class="p-2 multicolored-text "><?= $heading_title ?></h3>
  <div class="p-2 bg-light">
    <?php
    $className = 'module-splide' . rand(1000, 9999);
    ?>
    <section class="splide splide-<?= $className ?>" aria-label="Blog Articles">
      <div class="splide__track">
        <ul class="splide__list  ">

          <?php foreach ($articles as $article): ?>
            <li class="splide__slide">
              <div style="height: 100%;" class="card mb-3 mx-2">
                <img src="/index.php?route=product/product.getImage&width=200&height=0&image=<?= $article['image'] ?>"
                  class="card-img-top" alt="<?= $article['name'] ?>">
                <div s class="card-body d-flex flex-column">
                  <?= $article['date'] ?>
                  <h5 class="card-title"><?= $article['name'] ?></h5>
                  <p class="card-text"><?= strip_tags($article['preview']) ?></p>
                  <a href="<?= $article['href'] ?>"
                    aria-label="<?= htmlspecialchars($article['name'], ENT_QUOTES, 'UTF-8') ?>"
                    class="btn btn-primary mt-auto">
                    <?= $text_readmore ?>
                    <?= htmlspecialchars(strlen($article['name']) > 15 ? substr($article['name'], 0, 12) . '...' : $article['name'], ENT_QUOTES, 'UTF-8') ?>
                  </a>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </section>
  </div>

  <script>
    new Splide('.splide-<?= $className ?>', {
      lazyLoad: 'nearby',
      perPage: 3,
      perMove: 1,
      pagination: false,
      gap: 10,
      breakpoints: {
        1000: {
          perPage: 2,
        },
        700: {
          perPage: 1,
        },
      },
    }).mount();
  </script>
</div>