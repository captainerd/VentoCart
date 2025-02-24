<form id="price-filter-form" method="get" action="index.php">
    <div class="card mb-3">
        <div class="card-header p-3">
            <i class="fa-solid fa-dollar-sign"></i>
            <strong><?= $text_price_filter ?></strong>
        </div>
        <div class="list-group-flush">
            <div class="list-group-item p-3">
                <div class="mb-3">
                    <label for="price-min" class="form-label"><?= $text_min_price ?></label>
                    <input type="number" name="pricemin" id="price-min" class="form-control" placeholder="Min Price"
                        value="<?= isset($minprice) ? (float) $minprice : '' ?>" min="0">
                </div>
                <div class="mb-3">
                    <label for="price-max" class="form-label"><?= $text_max_price ?></label>
                    <input type="number" name="pricemax" id="price-max" class="form-control" placeholder="Max Price"
                        value="<?= isset($maxprice) ? (float) $maxprice : '' ?>" min="0">
                </div>
                <a id="price-update" class="btn btn-primary w-100"><?= $button_update_price ?></a>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function () {
        $("#price-update").on('click', function () {
            // Get user input values
            event.preventDefault();
            let minPrice = $("#price-min").val().trim();
            let maxPrice = $("#price-max").val().trim();

            // Get existing URL parameters
            let urlParams = new URLSearchParams(window.location.search);

            // Remove old price filter
            urlParams.delete('pricerange');

            // Add new price filter if both values exist

            urlParams.set('pricerange', minPrice + '-' + maxPrice);


            // Construct the new URL
            let newUrl = window.location.pathname + '?' + decodeURIComponent(urlParams.toString());


            if (typeof window.handleUrl != 'function') {
                window.location.href = newUrl;
            } else {

                window.handleUrl(newUrl);
            }
        });
    });

</script>