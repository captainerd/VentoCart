<?= $header ?>
<div id="giftcards-controller-area" class="container">
    <?= $breadcrumb ?>
    <div class="row ">
        <?= $column_left ?>
        <div id="content" class="col  p-3 bg-white border ">
            <?= $content_top ?>
            <!-- Main content for the gift cards starts here -->
            <h1><?= $heading_title ?> <?= $total ?> </h1>

            <!-- Gift card redeem section -->

            <?= $redeem_container ?>

            <!-- Gift card listing section -->
            <div class="container p-3 bg-white border  my-2">


                <nav>
                    <div id="no-giftcards" class="alert alert-info d-flex d-none align-items-center" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <span><?= $text_no_giftcards ?></span>
                    </div>

                    <!-- Hidden Card Template for Details (hidden by default) -->
                    <div id="template-gfcrd" style="max-width: 346px;" class=" rounded-lg giftcard-template d-none">

                        <div class="col giftcard-template shadow p-3 rounded" style="display: none;">
                            <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                                <div class="card-background">
                                    <h5 class="card-title giftcard-title  "> </h5>
                                    <p class="giftcard-holder"><span><?= $text_expr ?></span> <span
                                            class="card-expiry ">
                                        </span> <span><?= $text_status ?>: </span> <span class="card-status ">
                                        </span>
                                    </p>
                                    <p class="giftcard-code   "><span><?= $text_balance ?>: </span><span
                                            class=" card-balance "></span>
                                    </p>
                                    <p class="giftcard-site card-sender-email"> </p>
                                </div>
                            </div>

                        </div>


                    </div>
                    <nav>
                        <ul class="pagination pagination-cards justify-content-center">
                            <!-- Populated dynamically -->
                        </ul>
                    </nav>

                    <!-- Gift Cards Row (wraps cards in rows and columns) -->
                    <div id="giftcard-container" style="min-width: 500px" class="row my-4 g-1">
                        <!-- Hidden Card Template (hidden by default) -->



                    </div>
                    <nav>
                        <ul class="pagination pagination-cards justify-content-center">
                            <!-- Populated dynamically -->
                        </ul>
                    </nav>
                    <div class="text-end">
                        <a href="<?= $continue ?>" class="btn btn-primary"><?= $this->e($button_continue) ?></a>
                    </div>
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
        const cardContainer = $('#giftcard-container');
        const cardTemplate = $('#template-gfcrd');

        // console.log(data);

        renderPagination(data.pagination.pages, data.pagination.current);
        if (data.giftcards.length == 0) {
            $("#no-giftcards").removeClass('d-none');
        } else {
            $("#no-giftcards").addClass('d-none');
        }

        data.giftcards.forEach(giftcard => {
            // Clone the template card
            const newCard = cardTemplate.clone();
            newCard.removeClass('d-none');

            // Populate the card's image, title, and description
            newCard.find('.card-background').css('background-image', 'url(/image/' + giftcard.theme_image + ')');
            newCard.find('.card-title').text(giftcard.card_name); // Card name

            newCard.find('.giftcard-template').show();

            // Populate hidden card details template
            newCard.find('.card-balance').text(giftcard.balance);
            newCard.find('.card-amount').text(giftcard.amount);
            newCard.find('.card-date').text(giftcard.date_added);
            newCard.find('.card-sender-email').text(giftcard.sender_email);
            newCard.find('.card-expiry').text(giftcard.expires);
            newCard.find('.card-status').text(giftcard.status ? '<?= $text_active ?>' : '<?= $text_expired ?>');
            // Append the generated card to the container
            cardContainer.append(newCard);
        });
    }


    function fetchGiftCards(page = 1) {
        $('#giftcard-container').html(`
    <div style="min-height: 300px !important;" class="d-flex m-3 mt-10 justify-content-center my-3">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
`);

        const url = `/?route=giftcards/account.getMyCards&page=${page}`;

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
        window.fetchGiftCards = fetchGiftCards;
    });


</script>


<?= $footer ?>