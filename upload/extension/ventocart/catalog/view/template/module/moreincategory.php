<div s class="  border rounded shadow-sm bg-light px-2 mb-4  pb-4  ">
    <h5 class="p-2  text-muted "><?= $heading_title ?></h5>

    <!-- Swiper -->
    <div class="swiper MoreInCategorySiper">
        <div class="swiper-wrapper">
            <?php foreach ($products as $product): ?>
                <div class="swiper-slide">
                    <div><?= $product ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <div style="position: relative" class="swiper-pagination"></div>

    </div>


    <script>

        var swiper = new Swiper('.MoreInCategorySiper', {
            loop: true,
            slidesPerView: 5,
            slideToClickedSlide: true,
            spaceBetween: 20,
            direction: '<?= $axis ?>',
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            <?php if ($autoplay): ?>
                                                                                                            autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
            <?php endif; ?>
            breakpoints: {
                // when window width is >= 320px
                220: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                320: {
                    slidesPerView: 4,
                    spaceBetween: 20
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 5,
                    spaceBetween: 10
                },
                // when window width is >= 640px
                740: {
                    slidesPerView: 6,
                    spaceBetween: 10
                },

                940: {
                    slidesPerView: 7,
                    spaceBetween: 10
                }
            }
        });
    </script>


</div>