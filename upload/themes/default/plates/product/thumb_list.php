<form id="form-product" method="post" data-oc-toggle="ajax" data-oc-load="<?= $this->e($action) ?>"
    data-oc-target="#product">
    <div class="row" id="product-list">
        <div class="col-12">
            <div
                class="d-flex flex-column flex-sm-row justify-content-between align-items-start p-3 border-bottom product-row">

                <!-- Product Image -->
                <div class="me-3 mb-2 mb-sm-0 product-image" style="flex: 0 0 60px;">
                    <?php
                    $mediaExtension = pathinfo($thumb, PATHINFO_EXTENSION);
                    $isVideo = in_array($mediaExtension, ['mp4', 'avi', 'mkv']);
                    if ($isVideo): ?>
                        <video class="img-thumbnail" style="max-width: 40px; display: block;">
                            <source src="<?= $thumb ?>" type="video/<?= $mediaExtension ?>">
                            Your browser does not support the video tag.
                        </video>
                    <?php else: ?>
                        <img src="<?= $thumb ?>" alt="<?= $this->e($name) ?>" class="img-thumbnail"
                            style="max-width: 40px; display: block;">
                    <?php endif; ?>
                </div>


                <!-- Product details -->
                <div class="d-flex flex-column flex-sm-row w-100 justify-content-between align-items-start">

                    <!-- Product name -->
                    <div class="product-col product-name mb-2 mx-2 mb-sm-0"
                        style="flex: 1 1 100%; word-wrap: break-word; overflow-wrap: break-word;">
                        <a title="<?= $this->e($name) ?>" href="<?= $href ?>"
                            class="text-decoration-none"><?= $this->e($name) ?></a>
                    </div>

                    <!-- Product Description -->
                    <div class="product-col product-description mb-2 mx-2 mb-sm-0"
                        style="flex: 2 1 100%; word-wrap: break-word; overflow-wrap: break-word;">
                        <span><?= $this->e($description) ?></span>
                    </div>

                    <!-- Add to Cart Button -->
                    <div class="product-col add-to-cart text-center mb-2 mx-2 mb-sm-0" style="flex: 1 1 20%;">
                        <form method="post" data-oc-toggle="ajax" data-oc-load="<?= $this->e($cart) ?>"
                            data-oc-target="#header-cart">
                            <input type="hidden" name="product_id" value="<?= $this->e($product_id) ?>" />
                            <input type="hidden" name="quantity" value="<?= $this->e($minimum) ?>" />
                            <button type="submit" data-oc-where="cart" formaction="<?= $this->e($add_to_cart) ?>"
                                class="btn btn-secondary" data-bs-toggle="tooltip"
                                title="<?= $this->e($button_cart) ?>">
                                <i class="fa-solid fa-shopping-cart"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>