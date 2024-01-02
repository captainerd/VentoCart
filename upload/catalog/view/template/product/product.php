<?php if (!$quickview): ?> 
<?=  $header  ?> 
 
<?php endif; ?>


<link href='https://fonts.googleapis.com/css?family=Aldrich' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="/catalog/view/stylesheet/photoswipe.css">
  <link rel="stylesheet" href="/catalog/view/stylesheet/splider.css">
  <div id="product-info" class="container">
 
  <div class="row">

    <?php if (!$quickview): ?> 

    <?=  $column_left   ?>
  
    <div id="content" class="col">

    <?= $breadcrumb  ?>
 
      <?=  $content_top   ?>

      <?php endif; ?>

      
      <div class="row mb-3">

        <?php if ($thumb || $images): ?>
          <div class="col-sm-5">
            <div   class="image magnific-popup">
              <div   class="img-zoom-container picview-container"  style="max-height: <?=$picont_width?>px;" id="mainpic"> 
 
          

              <?php if ($thumb): ?>

                <?php
$videoExtensions = ['mp4', 'avi', 'mkv'];
$popupExtension = pathinfo($popup, PATHINFO_EXTENSION);
$isVideo = in_array($popupExtension, $videoExtensions);
 
?>

 
                <div id="videoContainer"    <?php if (!$isVideo): ?>style="display:none" <?php endif; ?>>
            <video   style="   <?php if (!$isVideo): ?> display:none; <?php endif; ?>" controls  autoplay muted >
                    <source <?php if ($isVideo): ?>src="<?=$thumb?>" <?php endif; ?> >
                    Your browser does not support the video tag.
                </video>
            </div>


                <div id="pictureContainer" style="<?php if ($isVideo): ?> display:none; <?php endif; ?> " >
                <a href="<?= $popup  ?>"      data-pswp-width="800" data-pswp-height="800" title="<?= $this->e($heading_title ) ?>">
                
                <img   src="<?=  $thumb   ?>" title="<?= $this->e($heading_title ) ?>" alt="<?= $this->e($heading_title ) ?>" class="img-thumbnailz magnifyglass img-zoom mb-3"/></a>
                <div class="magnifying-glass"></div>
              
              </div>
            
                <?php endif; ?>
          
          
            </div>
            
              <?php if ($images): ?>
                
              <div class="btnslide-container"> 
                <div class="slider-container ">
                  <ul id="custom-slider "> 
                  <?php foreach ($images as $image): ?>
    <li>
          <?php
            $fileExtension = pathinfo($image['popup'], PATHINFO_EXTENSION);
            $isVideo = in_array($fileExtension, ['avi', 'mkv', 'mp4']);
            ?>



            <?php if ($isVideo): ?>
                <!-- Video Thumbnail -->
                <a data-pswp-width="800" data-pswp-height="800" data-pswp-type="video" href="<?= $image['popup'] ?>" title="<?= $this->e($heading_title) ?>">
             
              
                <video class="img-thumbnailz splider-image" style="width:<?=$thumb_width?>px; height:<?=$thumb_height?>px; object-fit: cover;">
                    <source src="<?= $this->e($image['popup']) ?>" type="video/<?= $fileExtension ?>">
                    Your browser does not support the video tag.
                </video>
            <?php else: ?>
              <a data-pswp-width="800" data-pswp-height="800"  href="<?= $image['popup'] ?>" title="<?= $this->e($heading_title) ?>">
             
                <!-- Image -->
                <img   draggable="false" src="<?= $this->e($image['thumb']) ?>" title="<?= $this->e($heading_title) ?>" alt="<?= $this->e($heading_title) ?>" class="img-thumbnailz splider-image"/>
            <?php endif; ?>
        </a>
    </li> &nbsp;
<?php endforeach; ?>
                  </ul>
                </div>
                <button  class="scroll-button left"  id="scrollleft">
                  <i class="fas fa-chevron-left"></i>
                </button>
                <button class="scroll-button right"   id="scrollright" >
                  <i class="fas fa-chevron-right"></i>
                </button>
              </div>
              
                
              <?php endif; ?>

            </div>
          </div>
        <?php endif; ?>

        <div class="col-sm">
          <h3><b><?=  $heading_title ?></b></h3>
          <form method="post" data-oc-toggle="ajax" >
            <div class="btn-group" style="float: right">
              
              <button type="submit" formaction="<?= $this->e($add_to_wishlist ) ?>" data-bs-toggle="tooltip" class="btn btn-light" title="<?= $this->e($button_wishlist ) ?>"><i class="fa-solid fa-heart"></i></button>
              <button type="submit" formaction="<?= $this->e($add_to_compare ) ?>" data-bs-toggle="tooltip" class="btn btn-light" title="<?= $this->e($button_compare ) ?>"><i class="fa-solid fa-arrow-right-arrow-left"></i></button>
            </div>
            <input type="hidden" name="product_id" value="<?= $this->e($product_id ) ?>" />
          </form>
            <?php if ($price): ?>
              <ul class="list-unstyled">
                <?php if (!$special): ?>
                  <li>
                    <h3><span class="price-new price-calc"><?= $this->e($price ) ?></span></h3>
                  </li>
                <?php else: ?>

    
                  <li><span class="price-old"><?= $this->e($price ) ?></span></li>
 
                  <li><h3><span class="price-new  price-calc price-offer"><?= $this->e($special ) ?> </span>   </h3>
                
                <?php if (isset($special_ends) && $special_ends !== '0000-00-00' && strtotime($special_ends) > time()): ?>
            <h4><b> <span class="alert-danger"> <?php if (isset($special_off)):?> -%<?= $special_off ?> Off - <?php endif;?><?= $text_ends_in?>:</span> 
              <span  class="text-danger" id="coundown"> <?= $special_ends ?> </span></b></h4>
               <?php endif; ?>

                </li>
                <?php endif; ?>
          
                <?php if ((isset($tax) && $tax != $price) && (isset($tax) && isset($special) && $tax != $special)): ?>
                  <li><?= $this->e($text_tax ) ?> <span id="exTaxTxt"><?= $this->e($tax ) ?> </span></li> 
            
                <?php endif; ?>
          
                <?php if ($points): ?>
                  <li><?= $this->e($text_points ) ?> <?= $this->e($points ) ?></li>
                <?php endif; ?>
          
                <?php if ($discounts): ?>
                  <li>
                    <hr>
                  </li>
                  <?php foreach ($discounts as $discount): ?>
                    <li><?= $this->e($discount['quantity']) ?><?= $this->e($text_discount ) ?><?= $this->e($discount['price']) ?></li>
                  <?php endforeach; ?>
                <?php endif; ?>
              </ul>
            <?php endif; ?>
          
         
            
         
     
        
     
          <div id="product">
            <form id="form-product">
              <?php if ($options): ?>
            <hr>
              <h4><?= $this->e($text_option ) ?></h4>
              <div>
                <?php foreach ($options as $option): ?>

                  <?php if ($option['type'] == 'select'): ?>
                    <div class="mb-3<?php if ($option['required']): ?> required<?php endif; ?>">
                      <label for="input-option-<?= $this->e($option['product_option_id']) ?>" class="form-label"><?= $this->e($option['name']) ?>:</label>
                      <select 
                      data-name="<?= $this->e($option['name']) ?>" 
                      name="option[<?= $this->e($option['product_option_id']) ?>]" 
                      id="input-option-<?= $this->e($option['product_option_id']) ?>" 
                      data-spanid="txt-<?= $this->e($option['product_option_id']) ?>" 
                      class="form-select">
                        <option value=""><?= $this->e($text_select ) ?></option>
                        <?php foreach ($option['product_option_value'] as $option_value): ?>
                          <option 
                          data-price="<?= $this->e($option_value['price']) ?>" 
                          data-priceprefix="<?= $this->e($option_value['price_prefix']) ?>" 
                          <?php if ($option_value['stock'] == 0): ?>disabled="disabled"<?php endif; ?> 
                          value="<?= $this->e($option_value['product_option_value_id']) ?>"><?= $this->e($option_value['name']) ?>
                            <?php if ($option_value['price']): ?>
                             <!--  (<?= $this->e($option_value['price_prefix']) ?><?= $this->e($option_value['price']) ?>) -->
                            <?php endif; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div id="error-option-<?= $this->e($option['product_option_id']) ?>" class="invalid-feedback"></div>
                    </div>
                  <?php endif; ?>

                  <?php if ($option['type'] == 'radio'): ?>
                    <div class="mb-3<?php if ($option['required']): ?> required<?php endif; ?>">
                      <b class="form-label"><?= $this->e($option['name']) ?>: <span id="txt-<?= $this->e($option['option_id']) ?>" ></span></b>
                      <div id="input-option-<?= $this->e($option['product_option_id']) ?>">
                        <?php foreach ($option['product_option_value'] as $option_value): ?>
                        <div class="form-check-product "> 
                          <input  
                          data-spanid="txt-<?= $this->e($option['option_id']) ?>" 
                          data-name="<?= $this->e($option['name']) ?>"  
                          data-price="<?= $this->e($option_value['price']) ?>" 
                          data-priceprefix="<?= $this->e($option_value['price_prefix']) ?>" 
                          type="radio" 
                          name="option[<?= $this->e($option['product_option_id']) ?>]" 
                          value="<?= $this->e($option_value['product_option_value_id']) ?>" 
                          id="input-option-value-<?= $this->e($option_value['product_option_value_id']) ?>" 
                          <?php if ($option_value['stock'] == 0): ?>disabled="disabled"<?php endif; ?>
                          class="form-check-product-input"/>
                        
                          <?php if ($option_value['image']): ?>
                            <label for="input-option-value-<?= $this->e($option_value['product_option_value_id']) ?>" class="image-option"  data-text="<?= $this->e($option_value['name']) ?>">
                              <img src="<?= $this->e($option_value['image']) ?>" alt="<?= $this->e($option_value['name']) ?>" class="img-thumbnailz"/>
                             
                            </label>
                          <?php else: ?>
                            <label for="input-option-value-<?= $this->e($option_value['product_option_value_id']) ?>" class="form-check-product-label"   data-text="<?= $this->e($option_value['name']) ?>">
                              <?= $this->e($option_value['name']) ?>
                              <?php if ($option_value['price']): ?>

                                <!-- (<?= $this->e($option_value['price_prefix']) ?><?= $this->e($option_value['price']) ?>)  -->
                              <?php endif; ?>
                            </label>
                          <?php endif; ?>
                        </div>
                      <?php endforeach; ?>
                      </div>
                      <div id="error-option-<?= $this->e($option['product_option_id']) ?>" class="invalid-feedback"></div>
                    </div>
                  <?php endif; ?>

                  <?php if ($option['type'] == 'checkbox'): ?>
                    <div class="mb-3 <?php if ($option['required']): ?> required<?php endif; ?>">
                    <b class="form-label"><?= $this->e($option['name']) ?>:  <span id="txt-<?= $this->e($option['option_id']) ?>" ></span></b>
                    <div id="input-option-<?= $this->e($option['product_option_id']) ?>">
                      <?php foreach ($option['product_option_value'] as $option_value): ?>
                        <div class="form-check form-check-inline">
                          <input
                            data-spanid="txt-<?= $this->e($option['option_id']) ?>"
                            data-name="<?= $this->e($option['name']) ?>"
                            data-price="<?= $this->e($option_value['price']) ?>"
                            data-priceprefix="<?= $this->e($option_value['price_prefix']) ?>"
                            type="checkbox"
                            <?php if ($option_value['stock'] == 0): ?>disabled="disabled"<?php endif; ?>
                            name="option[<?= $this->e($option['product_option_id']) ?>][]"
                            value="<?= $this->e($option_value['product_option_value_id']) ?>"
                            id="input-option-value-<?= $this->e($option_value['product_option_value_id']) ?>"
                            class="form-check-input form-check-input-product"
                          />
                          <label   for="input-option-value-<?= $this->e($option_value['product_option_value_id']) ?>" class="form-check-label">
                            <?php if (!empty($option_value['image'])): ?>
                              <img
                                src="<?= $this->e($option_value['image']) ?>"
                                alt="<?= $this->e($option_value['name']) ?> <?php if ($option_value['price']): ?><?= $this->e($option_value['price_prefix']) ?> <?= $this->e($option_value['price']) ?><?php endif; ?>"
                                class="img-thumbnailz"
                              />
                            <?php endif; ?>
                            <?= $this->e($option_value['name']) ?>
                            <?php if ($option_value['price']): ?>
                               <!-- (<?= $this->e($option_value['price_prefix']) ?><?= $this->e($option_value['price']) ?>)  -->
                            <?php endif; ?> 
                          </label>
                        </div>
                      <?php endforeach; ?>
                    </div>
                    <div id="error-option-<?= $this->e($option['product_option_id']) ?>" class="invalid-feedback"></div>
                  </div>
                  
                  <?php endif; ?>

                  <?php if ($option['type'] == 'text'): ?>
                    <div class="mb-3<?php if ($option['required']): ?> required<?php endif; ?>">
                      <label for="input-option-<?= $this->e($option['product_option_id']) ?>" class="form-label"><?= $this->e($option['name']) ?>:</label>
                      <input type="text" name="option[<?= $this->e($option['product_option_id']) ?>]" value="<?= $this->e($option['value']) ?>" placeholder="<?= $this->e($option['name']) ?>" id="input-option-<?= $this->e($option['product_option_id']) ?>" class="form-control"/>
                      <div id="error-option-<?= $this->e($option['product_option_id']) ?>" class="invalid-feedback"></div>
                    </div>
                  <?php endif; ?>

                  <?php if ($option['type'] == 'textarea'): ?>
                    <div class="mb-3<?php if ($option['required']): ?> required<?php endif; ?>">
                      <label for="input-option-<?= $this->e($option['product_option_id']) ?>" class="form-label"><?= $this->e($option['name']) ?>:</label>
                      <textarea name="option[<?= $this->e($option['product_option_id']) ?>]" rows="5" placeholder="<?= $this->e($option['name']) ?>" id="input-option-<?= $this->e($option['product_option_id']) ?>" class="form-control"><?= $this->e($option['value']) ?></textarea>
                      <div id="error-option-<?= $this->e($option['product_option_id']) ?>" class="invalid-feedback"></div>
                    </div>
                  <?php endif; ?>

                  <?php if ($option['type'] == 'file'): ?>
                    <div class="mb-3<?php if ($option['required']): ?> required<?php endif; ?>">
                      <label for="button-upload-<?= $this->e($option['product_option_id']) ?>" class="form-label"><?= $this->e($option['name']) ?>:</label>
                      <div>
                        <button type="button" id="button-upload-<?= $this->e($option['product_option_id']) ?>" data-oc-toggle="upload" data-oc-url="<?= $this->e($upload ) ?>" data-oc-target="#input-option-<?= $this->e($option['product_option_id']) ?>" data-oc-size-max="<?= $this->e($config_file_max_size ) ?>" data-oc-size-error="<?= $this->e($error_upload_size ) ?>" class="btn btn-light btn-block"><i class="fa-solid fa-upload"></i> <?= $this->e($button_upload ) ?></button>
                        <input type="hidden" name="option[<?= $this->e($option['product_option_id']) ?>]" value="" id="input-option-<?= $this->e($option['product_option_id']) ?>"/>
                      </div>
                      <div id="error-option-<?= $this->e($option['product_option_id']) ?>" class="invalid-feedback"></div>
                    </div>
                  <?php endif; ?>

                  <?php if ($option['type'] == 'date'): ?>
                    <div class="mb-3<?php if ($option['required']): ?> required<?php endif; ?>">
                      <label for="input-option-<?= $this->e($option['product_option_id']) ?>" class="form-label"><?= $this->e($option['name']) ?>:</label>
                      <div class="input-group">
                        <input type="text" name="option[<?= $this->e($option['product_option_id']) ?>]" value="<?= $this->e($option['value']) ?>" id="input-option-<?= $this->e($option['product_option_id']) ?>" class="form-control date"/>
                        <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
                      </div>
                      <div id="error-option-<?= $this->e($option['product_option_id']) ?>" class="invalid-feedback"></div>
                    </div>
                  <?php endif; ?>

                  <?php if ($option['type'] == 'datetime'): ?>
                    <div class="mb-3<?php if ($option['required']): ?> required<?php endif; ?>">
                      <label for="input-option-<?= $this->e($option['product_option_id']) ?>" class="form-label"><?= $this->e($option['name']) ?>:</label>
                      <div class="input-group">
                        <input type="text" name="option[<?= $this->e($option['product_option_id']) ?>]" value="<?= $this->e($option['value']) ?>" id="input-option-<?= $this->e($option['product_option_id']) ?>" class="form-control datetime"/>
                        <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
                      </div>
                      <div id="error-option-<?= $this->e($option['product_option_id']) ?>" class="invalid-feedback"></div>
                    </div>
                  <?php endif; ?>

                  <?php if ($option['type'] == 'time'): ?>
                    <div class="mb-3<?php if ($option['required']): ?> required<?php endif; ?>">
                      <label for="input-option-<?= $this->e($option['product_option_id']) ?>" class="form-label"><?= $this->e($option['name']) ?>:</label>
                      <div class="input-group">
                        <input type="text" name="option[<?= $this->e($option['product_option_id']) ?>]" value="<?= $this->e($option['value']) ?>" id="input-option-<?= $this->e($option['product_option_id']) ?>" class="form-control time"/>
                        <div class="input-group-text"><i class="fa-regular fa-calendar"></i></div>
                      </div>
                      <div id="error-option-<?= $this->e($option['product_option_id']) ?>" class="invalid-feedback"></div>
                    </div>
                  <?php endif; ?>

                <?php endforeach; ?>
                <?php endif; ?>

                <?php if ($subscription_plans): ?>
                  <hr/>
                  <h3><?= $this->e($text_subscription ) ?></h3>
                  <div class="mb-3 required">

                    <select name="subscription_plan_id" id="input-subscription" class="form-select">
                      <option value=""><?= $this->e($text_select ) ?></option>
                      <?php foreach ($subscription_plans as $subscription_plan): ?>
                        <option value="<?= $this->e($subscription_plan['subscription_plan_id']) ?>"><?= $this->e($subscription_plan['name']) ?></option>
                      <?php endforeach; ?>
                    </select>

                    <?php foreach ($subscription_plans as $subscription_plan): ?>
                      <div id="subscription-description-<?= $this->e($subscription_plan['subscription_plan_id']) ?>" class="form-text subscription d-none"><?= $this->e($subscription_plan['description']) ?></div>
                    <?php endforeach; ?>
                    <div id="error-subscription" class="invalid-feedback"></div>

                  </div>
                <?php endif; ?>
                <ul class="list-unstyled">

                  <?php if ($manufacturer): ?>
                    <li><?= $this->e($text_manufacturer ) ?> <a href="<?= $manufacturers  ?>"><?= $this->e($manufacturer ) ?></a></li>
                  <?php endif; ?>
      
                  <li><b> <?= $this->e($text_model ) ?></b> <?= $this->e($sku ) ?></li>
      
                  <?php if ($reward): ?>
                    <li><b><?= $this->e($text_reward ) ?></b> <?= $this->e($reward ) ?></li>
                  <?php endif; ?>
      
                  <li><b><?= $this->e($text_stock ) ?></b> <?= $this->e($stock ) ?></li>
                </ul>
    
                <div class="mb-3">
                  <label for="input-quantity" class="form-label"><?= $this->e($entry_qty ) ?></label>
                  <input type="number" style="width: 80px" name="quantity" value="<?= $this->e($minimum ) ?>" size="2" id="input-quantity" class="form-control"/>
                  <input type="hidden" name="product_id" value="<?= $this->e($product_id ) ?>" id="input-product-id"/>
                  <div id="error-quantity" class="form-text"></div>
                  <br/>
                  <button type="submit"   data-oc-where="cart" id="button-cart" class="btn btn-primary  "><?= $this->e($button_cart ) ?></button>
                </div>

                <?php if ($minimum > 1): ?>
                  <div class="alert alert-info"><i class="fa-solid fa-circle-info"></i> <?= $this->e($text_minimum ) ?></div>
                <?php endif; ?>
              </div>
              <?php if ($review_status): ?>
                <div class="rating">
                  <p>        
                     <?php for ($i = 1; $i <= 5; $i++): ?>
             
                      <?php if ($rating  < $i): ?>
                        <span class="fa-stack"><i class="fa-regular fa-star fa-stack-1x"></i></span>
                      <?php else: ?>
                        <span class="fa-stack"><i class="fa-solid fa-star fa-stack-1x"></i><i class="fa-regular fa-star fa-stack-1x"></i></span>
                      <?php endif; ?>
                    <?php endfor; ?>
                    <a href="" onclick="$('a[href=\'#tab-review\']').tab('show'); return false;"><?= $this->e($text_reviews ) ?></a> / <a href="" onclick="$('a[href=\'#tab-review\']').tab('show'); return false;"><?= $this->e($text_write ) ?></a></p>
                </div>
              <?php endif; ?>
            </form>

            
          </div>
        </div>
        <ul class="nav nav-tabs">
          <li class="nav-item"><a href="#tab-description" data-bs-toggle="tab" class="nav-link active"><?= $this->e($tab_description ) ?></a></li>

          <?php if ($attribute_groups): ?>
            <li class="nav-item"><a href="#tab-specification" data-bs-toggle="tab" class="nav-link"><?= $this->e($tab_attribute ) ?></a></li>
          <?php endif; ?>

          <?php if ($review_status): ?>
            <li class="nav-item"><a href="#tab-review" data-bs-toggle="tab" class="nav-link"><?= $this->e($tab_review ) ?></a></li>
          <?php endif; ?>

        </ul>
        <div class="tab-content">

          <div id="tab-description" class="tab-pane fade show active mb-4"><?=  $description   ?></div>

          <?php if ($attribute_groups): ?>
            <div id="tab-specification" class="tab-pane fade">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                  <tbody>
                      <?php foreach ($attribute_groups as $attribute_group): ?>
                      
                        
                              <tr>
                                  <td width="20%"> <?= $this->e($attribute_group['name']) ?> </td>
                                  <td><?= $this->e($attribute_group['text']) ?></td>
                              </tr>
                          
                      <?php endforeach; ?>
                  </tbody>
              </table>
              
              </div>
            </div>
          <?php endif; ?>

          <?php if ($review_status): ?>
            <div id="tab-review" class="tab-pane fade mb-4"><?=  $review   ?></div>
          <?php endif; ?>

        </div>
      </div>

      <?php if ($products): ?>

      <?php if (!$quickview): ?>
        <h3><?= $this->e($text_related ) ?></h3>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4">
          <?php foreach ($products as $product): ?>
            <div class="col"><?=  $product   ?></div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

      <?php endif; ?>

      <?php if ($tags): ?>
        <p><?= $this->e($text_tags ) ?>
        <?php for ($i = 0; $i <= count($tags) - 1; $i++): ?>
            <a href="<?= $tags[$i]['href']  ?>"><?= $this->e($tags[$i]['tag'] ) ?></a><?php if (!$loop['end']): ?>,<?php endif; ?>
              <?php endfor; ?>
        </p>
      <?php endif; ?>

      <?=  $content_bottom  ?></div>
    <?=  $column_right   ?></div>
 
<script type="text/javascript"> 
  window.picontWidth = <?=$picont_width?>;
  window.picontHeight = <?=$picont_height?>;

  var productVariation =<?=  json_encode($variations)  ?>

$('#input-subscription').on('change', function(e) {
    var element = this;

    $('.subscription').addClass('d-none');

    $('#subscription-description-' + $(element).val()).removeClass('d-none');
});

$('#form-product').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        url: 'index.php?route=checkout/cart.add&language=<?= $this->e($language ) ?>',
        type: 'post',
        data: $('#form-product').serialize(),
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#button-cart').button('loading');
        },
        complete: function() {
            $('#button-cart').button('reset');
        },
        success: function(json) {
           // //x console.log(json);

            $('#form-product').find('.is-invalid').removeClass('is-invalid');
            $('#form-product').find('.invalid-feedback').removeClass('d-block');

            if (json['error']) {
                for (key in json['error']) {
                    $('#input-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-product -input, .form-check-product -label').addClass('is-invalid');
                    $('#error-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                }
            }

            if (json['success']) {
              
              $('#alert').prepend('<div class="alert alert-success  alert-dismissible"><i class="fa-solid fa-circle-check"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');

                $('#header-cart').load('index.php?route=common/cart.info');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});
window.taxRates = {};
<?php if (isset($tax) && $tax != false):?>
window.taxRates = <?=$taxrates?>
  <?php endif; ?>  
window.discount = 0;
<?php if (isset($specialfull)):?>
window.discount = '<?=$specialfull?>';

  <?php endif; ?>
$(document).ready(function () {
<?php if (isset($special_ends) && $special_ends !== '0000-00-00' && strtotime($special_ends) > time()): ?>
 startCountDown("<?= $special_ends ?>");

 function startCountDown(date)  {
 
 // Set the date we're counting down to
 var countDownDate = new Date(date).getTime();
 
 // Update the count down every 1 second
 var x = setInterval(function() {
 
   // Get today's date and time
   var now = new Date().getTime();
     
   // Find the distance between now and the count down date
   var distance = countDownDate - now;
     
   // Time calculations for days, hours, minutes and seconds
   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
   var seconds = Math.floor((distance % (1000 * 60)) / 1000);
     
   // Output the result in an element with id="demo"
document.getElementById("coundown").innerHTML =
  '<span class="countdown-item">' + days + '</span>D ' +
  '<span class="countdown-item">' + hours + '</span>H ' +
  '<span class="countdown-item">' + minutes + '</span>M ' +
  '<span class="countdown-item">' + seconds + '</span>S ';
     
   // If the count down is over, write some text 
   if (distance < 0) {
     clearInterval(x);
     document.getElementById("coundown").innerHTML = "EXPIRED";
   }
 }, 1000);
 
 }

 <?php endif; ?>

 
});

 
//--></script>
<script type="text/javascript" src="catalog/view/javascript/product.js"></script>
<script type="module">
        import PhotoSwipeLightbox from '/catalog/view/javascript/photoswipe-lightbox.esm.js';
        import PhotoSwipeVideoPlugin from '/catalog/view/javascript/photoswipe-video-plugin.esm.min.js';

        const lightbox = new PhotoSwipeLightbox({
            gallery: '.magnific-popup',
            children: 'a',
            pswpModule: () => import('/catalog/view/javascript/photoswipe.esm.min.js'),
            wheelToZoom: true
        });
        const videoPlugin = new PhotoSwipeVideoPlugin(lightbox, {
        // options
        });

        lightbox.init();
    </script>

 
<?php if (!$quickview): ?>
<?=  $footer   ?>
<?php endif; ?>