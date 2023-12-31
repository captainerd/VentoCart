
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

      if (typeof value !== "undefined" && !parentDiv.hasClass('d-none') && value.length < 1) {

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

      $('#checkout-payment').hide();
      return false;
    } else {

      //Throttle form submition requests as the user types in
      if (throttle) {


        clearTimeout(this.submitThrottling);
        this.submitThrottling = setTimeout(() => {
          if (!$('#input-register-acc').is(':checked')) $('#form-' + this.formName).trigger('submit', [true]);

        }, 4000);
      }

      if ($('input[name="payment_method"]:checked').val() && $('input[name="shipping_method"]:checked').val()) {
        $("#button-confirm").attr('disabled', true);
        $("#button-confirm").html(window.loaderDiv);
        if (!$('#input-register-acc').is(':checked')) $('#button-confirm').show();
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

        var html = '<option value="">' + window.text_select + '</option>';

        if (json['zone'] && !json['zone'].length) {
          $('#input-' + type + '-zone').parent().hide();

          return;
        } else {
          $('#input-' + type + '-zone').parent().show();
        }

        if (json['zone'] && json['zone'].length && json['zone'] != '') {



          for (var i = 0; i < json['zone'].length; i++) {
            html += '<option value="' + json['zone'][i]['zone_id'] + '"';
            if (json['zone'][i]['zone_id'] == $('#input-' + type + '-zone').attr('data-oc-value')) {
              html += ' selected';
            }
            html += '>' + json['zone'][i]['name'] + '</option>';
          }
        } else {
          html += '<option value="0" selected>' + window.text_none + '</option>';
        }
        $('#input-' + type + '-zone').html(html);
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
      //Or you can decide by setting Admin/Extension, Order: 0) and the rest Order: 1,2,3  
      //The 'Order 0' will be checked
      if (mindex === 0 && index === 0) {
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

//Save the selected Payment/Shipping Settings
$(document).ready(function () {


  $(document).on('change', '#payment-shipping-method-form', function (e, arg = false) {

    e.preventDefault();
    let dontShow = true;

    if (!$('input[name="shipping_method"]:checked').val()) {
      $("#checkout-shipping-method").addClass("is-invalid");
      return;
    } else {

      $("#checkout-shipping-method").removeClass("is-invalid");
    }


    if (!$('input[name="payment_method"]:checked').val()) {
      $("#checkout-payment-method").addClass("is-invalid");
      return;
    } else {
      $("#checkout-payment-method").removeClass("is-invalid");
    }


    if (!$('input[name="payment_method"]:checked').val() || $('input[name="payment_method"]:checked').val().length < 2) {
      $('#overlay').fadeOut();
      return;
    }

    if ($('input[name="payment_method"]:checked').val() && !dontShow) {
      $('#button-confirm').show();

    }

    $("#form-register").trigger('change', [true]);

    $.ajax({
      url: 'index.php?route=checkout/shipping_payment_methods.save&language=' + window.lang,
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
          $('#checkout-payment').load('index.php?route=checkout/payment.confirm&language=' + window.lang);

          $('#checkout-confirm').load('index.php?route=checkout/confirm.confirm&language=' + window.lang);

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

});


