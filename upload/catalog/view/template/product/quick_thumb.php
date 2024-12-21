<?php
$videoExtensions = ['mp4', 'avi', 'mkv'];
$mediaExtension = pathinfo($thumb, PATHINFO_EXTENSION);
$isVideo = in_array($mediaExtension, $videoExtensions);
?>
<div class=" p-1 bg-white thumbnail-container border">
    <?php if ($isVideo): ?>
        <a href="<?= $href ?>" class="product-link text-center text-decoration-none">
            <video style="object-fit: cover;" class="product-thumb" muted loop>
                <source src="<?= $thumb ?>" type="video/<?= $mediaExtension ?>">
                Your browser does not support the video tag.
            </video>
        </a>
    <?php else: ?>
        <a href="<?= $href ?>" class="product-link text-center text-decoration-none">
            <img class="img-fluid product-thumb" src="<?= $thumb ?>" alt="<?= $this->e($name) ?>" />
        </a>
    <?php endif; ?>

    <div class="card-body text-center">
        <a href="<?= $href ?>" class="product-link text-primary-emphasis text-decoration-none">
            <h6 class="text-light-emphasis product-name"><?= $this->e($name) ?></h6>
        </a>
    </div>
</div>