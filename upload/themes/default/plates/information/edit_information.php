<?php if ($iframe): ?>
  <!DOCTYPE html>
  <html dir="ltr" lang="en">


  <head>
    <script src="/themes/<?= $theme_name ?>/assets/core/js/jquery/jquery-3.7.1.min.js"></script>
    <link href="/themes/<?= $theme_name ?>/assets/core/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/themes/<?= $theme_name ?>/assets/core/fonts/fontawesome/css/all.min.css" rel="stylesheet"
      type="text/css">

    <style>
      /* Reset margin/padding to eliminate unwanted spacing */
      html,
      body {
        margin: 0;
        padding: 0;
        height: 100%;
      }

      /* Style the top bar */
      .top-bar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background: #000;
        color: #fff;
        z-index: 1050;
        height: 60px;
        /* Fixed height for the bar */
      }

      /* Ensure the iframe below doesn't overlap */
      iframe {
        position: absolute;
        top: 60px;
        /* Offset to avoid overlapping the top bar */
        left: 0;
        width: 100%;
        height: calc(100vh - 60px);
        /* Take full viewport height minus the top bar */
        border: none;
      }
    </style>
  </head>

  <body>

    <div class="top-bar">
      <div class="container-fluid h-100 d-flex align-items-center">
        <div class="row w-100">
          <div class="col-md-6 d-flex align-items-center">
            <h4 class="mb-0 fw-bold">⚙️ <?= $text_live_editor ?></h4>
            <div class="mx-4">
              <img src="<?= $language['image'] ?>" alt="<?= $language['name'] ?>" /> (<?= $language['name'] ?>)
            </div>
          </div>
          <div class="col-md-6 d-flex justify-content-end">
            <button id="saveChangesBtn" class="btn btn-primary btn px-4 fw-semibold">
              💾 <?= $button_save ?>
            </button>
          </div>
        </div>
      </div>
    </div>

    <iframe id="editorFrame" src="<?= $iframeurl ?>" name="editorFrame"></iframe>
    <!-- Hidden form to submit the updated templateData -->
    <form id="postForm" action="<?= $iframeurl ?>" method="POST" target="editorFrame" style="display:none;">
      <input type="hidden" name="updateData" id="updateDataInput">
    </form>


    <script>
      $(document).ready(function () {
        // Get iframe reference
        var iframe = document.getElementById('editorFrame');

        // Save button click event (on the parent page)
        $("#saveChangesBtn").on('click', function () {
          // Access the iframe's window object to get templateData
          var iframeWindow = iframe.contentWindow;

          // Access the templateData variable inside the iframe
          var updatedTemplateData = iframeWindow.templateData;

          // Log the updated templateData for now
          console.log("Updated templateData from iframe:", updatedTemplateData);

          // Set the updated templateData in the hidden form input
          $('#updateDataInput').val(JSON.stringify(updatedTemplateData));

          // Submit the form to post the data and reload the iframe
          $('#postForm').submit();
        });
      });
    </script>


  </body>

  </html>


<?php else: ?>


  <?php if (!empty($updated)): ?>
    <div class="floating-alert">
      <div class="alert alert-success alert-dismissible fade show  " role="alert">
        ✅ <?= $text_success ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
  <?php elseif (!empty($failed)): ?>
    <div class="floating-alert">
      <div class="alert alert-danger alert-dismissible fade show  " role="alert">
        ❌ <?= $text_failed ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
  <?php endif; ?>


  <style>
    /* 1. Dashed border around editable elements */
    [data-ve] {
      border: 2px dashed #000;
      padding: 5px;
      position: relative;
      box-shadow: 0px 0px 3px rgb(255, 255, 255);
    }

    [data-ve]:hover {
      border: 1px dashed blue;
    }

    [data-ve^="array|"]::after {
      content: '\00ff0b';
      display: inline-block;
      margin: -8px -8px 0 5px;
      font-size: 2rem;
      font-weight: 900;
      cursor: pointer;
      vertical-align: sub;
      color: green;
    }

    [data-ve-type="image"]:hover::after {
      transform: scale(1.2);
    }

    [data-ve^="string|"]:hover::after {
      transform: scale(1.2);
    }

    [data-ve^="string|"]::after {
      content: '✏️';
      position: absolute;
      top: 5px;
      right: 50px;
      font-size: 16px;
      color: #007bff;
      cursor: pointer;
    }

    .edit-input-wrapper {
      display: flex;
      gap: 5px;
    }

    .floating-modal {
      position: absolute;
      background: #fff;
      border: 1px solid #ccc;
      padding: 10px;
      border-radius: 5px;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
      z-index: 9999;
      display: none;
    }

    .remove-btn {
      position: absolute;
      top: 0;
      right: 0;
      color: red;
      background: none;
      border: none;
      font-weight: bold;
      cursor: pointer;
    }

    .add-btn {
      color: green;
      cursor: pointer;
      margin-top: 5px;
      display: inline-block;
    }

    .floating-alert {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 1055;
      /* above most things, including modals */
      width: auto;
      max-width: 400px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    }
  </style>




  <?= $description ?>


  <script>
    $(document).ready(function () {

      setTimeout(() => {
        const alertEl = document.querySelector('.floating-alert');
        if (alertEl) {
          const bsAlert = bootstrap.Alert.getOrCreateInstance(alertEl);
          bsAlert.close();
        }
      }, 3000);


      const templateData = <?= json_encode($template_data, true) ?>;
      window.templateData = templateData;

      const urlParams = new URLSearchParams(window.location.search);
      const adminToken = urlParams.get('admin_token');
      const adminDir = urlParams.get('admin_dir');

      const $postForm = $('<form>', {
        action: window.location.href,
        method: 'POST',
        style: 'display:none;',
        target: '_self',
      });

      const $input = $('<input>', {
        type: 'hidden',
        name: 'viewData',
        id: 'viewDataInput',
      });
      $postForm.append($input);
      $('body').append($postForm);

      // Single event listener for all clicks on elements with data-ve
      $(document).on('click', '[data-ve]', function (e) {
        e.preventDefault();
        parseEdit($(this)); // Call parseEdit function on click
      });



      // Loop through all elements with data-ve="item"
      $('[data-ve^="item|"]').each(function () {
        const $el = $(this);
        const veAttr = $el.data('ve');
        const [type, key] = veAttr.split('|');

        // Only proceed if it's an item
        if (type === 'item') {
          const index = parseInt($el.data('ve-index'), 10);

          // Detect the parent 'array' type (image, text, etc.)
          const $arrayParent = $el.closest('[data-ve^="array|"]');
          const parentType = $arrayParent.data('ve-type') || 'unknown';

          // Create delete button
          const $deleteBtn = $('<button class="delete-btn btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash-alt"></i></button>');

          // Style it differently if it's an image
          if (parentType === 'image') {
            // Position absolute in center top-right
            $deleteBtn.css({
              position: 'absolute',
              top: '8px',
              right: '8px',
              zIndex: 10,
              padding: '4px 8px',
              fontSize: '14px',
            });

            // Ensure the image container is relatively positioned
            $el.css('position', 'relative');
          } else {
            // For text or other types, keep inline
            $deleteBtn.addClass('ms-2'); // margin-start Bootstrap class for spacing
          }

          // Append and bind click event
          $el.append($deleteBtn);

          $deleteBtn.on('click', function () {
            console.log(`Delete button clicked for item at index ${index} in ${key}`);

            if (Array.isArray(templateData[key])) {
              templateData[key].splice(index, 1);
              console.log(`Item deleted. Updated ${key}:`, templateData[key]);

              $('#viewDataInput').val(JSON.stringify(templateData));
              $postForm.submit();
            }
          });
        }
      });



      // Function to handle the editing logic
      function parseEdit($el) {
        const veAttr = $el.data('ve');
        const typeAttr = $el.data('ve-type');
        const [type, key] = veAttr.split('|');
        const array = (type === 'array');

        // Handle string type
        if (type === 'string') {
          if (typeAttr === 'image') {
            setupImageSelector($el, key);
          } else {

            setupStringEditor($el, key, typeAttr);
          }
        }
        // Handle array type
        else if (type === 'array') {
          if (typeAttr === 'text') {
            setupArrayEditor($el, key);
          } else if (typeAttr === 'image') {
            setupImageSelector($el, key, true);
          }
        }


      }

      // Function to setup the string editor
      function setupStringEditor($el, key, url) {
        const currentValue = templateData[key];

        const currentText = url == 'url' ? (currentValue?.text || '') : currentValue;

        const $input = $(`
    <div class="edit-input-wrapper">
      <input type="text" class="form-control" value="${currentText}">
      <button class="btn btn-sm btn-success">Save</button>
    </div>
  `);

        $el.hide().after($input);

        $input.find('button').on('click', function () {
          const newText = $input.find('input').val();

          if (url === 'url') {
            const newUrl = prompt("Please enter the URL:", currentValue?.url || '');
            templateData[key] = {
              text: newText,
              url: newUrl || ''
            };
            $el.attr('href', newUrl || '');
          } else {
            templateData[key] = newText;
          }

          console.log('Updated:', templateData);

          $el.text(newText).show();
          $input.remove();
        });
      }



      // Function to setup image selector
      function setupImageSelector($el, key, isArray = false) {
        $el.css('cursor', 'pointer');

        window[`update_${key}_image`] = function (imageUrl) {
          const altText = prompt("Please enter the alt text for the image:");

          // Save both the image URL and alt text
          const imageData = {
            src: '/image/' + imageUrl,
            alt: altText || ''  // Default to an empty string if no alt text is provided
          };

          // Save image data to templateData
          if (isArray) {
            templateData[key].push(imageData);  // For arrays, push the object
          } else {
            templateData[key] = imageData;  // For single values, store the object
          }

          console.log('Updated image:', key, imageUrl);

          $('#viewDataInput').val(JSON.stringify(templateData));
          $postForm.submit();
        };

        $.ajax({
          url: '/' + adminDir + '/index.php?route=common/filemanager&user_token=' + adminToken + '&target=' + encodeURIComponent(`update_${key}_image`),
          dataType: 'html',
          success: function (html) {
            $('body').append(html);
            const modalEl = document.querySelector('#modal-image');
            const modal = new bootstrap.Modal(modalEl);
            modal.show();
          }
        });
      }

      // Function to setup item remover (for array elements)
      function setupItemRemover($el, key) {
        const index = $el.index();
        const $removeBtn = $('<button class="remove-btn">❌</button>');
        $el.append($removeBtn);

        $removeBtn.on('click', function (e) {
          e.stopPropagation();
          $el.remove();
          templateData[key].splice(index, 1);
          console.log('Removed item from', key, templateData[key]);
        });
      }

      // Function to handle array editor
      function setupArrayEditor($el, key) {




        const typeAttr = $el.data('ve-type');
        if (typeAttr === 'image') {

        } else {
          openTextInput($el, key);  // Open text input for text arrays
        }


        function openTextInput($el, key) {
          const $modal = $(
            `<div class="floating-modal">
          <input type="text" class="form-control mb-2" placeholder="New item">
          <div class="d-flex gap-2">
            <button class="btn btn-success btn-sm">Save</button>
            <button class="btn btn-secondary btn-sm">Cancel</button>
          </div>
        </div>`
          );
          $('body').append($modal);

          const offset = $el.offset();
          const modalWidth = 300;
          let left = offset.left;
          if (left + modalWidth > $(window).width()) {
            left = $(window).width() - modalWidth - 10;
          }

          $modal.css({
            top: offset.top + $el.height() + 5,
            left: left,
            display: 'block',
            width: modalWidth + 'px',
          });

          $modal.find('button.btn-success').on('click', function () {
            const val = $modal.find('input').val();
            if (val.trim()) {
              templateData[key].push(val);  // Push value to the array
              console.log('Added to array', key, templateData[key]);
              $('#viewDataInput').val(JSON.stringify(templateData));
              $postForm.submit();
            }
            $modal.remove();
          });

          $modal.find('button.btn-secondary').on('click', function () {
            $modal.remove();
          });
        }
      }
    });
    function getURLVar(key) {
      const query = window.location.search.substring(1);
      const vars = query.split('&');
      for (let i = 0; i < vars.length; i++) {
        const pair = vars[i].split('=');
        if (decodeURIComponent(pair[0]) === key) {
          return decodeURIComponent(pair[1] || '');
        }
      }
      return '';
    }
  </script>



<?php endif; ?>