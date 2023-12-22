<div class="accordion-item">
  <h2 class="accordion-header"><button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse-shipping"><?= $this->e($heading_title ) ?></button></h2>
  <div id="collapse-shipping" class="accordion-collapse collapse" data-bs-parent="#accordion">
    <div class="accordion-body">
      <form id="form-quote">
        <p><?= $this->e($text_destination ) ?></p>
        <div class="row mb-3 required">
          <label for="input-country" class="col-md-4 col-form-label"><?= $this->e($entry_country ) ?></label>
          <div class="col-md-8">
            <select name="country_id" id="input-country" class="form-select">
              <option value=""><?= $this->e($text_select ) ?></option>
              <?php foreach ($countries as $country): ?>
                <option value="<?= $this->e($country['country_id']) ?>"<?php if ($country['country_id'] == $country_id): ?> selected<?php endif; ?>><?= $this->e($country['name']) ?></option>
              <?php endforeach; ?>
            </select>
            <div id="error-country" class="invalid-feedback"></div>
          </div>
        </div>
        <div class="row mb-3 required">
          <label for="input-zone" class="col-md-4 col-form-label"><?= $this->e($entry_zone ) ?></label>
          <div class="col-md-8">
            <select name="zone_id" id="input-zone" class="form-select"></select>
            <div id="error-zone" class="invalid-feedback"></div>
          </div>
        </div>
        <div class="row mb-3 required">
          <label for="input-postcode" class="col-md-4 col-form-label"><?= $this->e($entry_postcode ) ?></label>
          <div class="col-md-8">
            <input type="text" name="postcode" value="<?= $this->e($postcode ) ?>" placeholder="<?= $this->e($entry_postcode ) ?>" id="input-postcode" class="form-control"/>
            <div id="error-postcode" class="invalid-feedback"></div>
          </div>
        </div>
        <div class="text-end">
          <button type="submit" id="button-quote" class="btn btn-primary"><?= $this->e($button_quote ) ?></button>
        </div>
      </form>
    </div>
  </div>
  <script type="text/javascript"><!--
  $('#form-quote').on('submit', function (e) {
      e.preventDefault();

      $.ajax({
          url: 'index.php?route=extension/opencart/total/shipping.quote&language=<?= $this->e($language ) ?>',
          type: 'post',
          data: $('#form-quote').serialize(),
          dataType: 'json',
          beforeSend: function () {
              $('#button-quote').button('loading');
          },
          complete: function () {
              $('#button-quote').button('reset');
          },
          success: function (json) {
              $('.alert-dismissible').remove();
              $('#form-shipping').find('.is-invalid').removeClass('is-invalid');
              $('#form-shipping').find('.invalid-feedback').removeClass('d-block');

              if (json['error']) {
                  if (json['error']['warning']) {
                      $('#alert').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['error']['warning'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                  }

                  for (key in json['error']) {
                      $('#input-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                      $('#error-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                  }
              }

              if (json['shipping_methods']) {
                  $('#modal-shipping').remove();

                  html = '<div id="modal-shipping" class="modal">';
                  html += '  <div class="modal-dialog">';
                  html += '    <div class="modal-content">';
                  html += '      <div class="modal-header">';
                  html += '        <h4 class="modal-title"><?= $this->e($text_shipping_method ) ?></h4>';
                  html += '        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>';
                  html += '      </div>';
                  html += '      <div class="modal-body">';
                  html += '        <form id="form-shipping">';
                  html += '          <p><?= $this->e($text_estimate ) ?></p>';

                  for (i in json['shipping_methods']) {
                      html += '<p><strong>' + json['shipping_methods'][i]['name'] + '</strong></p>';

                      if (!json['shipping_methods'][i]['error']) {
                          for (j in json['shipping_methods'][i]['quote']) {
                              html += '<div class="form-check">';

                              var code = i + '-' + j.replaceAll('_', '-');

                              html += '<input type="radio" name="shipping_method" value="' + json['shipping_methods'][i]['quote'][j]['code'] + '" id="input-shipping-method-' + code + '"';

                              if (json['shipping_methods'][i]['quote'][j]['code'] == '<?= $this->e($code ) ?>') {
                                  html += ' checked';
                              }

                              html += '/>';
                              html += '  <label for="input-shipping-method-' + code + '">' + json['shipping_methods'][i]['quote'][j]['name'] + ' - ' + json['shipping_methods'][i]['quote'][j]['text'] + '</label>';
                              html += '</div>';
                          }
                      } else {
                          html += '<div class="alert alert-danger alert-dismissible">' + json['shipping_methods'][i]['error'] + '</div>';
                      }
                  }

                  html += '          <div class="text-end">';
                  html += '            <button type="submit" id="button-shipping-method" class="btn btn-primary"><?= $this->e($button_shipping ) ?></button>';
                  html += '          </div>';
                  html += '        </form>';
                  html += '      </div>';
                  html += '    </div>';
                  html += '  </div>';
                  html += '</div>';

                  $('body').append(html);

                  $('#modal-shipping').modal('show');
              }
          },
          error: function (xhr, ajaxOptions, thrownError) {
              //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          }
      });
  });

  $(document).on('submit', '#form-shipping', function (e) {
      e.preventDefault();

      $.ajax({
          url: 'index.php?route=extension/opencart/total/shipping.save&language=<?= $this->e($language ) ?>',
          type: 'post',
          data: $('#form-shipping').serialize(),
          dataType: 'json',
          contentType: 'application/x-www-form-urlencoded',
          beforeSend: function () {
              $('#button-shipping-method').button('loading');
          },
          complete: function () {
              $('#button-shipping-method').button('reset');
          },
          success: function (json) {
              $('.alert-dismissible').remove();

              if (json['error']) {
                  $('#alert').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['error'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
              }

              if (json['success']) {
                  $('#alert').prepend('<div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');

                  $('#shopping-cart').load('index.php?route=checkout/cart.list&language=<?= $this->e($language ) ?>');

                  $('#modal-shipping').modal('hide');
              }
          },
          error: function (xhr, ajaxOptions, thrownError) {
              //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          }
      });
  });

  $('#input-country').on('change', function () {
      var element = this;

      $.ajax({
          url: 'index.php?route=localisation/country&country_id=' + this.value + '&language=<?= $this->e($language ) ?>',
          dataType: 'json',
          beforeSend: function () {
              $(element).prop('disabled', true);
              $('#input-zone').prop('disabled', true);
          },
          complete: function () {
              $(element).prop('disabled', false);
              $('#input-zone').prop('disabled', false);
          },
          success: function (json) {
              if (json['postcode_required'] == '1') {
                  $('#input-postcode').parent().parent().addClass('required');
              } else {
                  $('#input-postcode').parent().parent().removeClass('required');
              }

              html = '<option value=""><?= $this->e($text_select ) ?></option>';

              if (json['zone'] && json['zone'] != '') {
                  for (i = 0; i < json['zone'].length; i++) {
                      html += '<option value="' + json['zone'][i]['zone_id'] + '"';

                      if (json['zone'][i]['zone_id'] == '<?= $this->e($zone_id ) ?>') {
                          html += ' selected';
                      }

                      html += '>' + json['zone'][i]['name'] + '</option>';
                  }
              } else {
                  html += '<option value="0" selected><?= $this->e($text_none ) ?></option>';
              }

              $('#input-zone').html(html);
          },
          error: function (xhr, ajaxOptions, thrownError) {
              //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          }
      });
  });

  $('#input-country').trigger('change');
  //--></script>
</div>
