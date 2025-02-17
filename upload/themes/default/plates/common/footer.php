</main>
<script>

  window.addEventListener('scroll', function () {
    const menu = document.getElementById('menu');
    const stickyOffset = menu.offsetTop;

    if (window.scrollY > stickyOffset) {

      menu.classList.add('sticky');
    } else {
      menu.classList.remove('sticky');
    }
  });


</script>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <!-- link section --><h5><?= $text_information ?></h5><ul class='list-unstyled'>
                        <li><a href="<?= $url->link('information/information&information_id=1') ?>"><?= $text_about_us ?></a></li><?php if ($blog): ?>
                        <li><a href="<?= $url->link('cms/blog') ?>"><?= $text_blog ?></a></li><?php endif; ?>
                        <li><a href="<?= $url->link('information/information&information_id=4') ?>"><?= $text_delivery_information ?></a></li>
                        <li><a href="<?= $url->link('information/information&information_id=2') ?>"><?= $text_tos ?></a></li></ul><!-- end section -->
      </div>

      <div class="col-sm-3">

        <!-- link section --><h5><?= $text_service ?></h5><ul class='list-unstyled'>
                        <li><a href="<?= $url->link('account/returns.add') ?>"><?= $text_return ?></a></li>
                        <li><a href="<?= $url->link('information/contact') ?>"><?= $text_contact ?></a></li><?php if ($gdpr): ?>
                        <li><a href="<?= $url->link('information/gdpr') ?>"><?= $text_gdpr ?></a></li><?php endif; ?>
                        <li><a href="<?= $url->link('information/sitemap') ?>"><?= $text_sitemap ?></a></li><?php if ($guestorder): ?>
                        <li><a href="<?= $url->link('guest/order') ?>"><?= $text_guest_order ?></a></li><?php endif; ?></ul><!-- end section -->
      </div>
      <div class="col-sm-3">
        <!-- link section --><h5><?= $text_extra ?></h5><ul class='list-unstyled'>
                        <li><a href="<?= $url->link('product/manufacturer') ?>"><?= $text_manufacturer ?></a></li><?php if ($affiliate): ?>
                        <li><a href="<?= $url->link('affiliate/account') ?>"><?= $text_affiliate ?></a></li><?php endif; ?>
                        <li><a href="<?= $url->link('product/special') ?>"><?= $text_special ?></a></li>
                        <li><a href="<?= $url->link('giftcards/giftcard') ?>"><?= $text_giftcards ?></a></li></ul><!-- end section -->
      </div>
      <div class="col-sm-3">
        <!-- link section --><h5><?= $text_account ?></h5><ul class='list-unstyled'>
                        <li><a href="<?= $url->link('guest/newsletter') ?>"><?= $text_newsletter ?></a></li>
                        <li><a href="<?= $url->link('account/account') ?>"><?= $text_account ?></a></li>
                        <li><a href="<?= $url->link('account/order') ?>"><?= $text_order ?></a></li>
                        <li><a href="<?= $url->link('account/wishlist') ?>"><?= $text_wishlist ?></a></li></ul><!-- end section -->
      </div>
    </div>

    <p><?= $powered ?></p>
  </div>
</footer>

<?= $cookie ?>
<script src="themes/<?= $theme_name ?>/assets/core/js/bootstrap/js/bootstrap.bundle.min.js"></script>

<?php foreach ($scripts as $script): ?>
  <script src="<?= $script['href'] ?>"></script>

<?php endforeach; ?>
</body>

</html>