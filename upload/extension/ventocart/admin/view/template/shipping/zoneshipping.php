<?= $header ?>
<?= $column_left ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="float-end">
                <button type="submit" form="form-shipping" data-bs-toggle="tooltip" title="<?= $button_save ?>" class="btn btn-primary">
                    <i class="fa-solid fa-save"></i>
                </button>
                <a href="<?= $back ?>" data-bs-toggle="tooltip" title="<?= $button_back ?>" class="btn btn-light">
                    <i class="fa-solid fa-reply"></i>
                </a>
            </div>
            <h1><?= $heading_title ?></h1>
            <ol class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb): ?>
                    <li class="breadcrumb-item">
                        <a href="<?= $breadcrumb['href'] ?>"><?= $breadcrumb['text'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>
    <form id="form-shipping" method="post">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <i class="fa-solid fa-pencil"></i>
                    <?= $text_edit ?></div>
                <div class="card-body">

                    <div class="mb-3 row">
                        <label for="input-status" class="col-sm-2 col-form-label"><?= $entry_status ?></label>
                        <div class="col-sm-10">
                            <div class="form-check form-switch form-switch-lg">
                                <input type="hidden" name="shipping_zoneshipping_status" value="0"/>
                                <input type="checkbox" name="shipping_zoneshipping_status" value="1" id="input-status" class="form-check-input" <?= $status ? 'checked' : '' ?>/>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="input-sort-order" class="col-sm-2 col-form-label"><?= $entry_sort_order ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="shipping_zoneshipping_sort_order" value="<?= $shipping_zoneshipping_sort_order ?>" placeholder="<?= $entry_sort_order ?>" id="input-sort-order" class="form-control"/>
                        </div>
                    </div>


                    <div>

                        <div class="mb-3 row">
                            <label for="input-filter-company" class="col-sm-2 col-form-label"><?= $entry_filter_shipping_company ?>
                            </label>
                            <div class="col-sm-10">
                                <select id="filter-company" name="filter-company" class="form-select">

                                    <option selected value="0">*
                                        <?= $entry_all_packages ?></option>

                                    <option disabled>-------------------------------------------------------------------------------------------------</option>
                                    <?php foreach ($filters as $filter): ?>

                                        <option value="<?= $filter['displayName'] ?>"><?= $filter['displayName'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="select_postalentry" class="col-sm-2 col-form-label"><?= $entry_shipping_zones ?>
                            </label>
                            <div class="col-sm-10">
                                <select size="10" id="select_postalentry" name="shipping_entry_id" class="form-select">
                       
    <optgroup label="<?=$select_enabled?>">
        <?php foreach ($entries as $entry): ?>
            <?php if ($entry['geo_zone_id'] != -2): ?>
                <option value="<?= $entry['shipping_entry_id'] ?>">
                    <?= $entry['displayName'][$user_lang_id] ?> (<?= $entry['name'] ?>)
                </option>
            <?php endif; ?>
        <?php endforeach; ?>
    </optgroup>
    
    <optgroup label="<?=$select_disabled?>">
        <?php foreach ($entries as $entry): ?>
            <?php if ($entry['geo_zone_id'] == -2): ?>
                <option value="<?= $entry['shipping_entry_id'] ?>"  >
                    <?= $entry['displayName'][$user_lang_id] ?> (<?= $entry['name'] ?>)
                </option>
            <?php endif; ?>
        <?php endforeach; ?>
    </optgroup>
 
                                </select>

                                <button id="add-new-entry-f" type="button" class="btn mt-3 btn-primary"><?=$entry_addnew?></button>
                             
                            </div>

                        </div>

                    
                      


                        <div class="mb-3 row">


                            <div class="col-sm-12">


                                <div class="card" id="entry_form" style="display:none;">

                                    <div class="card-header"><?= $card_edit_postacode_zones ?></div>
                                    <div class="card-body">


            


                                        <div class="mb-3 row">
                                            <label for="input-display-name" class="col-sm-2 col-form-label">
                                                <span class="text-danger">*</span>
                                                <?= $entry_display_name ?>
                                            </label>
                                            <div class="col-sm-10">
                                                <?php foreach($languages as $language):?>
                                            <div class="input-group">
                                            <div class="input-group-text"><img src="<?=$language['image']?>" title="<?=$language['name']?>"/></div>
                                                <input list="allnames" type="text" name="displayName[<?=$language['language_id']?>]" id="input-display-name" class="form-control"/>
                                                </div>
                                                <?php endforeach;?>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="input-name" class="col-sm-2 col-form-label">
                                                <span class="text-danger">*</span>
                                                <?= $entry_name ?>
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" id="input-name" class="form-control"/>
                                                <div class="form-text"><?= $help_name ?></div>
                                            </div>
                                        </div>
                                        <datalist id="allnames">
                                            <?php foreach ($filters as $filter): ?>
                                                <option value="<?= $filter['displayName'] ?>"></option>
                                            <?php endforeach; ?>
                                        </datalist>

                                        <div class="mb-3 row">
                                            <label for="input-country" class="col-sm-2 col-form-label">
                                                <span class="text-danger">*</span>
                                                <?= $entry_geozone ?>
                                            </label>
                                            <div class="col-sm-10">
                                                <select name="geo_zone_id" id="input-country" class="form-select">
                                          
                                                <option value="-2"><?= $select_disable ?></option>
                                                <option value="0"><?= $select_all_zones ?></option>
                                                    <option value="-1"><?= $select_no_geozone ?></option>
                                                    <?php foreach ($geoZones as $geoZone): ?>

                                                        <option value="<?= $geoZone['geo_zone_id'] ?>"><?= $geoZone['name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="form-text">
                                                    <a href="index.php?route=localisation/geo_zone&user_token=<?= $user_token ?>"><?= $geo_zones_help ?></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="input-price" class="col-sm-2 col-form-label"><?= $entry_add_to_pricelist ?>:</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col  p-0 ">

                                                        <select name="weight" id="input-weight" class="form-select">
                                                     <option value="s">   <?= $entry_select ?> <?= $entry_weight ?></option>
                                                            <?php for ($i = 0.5; $i <= 150; $i += ($i === 0.5 ? 0.5 : 1)): ?>
                                                                <option value="<?= $i ?>"><?= $i ?></option>
                                                            <?php endfor; ?>
                                                            <option value="1000000">1000000</option>
                                                        </select>
                                                        <div class="form-text"><?= $entry_weight ?></div>
                                                    </div>
                                                    <div class="col  p-0 ">
                                                        <input type="text" name="default_price" id="input-default_price" class="form-control" placeholder="<?= $entry_default_price ?>"/>
                                                        <div class="form-text"><?= $help_default_price ?></div>
                                                    </div>
                                                    <div class="col  p-0 ">
                                                        <div class="input-group">
                                                            <input type="text" name="price" id="input-price" class="form-control" placeholder="<?= $entry_price ?>"/>
                                                            <button type="button" id="btn-add-pricelist" class="btn btn-primary">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        </div>
                                                        <div class="form-text"><?= $help_price ?></div>
                                                    </div>


                                                </div>

                                            </div>

                                        </div>

                                        <div class="mb-3 row">
                                            <label for="input-volumetric" class="col-sm-2 col-form-label">
                                                <span class="text-danger">*</span>
                                                <?= $entry_pricelist ?>
                                            </label>
                                            <div class="col-sm-10">


                                                <input type="hidden" name="price_list" id="pricelist-input">
                                                <div id="price_list_container"></div>
                                            </div>
                                        </div>


                                        <div class="mb-3 row">
                                            <label for="input-weight-class" class="col-sm-2 col-form-label">
                                                <span class="text-danger">*</span>
                                                <?= $entry_weight_class ?></label>
                                            <div class="col-sm-10">
                                                <select name="weight_class_id" id="input-weight-class" class="form-select">
                                                    <?php foreach ($weight_classes as $weight_class): ?>
                                                        <option <?php if ($default_weigth == $weight_class['weight_class_id']): ?> selected <?php endif; ?> value="<?= $weight_class['weight_class_id'] ?>"><?= $weight_class['title'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="form-text"><?= $help_weight_class ?></div>
                                            </div>
                                        </div>


                                        <div class="mb-3 row">
                                            <label for="input-volumetric" class="col-sm-2 col-form-label">
                                                <span class="text-danger">*</span>
                                                <?= $entry_volumetric ?></label>
                                            <div class="col-sm-10">
                                                <input name="volumetric" value="5" id="input-volumetric" class="form-control">
                                                <div class="form-text"><?= $help_volumetric ?></div>
                                            </div>
                                        </div>


                                        <div class="mb-3 row">
                                            <label for="input-postal-codes" class="col-sm-2 col-form-label"><?= $entry_postal_codes ?></label>
                                            <div class="spinner-border text-primary" style="display:none" id="loading-postalcode" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                            <div class="col-sm-10">
                                                <textarea name="postal_codes" id="input-postal-codes" class="form-control" rows="5"></textarea>
                                                <div class="form-text"><?= $help_postal_codes ?></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                        <label for="input-sort-order" class="col-sm-2 col-form-label"><?= $entry_sort_order ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="entry_sort_order" value="<?= $shipping_zoneshipping_sort_order ?>" placeholder="<?= $entry_sort_order ?>" id="input-entry-sort-order" class="form-control"/>
                        </div>
                    </div>


                                        <div class="mb-3 row">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-5">
                                                <button type="submit" class="btn btn-primary"><?= $button_save ?></button>
                                                <button id="deleteentry" class="btn btn-danger"><?= $button_delete ?></button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </form>


        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        
        var entries = <?= json_encode($entries) ?>;
    
    // Populate the select element with options from the entries variable
    function populateSelect(displayName) {
     
        $('#select_postalentry').empty(); // Clear the select element
        
        // Create optgroups for enabled and disabled zones
        var $optgroupEnabled = $('<optgroup>', { label: '<?=$select_enabled?>' });
        var $optgroupDisabled = $('<optgroup>', { label: '<?=$select_disabled?>' });
        
        // Loop through the entries and append options to the corresponding optgroup
        if (displayName == 0) {
        $.each(entries, function(index, entry) {
            var $option = $('<option>', {
                value: entry.shipping_entry_id,
                text: entry.displayName[<?=$user_lang_id?>] + ' (' + entry.name + ')'
            });

            if (entry.geo_zone_id != -2) {
                $optgroupEnabled.append($option); // Append to enabled optgroup
            } else {
                $optgroupDisabled.append($option); // Append to disabled optgroup
            }
        });
    } else {
        $.each(entries, function(index, entry) {
            if (entry.displayName['<?=$user_lang_id?>'] == displayName) {
          
            var $option = $('<option>', {
                value: entry.shipping_entry_id,
                text: entry.displayName[<?=$user_lang_id?>] + ' (' + entry.name + ')'
            });

            if (entry.geo_zone_id != -2) {
                $optgroupEnabled.append($option); // Append to enabled optgroup
            } else {
                $optgroupDisabled.append($option); // Append to disabled optgroup
            }
        }
        });
    }

        // Append optgroups to the select element
        $('#select_postalentry').append($optgroupEnabled, $optgroupDisabled);
    }

    // Event handler for filter company change
    $('#filter-company').on('change', function() {
        var displayName = $(this).val();
        if (displayName == '-new-') {
            return;
        }
       
        // Populate select based on display name
        populateSelect(displayName);
    });
        
        function decodeHtmlEntities(html) {
            return new DOMParser().parseFromString(html, 'text/html').body.textContent;
        }
            $('#select_postalentry').on('change', function() {
                var entryId = $(this).val();
                if (entryId == "-") {
                    
           
                    $("#entry_form").hide();
                }
                if (entryId == "0") {
                    $("#entry_form").show();
                }
                if (entryId != "-" && entryId != "0") {
 
                    var selectedEntry = <?= json_encode($entries) ?>.find(entry => entry.shipping_entry_id == entryId);
                    $('input[name="name"]').val(selectedEntry.name);
                
                  
                    $('textarea[name="postal_codes"]').val('');
                    $('select[name="geo_zone_id"]').val(selectedEntry.geo_zone_id);
                    $('input[name="price"]').val(selectedEntry.price);
                    $('input[name="entry_sort_order"]').val(selectedEntry.sort_order);
                    $('input[name="default_price"]').val(selectedEntry.default_price);
                    $.each(selectedEntry.displayName, function(languageId, displayName) {
                    $('input[name="displayName[' + languageId + ']"]').val(displayName);
                    });
         
                    $('input[name="volumetric"]').val(selectedEntry.volumetric);
                    $('select[name="weight_class_id"]').val(selectedEntry.weight_class_id);
                   // var postalCodes = selectedEntry.postal_codes.replace(/,/g, '\n');
                   // $('textarea[name="postal_codes"]').val(postalCodes);
                   var pricelist = decodeHtmlEntities(selectedEntry.pricelist.trim());
                   $('input[name="price_list"]').val(pricelist);
                   priceList = (pricelist !== "") ? JSON.parse(pricelist) : [];
                   loadPostalCodes(entryId);
               
                   populatePriceList(priceList);
                    $("#entry_form").show();
                }  
            });
        
            function loadPostalCodes(shippingEntryId) {
                // Make AJAX request
                $("#loading-postalcode").show();
                $.ajax({
                    url:  'index.php?route=extension/ventocart/shipping/zoneshipping.getPostalCodes&user_token=<?= $user_token ?>',
                    type: 'POST',
                    dataType: 'json', // Expect JSON response
                    data: { shipping_entry_id: shippingEntryId }, // Send shipping entry ID as data
                    success: function(response) {
                        // Handle success response
                        if (response.postalCodes) {
                      var postalCodes = response.postalCodes.replace(/,/g, '\n');
           
                     $('textarea[name="postal_codes"]').val(postalCodes);
                    }
                    $("#loading-postalcode").hide();
                    },
                    error: function(xhr, status, error) {
                        $("#loading-postalcode").hide();
                        console.error(error);
                    }
                });
        
            }
            $('#form-shipping').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission
            
        
                // Serialize the form data
                var formData =  $('#form-shipping').serialize();
                var urlaction ='index.php?route=extension/ventocart/shipping/zoneshipping.saveentries&user_token=<?= $user_token ?>';
            if ($("#select_postalentry").val() == "-") {
            urlaction  ='index.php?route=extension/ventocart/shipping/zoneshipping.save&user_token=<?= $user_token ?>';
            }  
            $("#loading-postalcode").show();
                // Make AJAX request
                $.ajax({
                    url: urlaction,
                    type: 'POST',
                    dataType: 'json', // Expect JSON response
                    data: formData,
                    success: function(response) {
                        // Handle success response
                        $("#loading-postalcode").hide();
                        if (response.error) {
                        $('#alert').prepend('<div class="alert  alert-danger alert-dismissible"><i class="fa-solid fa-exclamation-circle"></i> ' + response.error + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                        }
                        if (response.success) {
                            $('#alert').prepend('<div class="alert  alert-success alert-dismissible"><i class="fa-solid  fa-circle-check"></i> ' + response.success + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                            setTimeout(() => {
                                location.reload();
                            }, 2000);
                        }
                    },
                    error: function(xhr, status, error) {
                        $("#loading-postalcode").hide();
                        console.error(error);
                    }
                });
            });
        
            $('#deleteentry').on('click', function(event) {
            event.preventDefault(); // Prevent default form submission
        
            // Get the selected shipping entry ID
            var shippingEntryId = $('#select_postalentry').val();
                $("#loading-postalcode").show();
            // Make AJAX request to delete entry
            $.ajax({
                url:  'index.php?route=extension/ventocart/shipping/zoneshipping.deleteentries&user_token=<?= $user_token ?>',
                type: 'POST',
                dataType: 'json', // Expect JSON response
                data: { shipping_entry_id: shippingEntryId }, // Send shipping entry ID as data
                success: function(response) {
                    // Handle success response
                    if (response.error) {
                        $('#alert').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-exclamation-circle"></i> ' + response.error + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                    }
                    if (response.success) {
                        $('#alert').prepend('<div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> ' + response.success + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
               
                        setTimeout(() => {
                                location.reload();
                            }, 2000);
                    }
                    $("#loading-postalcode").hide();
                },
                error: function(xhr, status, error) {
                    $("#loading-postalcode").hide();
                    console.error(error);
                }
            });
        });
        
         
        
        $('#btn-add-pricelist').click(function() {
            // Read JSON from hidden input
            var priceList = ($('#pricelist-input').val() !== "") ? JSON.parse($('#pricelist-input').val()) : [];
        
        // Get new price values
        var defaultPrice = $('#input-default_price').val();
        var price = $('#input-price').val();
        var weight = $('#input-weight').val();
        
        // Check if any field is empty or not a number
        if (defaultPrice === '' || isNaN(defaultPrice) || price === '' || isNaN(price) || weight === '' || isNaN(weight)) {
            // Display an error message or perform any necessary action
            alert("<?= $error_fill_integers ?>");
            return;
        } 
            // All fields contain valid integer values
            // Create new price object
            var newPrice = {
                default_price: defaultPrice,
                price: price,
                weight: weight
            };
            $('#input-default_price').val('');
            $('#input-price').val('');
            $('#input-weight').val('s');
            // Search if the new weight already exists
            var existingIndex = priceList.findIndex(function(price) {
                return price.weight === newPrice.weight;
            });
        
            if (existingIndex !== -1) {
                // Weight already exists, update values
                priceList[existingIndex] = newPrice;
                alert('<?= $warning_weight_exists ?>');
            } else {
                // Weight doesn't exist, insert new object
                priceList.push(newPrice);
            }
            priceList.sort(function(a, b) {
                return parseFloat(a.weight) - parseFloat(b.weight);
            });
        
            // Update hidden input with updated JSON data
            $('#pricelist-input').val(JSON.stringify(priceList));
        
            // Populate display of JSON data
            populatePriceList(priceList);
        });
        
        
            // Function to populate display of price list
            function populatePriceList(priceList) {
            var container = $('#price_list_container');
            container.empty();
        
            // Loop through each price object and create display
            priceList.forEach(function(price, index) {
                var display = $('<div>').addClass('mb-2 p-1 border-bottom');
        
                // Add delete button
                var deleteBtn = $('<a>').addClass('btn btn-sm mx-2 btn-danger').html('<i class="fas fa-trash-alt"></i>');
                deleteBtn.click(function() {
                    // Remove price object from array
                    priceList.splice(index, 1);
                    // Update hidden input with updated JSON data
                    $('#pricelist-input').val(JSON.stringify(priceList));
                    // Repopulate price list display
                    populatePriceList(priceList);
                });
        
                // Create a row to hold price details and delete button
                var row = $('<div>').addClass('row');
                row.append(
                    '<div class="col-md-2"><b><?= $entry_weight ?>:</b> ' + price.weight + '</div>',
                    '<div class="col-md-2"><b><?= $entry_default_price ?>:</b> ' + price.default_price + '</div>',
                    '<div class="col-md-2"><b><?= $entry_price ?>:</b> ' + price.price + '</div>',
                    $('<div class="col-md-1"></div>').append(deleteBtn)
                );
        
                display.append(row);
                container.append(display);
            });
        }
        $('#add-new-entry-f').click(function() {
            // Clear all form fields when "Add New" is selected
            $('input[name="name"]').val('');
                    $('input[name^="displayName"]').val('');
                  
                    $('input[name="price_list"]').val('');
                    populatePriceList([]);
                    $('select[name="geo_zone_id"]').val('');
                    $('input[name="price"]').val('');
                    $('input[name="price_list"]').val('');
                  
         
                    $('input[name="volumetric"]').val('5000');
                    $('select[name="weight_class_id"]').val(<?= $default_weigth ?>);
                    $('textarea[name="postal_codes"]').val('');


                    $("#entry_form").show();

                });
        });
        </script>
        
        
        
        <?= $footer ?>

