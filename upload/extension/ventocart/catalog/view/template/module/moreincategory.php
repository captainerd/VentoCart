<div class="  border rounded shadow-sm   p-0 mx-auto mb-4   ">

    <h5 style="background: #f2f2f2;" class="p-2 text-muted m-0"><?= $heading_title ?></h5>
    <div class="p-2 bg-light ">
        <?php
        $className = 'module-splide' . rand(1000, 9999);
        ?>
        <section class="splide splide-<?= $className ?> " aria-label="Beautiful Images">
            <div class="splide__track ">
                <ul class="splide__list ">

                    <?php foreach ($products as $product): ?>

                        <li style="max-width: 184px;" class="splide__slide"><?= $product ?></li>


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
            type: 'slide',
            pagination: false,
            gap: 20,


            <?php if ($autoplay): ?>                                                                                                                                                                                                         autoplay: true,
                interval: 3000,
                pauseOnHover: true,
            <?php endif; ?>


            breakpoints: {
                1000: {
                    perPage: 1,
                },
                700: {
                    perPage: 1,
                },
                400: {
                    perPage: 1,
                },
            },
        }).mount();
    </script>


</div>