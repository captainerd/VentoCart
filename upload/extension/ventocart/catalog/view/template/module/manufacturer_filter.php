<div class="card mb-3">
    <div class="card-header">
        <i class="fa-solid fa-industry"></i>
        <strong><?=$heading_title?></strong>
    </div>

    <form method="get" action="">
        <?php foreach ($filter_manufacturers as $manufacturer): ?>
            <div class="list-group-flush">
                <div class="list-group-item">
                    <div class="form-check">
                        <input type="checkbox" name="manufacturer_id[]" value="<?= $manufacturer['manufacturer_id'] ?>" id="input-manufacturer-filter-<?= $manufacturer['manufacturer_id'] ?>" class="form-check-input manufacturer-checkbox" <?= (in_array($manufacturer['manufacturer_id'], $selected_manufacturers)) ? 'checked' : '' ?>/>
                        <?php if (isset($show_icon) && $show_icon == true):?>
                    <img src="/index.php?route=product/product.getImage&image=<?= $manufacturer['image']; ?>&width=20&height=20" alt="Option Image" class="img-fluid  " style="width: 20px; height: 20px;">

                    <?php endif;?>
                       
                       
                        <label for="input-manufacturer-filter-<?= $manufacturer['manufacturer_id'] ?>" class="form-check-label"><?= $manufacturer['name'] ?></label>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </form>
</div>



<script>
    $(document).ready(function () {
// Catch the form submission
$(".manufacturer-checkbox").on('change', function (event) {


// Prevent the default form submission
event.preventDefault();

// Get the serialized form data
let formData = $(this).closest('form').serialize();
 
// Get the existing URL parameters
let existingGet = window.location.search.substring(1);
// Exclude the leading '?'

// Parse the existing parameters
let existingParams = new URLSearchParams(existingGet);
 existingParams.delete('manufacturer_id[]');

// Parse the form data
let formParams = new URLSearchParams(formData);
 
// Combine existing and form parameters
let combinedParams = new URLSearchParams(existingParams.toString() + '&' + formParams.toString());

// Set the new URL with the updated parameters
let url =  window.location.pathname + '?' + decodeURIComponent(combinedParams.toString());
if (typeof window.handleUrl != 'function')  {
         window.location.href = url;
       } else {
        window.handleUrl(url);
       }
});
});
</script>
