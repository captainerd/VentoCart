<div class="card shadow mb-4">
    <div class="card-body">
        <div class="splide" id="<?= $this->e($carousel_id) ?>">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($photos as $photo): ?>
                        <li class="splide__slide text-center">
                            <img src="<?= $this->e($photo) ?>" class="img-fluid rounded" alt="Photo">
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('#<?= $this->e($carousel_id) ?>', {
            type: 'loop',
            perPage: <?= $perPage ?>,
            autoplay: true,
            interval: 4000,
            arrows: true,
            pagination: true,

        }).mount();
    });
</script>