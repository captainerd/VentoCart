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
    </style>
</head>

<body style="background-color: #f7f7f7; font-family: 'Arial', sans-serif;">
    <div class="email-container">
        <!-- Store logo -->
        <?php if (!empty($store_logo)): ?>
            <div class="text-center mb-4">
                <img src="<?= $store_logo ?>" alt="<?= $store_name ?>" class="img-fluid" style="max-width: 150px;">
            </div>
        <?php endif; ?>

        <!-- Email content -->
        <div class="content">
            <?= $message ?>
        </div>

        <!-- Unsubscribe link -->
        <div class="unsubscribe-link">
            <p> <?= $footer ?>.</p>
        </div>
    </div>
</body>

</html>