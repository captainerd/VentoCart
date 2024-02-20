
<form id="payment-shipping-method-form"> 
 
 
<div id="checkout-shipping-method" class="mb-3">
   
 
    <h3><i class="fas fa-shipping-fast"></i> <?= $this->e($heading_title ) ?></h3>
    <div class="shipping-methods">
        <!--<p><?= $this->e($text_shipping ) ?></p>-->
 
      <div id="shipping-methods-container" class="form-check   form-switch form-switch-lg  ">
        <!-- Shipping methods will be dynamically populated here -->
        <?= $this->e($fill_the_form ) ?>
      </div>
  
      <div class="text-end">
       <!-- <button type="submit" id="form-shipping-method-btn" class="btn btn-primary"><?= $this->e($button_continue ) ?></button>--> 
      </div>
    </div> 
    
    <input type="hidden" name="shipping_method_pre" value="<?= $this->e($code_shipping ) ?>" id="input-shipping-code" />
 
    <div id="error-shipping-method" class="invalid-feedback"></div>
 
 
</div>
 
 
  <div id="checkout-payment-method" class="mb-3"> 
   
 
   
    <h3 id="paytitle"><i class="fas fa-credit-card"></i> <?= $this->e($text_payment_method  ) ?></h3>
      <!-- <p><?= $this->e($text_payment  ) ?></p>-->
    <div  >
    
     
    </div>
  

    <div id="payment-methods-container"  class="form-check   form-switch form-switch-lg  ">
      <!-- Payment methods will be dynamically populated here -->
      <?= $this->e($fill_the_form ) ?>
    </div>
    <input type="hidden" name="payment_method_pre" value="<?= $this->e($code_payment ) ?>" id="input-payment-code"/>
    <div id="error-payment-method" class="invalid-feedback"></div>
 
  
 
</div>
</form>
  