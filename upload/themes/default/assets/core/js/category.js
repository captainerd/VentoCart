$(document).ready(function () {

    var currUrl = null;
    const productList = $('#product-lista');

    let page = 1;
    let loading = false;
    //  let burned = {};

    function showLoader() {
        // Reduce opacity of #product-lista
        if (!window.infiniteScroll) {
            if ($('#product-lista').length == 0) { return; }
            $('#product-lista').css('opacity', '0.4');
            var destination = $('#product-lista').offset();
            var destinationHeight = $('#product-lista').outerHeight();
            var destinationWidth = $('#product-lista').outerWidth();

            $('#spinnerloader').css({
                top: destination.top + destinationHeight / 2,
                left: destination.left + destinationWidth / 2,
                position: 'absolute',
                display: 'block'
            });
        }
        $('#spinnerloader').show();
    }

    function hideLoader() {
        // Restore opacity of #product-lista
        $('#spinnerloader').hide();
        $('#product-lista').css('opacity', '1');
    }
    function fetchData() {
        if (loading) return;
        loading = true;

        if (currUrl == null) {
            currUrl = window.location.href;
        }
        const ajaxUrl = currUrl + (currUrl.includes('?') ? '&' : '?') + 'ajax=1&page=' + page;
        if ($("#no-more-results").length > 0) {
            loading = false;
            hideLoader();
            return;
        }


        showLoader();
        $.get(ajaxUrl + '&nocache=' + Date.now(), function (data) {


            if (!window.infiniteScroll) {
                productList.html(data);
            } else {
                if ($(data).find("#no-more-results").length > 0) {
                    $('#product-lista').append($(data).html());
                } else {
                    $('#product-list').append($(data).html());
                }
            }
            page++;
            loading = false;
            hideLoader();
        });
    }

    $(window).scroll(function () {
        if (typeof productList == 'undefined') {
            return;
        }
        const containerBottom = productList.offset().top + productList.outerHeight();
        const windowBottom = $(window).scrollTop() + $(window).height() + 50;

        if (windowBottom >= containerBottom) {
            if (window.infiniteScroll) {

                fetchData();
            }
        }
    });

    fetchData(); // Initial fetch

    $('#input-sort').on('change', function () {
        loadAjaxURL($(this).val());
    });

    $('#input-limit').on('change', function () {

        loadAjaxURL($(this).val());
    });


    $(document).on('click', '  .pagination a', function (event) {
        event.preventDefault();
        if ($(this).attr('href') == "#") { return; }
        loadAjaxURL($(this).attr('href'));
    });
    window.handleUrl = (url) => {
        loadAjaxURL(url);

    }
    function loadAjaxURL(clickedUrl) {

        page = 2;
        currUrl = clickedUrl;
        $('.column-left input[type="checkbox"]:checked').each(function () {
            clickedUrl = clickedUrl.endsWith('&') ? clickedUrl.slice(0, -1) : clickedUrl;
            clickedUrl += '&' + $(this).attr('name') + '=' + $(this).val() + '&';
        });
        clickedUrl = clearParams(clickedUrl);
        const clickedParams = new URLSearchParams(clickedUrl.split('?')[1]);
        const currentParams = new URLSearchParams(window.location.search);
        $("#no-more-results").remove();
        //   delete burned;
        if (clickedParams.get('route') === currentParams.get('route') && clickedParams.get('path') === currentParams.get('path')) {
            showLoader();

            clickedParams.set('ajax', '1');

            $.get(clickedUrl.split('?')[0] + '?' + clickedParams.toString(), function (data) {


                if (!window.infiniteScroll) {
                    productList.html(data);
                } else {

                    if ($(data).find("#no-more-results").length > 0) {
                        $('#product-lista').append($(data).html());
                        $('#product-list').html('');
                    } else {
                        $('#product-list').html($(data).html());
                    }

                }
                hideLoader();

            });
        } else {
            window.location.href = clickedUrl;
        }
    }

    function clearParams(params) {
        let obj = {};
        params = params.replace(/\+/g, ' ');
        params.split('&').forEach(substring => {
            obj[decodeURIComponent(substring)] = true;
        });
        const clearedParams = Object.keys(obj).join('&');
        return clearedParams.endsWith('&') ? clearedParams.slice(0, -1) : clearedParams;
    }

    // Legacy relevant parts

    $('#button-list').on('click', function () {
        // Change the class for the product list
        $('#product-list').attr('class', 'row row-cols-1 product-list');

        // Toggle active classes for buttons
        $('#button-grid').removeClass('active');
        $('#button-list').addClass('active');

        // Store the preference in localStorage
        localStorage.setItem('display', 'list');

        updateViewParam(1);
    });


    // Product Grid
    $('#button-grid').on('click', function () {

        $('#product-list').attr('class', 'row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4');

        $('#button-list').removeClass('active');
        $('#button-grid').addClass('active');

        localStorage.setItem('display', 'grid');

        updateViewParam(0);

    });
    function updateViewParam(param) {
        var currentUrl = window.location.href.split('?')[0];
        var urlParams = new URLSearchParams(window.location.search);
        urlParams.set('listview', param);
        var newUrl = currentUrl + '?' + urlParams.toString();
        window.location.href = newUrl;
    }
    // Local Storage

    if (localStorage.getItem('display') == 'list') {
        $('#product-list').attr('class', 'row row-cols-1 product-list');
        $('#button-list').addClass('active');
    } else {
        $('#product-list').attr('class', 'row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4');
        $('#button-grid').addClass('active');
    }
})


