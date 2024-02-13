<div class="card mb-3">
    <div class="card-header">
        <form method="get" action="index.php" class="availability_form">
            <i class="fa-solid fa-circle"></i>
            <strong>Availability</strong>
    </div>

    <?php foreach ($statuses as $availabilityStatus): ?>
        <div class="  list-group-flush">

<div class="list-group-item">
                <div id="filter-availability-group-<?= $availabilityStatus['stock_status_id'] ?>">
                    <div class="form-check">
                        <input type="checkbox" name="filter_availability[]" value="<?= $availabilityStatus['stock_status_id'] ?>" id="input-availability-filter-<?= $availabilityStatus['stock_status_id'] ?>" class="form-check-input availability-checkbox" <?= (in_array($availabilityStatus['stock_status_id'], $selected_availabilities)) ? 'checked' : '' ?>/>
                        <label for="input-availability-filter-<?= $availabilityStatus['stock_status_id'] ?>" class="form-check-label"><?= $availabilityStatus['name'] ?></label>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

 
    </form>
</div>
 
<script>
$(document).ready(function() {
    // Catch the form submission
    $(".availability-checkbox").on('change',  function(event) {
   
        // Prevent the default form submission
        event.preventDefault();

        // Get the serialized form data
        let formData = $(".availability_form").serialize();

        // Get the existing URL parameters
        let existingGet = window.location.search.substring(1); // Exclude the leading '?'
        
        // Parse the existing parameters
        let existingParams = new URLSearchParams(existingGet);

        // Parse the form data
        let formParams = new URLSearchParams(formData);

        // Remove common parameters
        existingParams.delete('filter_availability[]');

        // Combine existing and form parameters
        let combinedParams = new URLSearchParams(existingParams.toString() + '&' + formParams.toString());
   
        // Set the new URL with the updated parameters
         let url = window.location.pathname + '?' + decodeURIComponent(combinedParams.toString());

         if (typeof window.handleUrl != 'function')  {
         window.location.href = url;
       } else {
        window.handleUrl(url);
       }
    });
});
</script>