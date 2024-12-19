<?= $header ?>
<div id="giftcards-controller-area" class="container">
    <?= $breadcrumb ?>
    <div class="row">
        <?= $column_left ?>
        <div id="content" class="col">
            <?= $content_top ?>
            <!-- Main content for the gift cards starts here -->
            <h1><?= $heading_title ?></h1>

            <!-- Gift card redeem section -->

            <?= $redeem_container ?>

            <!-- Gift card listing section -->
            <div class="container  my-4">
                <div class="container mt-4">

                    <div class="container mt-4">
                        <div class="alert alert-info text-center" role="alert">
                            <?= $text_gift_cards_intro ?>
                        </div>
                    </div>
                </div>

                <nav>
                    <ul class="pagination pagination-cards justify-content-center">
                        <!-- Populated dynamically -->
                    </ul>
                </nav>
                <div class="col giftcard-template shadow p-4 rounded" style="display: none; max-width: 360px;">
                    <div class="d-flex justify-content-center   align-items-center" style="height: 200px;">
                        <a href="#" class=" ">
                            <div class="card-background">
                                <h5 class="card-title giftcard-title  "> </h5>
                                <p class="giftcard-holder  "><span><?= $text_holder ?></span>
                                    <?= $text_someone_loved ?></p>
                                <p class="giftcard-code  ">VEXX-XXXX-XXXX-XXXX</p>
                                <p class="giftcard-site "><?= $siteurl ?> <?= $text_giftcard ?></p>
                            </div>
                        </a>
                    </div>
                    <div class="  d-flex flex-column">
                        <p style="height: 50px;" class="  flex-grow-1"><span class="card-text"></span> <span><a href="#"
                                    class=" "> <?= $text_view_giftcard ?> </a></span></p>

                    </div>
                </div>
                <!-- Gift Cards Row (wraps cards in rows and columns) -->
                <div id="giftcard-container" style="min-width: 500px" class="row my-4 g-1">
                    <!-- Hidden Card Template (hidden by default) -->



                </div>
                <nav>
                    <ul class="pagination pagination-cards justify-content-center">
                        <!-- Populated dynamically -->
                    </ul>
                </nav>
            </div>

            <?= $content_bottom ?>
        </div>
        <?= $column_right ?>
    </div>
</div>




<script>
    // Function to generate the gift cards
    function generateGiftCards(data) {
        $('#giftcard-container').html('');
        const cardContainer = $('#giftcard-container'); // Container to append the cards
        const cardTemplate = $('.giftcard-template'); // The hidden card template
        console.log(data);
        renderPagination(data.pagination.pages, data.pagination.current);
        // Loop through the giftcards and generate a card for each one
        data.giftcards.forEach(giftcard => {
            // Clone the template card
            const newCard = cardTemplate.clone();
            newCard.show(); // Make the card visible

            // Populate the card's image, title, and description
            newCard.find('.card-background').css('background-image', 'url(/image/' + giftcard.theme_image + ')');
            let stramount = '';
            newCard.find('.card-title').text(giftcard.card_name);
            if (parseInt(giftcard.fixed) == 1) {
                let stramount = '';
                giftcard.amount.forEach(element => {
                    stramount += `<span class="badge bg-info h-100 mx-2 text-dark">${element}</span>`;
                });

                newCard.find('.card-text').html(`
        <div class="d-flex justify-content-center">
            <p class="text-center"><?= $text_available_amounts ?>:</p>
        </div>
        <div class="d-flex justify-content-center flex-wrap">
            ${stramount}
        </div>
    `);
            } else {
                newCard.find('.card-text').html(`
        <div class="d-flex justify-content-center">
            <p class="text-center"><?= $text_load_any_amount ?></p>
        </div>
    `);
            }

            newCard.find('a').attr('href', `/?route=giftcards/giftcard.view&card=${giftcard.giftcard_id}`);

            // Append the generated card to the container
            cardContainer.append(newCard);
        });
    }

    // Function to fetch gift card data from the backend using AJAX
    function fetchGiftCards(page = 1) {
        $('#giftcard-container').html(`
    <div style="min-height: 300px !important;" class="d-flex m-3 mt-10 justify-content-center my-3">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
`);

        const url = `/?route=giftcards/giftcard.getGiftCards&page=${page}`; // Adjust the URL to fit your routing scheme

        // Send the AJAX request using jQuery
        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // Call function to generate the cards based on the JSON response
                generateGiftCards(data);
            },
            error: function (error) {
                console.error('Error fetching gift cards:', error);
            }
        });
    }
    function renderPagination(totalPages, currentPage) {
        const maxVisiblePages = 10; // Limit the number of visible pages
        const halfVisible = Math.floor(maxVisiblePages / 2);

        $('.pagination-cards').empty();

        let startPage = Math.max(1, currentPage - halfVisible);
        let endPage = Math.min(totalPages, currentPage + halfVisible);

        if (currentPage <= halfVisible) {
            endPage = Math.min(totalPages, maxVisiblePages);
        } else if (currentPage + halfVisible >= totalPages) {
            startPage = Math.max(1, totalPages - maxVisiblePages + 1);
        }

        // Add "Previous" button
        if (currentPage > 1) {
            $('.pagination-cards').append(`
            <li class="page-item">
                <a class="page-link" href="#" data-page="${currentPage - 1}"> < </a>
            </li>
        `);
        }
        if (endPage == 1) { return; }
        // Add page links
        for (let i = startPage; i <= endPage; i++) {
            const activeClass = i === currentPage ? 'active' : '';
            $('.pagination-cards').append(`
            <li class="page-item ${activeClass}">
                <a class="page-link" href="#" data-page="${i}">${i}</a>
            </li>
        `);
        }

        // Add "Next" button
        if (currentPage < totalPages) {
            $('.pagination-cards').append(`
            <li class="page-item">
                <a class="page-link" href="#" data-page="${currentPage + 1}"> > </a>
            </li>
        `);
        }

        // Attach click event for pagination
        $('.pagination-cards').find('.page-link').click(function (e) {
            e.preventDefault();
            const page = $(this).data('page');
            fetchGiftCards(page);
        });
    }
    // Run the function to fetch gift cards on page load
    $(document).ready(function () {
        fetchGiftCards();
    });


</script>

<?= $footer ?>