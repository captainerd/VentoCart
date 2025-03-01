<?php
$videoExtensions = ['mp4', 'avi', 'mkv'];
$mediaExtension = pathinfo($thumb, PATHINFO_EXTENSION);
$isVideo = in_array($mediaExtension, $videoExtensions);
if (!isset($poster)) {
    $poster = '';
}
?>
<div class=" p-1 bg-white thumbnail-container border">
    <div>
        <?php if ($isVideo): ?>
            <a href="<?= $href ?>" class="product-link text-center text-decoration-none">
                <video poster="<?= $poster ?>" style="object-fit: cover;" class="product-thumb" muted loop>
                    <source src="<?= $thumb ?>" type="video/<?= $mediaExtension ?>">
                    Your browser does not support the video tag.
                </video>
            </a>
        <?php else: ?>
            <a href="<?= $href ?>" class="product-link text-center text-decoration-none">
                <img class="img-fluid product-thumb" data-splide-lazy="<?= $thumb ?>" alt="<?= $this->e($name) ?>" />
            </a>
        <?php endif; ?>
    </div>
    <?php if (isset($special) && $special): ?>
        <div class="offer-strip-container">
            <div style="  background-color: rgba(255, 0, 0, 0.7);" class="offer-strip"><?= $text_offer ?></div>
        </div>
    <?php endif ?>
    <?php if (isset($new) && $new && (isset($special) && !$special)): ?>
        <div class="offer-strip-container">
            <div style=" background-color: rgba(126, 211, 1, 0.8);" class="offer-strip"><?= $text_new ?></div>
        </div>
    <?php endif ?>
    <div class="card-body text-center">
        <a href="<?= $href ?>" class="product-link text-primary-emphasis text-decoration-none">
            <h6 class="text-light-emphasis px-1 product-name"><?= $this->e($name) ?></h6>
        </a>
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
    <div class="buttons-overlay">
        <form method="post" data-oc-toggle="ajax" data-oc-load="<?= $this->e($cart) ?>" data-oc-target="#header-cart">
            <input type="hidden" name="product_id" value="<?= $this->e($product_id) ?>" />
            <input type="hidden" name="quantity" value="<?= $this->e($minimum) ?>" />


            <button type="submit" data-oc-where="cart" formaction="<?= $this->e($add_to_cart) ?>"
                class="btn btn-secondary" title="<?= $this->e($button_cart) ?>">
                <i class="fa-solid fa-shopping-cart"></i>
            </button>
        </form>
    </div>
</div>