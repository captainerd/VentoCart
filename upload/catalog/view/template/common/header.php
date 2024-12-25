<!DOCTYPE html>
<html dir="<?= $direction ?>" lang="<?= $lang ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <base href="<?= $base ?>">
  <?php if ($description): ?>
    <meta name="description" content="<?= $description ?>">
  <?php endif; ?>
  <?php if (isset($keyw) || isset($ds)): ?>
    <meta name="keywords" content="<?= $keywords ?>">
  <?php endif; ?>
  <script src="<?= $jquery ?>"></script>
  <link href="<?= $cssframework ?>" type="text/css" rel="stylesheet" media="screen">
  <link href="<?= $icons ?>" type="text/css" rel="stylesheet">
  <link href="<?= $stylesheet ?>" type="text/css" rel="stylesheet">
  <script src="catalog/view/javascript/jquery/datetimepicker/moment.min.js"></script>
  <script src="catalog/view/javascript/jquery/datetimepicker/moment-with-locales.min.js"></script>
  <script src="catalog/view/javascript/jquery/datetimepicker/daterangepicker.js"></script>
  <link href="catalog/view/javascript/jquery/datetimepicker/daterangepicker.css" rel="stylesheet" type="text/css">
  <script src="catalog/view/javascript/common.js"></script>
  <?php foreach ($styles as $style): ?>
    <link href="<?= $style['href'] ?>" type="text/css" rel="<?= $style['rel'] ?>" media="<?= $style['media'] ?>">
  <?php endforeach; ?>
  <?php foreach ($scripts as $script): ?>
    <script src="<?= $script['href'] ?>"></script>
  <?php endforeach; ?>
  <?php foreach ($links as $link): ?>
    <link href="<?= $link['href'] ?>" rel="<?= $link['rel'] ?>">
  <?php endforeach; ?>
  <?php foreach ($analytics as $analytic): ?>
    <?= $analytic ?>
  <?php endforeach; ?>
</head>

<body>
  <div id="alert"></div>


  <!-- desktop logo header area -->
  <div class="logo-container bg-white d-none d-md-flex   justify-content-center align-items-center p-5">
    <!-- Logo -->
    <a href="<?= $home ?>" class="logo-link me-3">
      <img src="<?= $this->e($logo) ?>" title="<?= $this->e($name) ?>" alt="<?= $this->e($name) ?>" class="img-fluid" />
    </a>

    <!-- Phone Icon with pulsing circle -->
    <a href="tel:<?= $telephone ?>" class="phone-link mx-4 d-flex align-items-center text-decoration-none">
      <div class="outer-circle  d-flex justify-content-center align-items-center me-2">
        <i class="fas fa-phone-alt phone-icon"></i>
      </div>
      <span class="phone-number text-muted d-none d-md-inline"><?= $telephone ?></span>
    </a>

    <!-- Checkout Icon with pulsing circle -->
    <a href="<?= $checkout ?>" class="checkout-link mx-4 d-flex align-items-center text-decoration-none">
      <div class="outer-circle d-flex justify-content-center align-items-center me-2">
        <i class="fas  fa-wallet phone-icon"></i> <!-- Changed to fa-checkout -->
      </div>
      <span class="checkout-text text-muted d-none d-md-inline"><?= $text_checkout ?></span> <!-- Adjust text -->
    </a>

    <!-- Specials Icon with pulsing circle -->
    <a href="<?= $sales_link ?>" class="specials-link mx-4 d-flex align-items-center text-decoration-none">
      <div class="outer-circle d-flex justify-content-center align-items-center me-2">
        <i class="fas fa-tags specials-icon"></i> <!-- Icon for Specials -->
      </div>
      <span class="specials-text text-muted d-none d-md-inline"><?= $text_specials ?></span> <!-- Adjust text -->
    </a>
  </div>
  <!-- end desktop logo header area -->


  <!-- main menu -->

  <?= $menu ?>

  <!-- end main menu -->


  <!-- mobile menu -->

  <?= $menu_mobile ?>

  <!-- end mobile menu -->


  <!-- cart offcanvas -->

  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
    <div class="offcanvas-header bg-light border-bottom">
      <h5 class="offcanvas-title" id="offcanvasCartLabel"> <i class="fas fa-shopping-cart text-primary fa-lg"></i> Cart
      </h5>

      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div id="header-cart" class="offcanvas-body">
      <!-- Cart Content Placeholder -->
      <?= $cart ?>

    </div>

  </div>
  <!-- end cart offcanvas -->

  <!-- Quick view overlay -->
  <!-- Modal -->
  <div class="modal fade" id="quickViewModal" style=" transform: scale(0.7);" tabindex="-1"
    aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">



      </div>
    </div>
  </div>
  <!-- end Quick view overlay -->

  <main>