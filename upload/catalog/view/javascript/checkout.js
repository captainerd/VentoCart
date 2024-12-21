
/* CaptaiNerd: For custimization read my comments */
class AddressCheckOut {

  constructor(formName, $) {

    window.loaderDiv = ' <div id="btn-loading" style="display: inline;" > Loading... <i   class="fas fa-spinner fa-pulse"></i></div>';

    $ = $;
    this.formName = formName;

    // Bind event handlers to the class instance

    this.onRegisterAccChange = this.onRegisterAccChange.bind(this);
    this.onCustomerGroupChange = this.onCustomerGroupChange.bind(this);
    this.onAddressMatchChange = this.onAddressMatchChange.bind(this);
    this.onCountryChange = this.onCountryChange.bind(this);
    this.onSubmitForm = this.onSubmitForm.bind(this);

    // Attach event handlers
    this.attachEventHandlers();
    this.reloadEnviroment();
  }
  reloadEnviroment() {

    populatePaymentAndShippingMethods();

  }

  attachEventHandlers() {

    $('#input-register-acc').on('change', this.onRegisterAccChange);
    $('#input-customer-group').on('change', this.onCustomerGroupChange);
    $('#input-address-match').on('change', this.onAddressMatchChange);
    $('select[name$=\'country_id\']').on('change', this.onCountryChange);
    $('select[name$=\'zone_id\']').on('change', this.onZoneChange);
    $('#form-' + this.formName).on('submit', this.onSubmitForm);

    // Trigger initial change events
    $('#input-customer-group').trigger('change');
    $('select[name$=\'country_id\']').trigger('change');
    $('#form-' + this.formName + ' :input:not(:checkbox,:radio,:button)').on('change keyup', function (e) {

      if (e.data && e.data[0]) {
        this.checkFieldLength(e.target, e.data[0]);
      } else {
        this.checkFieldLength(e.target);
      }
    }.bind(this));

  }
  onZoneChange(event) {
    if ($(event.target).val() !== "") {
      $(event.target).removeClass("is-invalid");
    } else {
      $(event.target).addClass("is-invalid");
    }

  }


  onRegisterAccChange() {
    $("#password").toggleClass('d-none', !$('#input-register-acc').prop('checked'));
  }

  onCustomerGroupChange(event) {
    var element = event.target;

    $.ajax({
      url: 'index.php?route=account/custom_field&language=' + window.lang + '&customer_group_id=' + $(element).val(),
      dataType: 'json',
      beforeSend: function () {
        $(element).prop('disabled', true);
      },
      complete: function () {
        $(element).prop('disabled', false);
      },
      success: function (json) {
        $('.custom-field').addClass('d-none').removeClass('required');
        for (var i = 0; i < json.length; i++) {
          var customField = json[i];
          $('.custom-field-' + customField['custom_field_id']).removeClass('d-none');
          if (customField['required']) {
            $('.custom-field-' + customField['custom_field_id']).addClass('required');
          }
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });

  }

  checkFieldLength(e, throttle = true) {

    let hasInvalidFields = false;
    let invalidFieldApplied = false; // New variable to track if the class is already applied
    $('#form-' + this.formName + ' .required :input:not(:checkbox,:radio,:button)').filter(':visible').each(function (index, element) {

      let value = $(element).val();



      let parentDiv = $(element).closest('div'); // Get the parent div of the input field


      if (value !== null && value !== undefined && !parentDiv.hasClass('d-none') && value.length < 1) {

        if (!invalidFieldApplied) { // Check if class is not applied yet
          $(element).addClass('is-invalid');

          hasInvalidFields = true;
          invalidFieldApplied = true; // Set the flag to true after applying the class
        }
      } else {
        $($(element).attr('id').replace('input', 'error')).html('');

        $(element).removeClass('is-invalid');

      }
    });

    if (hasInvalidFields) {
      clearTimeout(window.submitThrottling);
      $('#checkout-payment').hide();
      return false;
    } else {
      clearTimeout(window.submitThrottling);
      //Throttle form submition requests as the user types in
      if (throttle) {


        window.submitThrottling = setTimeout(() => {
          if ($("#input-register-acc").val() != 1) $('#form-' + this.formName).trigger('submit', [true]);

        }, 2000);
      }


      $("#button-confirm").attr('disabled', true);

      if ($("#input-register-acc").val() != 1) {

        $("#button-confirm").html(window.loaderDiv);
        $('#button-confirm').show();
      }

      $('#checkout-payment').show();
    }
  }
  onAddressMatchChange(event) {
    let isChecked = $(event.target).prop('checked');
    $('#address-match-hd').val(isChecked ? '0' : '1');
    $('#shipping-address').toggle(isChecked);
  }

  onCountryChange(event) {

    var element = event.target;
    var type = $(event.target).attr('id').split('-')[1];

    if ($('#input-' + type + '-country').val() == "") return;

    $.ajax({
      url: 'index.php?route=localisation/country&language=' + window.lang + '&country_id=' + $('#input-' + type + '-country').val(),
      dataType: 'json',
      beforeSend: function () {
        $(element).prop('disabled', true);
        $('#input-' + type + '-zone').prop('disabled', true);
      },
      complete: function () {
        $(element).prop('disabled', false);
        $('#input-' + type + '-zone').prop('disabled', false);
      },
      success: function (json) {
        if (json['phone_code'] && json['phone_code'] !== "") {
          $('#input-' + type + '-phone').attr('placeholder', '+' + json['phone_code']);
        }


        if (json['postcode_required'] == '1') {
          $('#input-' + type + '-postcode').parent().addClass('required');
        } else {
          $('#input-' + type + '-postcode').parent().removeClass('required');
        }

        var options = [
          { label: window.text_select, value: '' } // Initial "select" option
        ];

        if (json['zone'] && !json['zone'].length) {
          $('#input-' + type + '-zone').parent().hide();
          return;
        } else {
          $('#input-' + type + '-zone').parent().show();
        }

        if (json['zone'] && json['zone'].length && json['zone'] != '') {
          // Add each zone as an option
          for (var i = 0; i < json['zone'].length; i++) {
            options.push({
              label: json['zone'][i]['name'], // Name of the zone
              value: json['zone'][i]['zone_id'] // zone_id as the value
            });
          }
        } else {
          // If no zones, add a "None" option
          options.push({ label: window.text_none, value: '0' });
        }

        // Now, instead of manually modifying the HTML, call updateOptions
        window.updateOptions('input-' + type + '-zone', options);

      },
      error: function (xhr, ajaxOptions, thrownError) {

        //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });


    if ($('#input-' + type + '-country').val() !== "") {
      $('#input-' + type + '-country').removeClass("is-invalid");
    } else {
      $(element).prop('disabled', false);
      $('#input-' + type + '-zone').prop('disabled', false);
      $('#input-' + type + '-country').addClass("is-invalid");
    }
  }

  onSubmitForm(event, arg = true) {

    event.preventDefault();
    if (this.formName !== 'register') { return; }

    $.ajax({
      url: 'index.php?route=checkout/register.save&language=' + window.lang,
      type: 'post',
      dataType: 'json',
      data: function () {
        var formData = $('#form-register').serializeArray();
        var paymentCompanyValues = [];

        for (var i = 0; i < formData.length; i++) {
          //Pre-impelemention: some countries require more than one company info (vat no, issuer, etc)
          if (formData[i].name.indexOf('payment_company[') === 0 && formData[i].value.length > 2) {
            var placeholder = $('input[name="' + formData[i].name + '"]').attr('placeholder');
            var value = formData[i].value;
            //Pre-imp: paymentCompanyValues.push(placeholder + '=' + value);
            paymentCompanyValues.push(value); //One field, just push.
          }
        }

        var paymentCompanyString = paymentCompanyValues.join(' ⠀ ');
        if (paymentCompanyString.length === 0) paymentCompanyString = "";
        formData.push({ name: 'payment_company', value: paymentCompanyString });
        formData = formData.filter(function (item) {
          return item.value !== ''; // Exclude items where the value is an empty string
        });
        return formData;
      }(),
      contentType: 'application/x-www-form-urlencoded',
      beforeSend: function () {
        $("#button-confirm").text(window.btntxt);
        $("#button-confirm").attr('disabled', true);

      },
      complete: function () {
        $("#button-confirm").attr('disabled', false);



      },
      success: function (json) {

        $('#form-' + this.formName).find('.is-invalid').removeClass('is-invalid');
        $('#form-' + this.formName).find('.invalid-feedback').removeClass('d-block');

        if (json['redirect']) {
          location = json['redirect'];
        }

        if (json['error']) {

          if (json['error']['warning']) {
            $('#alert').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['error']['warning'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
          }

          for (var key in json['error']) {
            $('#input-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
            $('#error-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
            $("#button-confirm").text($('#error-' + key.replaceAll('_', '-')).text());
            $("#button-confirm").attr('disabled', true);
          }
        }

        if (json['success']) {
          if ($('#input-password').is(':visible')) {
            $('#password').hide();
            $('#input-register-acc').attr('disabled', true);
            $('#alert').prepend('<div  class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');

          }

          if (!arg) {

            $('#alert').prepend('<div  class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');

          }
          //To-Do: If zone haven't changed, don't re-populate.
          populatePaymentAndShippingMethods();
          $("#button-confirm").html(window.loaderDiv);
          if ($('#input-register').prop('checked')) {
            $('input[name=\'account\']').prop('disabled', true);
            $('#input-customer-group').prop('disabled', true);
            $('#input-password').prop('disabled', true);
            $('#input-captcha').prop('disabled', true);
            $('#input-register-agree').prop('disabled', true);
          }
          clearTimeout(window.submitThrottling);
          $('#checkout-confirm').load('index.php?route=checkout/confirm.confirm&language=' + window.lang);

        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });

  }
}


// Make an AJAX call to fetch payment and shipping methods
function populatePaymentAndShippingMethods() {

  $("#shipping-methods-container").html('<div class="spinner-grow text-primary" role="status"><span class="sr-only">Loading...</span></div>');
  $("#payment-methods-container").html('<div class="spinner-grow text-primary" role="status"><span class="sr-only">Loading...</span></div>');

  $.ajax({
    url: 'index.php?route=checkout/shipping_payment_methods.getPaymentAndShipping',
    type: 'get',
    dataType: 'json',
    success: function (json) {

      if (json.shipping_methods) {
        // Populate shipping methods in your HTML

        populateMethods('shipping-methods-container', json.shipping_methods, "shipping_method");
      }
      if (json.payment_methods) {

        // Populate payment methods in your HTML

        populateMethods('payment-methods-container', json.payment_methods, "payment_method");


        $("#payment-shipping-method-form").trigger('change', [true]);

        // Disable all clickable elements within the container
        // $('#payment-methods-container').find('*').prop('disabled', true);
      }
      if (json.error_shipping) {
        $("#shipping-methods-container").html(json.error_shipping);
      }
      if (json.error_payment) {
        $("#payment-methods-container").html(json.error_payment);
      }
    }
  });

}


// Function to populate methods in your HTML element
function populateMethods(containerId, methods, name) {
  let containerElement = document.getElementById(containerId);

  // Clear existing content
  if (containerElement) containerElement.innerHTML = '';
  if (!containerElement) return;

  // Generate and append new radio buttons and labels
  Object.keys(methods).forEach((mcode, mindex) => {


    //One var for childs regadless payment/shipping (quote vs option)
    let options = methods[mcode].quote ? methods[mcode].quote : (methods[mcode].option ? methods[mcode].option : null);

    /* // Uncomment this if you need a seperation in the UI 
  let titleText = document.createElement('span');
  titleText.textContent = methods[mcode].name
  titleText.className = 'dashed-text';
  containerElement.appendChild(titleText);
  */



    Object.keys(options).forEach((code, index) => {
      let radioContainer = document.createElement('div');
      radioContainer.className = 'form-check';

      let option = options[code].code;

      let radioInput = document.createElement('input');
      radioInput.type = 'radio';
      radioInput.className = 'form-check-input';
      radioInput.name = name;
      radioInput.value = option;

      radioInput.id = 'input-' + name + '-' + options[code].code;

      if (options[code].checked) {
        //You can listen to the "checked" rule of extensions them selves?
        // radioInput.checked = true; //uncomment this and comment the bellow

      }

      if (selectedByUser(option, containerId)) {
        radioInput.checked = true;
      }
      //Or you can decide by setting Admin/Extension, Order: 0) and the rest Order: 1,2,3  
      //The 'Order 0' will be checked
      if (mindex === 0 && index === 0 && localStorage.getItem(containerId) == null) {
        radioInput.checked = true;
      }

      let label = document.createElement('label');
      label.className = 'form-check-label';
      label.htmlFor = 'input-' + name + '-' + options[code].code;
      label.textContent = options[code].text ? options[code].name + " - " + options[code].text : options[code].name;

      // Append radio input and label to container
      radioContainer.appendChild(radioInput);
      radioContainer.appendChild(label);

      // Append container to the main container
      containerElement.appendChild(radioContainer);
    });
  });
}
function selectedByUser(code, containerId) {
  // Check if the code is stored in localStorage

  return localStorage.getItem(containerId) === code;


}
//Save the selected Payment/Shipping Settings
$(document).ready(function () {

  $("#input-register-acc").change(function () {
    // Check if the checkbox is checked
    if ($(this).prop("checked")) {
      // Set the value to 1 when checked
      $(this).val(1);
    } else {
      // Set the value to 0 when unchecked
      $(this).val(0);
    }
  });

  $(document).on('change', '#payment-shipping-method-form', function (e, arg = false) {

    e.preventDefault();
    let dontShow = true;



    if (!$('input[name="payment_method"]:checked').val() || $('input[name="payment_method"]:checked').val().length < 2) {
      $('#overlay').fadeOut();
      return;
    }

    if ($('input[name="payment_method"]:checked').val() && !dontShow) {
      $('#button-confirm').show();

    }

    $("#form-register").trigger('change', [true]);

    localStorage.setItem('payment-methods-container', $('input[name="payment_method"]:checked').val());
    localStorage.setItem('shipping-methods-container', $('input[name="shipping_method"]:checked').val());
    var hasAgreeCheckout = null;
    if ($("#input-register-agree-checkout") && $("#input-register-agree-checkout").is(':checked')) {
      hasAgreeCheckout = true;

    } else {
      hasAgreeCheckout = false
    }
    $.ajax({
      url: 'index.php?route=checkout/shipping_payment_methods.save&language=' + window.lang + '&agree_checkout=' + hasAgreeCheckout,
      type: 'post',
      data: $('#payment-shipping-method-form').serialize(),
      dataType: 'json',
      contentType: 'application/x-www-form-urlencoded',
      beforeSend: function () {
        $("#button-confirm").attr('disabled', true);

        $("#button-confirm").html(window.loaderDiv);

      },
      complete: function () {
        $("#button-confirm").attr('disabled', false);
        $("#button-confirm").text(window.btntxt);

      },
      success: function (json) {

        if (json['redirect']) {
          location = json['redirect'];
        }

        if (json['error']) {
          $('#alert').prepend('<div  class="alert alert-danger  hide alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['error'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
          setTimeout(() => {
            $("#button-confirm").text(json['error']).removeClass('btn-success').addClass('btn-danger').attr('disabled', true);
          }, 500);
        }

        if (json['success']) {
          $("#button-confirm").text(json['error']).removeClass('btn-danger').addClass('btn-success').attr('disabled', false);
          $("#error-payment-phone").text('');
          $("#error-shipping-phone").text('');

          if (arg === false) $('#alert').prepend('<div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');

          $("#button-confirm").show();
          $('#input-payment-method').val($('input[name=\'payment_method\']:checked').parent().find('label').text());
          $('#input-payment-code').val($('input[name=\'payment_method\']:checked').val());
          $('#checkout-payment').val('');
          $('#checkout-payment').empty();


          $('#checkout-confirm').load('index.php?route=checkout/confirm.confirm&language=' + window.lang, function () {
            // payment must be loaded only after confirm.cofirm finished setting session data vars for order

            $('#checkout-payment').load('index.php?route=checkout/confirm.payment&language=' + window.lang);


          });

        }
      },
      error: function (xhr, ajaxOptions, thrownError) {

        //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });


    setTimeout(() => {
      $(".alert").alert('close');
    }, 3500);

  });

  // Check if the phone input doesn't start with a single "+" and autocomplete by placeholder
  $('.shortPhone').on('input', function () {
    if (this.value.substr(0, 1) !== "+") {
      if (!isNaN($(this).attr('placeholder'))) {
        this.value = $(this).attr('placeholder') + ' ' + this.value;
      }
    }
  });


  $('input[name$=\'_existing\']').on('change', function () {
    var name = $(this).attr('name');
    var word = name.substring(0, name.indexOf('_existing'));

    if ($(this).val() == 1) {
      $('#' + word + '-existing').show();
      $('#' + word + '-new').hide();
    } else {
      $('#' + word + '-existing').hide();
      $('#' + word + '-new').show();
    }
  });


  $('.address-select').on('change', function () {
    var element = this;
    var type = $(element).data('type');

    chain.attach(function () {
      return $.ajax({
        url: 'index.php?route=checkout/address.address&language=' + window.lang + '&address_id=' + $(element).val() + '&address_type=' + type,
        dataType: 'json',
        beforeSend: function () {
          $(element).prop('disabled', true);
        },
        complete: function () {
          $(element).prop('disabled', false);
        },
        success: function (json) {
          //x console.log(json);

          $('#input-' + type + '-address').removeClass('is-invalid');
          $('#error-' + type + '-address').removeClass('d-block');

          if (json['redirect']) {
            location = json['redirect'];
          }

          if (json['error']) {
            $('#input-' + type + '-address').addClass('is-invalid');
            $('#error-' + type + '-address').html(json['error']).addClass('d-block');
          }

          if (json['success']) {
            $('#alert').prepend('<div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');

            $('#input-shipping-method').val('');
            $('#input-' + type + '-method').val('');

            // $('#checkout-confirm').load('index.php?route=checkout/confirm.confirm&language=<?= $this->e($language ) ?>');
            populatePaymentAndShippingMethods();
          }
        },
        error: function (xhr, ajaxOptions, thrownError) {
          //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    });
  });
  $('.address-form').on('submit', function (e) {
    e.preventDefault();

    var element = this;
    var type = $(element).data('type');

    chain.attach(function () {
      return $.ajax({
        url: 'index.php?route=checkout/address.save&language=' + window.lang + '&address_id=' + $(element).val() + '&address_type=' + type,
        type: 'post',
        data: $('#form-' + type + '-address').serialize(),
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        beforeSend: function () {
          $('#button-' + type + '-address').button('loading');
        },
        complete: function () {
          $('#button-' + type + '-address').button('reset');
        },
        success: function (json) {
          //x console.log(json);

          $('#form-' + type + '-address').find('.is-invalid').removeClass('is-invalid');
          $('#form-' + type + '-address').find('.invalid-feedback').removeClass('d-block');

          if (json['redirect']) {
            location = json['redirect'];
          }

          if (json['error']) {
            if (json['error']['warning']) {
              $('#alert').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['error']['warning'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
            }

            for (i in json['error']) {
              for (key in json['error']) {

                $('#input-' + type + '-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                $('#error-' + type + '-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                $("#button-confirm").text(json['error'][key]).removeClass('btn-success').addClass('btn-danger').attr('disabled', true);
              }
            }
          }

          if (json['success']) {
            $('#alert').prepend('<div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-check"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');

            $('#form-' + type + '-address')[0].reset();


            let html = '';
            if (json['addresses']) {
              for (i in json['addresses']) {
                html += '<option value="' + json['addresses'][i]['address_id'] + '">' + json['addresses'][i]['firstname'] + ' ' + json['addresses'][i]['lastname'] + ', ' + (json['addresses'][i]['company'] ? json['addresses'][i]['company'] + ', ' : '') + json['addresses'][i]['address_1'] + ', ' + json['addresses'][i]['city'] + ', ' + json['addresses'][i]['zone'] + ', ' + json['addresses'][i]['country'] + '</option>';
              }
            }

            // Payment Address
            $('#input-' + type + '-address').html(html);

            $('#input-' + type + '-address').val(json['address_id']);

            $('#' + type + '-addresses').css({ display: 'block' });

            $('#input-' + type + '-existing').trigger('click');

            $("#button-confirm").attr('disabled', false);
            $("#button-confirm").text(window.btntxt).removeClass('btn-danger').addClass('btn-success').attr('disabled', true);

            populatePaymentAndShippingMethods();

          }
        },
        error: function (xhr, ajaxOptions, thrownError) {

        }
      });
    });
  });

  $('#input-sameaddress').on('change', function () {

    toggleShippingAddressForm();
  });

  // Function to toggle the visibility of the shipping address form
  function toggleShippingAddressForm() {
    if ($('#input-sameaddress').prop('checked')) {
      $('.shipping-address-form').removeClass("d-none");

    } else {
      $('.shipping-address-form').addClass("d-none");
    }
  }


  var selectOptions = {};
  selectToAutocomplete('input-payment-country');

  selectToAutocomplete('input-payment-zone');


  window.updateOptions = function (elementId, newOptions) {
    // Update the selectOptions object with new options
    selectOptions[elementId] = newOptions;

    // Reinitialize the autocomplete for the updated element
    var $input = $('#autocpl-' + elementId);
    var $select = $('#' + elementId);
    $select.empty(); // Remove all current options

    // Add the new options to the select element
    newOptions.forEach(function (option) {
      $select.append('<option value="' + option.value + '">' + option.label + '</option>');
    });
    if ($input.length) {
      // Update the source of the autocomplete with new options
      $input.autocomplete("option", "source", newOptions);
    }
  }
  function selectToAutocomplete(elementId) {
    let selected = $('#' + elementId).data('oc-value');


    if ($('#autocpl-' + elementId).length) {
      $('#autocpl-' + elementId).autocomplete('close');
      $('#autocpl-' + elementId).remove();
    }

    selectOptions[elementId] = $('#' + elementId + ' option').map(function () {
      return { label: $(this).text(), value: $(this).val() };
    }).get();
    if ($('#autocpl-' + elementId).length) {
      $('#autocpl-' + elementId).remove();
    }
    var $input = $('<input type="text" id="autocpl-' + elementId + '" value="' + $('#' + elementId + ' option:selected').text().trim() + '" autocomplete="off">')
      .insertBefore('#' + elementId);
    if (typeof selected != 'undefined') {
      setTimeout(() => {
        let text = $('#' + elementId + ' option[value="' + 1280 + '"]').text();
        $input.val(text);

      }, 500);

    }

    $input.attr('class', $('#' + elementId).attr('class'));
    $input.autocomplete({
      source: selectOptions[elementId],
      minLength: 0,
      select: function (event, ui) {
        event.preventDefault();
        $input.val(ui.item.label.trim());
        $('#' + elementId).val(ui.item.value);
      }
    });

    $input.on('click', function () {
      $input.val('');
      $("#autocpl-" + elementId).autocomplete("search", "");
    });
    $input.on('blur', function () {
      $input.val($('#' + elementId + ' option:selected').text().trim());
      $('#' + elementId).trigger('change');
    });
    $('#' + elementId).hide();

  }


});


