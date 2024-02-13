<div class="container text-right">
  <fieldset>
  
    
    <div style="max-width: 300px; margin-left: auto;" class="mb-3 required">
      <legend><?=$text_captcha ?></legend>
      <input class="<?=$feedback_class?>" type="hidden" name="<?=$feedback_name?>" value="">
      <label for="input-captcha" class="form-label"><?=$entry_captcha ?></label>
      <input type="text" name="captcha" value="" id="input-captcha" class="form-control mb-1"/>

      <!-- Reload Icon and Captcha Image -->
      <div class="input-group">
        <div id="captcha">
          <img src="index.php?route=extension/ventocart/captcha/basic.captcha" alt=""/>
        </div>
       <a class="btn btn-secondary btn-sm" id="reload-icon" >  <i  style="font-size: 17px;" class="fas mt-1 fa-sync-alt" style="cursor: pointer;"></i></a>
      </div>

      <div id="error-captcha" class="invalid-feedback"></div>
    </div>
  </fieldset>
</div>


 
<script>
$(document).ready(function() {
    // Reload captcha image on icon click
    $('#reload-icon').on('click', function() {
    
        // You might want to add logic here to change the captcha image source
        $('#captcha img').attr('src', 'index.php?route=extension/ventocart/captcha/basic.captcha&image=' + Math.floor(Math.random() * 100000000));
    });

    var feedbackCounter = 0;
    $('body').on('keydown', function() {
        feedbackCounter++;
        if (feedbackCounter > 15) {
            $(".{{feedback_class?>").val('{{feedback?>');
        }
    });
   
 
});
</script>