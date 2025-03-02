function getURLVar(key) {
    var value = [];

    var query = String(document.location).split('?');

    if (query[1]) {
        var part = query[1].split('&');

        for (i = 0; i < part.length; i++) {
            var data = part[i].split('=');

            if (data[0] && data[1]) {
                value[data[0]] = data[1];
            }
        }

        if (value[key]) {
            return value[key];
        } else {
            return '';
        }
    }
}
// Search Autocomplete

$(document).ready(function () {
    class AutocompleteSearch {
        constructor(inputSelector) {
            this.input = $(inputSelector);
            this.suggestionsList = this.input.siblings('.search-suggestions');
            this.timer = null;
            this.selectedIndex = -1;
            this.limit = 5;
            this.bindEvents();
        }

        bindEvents() {
            this.input.on('keyup', (e) => this.handleKeyUp(e));
            this.suggestionsList.on('click', 'li', (e) => this.handleSuggestionClick(e));
            $(document).on('click', (e) => this.handleDocumentClick(e));
            this.input.on('keydown', (e) => this.handleKeyDown(e));
        }

        handleKeyUp(e) {
            let query = this.input.val().trim();

            // Ignore navigation keys (up, down, enter)
            if ([38, 40, 13].includes(e.keyCode)) return;

            clearTimeout(this.timer);
            if (query.length >= 2) {
                this.timer = setTimeout(() => this.fetchSuggestions(query), 300);
            } else {
                this.suggestionsList.hide();
            }
        }

        handleKeyDown(e) {
            const items = this.suggestionsList.find('li');
            if (!items.length) return;

            if (e.keyCode === 40) { // Down arrow
                this.selectedIndex = (this.selectedIndex + 1) % items.length;
            } else if (e.keyCode === 38) { // Up arrow
                this.selectedIndex = (this.selectedIndex - 1 + items.length) % items.length;
            } else if (e.keyCode === 13 && this.selectedIndex !== -1) { // Enter
                window.location.href = $(items[this.selectedIndex]).data('url');
            }

            items.removeClass('active');
            $(items[this.selectedIndex]).addClass('active');
        }

        handleSuggestionClick(e) {
            const url = $(e.target).data('url');
            window.location.href = url;
        }

        handleDocumentClick(e) {
            if (!$(e.target).closest('.search-container').length) {
                this.suggestionsList.hide();
            }
        }

        fetchSuggestions(query) {
            $.ajax({
                url: '/index.php?route=product/category.autocomplete',
                type: 'GET',
                data: { filter_name: query, limit: this.limit },
                dataType: 'json',
                success: (data) => this.renderSuggestions(data)
            });
        }

        renderSuggestions(data) {
            this.suggestionsList.empty().show();
            if (data.length) {
                data.forEach(product => {
                    this.suggestionsList.append(`
                    <li data-url="/index.php?route=product/product&product_id=${product.product_id}">
                     ${product.name} 
                    </li>
                `);
                });
            } else {
                this.suggestionsList.append('<span>' + data.message + '</span>');
            }
        }
    }

    // Initialize the autocomplete search
    $('.search-input').each(function () {
        new AutocompleteSearch(this);
    });
});



$(document).ready(function () {
    // nav menu
    $('.nav-link').on('click', function (e) {
        var $submenu = $(this).next('.dropdown-menu');
        var $parentUl = $(this).closest('ul'); // Find the closest <ul> parent

        // Check if the <ul> has the 'nav-tabs' class
        if ($parentUl.hasClass('nav-tabs')) {
            e.preventDefault(); // Prevent link redirect if parent <ul> has 'nav-tabs'
            return false; // Ensure no further action occurs
        }

        // If no submenu, allow the link to work as usual
        if ($submenu.length === 0) {
            window.location.href = $(this).attr('href');
            return true;
        }

        // Prevent default action if it's a parent item
        e.preventDefault();

        // Close all other dropdowns
        $('.dropdown-menu').not($submenu).removeClass('show');

        // Toggle the clicked one
        $submenu.toggleClass('show');
    });

    // initialize one quickview modal


    $(".autoplayHover").mouseover(function () {

        // $(this).siblings('.play-overlay').hide();
        this.play();
    });

    $(".autoplayHover").mouseout(function () {

        // $(this).siblings('.play-overlay').show();
        this.pause();
    });


    $(document).on("click", ".quick-view-button", function (event) {
        event.preventDefault();
        event.stopImmediatePropagation();

        if (window.innerWidth < 400) {
            return;
        }
        $(".modal-content-quckview").html('<div class="d-flex align-items-center justify-content-center" style="height: 20vh;"><div class="spinner-border text-primary" role="status">  </div></div>');

        // Show a loading spinner inside the modal content

        $('#quickViewModal').modal('show');
        // Load the content from the data-targ attribute into the modal body
        $(".modal-content-quckview").load($(this).attr("data-targ"), function () {
            // After content is loaded, show the modal

        });
    });



    // Tooltip
    var oc_tooltip = function () {
        // Get tooltip instance
        tooltip = bootstrap.Tooltip.getInstance(this);
        if (!tooltip) {
            // Apply to current element
            tooltip = bootstrap.Tooltip.getOrCreateInstance(this);
            tooltip.show();
        }
    }

    $(document).on('mouseenter', '[data-bs-toggle=\'tooltip\']', oc_tooltip);

    $(document).on('click', 'button', function () {
        $('.tooltip').remove();
    });

    // Date
    var oc_datetimepicker = function () {
        $(this).daterangepicker({
            singleDatePicker: true,
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'YYYY-MM-DD'
            }
        }, function (start, end) {
            $(this.element).val(start.format('YYYY-MM-DD'));
        });
    }

    $(document).on('focus', '.date', oc_datetimepicker);

    // Time
    var oc_datetimepicker = function () {
        $(this).daterangepicker({
            singleDatePicker: true,
            datePicker: false,
            autoApply: true,
            autoUpdateInput: false,
            timePicker: true,
            timePicker24Hour: true,
            locale: {
                format: 'HH:mm'
            }
        }, function (start, end) {
            $(this.element).val(start.format('HH:mm'));
        }).on('show.daterangepicker', function (ev, picker) {
            picker.container.find('.calendar-table').hide();
        });
    }

    $(document).on('focus', '.time', oc_datetimepicker);

    // Date Time
    var oc_datetimepicker = function () {
        $('.datetime').daterangepicker({
            singleDatePicker: true,
            autoApply: true,
            autoUpdateInput: false,
            timePicker: true,
            timePicker24Hour: true,
            locale: {
                format: 'YYYY-MM-DD HH:mm'
            }
        }, function (start, end) {
            $(this.element).val(start.format('YYYY-MM-DD HH:mm'));
        });
    }

    $(document).on('focus', '.datetime', oc_datetimepicker);

    // Alert Fade
    var oc_alert = function () {
        window.setTimeout(function () {
            $('.alert-dismissible').fadeTo(1000, 0, function () {
                $(this).remove();
            });
        }, 3000);
    }

    $(document).on('click', 'button', oc_alert);
    $(document).on('click', 'change', oc_alert);
});

$(document).ready(function () {

    // currency
    $('.form-currency .dropdown-item').on('click', function (e) {
        e.preventDefault();

        $(this).closest('.form-currency').find('input[name="code"]').val($(this).attr('href'));

        // Submit the closest form-currency form
        $(this).closest('.form-currency').submit();
    });
    // Search
    $('#search input[name=\'search\']').parent().find('button').on('click', function () {
        var url = $('base').attr('href') + 'index.php?route=product/search&language=' + $(this).attr('data-lang');

        var value = $('header #search input[name=\'search\']').val();

        if (value) {
            url += '&search=' + encodeURIComponent(value);
        }

        location = url;
    });

    $('#search input[name=\'search\']').on('keydown', function (e) {
        if (e.keyCode == 13) {
            $('header #search input[name=\'search\']').parent().find('button').trigger('click');
        }
    });



    /* Agree to Terms */
    $('body').on('click', '.modal-link', function (e) {
        e.preventDefault();

        var element = this;

        $('#modal-information').remove();

        $.ajax({
            url: $(element).attr('href'),
            dataType: 'html',
            success: function (html) {
                $('body').append(html);

                $('#modal-information').modal('show');
            }
        });
    });

    // Cookie Policy
    $('#cookie button').on('click', function () {
        var element = this;

        $.ajax({
            url: $(this).val(),
            type: 'get',
            dataType: 'json',
            beforeSend: function () {
                $(element).button('loading');
            },
            complete: function () {
                $(element).button('reset');
            },
            success: function (json) {
                if (json['success']) {
                    $('#cookie').fadeOut(400, function () {
                        $('#cookie').remove();
                    });
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
});

// Forms
$(document).on('submit', 'form[data-oc-toggle=\'ajax\']', function (e) {
    e.preventDefault();
    setTimeout(() => {
        $(".tooltip").hide();
    }, 600);

    var element = this;

    var form = e.target;

    var action = $(form).attr('action');

    if (e.originalEvent !== undefined && e.originalEvent.submitter !== undefined) {
        var button = e.originalEvent.submitter;
    } else {
        var button = '';
    }

    var formaction = $(button).attr('formaction');

    if (formaction !== undefined) {
        action = formaction;
    }

    var method = $(form).attr('method');

    if (method === undefined) {
        method = 'post';
    }

    var enctype = $(element).attr('enctype');

    if (enctype === undefined) {
        enctype = 'application/x-www-form-urlencoded';
    }

    var html = $(button).html();
    var width = $(button).width();

    // https://github.com/ventocart/ventocart/issues/9690
    if (typeof CKEDITOR != 'undefined') {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
    }

    //x console.log(e);
    //x console.log('element ' + element);
    //x console.log('action ' + action);
    //x console.log('button ' + button);
    //x console.log('formaction ' + formaction);
    //x console.log('method ' + method);
    //x console.log('enctype ' + enctype);

    $.ajax({
        url: action,
        type: method,
        data: $(form).serialize(),
        dataType: 'json',
        cache: false,
        contentType: enctype,
        processData: false,
        beforeSend: function () {
            $(button).button('loading');
        },
        complete: function () {
            $(button).button('reset');
        },
        success: function (json) {
            $('.alert-dismissible').remove();
            $(form).find('.is-invalid').removeClass('is-invalid');
            $(form).find('.invalid-feedback').removeClass('d-block');

            if (json['options_needed'] && window.innerWidth > 400) {

                // Show a loading spinner inside the modal content
                $(".modal-content-quckview").html('<div class="d-flex align-items-center justify-content-center" style="height: 20vh;"><div class="spinner-border text-primary" role="status"> <span class="sr-only">Loading...</span> </div></div>');
                // Load the content from the data-targ attribute into the modal body
                $('#quickViewModal').modal('show');
                $(".modal-content-quckview").load('?route=product/product&quickview=1&product_id=' + json['options_needed'], function () {
                    // After content is loaded, show the modal


                });
                return;
            }

            if (json['redirect']) {
                location = json['redirect'].replaceAll('&amp;', '&');
            }

            if (typeof json['error'] == 'string') {
                $('#alert').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['error'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
            }

            if (typeof json['error'] == 'object') {
                if (json['error']['warning']) {
                    $('#alert').prepend('<div class="alert alert-danger alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['error']['warning'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                }

                for (var key in json['error']) {
                    $('#input-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                    $('#error-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                }
            }

            if (json['success']) {
                setTimeout(() => {
                    $('#alert').prepend('<div class="alert alert-success alert-dismissible"><i class="fa-solid fa-circle-exclamation"></i> ' + json['success'] + ' <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');

                }, 1300);

                // Refresh
                var url = $(form).attr('data-oc-load');
                var target = $(form).attr('data-oc-target');
                if ($(form).attr('data-oc-where') === "thumb") {
                    //fly to the cart effect should take place here.

                }

                if (url !== undefined && target !== undefined) {
                    $(target).load(url);
                }
            }

            // Replace any form values that correspond to form names.
            for (var key in json) {
                $(form).find('[name=\'' + key + '\']').val(json[key]);
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});






$(document).on('click', 'button[data-oc-toggle=\'upload\']', function () {
    var element = this;

    if (!$(element).prop('disabled')) {
        $('#form-upload').remove();

        $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" value=""/></form>');

        $('#form-upload input[name=\'file\']').trigger('click');

        $('#form-upload input[name=\'file\']').on('change', function (e) {
            if ((this.files[0].size / 1024) > $(element).attr('data-oc-size-max')) {
                alert($(element).attr('data-oc-size-error'));

                $(this).val('');
            }
        });

        if (typeof timer !== 'undefined') {
            clearInterval(timer);
        }

        var timer = setInterval(function () {
            if ($('#form-upload input[name=\'file\']').val() != '') {
                clearInterval(timer);

                $.ajax({
                    url: $(element).attr('data-oc-url'),
                    type: 'post',
                    data: new FormData($('#form-upload')[0]),
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $(element).button('loading');
                    },
                    complete: function () {
                        $(element).button('reset');
                    },
                    success: function (json) {
                        //x console.log(json);

                        if (json['error']) {
                            alert(json['error']);
                        }

                        if (json['success']) {
                            alert(json['success']);
                        }

                        if (json['code']) {
                            $($(element).attr('data-oc-target')).attr('value', json['code']);
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        //x console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });
            }
        }, 500);
    }
});

// Chain ajax calls.
class Chain {
    constructor() {
        this.start = false;
        this.data = [];
    }

    attach(call) {
        this.data.push(call);

        if (!this.start) {
            this.execute();
        }
    }

    execute() {
        if (this.data.length) {
            this.start = true;

            var call = this.data.shift();

            var jqxhr = call();

            jqxhr.done(function () {
                chain.execute();
            });
        } else {
            this.start = false;
        }
    }
}

var chain = new Chain();

// Autocomplete
+function ($) {
    $.fn.autocomplete = function (option) {
        return this.each(function () {
            var element = this;
            var $dropdown = $('#' + $(element).attr('data-oc-target'));

            this.timer = null;
            this.items = [];

            $.extend(this, option);

            // Focus in
            $(element).on('focusin', function () {
                element.request();
            });

            // Focus out
            $(element).on('focusout', function (e) {
                if (!e.relatedTarget || !$(e.relatedTarget).hasClass('dropdown-item')) {
                    $dropdown.removeClass('show');
                }
            });

            // Input
            $(element).on('input', function (e) {
                element.request();
            });

            // Click
            $dropdown.on('click', 'a', function (e) {
                e.preventDefault();

                var value = $(this).attr('href');

                if (element.items[value] !== undefined) {
                    element.select(element.items[value]);

                    $dropdown.removeClass('show');
                }
            });

            // Request
            this.request = function () {
                clearTimeout(this.timer);

                $('#autocomplete-loading').remove();

                $dropdown.prepend('<li id="autocomplete-loading"><span class="dropdown-item text-center disabled"><i class="fa-solid fa-circle-notch fa-spin"></i></span></li>');
                $dropdown.addClass('show');

                this.timer = setTimeout(function (object) {
                    object.source($(object).val(), $.proxy(object.response, object));
                }, 50, this);
            }

            // Response
            this.response = function (json) {
                var html = '';
                var category = {};
                var name;
                var i = 0, j = 0;

                if (json.length) {
                    for (i = 0; i < json.length; i++) {
                        // update element items
                        this.items[json[i]['value']] = json[i];

                        if (!json[i]['category']) {
                            // ungrouped items
                            html += '<li><a href="' + json[i]['value'] + '" class="dropdown-item">' + json[i]['label'] + '</a></li>';
                        } else {
                            // grouped items
                            name = json[i]['category'];

                            if (!category[name]) {
                                category[name] = [];
                            }

                            category[name].push(json[i]);
                        }
                    }

                    for (name in category) {
                        html += '<li><h6 class="dropdown-header">' + name + '</h6></li>';

                        for (j = 0; j < category[name].length; j++) {
                            html += '<li><a href="' + category[name][j]['value'] + '" class="dropdown-item">' + category[name][j]['label'] + '</a></li>';
                        }
                    }
                }

                $dropdown.html(html);
            }
        });
    }
}(jQuery);

// Button
$(document).ready(function () {
    +function ($) {
        $.fn.button = function (state) {
            return this.each(function () {
                var element = this;

                if (state == 'loading') {
                    this.html = $(element).html();
                    this.state = $(element).prop('disabled');

                    $(element).prop('disabled', true).width($(element).width()).html('<i class="fa-solid fa-circle-notch fa-spin text-light"></i>');
                }

                if (state == 'reset') {
                    $(element).prop('disabled', this.state).width('').html(this.html);
                }
            });
        }
    }(jQuery);


});