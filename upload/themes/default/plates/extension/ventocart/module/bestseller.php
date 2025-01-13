<div class="container bg-white  p-4 mt-5 mb-5 rounded shadow">

    <h3 class="p-2  "> <?= $heading_title ?></h3>
    <div class="p-2 bg-light">
        <?php
        $className = 'module-splide' . rand(1000, 9999);
        ?>
        <section class="splide splide-<?= $className ?>" aria-label="Beautiful Images">
            <div class="splide__track">
                <ul class="splide__list">

                    <?php foreach ($products as $product): ?>

                        <li class="splide__slide"><?= $product ?></li>


                    <?php endforeach; ?>
                </ul>

            </div>
        </section>
    </div>

    <script>

        new Splide('.splide-<?= $className ?>', {
            lazyLoad: 'nearby',
            perPage: 5,
            perMove: 1,
            pagination: false,
            gap: 20,
            <?php if ($autoplay): ?>                                                                                                                                                                                                         autoplay: true,
                interval: <?= $interval ?>,
                pauseOnHover: true,
            <?php endif; ?>
            rewind: true,
            breakpoints: {
                1000: {
                    perPage: 3,
                },
                700: {
                    perPage: 2,
                },
                400: {
                    perPage: 1,
                },
            },
        }).mount();



    </script>


</div>