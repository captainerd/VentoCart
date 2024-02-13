<!DOCTYPE html>
<html dir="<?=  $direction   ?>" lang="<?=  $lang   ?>">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=  $title  ?></title>
  <base href="<?= $base  ?>"/>
  <?php if ($description): ?>
    <meta name="description" content="<?=  $description ?>"/>
  <?php endif; ?>
  <?php if (isset($keyw) || isset($ds)): ?>
    <meta name="keywords" content="<?= $keywords  ?>"/>
  <?php endif; ?>
  <script src="<?= $jquery  ?>" type="text/javascript"></script>
  <link href="<?= $cssframework  ?>" type="text/css" rel="stylesheet" media="screen"/>
  <link href="<?= $icons  ?>" type="text/css" rel="stylesheet"/>
  <link href="<?= $stylesheet  ?>" type="text/css" rel="stylesheet"/>
  <script type="text/javascript" src="catalog/view/javascript/jquery/datetimepicker/moment.min.js"></script>
  <script type="text/javascript" src="catalog/view/javascript/jquery/datetimepicker/moment-with-locales.min.js"></script>
  <script type="text/javascript" src="catalog/view/javascript/jquery/datetimepicker/daterangepicker.js"></script>
  <link href="catalog/view/javascript/jquery/datetimepicker/daterangepicker.css" rel="stylesheet" type="text/css"/>
  <script src="catalog/view/javascript/common.js" type="text/javascript"></script>
  <?php foreach ($styles as $style): ?>
    <link href="<?= $style['href']  ?>" type="text/css" rel="<?= $style['rel']  ?>" media="<?=  $style['media'] ?>"/>
  <?php endforeach; ?>
  <?php foreach ($scripts as $script): ?>
    <script src="<?=  $script['href']  ?>" type="text/javascript"></script>
  <?php endforeach; ?>
  <?php foreach ($links as $link): ?>
    <link href="<?=  $link['href'] ?>" rel="<?=  $link['rel']  ?>"/>
  <?php endforeach; ?>
  <?php foreach ($analytics as $analytic): ?>
    <?=  $analytic  ?>
  <?php endforeach; ?>
</head>
<body>
<div id="alert" style="max-width: 500px" class="fixed-bottom text-center  p-3"></div>
<nav id="top">
  <div class="container">
    <div class="nav float-start left-navitems">
      <ul class="list-inline">
        <li class="list-inline-item"><?=  $currency   ?></li>
        <li class="list-inline-item"><?=  $language   ?></li>
      </ul>
    </div>
    <div class="nav float-end">
      <ul class="list-inline">
        <li class="list-inline-item"><a href="<?= $contact  ?>"><i class="fa-solid fa-phone"></i></a> <span class="d-none d-md-inline"><?= $this->e($telephone ) ?></span></li>
        <li class="list-inline-item">
          <div class="dropdown">
            <a href="<?= isset($account) ? $this->e($account ) : '' ?>"   data-bs-toggle="dropdown"><i class="fa-solid fa-user"></i> <span class="d-none d-md-inline"><?= $this->e($text_account ) ?></span> <i class="fa-solid fa-caret-down"></i></a>
            <ul class="dropdown-menu dropdown-menu-right">
              <?php if (!$logged): ?>
                <li><a href="<?=  $register   ?>" class="dropdown-item"><?= $this->e($text_register ) ?></a></li>
                <li><a href="<?=  $login  ?>" class="dropdown-item"><?= $this->e($text_login ) ?></a></li>
              <?php else: ?>
                <li><a href="<?=  $account  ?>" class="dropdown-item"><?= $this->e($text_account ) ?></a></li>
                <li><a href="<?=  $order   ?>" class="dropdown-item"><?= $this->e($text_order ) ?></a></li>
                <li><a href="<?=  $transaction  ?>" class="dropdown-item"><?= $this->e($text_transaction ) ?></a></li>
                <li><a href="<?=  $download  ?>" class="dropdown-item"><?= $this->e($text_download ) ?></a></li>
                <li><a href="<?=  $logout  ?>" class="dropdown-item"><?= $this->e($text_logout ) ?></a></li>
              <?php endif; ?>
            </ul>
          </div>
        </li>
        <li class="list-inline-item"><a href="<?=  $wishlist   ?>" id="wishlist-total" title="<?= $this->e($text_wishlist ) ?>"><i class="fa-solid fa-heart"></i> <span class="d-none d-md-inline"><?= $this->e($text_wishlist ) ?></span></a></li>
        <li class="list-inline-item"><a href="<?=  $shopping_cart   ?>" title="<?= $this->e($text_shopping_cart ) ?>"><i class="fa-solid fa-cart-shopping"></i> <span class="d-none d-md-inline"><?= $this->e($text_shopping_cart ) ?></span></a></li>
        <li class="list-inline-item"><a href="<?=  $checkout   ?>" title="<?= $this->e($text_checkout ) ?>"><i class="fa-solid fa-share"></i> <span class="d-none d-md-inline"><?= $this->e($text_checkout ) ?></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<header>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-lg-4">
        <div id="logo">
          <?php if ($logo): ?>
            <a href="<?= $home  ?>"><img src="<?= $this->e($logo ) ?>" title="<?= $this->e($name ) ?>" alt="<?= $this->e($name ) ?>" class="img-fluid"/></a>
          <?php else: ?>
            <h1><a href="<?= $home  ?>"><?= $this->e($name ) ?></a></h1>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-md-5"><?=  $search  ?></div>
      <div id="header-cart" class="col-md-4 col-lg-3 mb-2"><?=  $cart   ?></div>
    </div>
  </div>
</header>
<main>
   <!-- Quick view overlay -->
 <div class="quick-view-overlay">
 
 
  <div class="quick-view-content">
    <button type="button"    class="close-button fake-class-close" data-bs-toggle="tooltip" title="Close"><i class="fa-solid fake-class-close fa-times"></i></button>
 
 <div class="product-full"> 
  <div class="spinner-border text-primary" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  
 </div>
</div>
</div>
<!-- end Quick view overlay -->
  <?=  $menu   ?>
