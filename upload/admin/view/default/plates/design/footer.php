<?= $header ?>
<script src="view/javascript/Sortable.min.js"></script>

<?= $column_left ?>

<div id="content">
    <div class="page-header">
    
    <div class="container-fluid">
 
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                    <li class="breadcrumb-item">
                        <a href="<?= $breadcrumb['href'] ?>"><?= $breadcrumb['text'] ?></a>
                    </li>
                <?php } ?>
            </ol>
 
        </div>

        <div class="container-fluid bg-white p-3">
            <form method="post" action="<?= $actionUrl?>">
                <!-- Nav tabs for each section -->
                <ul class="nav nav-tabs" id="sectionTabs" role="tablist">
                    <?php foreach ($sections as $sectionIndex => $section) { ?>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?= $sectionIndex === 0 ? 'active' : '' ?>" 
                               id="tab-<?= $sectionIndex ?>" 
                               data-bs-toggle="tab" 
                               href="#section-<?= $sectionIndex ?>" 
                               role="tab" 
                               aria-controls="section-<?= $sectionIndex ?>" 
                               aria-selected="<?= $sectionIndex === 0 ? 'true' : 'false' ?>">
                               <?php 
                                    $firstKey = array_keys($section['text'][1])[0];
                                    echo $section['text'][$mylangid][$firstKey];
                               ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>

                <!-- Tab content for each section -->
                <div class="tab-content" id="sectionTabsContent">


 


                        <?php if (count($sections) == 0):?>

 
                            <div class="alert alert-warning alert-dismissible">
    <i class="fa-solid fa-triangle-exclamation"></i> 
     <?=$warning_no_sections_found?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>

                            <?php else:?>


                    <?php foreach ($sections as $sectionIndex => $section) { ?>
                        <div class="tab-pane fade <?= $sectionIndex === 0 ? 'show active' : '' ?>" 
                             id="section-<?= $sectionIndex ?>" 
                             role="tabpanel" 
                             aria-labelledby="tab-<?= $sectionIndex ?>">

                            <div class="card" style="border: 1px solid #ccc; margin-bottom: 20px; padding: 15px;">
                                <h4>
                                    <?php 
                                    $firstKey = array_keys($section['text'][1])[0];
                                    echo $section['text'][$mylangid][$firstKey];
                                    ?>
                                </h4>
                                <hr />

                                <!-- Editable Language Key -->
                                <div class="form-group row">
                                    <label for="text-key-<?= $sectionIndex ?>" class="col-sm-2 col-form-label"><?=$text_language_key?>:</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="text-key-<?= $sectionIndex ?>" name="sections[<?= $sectionIndex ?>][text_key]" 
                                               value="<?= $firstKey ?>" class="form-control" />
                                    </div>
                                </div>

                                <!-- Text Fields for Each Language -->
                                <?php foreach ($languages as $language) { ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <div class="input-group" style="margin-bottom: 10px;">
                                                <div class="input-group-text">
                                                    <img src="<?= $language['image'] ?>" title="<?= $language['name'] ?>" style="height: 20px;">
                                                </div>
                                                <input type="text" 
                                                       name="sections[<?= $sectionIndex ?>][text][<?= $language['language_id'] ?>][<?= $firstKey ?>]" 
                                                       value="<?= $section['text'][$language['language_id']][$firstKey] ?>" 
                                                       class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <!-- Links Section -->
                                <hr />
                                <h4><?=$text_links?>:</h4>
                               <!-- Add Button (to trigger the functionality) -->
 

                                <div   class="accordion accordion-flush ">
                                <button type="button" class="btn btn-primary btn-sm m-4 ms-2 add-link-btn" 
        data-section-index="<?= $sectionIndex ?>">
    <i class="fa-solid fa-plus"></i>
</button>

                                <ul class="pl-3 shortablediv listWithHandle"> <!-- Adding padding-left to create the tree-like structure -->
                                <?php foreach ($section['links'] as $linkIndex => $link) { ?>
                                    <li class="list-group-item"> 
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-heading-<?= $sectionIndex ?>-<?= $linkIndex ?>">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 border rounded accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#flush-collapse-<?= $sectionIndex ?>-<?= $linkIndex ?>" 
                        aria-expanded="false" 
                        aria-controls="flush-collapse-<?= $sectionIndex ?>-<?= $linkIndex ?>">
                    <!-- Drag Handle -->

                    <span class="my-handle" aria-hidden="true" style="cursor: grab; font-size: 21px; cursor: -webkit-grabbing; color: #595959;">
                        <i class="fa-solid mx-2 fa-grip-vertical"></i>
                    </span>
                    <span class="linktitlea"> 
                    <!-- Link Name -->
                    <?php 
                        $linkKey = array_keys($link['text'][1])[0];
                        echo $link['text'][ $mylangid ][$linkKey]; 
                    ?>

                  </span>

               
            </span>
        </h2>
        <div id="flush-collapse-<?= $sectionIndex ?>-<?= $linkIndex ?>" class="accordion-collapse collapse" 
             aria-labelledby="flush-heading-<?= $sectionIndex ?>-<?= $linkIndex ?>" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <!-- URL Input -->
                                <!-- Delete Button -->
            <button type="button" class="btn btn-danger btn-sm ms-2"  
            onclick="deleteLink(this)">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                <div class="form-group row">
                    <label for="url-<?= $sectionIndex ?>-<?= $linkIndex ?>" class="col-sm-2 col-form-label"><?=$text_route?>:</label>
                    <div class="col-sm-10">
                        <input type="text" id="url-<?= $sectionIndex ?>-<?= $linkIndex ?>" 
                               name="sections[<?= $sectionIndex ?>][links][<?= $linkIndex ?>][url]" 
                               value="<?= $link['url'] ?>" class="form-control" />
                    </div>
                </div>

                <!-- Editable Link Language Key -->
                <div class="form-group row">
                    <label for="link-text-key-<?= $sectionIndex ?>-<?= $linkIndex ?>" class="col-sm-2 col-form-label"><?=$text_language_key?>:</label>
                    <div class="col-sm-10">
                        <input type="text" id="link-text-key-<?= $sectionIndex ?>-<?= $linkIndex ?>" 
                               name="sections[<?= $sectionIndex ?>][links][<?= $linkIndex ?>][text_key]" 
                               value="<?= $linkKey ?>" class="form-control" />
                    </div>
                </div>

                <!-- Link Text Fields for Each Language -->
                <?php foreach ($languages as $language) { ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="input-group" style="margin-bottom: 10px;">
                                <div class="input-group-text">
                                    <img src="<?= $language['image'] ?>" title="<?= $language['name'] ?>" style="height: 20px;">
                                </div>
                                <input type="text" 
                                       name="sections[<?= $sectionIndex ?>][links][<?= $linkIndex ?>][text][<?= $language['language_id'] ?>][<?= $linkKey ?>]" 
                                       value="<?= $link['text'][$language['language_id']][$linkKey] ?>" 
                                       class="form-control" />
                            </div>
                        </div>
                    </div>
                <?php } ?>
       
            </div>
        </div>
        
    </div>
        
    </li>
<?php } ?>


</ul>

</div>        
                            </div>
                        </div>
                    <?php } ?>
                    <?php endif;?>
               
                    <div class="container text-center my-3">
    <button type="submit" class="btn btn-primary">
        <i class="fa-solid fa-save"></i> <?=$button_save?>
    </button>
</div>

            
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
  $('.shortablediv').each(function() {
    console.log('Creating sortable list...');  // Debugging log

    // Create Sortable instance for the list
    new Sortable(this, {
      handle: '.my-handle',  // Drag handle
      animation: 150,        // Smooth animation during sorting
      onEnd: function(event) {
        console.log('Sorting ended!');  // Debugging log
        
        // Get the parent UL
        const $ul = $(event.to);

        // Loop through each LI to update the indexes
        $ul.children('li').each(function(index) {
          // All inputs inside this LI should have the same index
          $(this).find('input[name^="sections["]').each(function() {
            // Update only the $linkIndex part of the name
            const updatedName = $(this).attr('name').replace(/sections\[(\d+)\]\[links\]\[(\d+)\]/, function(match, sectionIndex, linkIndex) {
              return `sections[${sectionIndex}][links][${index}]`;
            });

            // Set the new name attribute
            $(this).attr('name', updatedName);
          });
        });
      }
    });

    $(this).data('sortable', true);  // Marking the list as sortable
  });
});



function deleteLink(button) {
    // Get the parent <ul> and check the number of <li> elements
    const parentUl = $(button).closest('ul');
    const totalLi = parentUl.children('li').length;
    
    // Check if it's the last <li> in the <ul>
    if (totalLi === 1) {
        alert("<?= $warning_last_link?>");
        return; // Cancel deletion
    }
    
    // Confirmation prompt before deletion
    const isConfirmed = window.confirm("Are you sure you want to delete this link?");
    
    if (isConfirmed) {
        // If the user confirms, find the closest parent <li> and remove it
        $(button).closest('li').remove();
    }
}

$(document).ready(function() {

  // Check if we got a success server msg
  var sendSuccess = '<?= $success?>';
  
  if (sendSuccess) {
 
    $('#alert').prepend('<div class="alert alertsp2 alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i>  '+ sendSuccess + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');

  }
  var sendFailure = '<?= $failed?>';

if (sendFailure) {
  $('#alert').prepend('<div class="alert alertsp2 alert-danger alert-dismissible"><i class="fa-solid fa-circle-xmark"></i>  ' + sendFailure + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
}



    // Reusable handler for the Add Link button
    $('.add-link-btn').on('click', function() {
        // Get the section index from the button's data attribute
        var sectionIndex = $(this).data('section-index');

        // Find the last <li> inside the tab corresponding to the sectionIndex
        var lastLink = $('#section-' + sectionIndex).find('ul.shortablediv > li:last');

        // Determine the new link count
        var newLinkCount = $('#section-' + sectionIndex).find('ul.shortablediv > li').length;

        // Clone the last <li> to create a new one
        var newLink = lastLink.clone();

        // Empty the input values inside the cloned <li>
        newLink.find('input').val('');

        // Update the ID and related attributes for the accordion
        newLink.find('.accordion-item').attr('id', 'accordion-item-' + sectionIndex + '-' + newLinkCount);
        newLink.find('.accordion-header').attr('id', 'flush-heading-' + sectionIndex + '-' + newLinkCount);
        newLink.find('.accordion-collapse')
                .attr('id', 'flush-collapse-' + sectionIndex + '-' + newLinkCount)
                .attr('aria-labelledby', 'flush-heading-' + sectionIndex + '-' + newLinkCount);

        // Update the data-bs-target of the button to reflect the new collapse ID
        var accordionButton = newLink.find('.accordion-button');

        // Remove and re-add the data-bs-target attribute to force Bootstrap to recognize the change
        accordionButton.removeAttr('data-bs-target');
        accordionButton.attr('data-bs-target', '#flush-collapse-' + sectionIndex + '-' + newLinkCount);

        // Modify the name attributes to reflect the new link count
        newLink.find('input').each(function() {
            var currentName = $(this).attr('name');
            var updatedName = currentName.replace(/\[links\]\[\d+\]/, `[links][${newLinkCount}]`);
            $(this).attr('name', updatedName);
        });

        // Replace existing text inside <h2> of the new accordion with "New link"
        newLink.find('.linktitlea ').text(' New link');

        // Append the new <li> below the last <li>
        lastLink.after(newLink);
    });
});




</script>

<?= $footer ?>
