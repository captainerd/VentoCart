
function productInit() {
    /* CaptaiNerd: Keep intact the original Id's  when customizing your template */

    // Enable/disabled variation options to override regular options

    if (typeof productVariation !== 'undefined' && Object.keys(productVariation).length > 0) {
        let la = {};

        for (variation in productVariation) {
            for (option in productVariation[variation].options) {
                let poptionId = productVariation[variation].options[option].product_option_id;
                if (productVariation[variation].quantity == 0) {

                    if (typeof la[poptionId] == 'undefined') {
                        $("#input-option-value-" + poptionId).attr('disabled', true);
                        $("label[for='input-option-value-" + poptionId + "'] img").css('opacity', '0.4');
                        la[poptionId] = true;
                    }
                } else {
                    $("#input-option-value-" + poptionId).attr('disabled', false);
                    $("label[for='input-option-value-" + poptionId + "'] img").css('opacity', '1');
                    la[poptionId] = false;
                }
            }
        }
    }


    var container = $(".slider-container");
    $(function () {



        $.fn.blowup = function (attributes) {

            var $element = this;
            $('#BlowupLens').remove();
            // If the target element is not an image
            if (!$element.is("img")) {
                console.log("%c Blowup.js Error: " + "%cTarget element is not an image.",
                    "background: #FCEBB6; color: #F07818; font-size: 17px; font-weight: bold;",
                    "background: #FCEBB6; color: #F07818; font-size: 17px;");
                return;
            }

            // Constants
            var $IMAGE_URL = $element.attr("src");
            var NATIVE_IMG = new Image();
            NATIVE_IMG.src = $element.attr("src");

            // Default attributes
            var defaults = {
                round: true,
                width: 200,
                height: 200,
                background: "#FFF",
                shadow: "0 8px 17px 0 rgba(0, 0, 0, 0.5)",
                border: "6px solid #FFF",
                cursor: true,
                zIndex: 999999,
                scale: 2,
                customClasses: ""
            }

            // Update defaults with custom attributes
            var $options = $.extend(defaults, attributes);

            // Modify target image
            $element.on('dragstart', function (e) { e.preventDefault(); });
            $element.css("cursor", $options.cursor ? "crosshair" : "none");

            // Create magnification lens element
            var lens = document.createElement("div");
            lens.id = "BlowupLens";

            // Attack the element to the body
            $("body").append(lens);

            // Updates styles
            $blowupLens = $("#BlowupLens");

            $blowupLens.css({
                "position": "absolute",
                "display": "none",
                "pointer-events": "none",
                "zIndex": $options.zIndex,
                "width": $options.width,
                "height": $options.height,
                "border": $options.border,
                "background": $options.background,
                "border-radius": $options.round ? "50%" : "none",
                "box-shadow": $options.shadow,
                "background-repeat": "no-repeat",
            });

            // Add custom CSS classes
            $blowupLens.addClass($options.customClasses);

            // Show magnification lens
            $element.mouseenter(function () {
                $blowupLens.css("display", "block");
            })

            // Mouse motion on image
            $element.mousemove(function (e) {

                // Lens position coordinates
                var lensX = e.pageX - $options.width / 2;
                var lensY = e.pageY - $options.height / 2;

                // Relative coordinates of image
                var relX = e.pageX - $(this).offset().left;
                var relY = e.pageY - $(this).offset().top;

                // Zoomed image coordinates 
                var zoomX = -Math.floor(relX / $element.width() * (NATIVE_IMG.width * $options.scale) - $options.width / 2);
                var zoomY = -Math.floor(relY / $element.height() * (NATIVE_IMG.height * $options.scale) - $options.height / 2);

                var backPos = zoomX + "px " + zoomY + "px";
                var backgroundSize = NATIVE_IMG.width * $options.scale + "px " + NATIVE_IMG.height * $options.scale + "px";

                // Apply styles to lens
                $blowupLens.css({
                    left: lensX,
                    top: lensY,
                    "background-image": "url(" + encodeURI($IMAGE_URL) + ")",
                    "background-size": backgroundSize,
                    "background-position": backPos
                });
            })



            // Hide magnification lens
            $element.mouseleave(function () {
                $blowupLens.css("display", "none");

            });

            $element.on('remove', function () {
                $('#BlowupLens').remove();
                $element.removeData('blowup-initialized');
            });

        }


        $(".magnifyglass").blowup();


        $(".slider-container video").mouseover(function () {
            let newSrc = $(this).find('source').attr('src');

            placeinVideo(newSrc)



        });
        //Selection effect 
        $(".slider-container img, .slider-container video").mouseover(function () {
            $(".slider-container img, .slider-container video").each(function () {
                $(this).removeClass('slider-selected');
            });
            $(this).addClass('slider-selected');
        });

        $(".slider-container img").mouseover(function () {
            var newSrc = $(this).attr("src");
            newSrc = newSrc.replace(/(\d+)x(\d+)(?=\D*$)/i, window.picontWidth + 'x' + window.picontHeight);
            placeinImage(newSrc);
        });



        //Display the thumbnail option in the main picture view area

        $(".form-check-product label").on("click", function () {

            if ($(this).find("img").length > 0) {
                $('#pictureContainer').show();
                $('#videoContainer').hide();

                var newSrc = $(this).find("img").attr("src");

                newSrc = newSrc.replace(/(\d+)x(\d+)(?=\D*$)/i, window.picontWidth + 'x' + window.picontHeight);


                $("#mainpic img").attr("src", newSrc);
                $("#mainpic a").attr("href", newSrc);

            }
            $(".magnifyglass").blowup();
        });

        $("img").on("load", function () {

            checkOverflow();
        });

        function placeinImage(newSrc) {

            $('#pictureContainer').show();
            $('#videoContainer').hide();
            $("#mainpic img").attr("src", newSrc);

            // Change the href attribute of the #mainpic a element
            $("#mainpic a").attr("href", newSrc);
            $(".magnifyglass").blowup();

        }
        function placeinVideo(newSrc) {

            let height = $('.img-zoom-container').height();
            $('.img-zoom-container').height(height);

            $('#videoContainer').show();
            $('#pictureContainer').hide();

            let $video = $('#videoContainer video');
            $video.show();

            $video.find('source').remove();
            $video.append($('<source>').attr({ 'src': newSrc, 'type': 'video/' + newSrc.split('.').pop().toLowerCase() }));
            $video[0].addEventListener('canplaythrough', function () {
                // Play the video
                $video.prop('muted', true);
                $video.prop('autoplay', true);
                $('.img-zoom-container').height('auto');
                //$video[0].play();
            });
            $video[0].load();
        }
        // initialize the splide
        const splide = new Splide('.productThumb', {

            gap: 10,
            rewind: true,

            perPage: 4,
            type: 'slide',

            pagination: true,
            focus: 'center',

            breakpoints: {
                600: {
                    fixedWidth: 100,
                    fixedHeight: 100,
                },
            },
        }).mount();
        splide.on('move', () => {
            const activeIndex = splide.index; // Index of the current active slide

            // Optional: Access the active slide element
            const activeSlide = splide.Components.Slides.getAt(activeIndex).slide;
            let newSrc = activeSlide.lastElementChild.getAttribute('href');
            newSrc = newSrc.replace(/(\d+)x(\d+)(?=\D*$)/i, window.picontWidth + 'x' + window.picontHeight);
            const videoExtensions = /\.(avi|mkv|mp4)$/i;
            if (videoExtensions.test(newSrc)) {
                placeinVideo(newSrc)
                console.log('newSrc is a video file.');
            } else {
                placeinImage(newSrc)
            }
        });





        function checkOverflow() {
            var container = $(".slider-container")[0];
            if (typeof container == "undefined") return;
            if (container.scrollWidth > container.clientWidth) {
                // Overflow is hidden, show the scroll buttons
                $(".scroll-button").show();
            } else {
                // No hidden overflow, hide the scroll buttons
                $(".scroll-button").hide();
            }
        }

        // Check overflow on page load
        checkOverflow();

        // Check overflow on window resize (in case the size changes)
        $(window).resize(function () {
            checkOverflow();
        });

        // Calculate prices in real-time based on the selected options

        $('#form-product').on('change', 'input[data-spanid], select[data-spanid]', function (event) {
            // Get the data-spanid value from the clicked radio button


            let prefix = $(this).data('priceprefix');
            let price = $(this).data('price');

            let name = null;

            //Check if it is a part of a variation and cancel setting option price
            Object.entries(productVariation).forEach(([key, value]) => {
                Object.keys(value.options).forEach((opt) => {
                    //  if ($(this).val() == value.options[opt].product_option_id) price = 0;
                });
            });


            if ($(this).is('select')) {

                price = $(this).find('option:selected').data('price');
                prefix = $(this).find('option:selected').data('priceprefix');
                name = $(this).attr('name').replace(/[^\d.-]/g, '');
            }
            if ($(this).prop('type') == "radio") {

                name = $(this).attr('name').replace(/[^\d.-]/g, '');
                $('#' + $(this).data('spanid')).text($(this).next('label').attr('data-text'));
            }

            if ($(this).prop('type') == "checkbox") {

                name = $(this).val();
            }
            delete window.productTotal[name];
            window.productTotal[name] = [];

            if (price == "") price = 0;
            window.productTotal[name][prefix] = price;

            if (!$(this).prop('checked') && !$(this).is('select')) delete window.productTotal[name];

            //Enable and disable out of stock variation options

            enableDisable($(this).parent().parent().attr('id'), $(this).val());

            //Fetch applicable variations
            resultVariation = checkVariations();

            //Recalcuate the sum of the price

            reCalcPrice(resultVariation);

        });


        function checkVariations() {
            let resultVariation = null; // Store the variation that satisfies the condition
            if (typeof productVariation == 'undefined') return;
            $.each(productVariation, function (index, variation) {

                if (variationSatisfies(variation)) {
                    resultVariation = variation;
                    return false; // exit the loop early
                }
            });

            return resultVariation;
        }
        function enableDisable(ignore, value) {

            let sets = new Set();
            let enableSets = new Set();


            $("#form-product div").find("input:checked, select option:selected").each(function () {

                if ($(this).val() != "") enableSets.add($(this).val())

            });


            // Create a new object to store applicable variations for the user selection

            filteredVariation = {};
            for (variation in productVariation) {
                let varSet = new Set();
                for (option in productVariation[variation].options) {
                    varSet.add(productVariation[variation].options[option].product_option_id);

                }

                if (isSubset(varSet, enableSets)) {
                    filteredVariation[variation] = productVariation[variation];
                }

            }
            //Disable or enable these with quantity
            previeouslyEnabled = {};
            for (variation in filteredVariation) {
                let varSet = new Set();
                let level = 0;
                for (option in filteredVariation[variation].options) {
                    let varOpt = filteredVariation[variation].options[option].product_option_id;
                    if (parseInt(filteredVariation[variation].quantity) == 0) {

                        if (!previeouslyEnabled[varOpt] && level > 0) $("#input-option-value-" + varOpt).prop("disabled", true);
                    } else {
                        previeouslyEnabled[varOpt] = true;
                        $("#input-option-value-" + varOpt).prop("disabled", false);
                    }
                    level++;

                }

                if (isSubset(varSet, enableSets)) {
                    filteredVariation[variation] = productVariation[variation];
                }

            }
        }




        function isSubset(superSet, subSet) {
            return Array.from(subSet).every(value => superSet.has(value));
        }


        function variationSatisfies(variation) {
            var satisfied = true;
            var uniqueValues = new Set();

            // Populate the set with all unique product_option_id values
            $.each(variation.options, function (index, option) {
                uniqueValues.add(option.product_option_id);
            });

            $.each(variation.options, function (index, option) {
                // Check <select> elements
                var foundSelect = false;
                $('#form-product').find('select').each(function () {
                    var currentSelect = $(this);
                    var selectedOptionValue = currentSelect.find('option:selected').val();

                    if (uniqueValues.has(selectedOptionValue)) {
                        uniqueValues.delete(selectedOptionValue); // Remove the found value
                        foundSelect = true;
                        return false; // exit the loop early
                    }
                });

                // Check <input> elements (including checkboxes and radios)
                var foundInput = false;
                $('#form-product').find(':input').each(function () {
                    var currentInput = $(this);
                    var inputValue = currentInput.val();


                    if (currentInput.is(':checkbox') || currentInput.is(':radio')) {

                        // For checkboxes and radios, consider the "checked" state
                        if (currentInput.prop('checked') && uniqueValues.has(inputValue)) {
                            uniqueValues.delete(inputValue); // Remove the found value
                            foundInput = true;
                            return false; // exit the loop early
                        }
                    } else {
                        // For other input types, consider the "value" attribute
                        if (uniqueValues.has(inputValue)) {
                            uniqueValues.delete(inputValue); // Remove the found value
                            foundInput = true;
                            return false; // exit the loop early
                        }
                    }
                });

            });


            // If uniqueValues set is empty, all values have been found
            if (uniqueValues.size === 0) {
                return variation;
            } else {
                return false;
            }
        }



        function reCalcPrice(variation, poptionId) {

            // Get the current displayed price text
            let currentPriceText = window.productPrice;

            let replacePrice = parseFloat($(".price-calc").text().replace(/[^\d.-]/g, '')).toFixed(2);
            replacePrice = formatNumber(replacePrice);
            let currentPrice = parseFloat(currentPriceText.replace(/[^\d.-]/g, ''));




            if (variation) {

                //Apply any potential discount ('special' only when type is total)
                currentPrice = variation.price - ((variation.price) * window.discount / 100);
                currentPrice = parseFloat(currentPrice);
                //Apply any potential taxes

                currentPrice = calculateTax(currentPrice);

            } else {

                Object.keys(window.productTotal).forEach(function (optionName) {
                    let optionValues = window.productTotal[optionName];
                    if (optionValues['=']) {
                        let optionValue = parseFloat(optionValues['='].replace(/[^\d.-]/g, ''));
                        //Apply any potential discount ('special' only when type is total)
                        optionValue = optionValue - (optionValue * window.discount / 100);
                        currentPrice = calculateTax(optionValue);
                    }
                });
                Object.keys(window.productTotal).forEach(function (optionName) {
                    let optionValues = window.productTotal[optionName];

                    if (optionValues['+']) {

                        let optionValue = parseFloat(optionValues['+'].replace(/[^\d.-]/g, ''));
                        if (optionValue == 0) return;

                        currentPrice = currentPrice + calculateTax(optionValue, false);
                    }

                    if (optionValues['-']) {

                        let optionValue = parseFloat(optionValues['-'].replace(/[^\d.-]/g, ''));
                        if (optionValue == 0) return;
                        currentPrice = currentPrice - calculateTax(optionValue, false);
                    }
                });
            }

            $(".price-calc").text($(".price-calc").text().replace(replacePrice, formatNumber(parseFloat(currentPrice).toFixed(2))));

            //Update pre-tax
            deTaxUpdate(currentPrice);

        }

        window.productTotal = [];
        window.productPrice = $(".price-calc").text();
    });


    function formatNumber(number) {
        const parts = number.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }

    function deTaxUpdate(totalPrice) {
        if (typeof window.taxRates == 'undefined') return;
        if ($("#exTaxTxt").length === 0) {
            return;
        }
        let preTaxAmount = totalPrice;
        for (const taxRateId in window.taxRates) {
            const taxRate = window.taxRates[taxRateId];
            if (taxRate.type === "F") {
                preTaxAmount -= taxRate.amount;
            }
        }
        for (const taxRateId in window.taxRates) {
            const taxRate = window.taxRates[taxRateId];
            if (taxRate.type === "P") {
                preTaxAmount = preTaxAmount / (1 + (parseFloat(taxRate.rate) / 100));
            }
        }
        $("#exTaxTxt").text($("#exTaxTxt").text().replace($("#exTaxTxt").text().replace(/[^0-9.]/g, ''), formatNumber(parseFloat(preTaxAmount).toFixed(2))));
    }


    function calculateTax(price, fixed = true) {
        if (typeof window.taxRates === 'undefined') return price;

        // Initialize total price with the original price
        let totalPrice = price;

        // Loop through each tax rate
        for (const taxRateId in window.taxRates) {
            const taxRate = window.taxRates[taxRateId];
            // Apply tax based on the type
            if (taxRate.type === "P") {
                // Percentage tax
                const taxAmount = (price * (parseFloat(taxRate.rate) / 100));
                totalPrice += taxAmount;
            } else if (taxRate.type === "F" && fixed) {
                // Fixed tax
                totalPrice += taxRate.amount;
            }
        }

        // Round the total price to two decimal places
        totalPrice = Math.round(totalPrice * 100) / 100;

        // Return the total price including all taxes
        return totalPrice;
    }

};


