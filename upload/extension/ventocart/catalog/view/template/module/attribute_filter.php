 
 
 
 
<?php foreach ($filter_attributes as $attributeSet): ?>
    <?php $formid = uniqid();?>
    <form method="get" action="index.php" id="<?=$formid?>">
    <div class="card  mb-3">
        
        <div class="card-header">
  
            <i class="fa-solid fa-tags"></i>
           
                <strong><?= $attributeSet['name'] ?> </strong>
            </div>


            <?php foreach ($attributeSet['values'] as $index => $attribute): ?>


                <div class="  list-group-flush">

<div class="list-group-item">
                        <div> 
                            <div class="form-check">
                                <input type="checkbox" name="filter_attribute[<?= $attribute ?>][<?=$attributeSet['pos']?>][<?=$attributeSet['attribute_id']?>]" value="<?= $attribute['name'] ?>" 
                                id="input-attribute-filter-<?= str_replace(' ','',$index) ?>-<?=str_replace(' ','',$formid)?>" class="form-check-input  attribute-checkbox" 
                                <?= (!empty($selected_attributes) && in_array($attributeSet['pos']."-".$attributeSet['attribute_id']."-".$attribute['name'] , $selected_attributes)) ? 'checked' : '' ?>/>
                
                                <label for="input-attribute-filter-<?= str_replace(' ','',$index) ?>-<?=str_replace(' ','',$formid)?>" class="form-check-label"><?= $attribute['name']  ?> (<?= $attribute['product_count']  ?>)</label>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
    
 
    
 
         
    </div>
    </form>
<?php endforeach; ?>
 

 
<script>
$(document).ready(function() {
    // Catch the form submission
    $(".attribute-checkbox").on('change',  function(event) {
    

   
        // Prevent the default form submission
        event.preventDefault();

        // Get the serialized form data
        let formData = $(this).closest('form').serialize();
      
        // Get the existing URL parameters
        let existingGet = window.location.search.substring(1); // Exclude the leading '?'
        
        // Parse the existing parameters
        let existingParams = new URLSearchParams(existingGet);
        existingParams.delete($(this).attr('name'));
 
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