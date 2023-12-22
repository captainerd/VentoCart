<?=  $header   ?>
 <style>
 .ui-menu {

max-height: 250px;
overflow-y: auto;
overflow-x: hidden;
z-index: 1000;
 }
 
 </style>
  
 <div id="checkout-checkout" class="container"> 
  
  <div id="overlay_loaderv" class="overlay">
    <div id="overlay_loader"  >
      Loading... <i class="fas spinner-checkout fa-spinner fa-pulse"></i>
    </div>
  </div>
<style>
  .overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  color:#080808;
  font-size:  2rem; 
  height: 100%;
  background-color: rgba(255, 255, 255, 0.914);  
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;  
}

/* Spinner style */
.spinner-checkout {
  
  color: #e94a4a; 
  font-size:  5rem;  
  border-radius: 10px;  
  padding: 20px;  
  text-align: center;  
}

/* Centered spinner icon */
.spinner-checkout i {
  font-size: 48px;  
}
</style>  
  
 
 
  <div class="row"><?=  $column_left   ?>
    <div id="content" class="col"><?=  $content_top   ?>
      <h1><?= $this->e($heading_title ) ?></h1>
    
      <div class="row">
       
    <?php if ($register || $payment_address || $shipping_address): ?>

          <div class="col-md-6 mb-3">
         
            <?php if ($register): ?>
              <div id="checkout-register"><?=  $register   ?></div>
            <?php endif; ?>
            <?php if ($payment_address): ?>
              <div id="checkout-payment-address"><?=  $payment_address  ?></div>
            <?php endif; ?>
            <?php if ($shipping_address): ?>
              <div id="checkout-shipping-address"><?=  $shipping_address   ?></div>
            <?php endif; ?>
            <?php if (!$register): ?>
           
            <?=  $coupon   ?> 
       
            <?php endif; ?>
          </div>
        <?php endif; ?>
        <div class="col">
       
    
 
      <?=  $shipping_payment_methods   ?> 
         
          <?php if ($register): ?>
   
          <?=  $coupon  ?> 
        
          <?php endif; ?>
      
        </div>
        
   
      </div>
   
    
      
    </div>
    <div id="checkout-payment">
         
      <?=  $payment  ?>
     </div>

    <?=  $content_bottom  ?>
    <div id="checkout-confirm" class="mb-3"> <?=  $confirm   ?> </div>
<div style="display: flex;">
  
  <button type="button" style="flex-grow: 1;" id="button-confirm" class="btn btn-success ">
    -
  
  </button>
</div>

      
  </div>
  <?=  $column_right  ?>
</div>
<?=  $footer ?>
 <style>
 #button-confirm {
  width: 100%;
 }
 </style>
<script type="text/javascript"> 
 
  $(document).ready(function() {
    $("#checkout-payment").html('');
    window.btntxt = "<?= $this->e($button_confirm ) ?>";
 //   $('#button-confirm').hide();

   
  });


  window.onload = function() {
    var spinner = document.getElementById('overlay_loaderv');
  if (spinner) {
    spinner.style.display = 'none'; // Hide the spinner
  }

  }
</script>