<?= $header ?>
<?= $column_left ?>

<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="float-end">
                <button type="button" id="settings-savebtn" class="btn btn-primary"><?= $button_save ?></button>
            </div>
            <h1><?= $heading_title ?></h1>
            <ol class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb): ?>
                    <li class="breadcrumb-item"><a href="<?= $breadcrumb['href'] ?>"><?= $breadcrumb['text'] ?></a></li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>
    <form action="#" id="settings-form" method="post">
        <div style="width: 95%" class="container-fluid p-4 rounded shadow bg-white  ">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab"
                        aria-controls="overview" aria-selected="true"><?= $tab_overview ?></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="settings-tab" data-bs-toggle="tab" href="#settings" role="tab"
                        aria-controls="settings" aria-selected="false"><?= $tab_settings ?></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="carts-tab" data-bs-toggle="tab" href="#carts" role="tab"
                        aria-controls="carts" aria-selected="false"><?= $tab_carts ?></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="templates-tab" data-bs-toggle="tab" href="#templates" role="tab"
                        aria-controls="templates" aria-selected="false"><?= $tab_templates ?></a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <!-- Overview Tab -->
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <div class="tile tile-primary">
                                <div class="tile-heading"><?= $entry_total_carts ?><span
                                        class="float-end"><?= $allcarts > 0 ? round(($totalcarts / $allcarts) * 100) . '%' : '0%' ?>%</span>
                                </div>
                                <div class="tile-body"><i class="fa-solid fa-shopping-cart"></i>
                                    <h2 class="float-end"> <?= $totalcarts ?></h2>
                                </div>
                                <div class="tile-footer"> <?= $text_cart_total_carts ?> </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <div class="tile tile-success">
                                <div class="tile-heading"><?= $entry_total_account_carts ?><span
                                        class="float-end"><?= $allcarts > 0 ? round(($totalaccountcarts / $allcarts) * 100) . '%' : '0%' ?>%</span>
                                </div>
                                <div class="tile-body"><i class="fa-solid fa-cart-arrow-down"></i>
                                    <h2 class="float-end"><?= $totalaccountcarts ?></h2>
                                </div>
                                <div class="tile-footer"><?= $text_customer_total_carts ?></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                            <div class="tile tile-warning">
                                <div class="tile-heading"><?= $entry_total_guest_carts ?><span
                                        class="float-end"><?= $allcarts > 0 ? round(($totalguestcarts / $allcarts) * 100) . '%' : '0%' ?>%</span>
                                </div>
                                <div class="tile-body"><i class="fa-solid fa-users"></i>
                                    <h2 class="float-end"><?= $totalguestcarts ?></h2>
                                </div>
                                <div class="tile-footer"><?= $text_guests_total_carts ?></div>
                            </div>
                        </div>


                    </div>

                    <!-- Other Analytics -->



                    <div style="min-height: 300px;  margin: 0 auto; display: block; width: 80%;">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div style="display: none;" id="sendingmailscontainer" class="progress m-4">
                        <div id="sendingmails" class="progress-bar progress-bar-striped progress-bar-animated"
                            role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                            style="width: 0%"></div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">

                        <button id="scheduleNow" type="button" class="btn btn-primary">
                            <i class="fa-solid fa-calendar-check"></i> <?= $button_schedule_notifications ?>
                        </button>
                    </div>


                </div>

                <!-- Settings Tab -->
                <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">

                    <div class="mb-3">
                        <label for="abandoned-threshold" class="form-label"><?= $entry_abandoned_threshold ?></label>
                        <input type="number" value="<?= $abandonedcart_abandoned_threshold ?>" class="form-control"
                            id="abandoned-threshold" name="abandoned_threshold">
                        <div class="form-text"><?= $text_abandoned_threshold_help ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="repeat-frequency" class="form-label"><?= $entry_repeat_frequency ?></label>
                        <input type="number" value="<?= $abandonedcart_repeat_frequency ?>" class="form-control"
                            id="repeat-frequency" name="repeat_frequency">
                        <div class="form-text"><?= $text_repeat_frequency_help ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="total-notifications" class="form-label"><?= $entry_total_notifications ?></label>
                        <input type="number" value="<?= $abandonedcart_total_notifications ?>" class="form-control"
                            id="total-notifications" name="total_notifications">
                        <div class="form-text"><?= $text_total_notifications_help ?></div>
                    </div>


                    <div class="mb-3">
                        <label for="total-notifications" class="form-label"><?= $entry_cart_memory ?></label>
                        <input type="number" value="<?= $abandonedcart_cart_memory ?>" class="form-control"
                            id="total-notifications" name="abandonedcart_cart_memory">
                        <div class="form-text"><?= $text_cart_memory_help ?></div>
                    </div>




                </div>

                <!-- Carts Tab -->
                <div class="tab-pane fade" id="carts" role="tabpanel" aria-labelledby="carts-tab">
                    <!-- Pagination -->
                    <nav>
                        <ul class="pagination pagination-carts justify-content-center">
                            <!-- Populated dynamically -->
                        </ul>
                    </nav>

                    <div id="cart-list" class="card-body">
                        <!-- Table to Display Data -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th><?= $text_customer_name ?></th>
                                    <th><?= $text_products ?></th>
                                </tr>
                            </thead>
                            <tbody id="cart-table-body">
                                <!-- Populated dynamically -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <nav>
                        <ul class="pagination pagination-carts justify-content-center">
                            <!-- Populated dynamically -->
                        </ul>
                    </nav>
                </div>

                <!-- Mail Templates Tab -->

                <div class="tab-pane fade" id="templates" role="tabpanel" aria-labelledby="templates-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <?php $isFirst = true; ?>
                        <?php foreach ($languages as $language): ?>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link <?= $isFirst ? 'active' : '' ?>" id="tab-<?= $language['language_id'] ?>"
                                    data-bs-toggle="tab" href="#template-<?= $language['language_id'] ?>" role="tab"
                                    aria-controls="template-<?= $language['language_id'] ?>"
                                    aria-selected="<?= $isFirst ? 'true' : 'false' ?>">
                                    <img src="<?= $language['image'] ?>" alt="<?= $language['name'] ?>"
                                        style="width: 24px; height: 16px;">
                                    <?= $language['name'] ?>
                                </a>
                            </li>
                            <?php $isFirst = false; ?>
                        <?php endforeach; ?>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <?php $isFirst = true; ?>
                        <?php foreach ($languages as $language): ?>
                            <div class="tab-pane fade <?= $isFirst ? 'show active' : '' ?>"
                                id="template-<?= $language['language_id'] ?>" role="tabpanel"
                                aria-labelledby="tab-<?= $language['language_id'] ?>">

                                <!-- Subject input field -->
                                <div class="mb-3">
                                    <label for="subject-<?= $language['language_id'] ?>" class="form-label">
                                        <?= $entry_mail_subject_label ?>
                                    </label>
                                    <input type="text" class="form-control" id="subject-<?= $language['language_id'] ?>"
                                        name="noticesubject[<?= $language['language_id'] ?>]"
                                        placeholder="<?= $entry_mail_subject_placeholder ?>"
                                        value="<?= $abandonedcart_subject[$language['language_id']] ?>">
                                </div>

                                <!-- Email body textarea -->
                                <textarea data-oc-toggle="ckeditor" class="form-control tinyMCE" rows="10"
                                    name="noticetemplate[<?= $language['language_id'] ?>]"
                                    placeholder="<?= $entry_mail_template_placeholder ?>">
                                                                                                                                                                                                                                                                                                                                                                                                                                <?= $abandonedcart_template[$language['language_id']] ?>
                                                                                                                                                                                                                                                                                                                                                                                                                            </textarea>



                            </div>
                            <?php $isFirst = false; ?>
                        <?php endforeach; ?>
                        <div class="form-text"><?= $template_help ?></div>
                        <div class="form-text"><?= $template_help_2 ?></div>
                    </div>


                </div>
            </div>
    </form>
</div>
</div>
<script>
    $(document).ready(function () {
        $('#settings-savebtn').click(function (e) {
            // first, save tinyMCE 

            const textareas = document.querySelectorAll('.tinyMCE');

            textareas.forEach((textarea) => {
                //  TinyMCE is initialized for each textarea with this class
                if (tinymce.get(textarea.id)) {
                    tinymce.get(textarea.id).save();
                }
            });


            e.preventDefault(); // Prevent the default form submission

            var formData = $("#settings-form").serialize(); // Serialize the form data

            $.ajax({
                url: 'index.php?route=marketing/abandonedcart.save&user_token=<?= $user_token ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        // Create and prepend the success alert
                        $('#alert').prepend(
                            '<div class="alert alert-success alert-dismissible">' +
                            '<i class="fa-solid fa-check-circle"></i> ' + response.success +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                            '</div>'
                        );

                    }
                    if (response.error) {
                        $.each(response.error, function (key, message) {
                            $('#alert').prepend(
                                '<div class="alert alert-danger alert-dismissible">' +
                                '<i class="fa-solid fa-exclamation-circle"></i> ' + message +
                                '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                                '</div>'
                            );
                        });
                    }
                    else {
                        // Optionally, handle other response cases
                        console.log('Error:', response);
                    }
                },
                error: function (xhr, status, error) {
                    console.log('AJAX Error:', error);
                }
            });
        });
    });

    const ctx = document.getElementById('myChart').getContext('2d');
    const data = {
        labels: <?php echo json_encode($chartLabels); ?>, // Dates
        datasets: [
            {
                label: '<?= $text_analytics_carts_per_day ?>',
                data: <?php echo json_encode(array_column($cartsPerDay, 'total')); ?>, // Totals
                borderColor: 'rgba(75, 192, 192, 1)', // Line color
                borderWidth: 2,
                fill: false,
                lineTension: 0.2, // Lower value for a straighter line
            },
            {
                label: '<?= $text_analytics_abandoned_subscribed ?>',
                data: <?php echo json_encode(array_column($cartsAbandonedSubbedPerDay, 'total')); ?>, // Totals
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2,
                fill: false
            },
            {
                label: '<?= $text_analytics_more_than_1_products ?>',
                data: <?php echo json_encode(array_column($cartsWithMorethan1Product, 'total')); ?>, // Totals
                borderColor: '#975ae1',
                borderWidth: 2,
                fill: false
            },
            {
                label: '<?= $text_analytics_clicked_on_mail ?>',
                data: <?php echo json_encode(array_column($clicksonemail, 'total')); ?>, // Totals
                borderColor: '#00F08B',
                borderWidth: 2,
                fill: false
            }
        ]
    };

    const config = {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: '<?= $text_analytics_30_days ?>'
                }
            },
            scales: {
                x: {
                    display: true,
                    type: 'category',
                    labels: data.labels,

                },
                y: {
                    display: true,
                    beginAtZero: true
                }
            }
        }
    };

    new Chart(ctx, config);



    $(document).ready(function () {


        const $cartTableBody = $('#cart-table-body');

        const itemsPerPage = 10;

        function loadCarts(page = 1) {
            $cartTableBody.html(`
    <div class="d-flex m-5 justify-content-center my-3">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
`);

            $.getJSON(`index.php?route=marketing/abandonedcart.getPagedCarts&page=${page}&user_token=<?= $user_token ?>`, function (data) {
                // console.log(data.carts)
                renderTable(data.carts);
                renderPagination(data.totalPages, page);
            });
        }

        function renderTable(carts) {
            $cartTableBody.empty();

            carts.forEach(function (cart) {
                const customerName = cart.customer_name
                    ? `<a target="_blank" href="?route=customer/customer.form&user_token=<?= $user_token ?>&customer_id=${cart.unique_id}">${cart.customer_name}</a>`
                    : 'Guest';

                const products = cart.cart
                    .map(function (item) {

                        let product = item.product_name
                            ? `${item.quantity} x <a target="_blank" href="/index.php?route=product/product&product_id=${item.product_id}">${item.product_name}</a> - $${parseFloat(item.price).toFixed(2)}`
                            : `${item.quantity} x <?= $text_deleted_product ?> - $${parseFloat(item.price).toFixed(2)}`;

                        if (item.options) {
                            product = product + "<p><small>" + item.options + "</small></p>";
                        }
                        return product;
                    })
                    .join('<hr>');

                const row = `<tr>
        <td style="width:200px">${customerName}</td>
        <td>${products}</td>
    </tr>`;
                $cartTableBody.append(row);
            });

        }

        function renderPagination(totalPages, currentPage) {
            const maxVisiblePages = 10; // Limit the number of visible pages
            const halfVisible = Math.floor(maxVisiblePages / 2);

            $('.pagination-carts').empty();

            let startPage = Math.max(1, currentPage - halfVisible);
            let endPage = Math.min(totalPages, currentPage + halfVisible);
            if (endPage == 1) { return; }
            if (currentPage <= halfVisible) {
                endPage = Math.min(totalPages, maxVisiblePages);
            } else if (currentPage + halfVisible >= totalPages) {
                startPage = Math.max(1, totalPages - maxVisiblePages + 1);
            }

            // Add "Previous" button
            if (currentPage > 1) {
                $('.pagination-carts').append(`
            <li class="page-item">
                <a class="page-link" href="#" data-page="${currentPage - 1}"> < </a>
            </li>
        `);
            }

            // Add page links
            for (let i = startPage; i <= endPage; i++) {
                const activeClass = i === currentPage ? 'active' : '';
                $('.pagination-carts').append(`
            <li class="page-item ${activeClass}">
                <a class="page-link" href="#" data-page="${i}">${i}</a>
            </li>
        `);
            }

            // Add "Next" button
            if (currentPage < totalPages) {
                $('.pagination-carts').append(`
            <li class="page-item">
                <a class="page-link" href="#" data-page="${currentPage + 1}"> > </a>
            </li>
        `);
            }

            // Attach click event for pagination
            $('.pagination-carts').find('.page-link').click(function (e) {
                e.preventDefault();
                const page = $(this).data('page');
                loadCarts(page);
            });
        }

        // Initial load
        loadCarts();

        initTinyMCE();
    });

    function scheduleNow(page) {
        $.ajax({
            url: '?route=marketing/abandonedcart.scheduleNow&user_token=<?= $user_token ?>&page=' + page,
            method: 'POST',
            success: function (response) {
                if (response.error && response.error.warning) {
                    $('#alert').prepend(
                        '<div class="alert alert-danger alert-dismissible">' +
                        '<i class="fa-solid fa-exclamation-circle"></i> ' + response.error.warning +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                        '</div>'
                    );
                }
                if (response.success) {


                    let done = parseInt(response.done);
                    let total = parseInt(response.total);
                    let percentage = Math.round((done / total) * 100);
                    percentage = Math.min(100, Math.max(0, percentage));


                    $('#sendingmails').css('width', percentage + '%');
                    $('#sendingmails').attr('aria-valuenow', percentage);
                    $('#sendingmails').text(percentage + '%');

                    $('#alert').prepend(
                        '<div class="alert alert-success alert-dismissible">' +
                        '<i class="fa-solid fa-check-circle"></i> ' + response.success +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                        '</div>'
                    );

                    if (percentage === 100) {
                        $('#sendingmails').removeClass('progress-bar-striped progress-bar-animated');
                    }
                    if (parseInt(response.done) < parseInt(response.total)) {
                        setTimeout(function () {
                            scheduleNow(parseInt(response.page) + 1);
                        }, 2000);

                    }
                }
            },
            error: function () {
                $('#alert').prepend(
                    '<div class="alert alert-danger alert-dismissible">' +
                    '<i class="fa-solid fa-exclamation-circle"></i> Could not retrieve the total abandoned carts.' +
                    '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                    '</div>'
                );
            }
        });

    }
    $(document).on('click', '#scheduleNow', function () {

        var userConfirmed = confirm("<?= $text_schedule_warning ?> ");
        if (!userConfirmed) {
            return;
        }
        $('#sendingmailscontainer').show();
        scheduleNow(1);


    });

</script>


<?= $footer ?>