<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $text_notification ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; margin: 20px;">

    <!-- Main content container -->
    <div class="container bg-white p-4 rounded shadow-sm">
        <header>
            <h1 class="text-center"><?= $store ?></h1>
            <p class="text-center text-muted"><?= $text_message ?> <?= $store_url ?></p>
        </header>



        <!-- Action link -->
        <section class="mt-4 text-center">
            <a href="<?= $store_url ?>" class="btn btn-primary"><?= $text_action_link ?></a>
        </section>



        <!-- Footer -->
        <footer class="mt-4 text-center">
            <p class="text-muted"><?= $text_footer ?></p>
            <!-- IP notice -->
            <?php if (!empty($ip_address)): ?>
                <section class="mt-2">

                    <p class="text-muted"><?= $ip_address ?></p>

                </section>
            <?php endif; ?>
        </footer>
    </div>


</body>

</html>