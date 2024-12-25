<div class="container-fluid border bg-white  p-4 mt-5 mb-5    ">


    <div class="p-2 container">
        <h3 class="p-2 multicolored-text"><?= $heading_title ?></h3>
        <?php
        $className = 'module-splide' . rand(1000, 9999);
        ?>
        <section class="splide splide-<?= $className ?>" aria-label="Category Carousel">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($categories as $index => $category): ?>
                        <li class="splide__slide">
                            <div class="text-center homecat-images">
                                <a class="afx" href="<?= $category['url'] ?>">
                                    <img src="<?= $category['image'] ?>" alt="<?= $category['name'] ?>"
                                        style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                </a>
                                <p class="category-name">
                                    <a href="<?= $category['url'] ?>"><?= $category['name'] ?></a>
                                </p>
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
            perPage: 6,
            perMove: 1,
            pagination: false,
            gap: 10,
            <?php if ($autoplay): ?>                                                                                                                                                                                                         autoplay: true,
                interval: <?= $interval ?>,
                pauseOnHover: true,
            <?php endif; ?>
            rewind: true,
            breakpoints: {
                1200: {
                    perPage: 3,
                },
                768: {
                    perPage: 2,
                },
                576: {
                    perPage: 2,
                },
            },
        }).mount();
    </script>
</div>