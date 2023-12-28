<form method="post" data-oc-toggle="ajax" data-oc-load="<?= $this->e($cart) ?>" data-oc-target="#header-cart">
    <div class="product-formxx mx-auto">
        <a class="prodclick" href="<?= $href ?>">
            <div class="product-thumb picview-container img-zoom-container">
 
                <?php
                $videoExtensions = ['mp4', 'avi', 'mkv'];
                $popupExtension = pathinfo($thumb, PATHINFO_EXTENSION);
                $isVideo = in_array($popupExtension, $videoExtensions);

                ?>

                <?php if ($isVideo): ?>

                    <video class="thumbvid autoplayHover" muted loop>
                        <source src="<?= $thumb ?>" type="video/<?= $popupExtension ?>">
                        Your browser does not support the video tag.
                    </video>
                    
                    <div class="play-overlay">
                        <i class="fas fa-play"></i>
                    </div>

                <?php else: ?>
                    <img class="img-zoom" src="<?= $thumb ?>" alt="<?= $this->e($name) ?>" />

                <?php endif; ?>

                <div class="product-buttonsov">
                    <div class="product-buttons">
                        <button type="button" class="quick-view-button" data-bs-toggle="tooltip"
                            targ="<?= $href ?>&quickview=1" title="Quick view"><i
                                class="fa-solid fa-search"></i></button>
                        <button type="submit" data-oc-where="cart" formaction="<?= $this->e($add_to_cart) ?>"
                            data-bs-toggle="tooltip" title="<?= $this->e($button_cart) ?>"><i
                                class="fa-solid fa-shopping-cart"></i></button>
                    </div>
                </div>
            </div>
        </a>

        <div class="product-contentxx">
            <div class="title-desc">
                <h4><a href="<?= $href ?>">
                        <?= $name ?>
                    </a></h4>
                <p>
                    <?= $description ?>
                </p>
            </div>
            <input type="hidden" name="product_id" value="<?= $this->e($product_id) ?>" />
            <input type="hidden" name="quantity" value="<?= $this->e($minimum) ?>" />
            <div class="product-price">
                <!-- Add the price display here -->
                <?php if (!$special): ?>
                    <span class="price-new">
                        <?= $this->e($price) ?>
                    </span>
                <?php else: ?>
                    <span class="price-new">
                        <?= $this->e($special) ?>
                    </span> <span class="price-old">
                        <?= $this->e($price) ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</form>
