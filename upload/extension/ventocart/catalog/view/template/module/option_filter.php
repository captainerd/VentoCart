<?php foreach ($filter_options as $optionSet): ?>
  <form method="get" action=" " class="option_form">
  <div class="card  mb-3">
   
      <?php foreach ($optionSet as $option): ?>
        <?php if ($option['option_n'] == -1): ?>
          <div class="card-header">
            <i class="fa-solid fa-list-alt"></i>
            <strong>
              <?= $option['name'] ?>
            </strong>
          </div>
      <?php else: ?>
          <div class="  list-group-flush">

            <div class="list-group-item">
              <div id="filter-option-group-<?= $option['option_id'] ?>">
                <div class="form-check">
                  <input type="checkbox" name="filter_option[]" value="<?= $option['option_id'] ?>" id="input-option-filter-<?= $option['option_id'] ?>" class="form-check-input option-checkbox" <?= (in_array($option['option_id'], $selected_options)) ? 'checked' : '' ?>/>
                  <label for="input-option-filter-<?= $option['option_id'] ?>" class="form-check-label">
                  <?php if (  !empty($option['image'])):?> 
                    <img src="/index.php?route=product/product.getImage&image=<?= $option['image']; ?>&width=20&height=20" alt="Option Image" class="img-fluid  " style="width: 20px; height: 20px;">

                    <?php endif;?>

                  <?= $option['name'] ?></label>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    
  </div>
  </form>
<?php endforeach; ?>

<script>
$(document).ready(function() {
    // Catch the form submission
    $(".option-checkbox").on('change',  function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Get the serialized form data
        let formData = $(".option_form").serialize();
  
        // Get the existing URL parameters
        let existingGet = window.location.search.substring(1); // Exclude the leading '?'
        
        // Parse the existing parameters
        let existingParams = new URLSearchParams(existingGet);
        existingParams.delete('filter_option[]');
        // Parse the form data
        let formParams = new URLSearchParams(formData);
 

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