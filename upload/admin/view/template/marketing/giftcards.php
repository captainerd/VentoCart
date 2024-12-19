<?= $header ?>
<style>
    /* Custom style for horizontal scrollbar */
    .custom-scrollbar {
        overflow-x: auto;
        /* Enable horizontal scrolling */
        -webkit-overflow-scrolling: touch;
        /* Smooth scrolling on iOS */
    }

    /* Webkit Browsers (Chrome, Safari, Edge) */
    .custom-scrollbar::-webkit-scrollbar {
        height: 16px;
        /* Thicker scrollbar in Webkit browsers (adjust as needed) */
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 8px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: #555;
    }

    /* Firefox */
    .custom-scrollbar {
        scrollbar-width: thick;
        /* Thicker scrollbar in Firefox */
        scrollbar-color: #888 #f0f0f0;
        /* Thumb and track color in Firefox */
    }

    .custom-scrollbar:hover {
        scrollbar-color: #555 #f0f0f0;
        /* Thumb and track color on hover in Firefox */
    }
</style>
<?= $column_left ?>

<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="float-end">
                <button type="button" id="settings-addbtn" class="btn btn-primary"><?= $button_add ?></button>
            </div>
            <h1><?= $heading_title ?></h1>
            <ol class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb): ?>
                    <li class="breadcrumb-item"><a href="<?= $breadcrumb['href'] ?>"><?= $breadcrumb['text'] ?></a></li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>

    <div style="width: 95%" class="container-fluid p-4 rounded shadow bg-white">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab"
                    aria-controls="overview" aria-selected="true"><?= $tab_overview ?></a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="edit-tab" data-bs-toggle="tab" href="#edit" role="tab" aria-controls="edit"
                    aria-selected="false"><?= $tab_edit ?></a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="purchased-tab" data-bs-toggle="tab" href="#purchased" role="tab"
                    aria-controls="purchased" aria-selected="false"><?= $tab_purchased ?></a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="settings-tab" data-bs-toggle="tab" href="#settings" role="tab"
                    aria-controls="settings" aria-selected="false"><?= $tab_settings ?></a>
            </li>
        </ul>
        <!-- Add Card Modal -->
        <div id="addCardModal" class="modal fade" tabindex="-1" aria-labelledby="addCardModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCardModalLabel"><?= $entry_add_cart ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addCardForm">
                            <!-- Card ID -->
                            <input type="hidden" name="giftcard_id" id="giftcard_id" value="0">

                            <!-- Card Name -->
                            <div class="mb-3">
                                <label for="cardName" class="form-label"><?= $entry_card_name ?></label>
                                <?php foreach ($languages as $language): ?>
                                    <div class="mb-2">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <img src="<?= $language['image'] ?>" title="<?= $language['name'] ?>"
                                                    style="width: 24px; height: 16px;">
                                            </div>
                                            <input type="text" name="gift_card_name[<?= $language['language_id'] ?>]"
                                                id="gift_card_name_<?= $language['language_id'] ?>"
                                                placeholder="<?= $entry_card_name ?>" class="form-control" />
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Theme Image -->
                            <div class="mb-3">
                                <div class="card image">
                                    <img src="/image/catalog/giftcards/giftcard1.png" id="thumb-image-card"
                                        class="card-img-top" />
                                    <input type="hidden" name="giftcardimage" id="input-image-card"
                                        value="catalog/giftcards/giftcard1.png" />
                                    <div class="card-body">
                                        <input type="hidden" id="input-directory" value="giftcards">
                                        <button type="button" data-oc-toggle="image" data-oc-target="#input-image-card"
                                            data-oc-thumb="#thumb-image-card" class="btn btn-primary btn-sm btn-block">
                                            <i class="fa-solid fa-pencil"></i> <?= $button_edit ?>
                                        </button>
                                        <button type="button" data-oc-toggle="clear" data-oc-target="#input-image-card"
                                            data-oc-thumb="#thumb-image-card" class="btn btn-warning btn-sm btn-block">
                                            <i class="fa-regular fa-trash-can"></i> <?= $button_clear ?>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Type -->
                            <div class="mb-3">
                                <label for="cardType" class="form-label"><?= $entry_card_type ?></label>
                                <select class="form-control" id="cardType" name="card_type" required>
                                    <option value=""><?= $text_select_type ?></option>
                                    <option value="1"><?= $entry_fixed_amount ?></option>
                                    <option value="0"><?= $entry_open_amount ?></option>
                                </select>
                            </div>

                            <!-- Physical -->
                            <div class="mb-3">
                                <label for="physical" class="form-label"><?= $entry_physical ?></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="true" id="physical"
                                        name="physical">
                                    <label class="form-check-label" for="physical">
                                        <?= $entry_physical_description ?>
                                    </label>
                                </div>
                            </div>


                            <!-- Expires -->
                            <div class="mb-3">
                                <label for="expires" class="form-label"><?= $entry_expires ?></label>
                                <div class="input-group">
                                    <input class="form-control" type="number" value="12" id="expires" name="expires"
                                        min="1">
                                    <span class="input-group-text"><?= $entry_expires_unit ?></span>
                                </div>
                                <div class="form-text"><?= $help_expires ?></div>
                            </div>


                            <!-- Store Selection -->
                            <?php if (!empty($stores)): ?>
                                <div class="mb-3">
                                    <label for="storeSelect" class="form-label"><?= $entry_select_store ?></label>
                                    <select class="form-control" id="storeSelect" name="store_id" required>
                                        <option value=""><?= $entry_select_store ?></option>
                                        <?php foreach ($stores as $store): ?>
                                            <option value="<?= $store['store_id'] ?>" <?= (isset($giftcard['store_id']) && $giftcard['store_id'] == $store['store_id']) ? 'selected' : '' ?>>
                                                <?= $store['name'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endif; ?>

                            <!-- Amount Inputs -->
                            <div class="amount-container" id="amountContainer" style="display: none;">
                                <label for="amount1" class="form-label"><?= $entry_amount ?></label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" id="amount1" name="amount[1]" required>
                                    <button class="btn btn-outline-secondary" type="button" id="addAmountBtn">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal"><?= $button_close ?></button>
                        <button type="button" class="btn btn-primary" id="saveCardBtn"><?= $button_save ?></button>
                    </div>
                </div>
            </div>
        </div>




        <div class="tab-content" id="myTabContent">
            <!-- Overview Tab -->
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        <div class="tile tile-primary">
                            <div class="tile-heading"><?= $entry_total_giftcards ?><span class="float-end"> </span>
                            </div>
                            <div class="tile-body"><i class="fa-solid fa-gift"></i>
                                <h2 class="float-end"><?= $total_giftcards ?></h2>
                            </div>
                            <div class="tile-footer"><?= $text_total_giftcards ?></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        <div class="tile tile-success">
                            <div class="tile-heading"><?= $entry_purchased_giftcards ?><span class="float-end"> </span>
                            </div>
                            <div class="tile-body"><i class="fa-solid fa-cart-plus"></i>
                                <h2 class="float-end"><?= $total_purchased_giftcards ?></h2>
                            </div>
                            <div class="tile-footer"><?= $text_purchased_giftcards ?></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                        <div class="tile tile-warning">
                            <div class="tile-heading"><?= $entry_balance_giftcards ?><span class="float-end"> </span>
                            </div>
                            <div class="tile-body"><i class="fa-solid fa-wallet"></i>
                                <h2 class="float-end"><?= $total_giftcard_balances ?></h2>
                            </div>
                            <div class="tile-footer"><?= $text_balance_giftcards ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Gift Cards Tab -->
            <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">

                <nav>
                    <ul class="pagination pagination-cards justify-content-center">
                        <!-- Populated dynamically -->
                    </ul>
                </nav>
                <div id="edit-giftcards" class="card-body">

                </div>

                <nav>
                    <ul class="pagination pagination-cards justify-content-center">
                        <!-- Populated dynamically -->
                    </ul>
                </nav>
            </div>

            <!-- Bought Gift Cards Tab -->
            <div class="tab-pane fade" id="purchased" role="tabpanel" aria-labelledby="purchased-tab">

                <nav>
                    <ul class="pagination pagination-cards-customer justify-content-center">
                        <!-- Populated dynamically -->
                    </ul>
                </nav>
                <div id="purchased-giftcards" class="card-body">



                </div>

                <nav>
                    <ul class="pagination pagination-cards-customer justify-content-center">
                        <!-- Populated dynamically -->
                    </ul>
                </nav>

            </div>
            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <div id="settings-giftcards" class="p-3">
                    <!-- Heading -->
                    <h5 class="mb-4"><?= $text_select_terms_of_use ?></h5>

                    <!-- Dropdown to select terms of use -->
                    <div class="form-group row mb-4">
                        <label for="giftcard-terms" class="col-sm-3 col-form-label"><?= $label_terms_of_use ?></label>
                        <div class="col-sm-9">
                            <!-- Display the currently selected terms (optional, just for debugging or info) -->


                            <select name="giftcard_terms" id="giftcard-terms" class="form-select">

                                <option value=""><?= $select_terms_of_use ?></option> <!-- Placeholder option -->
                                <option value="-1"><?= $text_disable_terms ?></option> <!-- "Disable" option -->
                                <?php foreach ($articles as $article) { ?>
                                    <?php if ($article['status'] == 1) { // Only show active articles ?>
                                        <option value="<?= $article['information_id']; ?>"
                                            <?= ($article['information_id'] == $giftcard_terms) ? 'selected' : ''; ?>>
                                            <?= $article['title']; ?>
                                        </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <!-- Save button directly below the select -->
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3"> <!-- Same width as select, aligned below it -->
                            <button type="button" id="save-terms"
                                class="btn btn-primary"><?= $button_save_terms ?></button>
                        </div>
                    </div>
                </div>
            </div>





        </div>

    </div>
</div>
<script>

    var cardata = [];
    $(document).ready(function () {
        $('#settings-addbtn').on('click', function () {
            // Reset the hidden giftcard_id field
            $('#giftcard_id').val('0');

            $('#physical').prop('checked', 0);
            $('.newly-added').remove();
            $('[name^="gift_card_name"]').val('');
            $('#thumb-image-card').attr('src', '/image/catalog/giftcards/giftcard1.png');
            $('#input-image-card').val('catalog/giftcards/giftcard1.png');
            $('#cardType').val('');
            $('#amountContainer').hide();
            $('#amount1').val('');
            $('#expires').val('12');
            $('#storeSelect').val(0);
            // Open the modal
            $('#addCardModal').modal('show');
        });

        // When the type is selected as 'Fixed Amount'
        $('#cardType').on('change', function () {
            var selectedType = $(this).val();

            // Show or hide the amount inputs depending on the type
            if (selectedType == "1") {
                $('#amountContainer').show();
            } else {
                $('#amountContainer').hide();
            }
        });

        // Add new amount input dynamically on the '+' button click
        $('#addAmountBtn').on('click', function () {
            var currentAmountIndex = $('.amount-container input').length + 1;
            var newAmountInput = `
            <div class="input-group newly-added mb-3" id="amountInput${currentAmountIndex}">
                <input type="number" class="form-control" id="amount${currentAmountIndex}" name="amount[${currentAmountIndex}]" required>
                <button class="btn btn-outline-secondary removeAmountBtn" type="button">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        `;
            $('#amountContainer').append(newAmountInput);
        });

        // Remove amount input on '-' button click
        $(document).on('click', '.removeAmountBtn', function () {
            $(this).closest('.newly-added').remove();
        });

        // Handle the form submission
        $('#saveCardBtn').on('click', function () {

            var formData = new FormData($('#addCardForm')[0]);

            $.ajax({
                url: '?route=marketing/giftcards.save&user_token=<?= $user_token ?>',
                type: 'POST',
                dataType: 'json',
                processData: false,
                contentType: false,
                data: formData, // Send the data as JSON
                success: function (response) {
                    if (response.error && response.error.warning) {
                        $('#alert').prepend(
                            '<div class="alert alert-danger alert-dismissible">' +
                            '<i class="fa-solid fa-exclamation-circle"></i>  ' + response.error.warning +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                            '</div>'
                        );
                        return;
                    }
                    if (response.success) {
                        $('#addCardModal').modal('hide');
                        sendAlert(response.success); // Success message
                        loadGiftCards();


                    } else if (response.error) {

                        sendAlert(response.error, true);


                    } else {
                        console.log(response.error)
                    }
                },
                error: function (xhr, status, error) {
                    sendAlert('Something went wrong: ' + error, true);
                }
            });
        });

        // Function to load the gift cards and render the table

        function loadGiftCards(page = 1) {

            $('#edit-giftcards').html(`
    <div class="d-flex m-5 justify-content-center my-3">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
`);


            $.getJSON(`?route=marketing/giftcards.list&user_token=<?= $user_token ?>&page=${page}`, function (response) {
                if (response.success) {
                    // Clear previous content
                    $('#edit-giftcards').empty();

                    // Create the table structure
                    let table = `<div class="table-responsive border shadow-sm   custom-scrollbar"  >
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                
                         <th><?= $entry_card_name ?></th>
<th><?= $entry_card_type ?></th>
<th><?= $text_amounts ?></th>
<th><?= $text_theme_image ?></th>
<th><?= $text_date_added ?></th>
<th><?= $text_actions ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                `;

                    // Append the table
                    $('#edit-giftcards').append(table);

                    // Populate the table with data
                    cardata = response.data;

                    renderPagination(response.pagination.totalPages, response.pagination.page, 'pagination-cards', loadGiftCards, { maxVisiblePages: 5 });


                    response.data.forEach(function (card) {


                        let amount = JSON.parse(card.amount);
                        let amounts = '';
                        if (Object.values(amount).length > 0) {
                            Object.values(amount).forEach((item) => {

                                amounts += `  <span style="
                display: inline-block;
                padding: 0.25em 0.5em;
                font-size: 0.75rem;
                font-weight: 700;
                color: #fff;
                background-color: #17a2b8;
                border-radius: 0.5rem;
                margin-right: 0.5em;
            ">${item}</span>`
                            });
                        } else {
                            amounts = 'Open';
                        }
                        let names = Object.values(JSON.parse(card.card_name))[response.language_id];
                        let date = new Date(card.date_added);
                        let formattedDate = ('0' + date.getDate()).slice(-2) + '/' + ('0' + (date.getMonth() + 1)).slice(-2) + '/' + date.getFullYear();

                        let row = `
                        <tr>
                        
                            <td>${names}</td>
                            <td>${parseInt(card.fixed) === 1 ? 'Fixed' : 'Open'}</td>
                            <td>${amounts}</td>
                            <td>
                                <img src="/image/${card.theme_image}" alt="Theme Image" style="width: 50px; height: auto;">
                            </td>
                            <td>${formattedDate}</td>
                            <td>
                                <button class="btn btn-sm btn-primary edit-btn" data-id="${card.giftcard_id}">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="${card.giftcard_id}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    `;

                        $('#edit-giftcards table tbody').append(row);
                    });



                } else {
                    $('#edit-giftcards').html('<p>No gift cards found.</p>');
                }
            });
        }




        //function to load customer giftcards




        function loadCustomerGiftCards(page = 1) {

            $('#purchased-giftcards').html(`
    <div class="d-flex m-5 justify-content-center my-3">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
`);


            $.getJSON(`?route=marketing/giftcards.listCustomerCards&user_token=<?= $user_token ?>&page=${page}`, function (response) {
                if (response.success) {

                    renderPagination(response.pagination.totalPages, response.pagination.page, 'pagination-cards-customer', loadCustomerGiftCards, { maxVisiblePages: 5 });

                    // Create the table structure
                    let table = `<div class="table-responsive border mt-3 mb-3 shadow-sm custom-scrollbar"  >
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?= $entry_card_name ?></th>
                                 <th><?= $text_customer_name ?></th>
                            <th><?= $text_balance ?></th>
                            <th><?= $entry_amount ?></th>
                            <th><?= $text_date_added ?></th>
                                  <th><?= $text_code ?></th>
                            <th><?= $text_status ?></th>
                      
                        
                        </tr>
                    </thead>
                    <tbody>
            `;

                    // Populate rows with data
                    response.data.forEach(card => {
                        table += `
                    <tr>
                        <td>${card.card_name}</td>
                             <td><a target="_blank" href="?route=customer/customer.form&user_token=<?= $user_token ?>&customer_id=${card.customer_id}">${card.customer_name}</a></td>
                        <td>${card.balance}</td>
                        <td>${card.amount}</td>
                        <td>${card.date_added}</td>
                          <td>${card.code}</td>
                        <td>${card.status}</td>
 
                    
                    </tr>
                `;
                    });

                    table += `
                    </tbody>
                </table></div>
            `;

                    // Append the table to the div
                    $('#purchased-giftcards').html(table);

                    // Pagination controls

                    // Append pagination controls
                    $('#purchased-giftcards').append(pagination);
                } else {
                    // Display error or empty state
                    $('#purchased-giftcards').html('<p>No gift cards found.</p>');
                }
            }).fail(function () {
                // Handle AJAX errors
                $('#purchased-giftcards').html('<p>Error loading gift cards. Please try again.</p>');
            });
        }

        // Call the function to load the first page
        loadCustomerGiftCards(1);













        function renderPagination(totalPages, currentPage, containerClass, loadMethod, options = {}) {
            let maxVisiblePages = options.maxVisiblePages || 10; // Default to 10 if not provided
            let halfVisible = Math.floor(maxVisiblePages / 2);

            $(`.${containerClass}`).empty();

            let startPage = Math.max(1, currentPage - halfVisible);
            let endPage = Math.min(totalPages, currentPage + halfVisible);

            if (endPage === 1) return;

            if (currentPage <= halfVisible) {
                endPage = Math.min(totalPages, maxVisiblePages);
            } else if (currentPage + halfVisible >= totalPages) {
                startPage = Math.max(1, totalPages - maxVisiblePages + 1);
            }

            // Add "Previous" button
            if (currentPage > 1) {
                $(`.${containerClass}`).append(`
            <li class="page-item">
                <a class="page-link" href="#" data-page="${currentPage - 1}"> < </a>
            </li>
        `);
            }

            // Add page links
            for (let i = startPage; i <= endPage; i++) {
                let activeClass = i === currentPage ? 'active' : '';
                $(`.${containerClass}`).append(`
            <li class="page-item ${activeClass}">
                <a class="page-link" href="#" data-page="${i}">${i}</a>
            </li>
        `);
            }

            // Add "Next" button
            if (currentPage < totalPages) {
                $(`.${containerClass}`).append(`
            <li class="page-item">
                <a class="page-link" href="#" data-page="${currentPage + 1}"> > </a>
            </li>
        `);
            }

            // Attach click event for pagination
            $(`.${containerClass}`).find('.page-link').click(function (e) {
                e.preventDefault();
                let page = $(this).data('page');
                loadMethod(page, options);
            });
        }


        // Initial load
        loadGiftCards();

        // Handle edit button click
        $(document).on('click', '.edit-btn', function () {
            let giftcardId = $(this).data('id');


        });

        // Handle delete button click
        $(document).on('click', '.delete-btn', function () {
            let giftcardId = $(this).data('id'); // Get the gift card ID
            if (confirm('Are you sure you want to delete this gift card?')) {
                // Make the AJAX call to delete the gift card
                $.getJSON(`?route=marketing/giftcards.delete&user_token=<?= $user_token ?>&giftcard_id=${giftcardId}`, function (response) {
                    if (response.error && response.error.warning) {
                        $('#alert').prepend(
                            '<div class="alert alert-danger alert-dismissible">' +
                            '<i class="fa-solid fa-exclamation-circle"></i>  ' + response.error.warning +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                            '</div>'
                        );
                        return;
                    }
                    if (response.success) {
                        // Show success message
                        sendAlert(response.success);
                        loadGiftCards();

                        // Optionally, remove the deleted card from the DOM
                        $(`#card-${giftcardId}`).remove(); //  cards have an id like card-<giftcard_id>
                    } else {
                        // Show error message if any
                        sendAlert(response.error, true);
                    }
                });
            }
        });

    });

    $(document).on('click', '.edit-btn', function () {
        const giftcardId = $(this).data('id');
        $('.newly-added').remove();
        const card = cardata.find(item => item.giftcard_id == giftcardId);

        if (!card) {
            sendAlert('Gift card not found!');
            return;
        }

        // Fill modal inputs
        $('#giftcard_id').val(card.giftcard_id);
        $('#physical').prop('checked', parseInt(card.physical));

        // Fill multilingual card names
        for (const [languageId, name] of Object.entries(JSON.parse(card.card_name))) {
            $(`#gift_card_name_${languageId}`).val(name);
        }

        // Fill theme image 
        $('#thumb-image-card').attr('src', '/image/' + card.theme_image);
        $('#input-image-card').val(card.theme_image);

        // Set card type
        $('#cardType').val(card.fixed);
        $('#expires').val(card.expires_months);
        $('#storeSelect').val(card.store_id);
        // Fill amounts if fixed

        if (parseInt(card.fixed) == 1) {
            $('.newly-added').remove();
            $('#amountContainer').show();
            let amounts = Object.values(JSON.parse(card.amount));
            if (amounts.length > 0) {
                amounts.forEach((item, index) => {
                    if (index === 0) {
                        // Set the first amount without triggering the button
                        $('#amount1').val(item !== undefined ? item : '');
                    } else {
                        // Dynamically add inputs for additional amounts
                        $('#addAmountBtn').trigger('click');
                        $(`#amount${index + 1}`).val(item !== undefined ? item : '');
                    }
                });
            }

        } else {
            $('#amountContainer').hide();
            $('#amount1').val('');
        }

        // Show modal
        $('#addCardModal').modal('show');


    });
    function sendAlert(text, error = false) {
        // Determine the alert type based on the error parameter
        var alertClass = error ? 'alert-danger' : 'alert-success';

        $('#alert').prepend(
            '<div class="alert ' + alertClass + ' alert-dismissible">' +
            '<i class="fa-solid fa-exclamation-circle"></i> ' + text +
            '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
            '</div>'
        );
    }


    $(document).ready(function () {
        $('#save-terms').click(function () {
            var selectedTerms = $('#giftcard-terms').val();

            if (selectedTerms) {
                $.ajax({
                    url: '?route=marketing/giftcards.saveTerms&user_token=<?= $user_token ?>',  // Adjust URL as needed
                    type: 'POST',
                    data: { giftcard_terms: selectedTerms },
                    success: function (response) {
                        if (response.error && response.error.warning) {
                            $('#alert').prepend(
                                '<div class="alert alert-danger alert-dismissible">' +
                                '<i class="fa-solid fa-exclamation-circle"></i>  ' + response.error.warning +
                                '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                                '</div>'
                            );
                            return;
                        }
                        if (response.success) {
                            $('#alert').append(
                                '<div class="alert alert-success alert-dismissible">' +
                                '<i class="fa-solid fa-exclamation-circle"></i>  ' + response.success +
                                '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                                '</div>'
                            );
                        } else if (reposnse.error) {
                            $('#alert').append(
                                '<div class="alert alert-danger alert-dismissible">' +
                                '<i class="fa-solid fa-exclamation-circle"></i>  ' + response.error +
                                '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                                '</div>'
                            );
                        }
                    },
                    error: function () {
                        alert('An error occurred while saving the terms.');
                    }
                });
            } else {
                alert('Please select a terms of use.');
            }
        });
    });


</script>
<?= $footer ?>