<?php
$videoExtensions = ['mp4', 'avi', 'mkv'];
$mediaExtension = pathinfo($thumb, PATHINFO_EXTENSION);
$isVideo = in_array($mediaExtension, $videoExtensions);
?>
<div class=" h-100 rounded  bg-white thumbnail-container  border">
    <?php if ($isVideo): ?>
        <a href="<?= $href ?>" class="product-link  text-primary-emphasis text-center text-decoration-none">
            <video style="   object-fit: cover !important" class=" autoplayHover product-thumb" muted loop>
                <source src="<?= $thumb ?>" type="video/<?= $mediaExtension ?>">
                Your browser does not support the video tag.
            </video> </a>
    <?php else: ?> <a href="<?= $href ?>" class="product-link  text-primary-emphasis text-center text-decoration-none">
            <img class="img-fluid product-thumb" src="<?= $thumb ?>" alt="<?= $this->e($name) ?>" /> </a>
    <?php endif; ?>
    <?php if (isset($special) && $special): ?>
        <div class="offer-strip-container">
            <div style="  background-color: rgba(255, 0, 0, 0.7);" class="offer-strip"><?= $text_offer ?></div>
        </div>
    <?php endif ?>
    <?php if (isset($new) && $new): ?>
        <div class="offer-strip-container">
            <div style=" background-color: rgba(126, 211, 1, 0.8);" class="offer-strip"><?= $text_new ?></div>
        </div>
    <?php endif ?>
    <div class="card-body">
        <?php if ($review_status && $rating): ?>
            <div class="rating text-center ">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <?php if ($rating < $i): ?>
                        <span class="fa-stack"><i class="fa-solid fa-star fa-stack-1x"></i></span>
                    <?php else: ?>
                        <span class="fa-stack"><i class="fa-solid fa-star fa-stack-1x"></i><i
                                class="fa-regular fa-star fa-stack-1x"></i></span>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

        <div class="card-title mt-1">
            <a href="<?= $href ?>" class="product-link mt-auto text-primary-emphasis text-center text-decoration-none">
                <h6 class="text-light-emphasis product-name"><?= $this->e($name) ?></h6>
            </a>
        </div>

        <div class="d-flex flex-column align-items-center">
            <div class="d-flex justify-content-center align-items-center">
                <?php if (!$special): ?>
                    <span class="price-new text-muted">
                        <?= $this->e($price) ?>
                    </span>
                <?php else: ?>
                    <span class="price-new me-2">
                        <?= $this->e($special) ?>
                    </span>
                    <span class="price-old text-danger text-decoration-line-through">
                        <?= $this->e($price) ?>
                    </span>
                <?php endif; ?>
            </div>

        </div>

        <div class=" text-center p-3">
            <form method="post" data-oc-toggle="ajax" data-oc-load="<?= $this->e($cart) ?>"
                data-oc-target="#header-cart">
                <input type="hidden" name="product_id" value="<?= $this->e($product_id) ?>" />
                <input type="hidden" name="quantity" value="<?= $this->e($minimum) ?>" />

                <button type="button" class="btn d-none d-md-inline quick-view-button btn-outline-secondary"
                    data-bs-toggle="tooltip" data-targ="<?= $href ?>&quickview=1" title="<?= $button_quick_view ?>">
                    <i class="fa-solid fa-search"></i>
                </button>
                <button type="submit" data-oc-where="cart" formaction="<?= $this->e($add_to_cart) ?>"
                    class="btn btn-secondary" data-bs-toggle="tooltip" title="<?= $this->e($button_cart) ?>">
                    <i class="fa-solid fa-shopping-cart"></i>
                </button>
            </form>
        </div>


    </div>
</div>