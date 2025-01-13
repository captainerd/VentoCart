<!DOCTYPE html>
<html lang="<?= $langCode ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $subject ?></title>
    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #ffffff;
        }

        .unsubscribe-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #888;
        }

        #giftcard-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            pointer-events: none;
            -webkit-user-select: none;
            /* Safari */
            -moz-user-select: none;
            /* Firefox */
            -ms-user-select: none;
            /* IE10+ */
            user-select: none;
            /* Space between the cards */
        }

        .card-background {
            width: 314px;
            height: 160px;
            min-width: 224px;
            background-size: cover !important;
            background-position: center;
        }

        .giftcard-title {
            position: relative;
            color: #eaeaea96 !important;
            left: 14px;
            font-weight: bold;
            font-size: 24px;
            top: 5px;
        }

        .giftcard-holder {
            text-shadow: 1px 1px 1px #0a0b0b;
            top: 52px;
            position: relative;
            color: #bdbdbd !important;
            font-size: 11px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 0.2em;
            left: 15px;

        }

        .giftcard-code {
            font-weight: bold;
            color: #9f9f9f !important;
            position: relative;
            top: 60px;
            left: 43px;
            text-shadow: 1px 1px 2px black;
            letter-spacing: 5px;
            font-size: 9px;
        }

        .giftcard-holder span {
            letter-spacing: 0em;
            text-shadow: none;
            top: 1px;
            position: relative;
            color: #4d4444 !important;

        }

        .giftcard-site {
            bottom: 50px;
            position: relative;
            font-weight: bold;
            text-transform: uppercase;
            color: #68edf1 !important;
            font-size: 14px;
            left: 18px;
        }

        @media (max-width: 400px) {
            .card-background {
                background-size: 100% 150px !important;
                background-position: center !important;
                background-repeat: no-repeat !important;

            }
        }

        .alert-custom {
            background: linear-gradient(135deg, #28a745, #2ecc71);
            /* Modern gradient */
            color: #fff;
            /* White text for contrast */
            border: 1px solid #2ca46d;
            /* Complementary border */
            border-radius: 0.75rem;
            /* Subtle rounded corners */
            padding: 1rem 1.5rem;
            /* Balanced padding */
        }

        .alert-custom .fa-gift {
            font-size: 3rem;
            /* Big gift icon */
        }

        .alert-custom i {
            font-size: 1.5rem;
            /* Slightly larger icons */
        }

        .alert-custom:hover {
            box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
            /* Hover glow for a modern feel */
        }
    </style>
</head>

<body style="background-color: #f7f7f7; font-family: 'Arial', sans-serif;">
    <div class="email-container">
        <!-- Store logo -->
        <?php if (!empty($store_logo)): ?>
            <div class="text-center mb-4">
                <img src="<?= $store_logo ?>" alt="<?= $store ?>" class="img-fluid" style="max-width: 150px;">
            </div>
        <?php endif; ?>

        <!-- Email content -->
        <div class="content">
            <h2>Gift Card from <?= $sender_name ?></h2>




            <div class="alert my-5 alert-custom d-flex align-items-center shadow-sm" role="alert">

                <div>

                    <p class="mb-0"><?= $text_message ?></p>
                </div>
            </div>
            <p class="my-5"><?= $text_message_second ?></p>
            <!-- Gift card details table -->
            <?php foreach ($giftcards as $giftcard): ?>

                <!-- Gift Card Display -->
                <div class="col giftcard-template p-3">
                    <div class="d-flex shadow justify-content-center align-items-center" style="height: 200px;">
                        <div style="background: url('<?= $giftcard['theme_image'] ?>')" class="card-background">
                            <h5 class="card-title giftcard-title  "><?= $giftcard['giftcard_name'] ?></h5>
                            <p class="giftcard-holder  "><span><?= $text_holder ?></span>
                                <?= $giftcard['receiver_name'] ?></p>
                            <p class="giftcard-code  "><?= $giftcard['giftcard_code'] ?></p>
                            <p class="giftcard-site  "><?= $store_url_clean ?> GiftCard</p>
                        </div>
                    </div>
                </div>


                <table class="table my-5 shadow table-bordered  table-striped">
                    <tr>
                        <td><strong>Gift Card Code:</strong></td>
                        <td><?= $giftcard['giftcard_code'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Sender:</strong></td>
                        <td><?= $giftcard['sender_name'] ?> (<?= $giftcard['sender_email'] ?>)</td>
                    </tr>
                    <tr>
                        <td><strong>Receiver:</strong></td>
                        <td><?= $giftcard['receiver_name'] ?> (<?= $giftcard['receiver_email'] ?>)</td>
                    </tr>
                    <tr>
                        <td><strong>Message:</strong></td>
                        <td><?= $giftcard['message'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Balance:</strong></td>
                        <td>$<?= number_format($giftcard['balance'], 2) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Date Added:</strong></td>
                        <td><?= date('Y-m-d H:i:s', strtotime($giftcard['date_added'])) ?></td>
                    </tr>
                </table>
            <?php endforeach; ?>
        </div>

        <!-- Unsubscribe link -->
        <div class="unsubscribe-link my-5">
            <p> <?= $text_footer ?> Powered by VentoCart</p>
        </div>
    </div>
</body>

</html>