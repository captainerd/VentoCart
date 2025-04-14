<?= $header ?>
<!-- Section 1 -->
<section class="section bg-white text-dark">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3 data-ve="string|section_1_title" data-ve-type="text" class="section-title mb-3 text-gradient-hover">
                    <?= $section_1_title ?>
                </h3>
                <p data-ve="string|section_1_text" data-ve-type="text">
                    <?= $section_1_text ?>
                </p>
                <a href="<?= isset($learn_more_section_1['url']) ? $learn_more_section_1['url'] : '' ?>"
                    data-ve="string|learn_more_section_1" data-ve-type="url" class="btn btn-primary mt-3">
                    <?= isset($learn_more_section_1['text']) ? $learn_more_section_1['text'] : 'Learn More' ?>
                </a>
            </div>
            <div class="col-md-6">

                <img src="<?= isset($image_1['src']) ? $image_1['src'] : 'https://fastly.picsum.photos/id/26/4209/2769.jpg' ?>"
                    alt="<?= isset($image_1['alt']) ? $image_1['alt'] : 'Image' ?>" class="img-fluid rounded shadow"
                    data-ve="string|image_1" data-ve-type="image" style="border: 4px solid #ccc;">


            </div>
        </div>
    </div>
</section>
<!-- Bootstrap List Group for Text Items -->
<ul class="list-group" data-ve="array|text_items_section_1" data-ve-type="text" aria-label="Editable Text List">
    <?php foreach ($text_items_section_1 as $index => $text): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center" data-ve="item|text_items_section_1"
            data-ve-index="<?= $index ?>">

            <span><?= htmlspecialchars($text) ?></span>

            <!-- Optional: Delete button already added by JS -->
        </li>
    <?php endforeach; ?>
</ul>

<!-- Section 2 -->
<section class="section bg-light text-dark">
    <div class="container">
        <div class="row align-items-center flex-md-row-reverse">
            <div class="col-md-6">
                <h3 data-ve="string|section_2_title" data-ve-type="text" class="section-title mb-3 text-gradient-hover">
                    <?= $section_2_title ?>
                </h3>
                <p data-ve="string|section_2_text" data-ve-type="text">
                    <?= $section_2_text ?>
                </p>
                <a href="<?= isset($learn_more_section_2['url']) ? $learn_more_section_2['url'] : '' ?>"
                    data-ve="string|learn_more_section_2" data-ve-type="url" class="btn btn-success mt-3">
                    <?= isset($learn_more_section_2['text']) ? $learn_more_section_2['text'] : 'Explore More' ?>
                </a>
            </div>
            <div class="col-md-6">
                <img data-ve="string|image_2" data-ve-type="image" style="position: relative; top: 66px;"
                    src="<?= isset($image_2['src']) ? $image_2['src'] : 'https://fastly.picsum.photos/id/26/4209/2769.jpg' ?>"
                    src="<?= isset($image_2['alt']) ? $image_2['alt'] : '' ?>" data-ve="string|image_2">
            </div>
        </div>
    </div>
</section>

<!-- Section 3 -->
<section class="section bg-white text-dark">
    <div class="container">
        <div class="text-center mb-5">
            <h3 data-ve="string|section_3_title" data-ve-type="text" class="section-title mb-3 text-gradient-hover">
                <?= $section_3_title ?>
            </h3>
            <p data-ve="string|section_3_text" data-ve-type="text">
                <?= $section_3_text ?>
            </p>
        </div>


        <!-- Splide Gallery -->
        <div class="tilted-gallery splide splidetemplate " data-ve="array|gallery_images_section_3_2"
            data-ve-type="image" aria-label="Gallery Slider">

            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($gallery_images_section_3_2 as $index => $image): ?>
                        <li class="splide__slide" data-ve="item|gallery_images_section_3_2" data-ve-index="<?= $index ?>">
                            <img width="100%"
                                src="<?= isset($image['src']) ? $image['src'] : 'https://fastly.picsum.photos/id/26/4209/2769.jpg' ?>"
                                alt="<?= isset($image['alt']) ? $image['alt'] : 'Image' ?>" style="border: 4px solid #ccc;">
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>


        <div class="text-center mt-4">
            <a href="<?= isset($learn_more_section_3['url']) ? $learn_more_section_3['url'] : '' ?>"
                data-ve="string|learn_more_section_3" data-ve-type="url" class="btn btn-gradient btn-learn btn-info">
                <?= isset($learn_more_section_3['text']) ? $learn_more_section_3['text'] : 'See Full Gallery' ?>
            </a>
        </div>
    </div>
</section>

<!-- Section 4 -->
<section class="section bg-light text-dark">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="<?= isset($image_3['src']) ? $image_3['src'] : 'https://fastly.picsum.photos/id/26/4209/2769.jpg' ?>"
                    alt="<?= isset($image_3['alt']) ? $image_3['alt'] : 'Image' ?>" class="img-fluid rounded shadow"
                    data-ve="string|image_3" data-ve-type="image" style="border: 4px solid #ccc;">
            </div>
            <div class="col-md-6">
                <h3 data-ve="string|section_4_title" data-ve-type="text" class="section-title mb-3 text-gradient-hover">
                    <?= $section_4_title ?>
                </h3>
                <p data-ve="string|section_4_text" data-ve-type="text">
                    <?= $section_4_text ?>
                </p>
                <a href="<?= isset($learn_more_section_4['url']) ? $learn_more_section_4['url'] : '' ?>"
                    data-ve="string|learn_more_section_4" data-ve-type="url" class="btn btn-warning mt-3">
                    <?= isset($learn_more_section_4['text']) ? $learn_more_section_4['text'] : 'Learn More' ?>
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('.splidetemplate', {
            type: 'loop',
            perPage: 3,
            gap: '1rem',
            autoplay: true,
            pauseOnHover: true,
            breakpoints: {
                768: {
                    perPage: 2,
                },
                576: {
                    perPage: 1,
                },
            }
        }).mount();
    });
</script>



<?= $footer ?>