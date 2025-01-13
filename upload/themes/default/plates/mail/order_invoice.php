<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
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

    table {
      word-wrap: break-word;
      word-break: break-all;
    }

    td {
      word-wrap: break-word;
      word-break: break-word;
    }
  </style>
</head>

<body style="background-color: #f7f7f7; font-family: 'Arial', sans-serif;">
  <div class="email-container">
    <?php if (!empty($logo)): ?>
      <div class="text-center mb-4">
        <img src="<?= $logo ?>" alt="<?= $store ?>" class="img-fluid" style="max-width: 150px;">
      </div>
    <?php else: ?>
      <h2><a href="<?= $store_url ?>" title="<?= $store ?>"><?= $store ?></a></h2>
    <?php endif; ?>

    <p style="margin-top: 0px; margin-bottom: 20px;"><?= $text_greeting ?></p>

    <?php if ($customer_id): ?>
      <p style="margin-top: 0px; margin-bottom: 20px;"><?= $text_link ?></p>
      <p style="margin-top: 0px; margin-bottom: 20px;"><a href="<?= $link ?>"><?= $link ?></a></p>
    <?php else: ?>
      <p style="margin-top: 0px; margin-bottom: 20px;"><?= $guest_order_view ?></p>
    <?php endif; ?>

    <?php if ($download): ?>
      <p style="margin-top: 0px; margin-bottom: 20px;"><?= $text_download ?></p>
      <p style="margin-top: 0px; margin-bottom: 20px;"><a href="<?= $download ?>"><?= $download ?></a></p>
    <?php endif; ?>

    <table
      style="border-collapse: collapse; width: 100%; border-top: 1px solid #DDDDDD; border-left: 1px solid #DDDDDD; margin-bottom: 20px;">
      <thead>
        <tr>
          <td
            style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: left; padding: 7px; color: #222222;"
            colspan="2"><?= $text_order_detail ?></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td
            style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;">
            <b><?= $text_order_id ?></b> <?= $order_id ?>
            <br />
            <b><?= $text_date_added ?></b> <?= $date_added ?>
            <br />
            <b><?= $text_payment_method ?></b> <?= $payment_method ?>
            <br />
            <?php if ($shipping_method): ?> <b><?= $text_shipping_method ?></b> <?= $shipping_method ?> <?php endif; ?>
          </td>
          <td
            style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;">
            <b><?= $text_email ?></b> <?= $email ?>
            <br />
            <b><?= $text_telephone ?></b> <?= $telephone ?>
            <br />
            <b><?= $text_ip ?></b> <?= $ip ?>
            <br />
            <b><?= $text_order_status ?></b> <?= $order_status ?>
            <br />
          </td>
        </tr>
      </tbody>
    </table>

    <?php if ($comment): ?>
      <table
        style="border-collapse: collapse; width: 100%; border-top: 1px solid #DDDDDD; border-left: 1px solid #DDDDDD; margin-bottom: 20px;">
        <thead>
          <tr>
            <td
              style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: left; padding: 7px; color: #222222;">
              <?= $text_instruction ?>
            </td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td
              style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;">
              <?= $comment ?>
            </td>
          </tr>
        </tbody>
      </table>
    <?php endif; ?>

    <table
      style="border-collapse: collapse; width: 100%; border-top: 1px solid #DDDDDD; border-left: 1px solid #DDDDDD; margin-bottom: 20px;">
      <thead>
        <tr>
          <td
            style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: left; padding: 7px; color: #222222;">
            <?= $text_payment_address ?>
          </td>
          <?php if ($shipping_address): ?>
            <td
              style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: left; padding: 7px; color: #222222;">
              <?= $text_shipping_address ?>
            </td>
          <?php endif; ?>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td
            style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;">
            <?= $payment_address ?>
          </td>
          <?php if ($shipping_address): ?>
            <td
              style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;">
              <?= $shipping_address ?>
            </td>
          <?php endif; ?>
        </tr>
      </tbody>
    </table>

    <table
      style="border-collapse: collapse; width: 100%; border-top: 1px solid #DDDDDD; border-left: 1px solid #DDDDDD; margin-bottom: 20px;">
      <thead>
        <tr>
          <td
            style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: left; padding: 7px; color: #222222;">
            <?= $text_product ?>
          </td>
          <td
            style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: left; padding: 7px; color: #222222;">
            <?= $text_sku ?>
          </td>
          <td
            style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: right; padding: 7px; color: #222222;">
            <?= $text_quantity ?>
          </td>
          <td
            style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: right; padding: 7px; color: #222222;">
            <?= $text_price ?>
          </td>
          <td
            style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; background-color: #EFEFEF; font-weight: bold; text-align: right; padding: 7px; color: #222222;">
            <?= $text_total ?>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $product): ?>
          <tr>
            <td
              style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;">
              <?= $product['name'] ?>
              <?php foreach ($product['option'] as $option): ?>
                <br />
                <small> - <?= $option['name'] ?>: <?= $option['value'] ?></small>
              <?php endforeach; ?>
            </td>
            <td
              style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;">
              <?= $product['sku'] ?>
            </td>
            <td
              style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;">
              <?= $product['quantity'] ?>
            </td>
            <td
              style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;">
              <?= $product['price'] ?>
            </td>
            <td
              style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;">
              <?= $product['total'] ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <?php foreach ($totals as $total): ?>
          <tr>
            <td
              style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;"
              colspan="4"><b><?= $total['title'] ?>:</b></td>
            <td
              style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: right; padding: 7px;">
              <?= $total['text'] ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tfoot>
    </table>

    <p style="margin-top: 0px; margin-bottom: 20px;"><?= $text_footer ?></p>
  </div>
</body>

</html>