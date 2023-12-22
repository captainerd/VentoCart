</main>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <h5><?= $this->e($text_information ) ?></h5>
        <ul class="list-unstyled">
          <?php if ($blog): ?>
          <li><a href="<?= $this->e($blog ) ?>"><?= $this->e($text_blog ) ?></a></li>
          <?php endif; ?>
          <?php foreach ($informations as $information): ?>
            <li><a href="<?= $this->e($information['href']) ?>"><?=  $information['title']  ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="col-sm-3">
        <h5><?= $this->e($text_service ) ?></h5>
        <ul class="list-unstyled">
          <li><a href="<?= $this->e($contact ) ?>"><?= $this->e($text_contact ) ?></a></li>
          <li><a href="<?= $this->e($return ) ?>"><?= $this->e($text_return ) ?></a></li>
          <?php if ($gdpr): ?>
            <li><a href="<?= $this->e($gdpr ) ?>"><?= $this->e($text_gdpr ) ?></a></li>
          <?php endif; ?>
          <li><a href="<?= $this->e($sitemap ) ?>"><?= $this->e($text_sitemap ) ?></a></li>
        </ul>
      </div>
      <div class="col-sm-3">
        <h5><?= $this->e($text_extra ) ?></h5>
        <ul class="list-unstyled">
          <li><a href="<?= $this->e($manufacturer ) ?>"><?= $this->e($text_manufacturer ) ?></a></li>
          <li><a href="<?=  $voucher  ?>"><?= $this->e($text_voucher ) ?></a></li>
          <?php if ($affiliate): ?>
            <li><a href="<?=  $affiliate   ?>"><?= $this->e($text_affiliate ) ?></a></li>
          <?php endif; ?>
          <li><a href="<?=  $special   ?>"><?= $this->e($text_special ) ?></a></li>
        </ul>
      </div>
      <div class="col-sm-3">
        <h5><?= $this->e($text_account ) ?></h5>
        <ul class="list-unstyled">
          <li><a href="<?= $account  ?>"><?= $this->e($text_account ) ?></a></li>
          <li><a href="<?=  $order  ?>"><?= $this->e($text_order ) ?></a></li>
          <li><a href="<?= $wishlist   ?>"><?= $this->e($text_wishlist ) ?></a></li>
          <li><a href="<?= $newsletter  ?>"><?= $this->e($text_newsletter ) ?></a></li>
        </ul>
      </div>
    </div>
    <hr>
    <p><?= $powered  ?></p>
 
  </div>
</footer>
<?= $this->e($cookie ) ?>
<script src="<?= $this->e($bootstrap ) ?>" type="text/javascript"></script>
<?php foreach ($scripts as $script): ?>
  <script src="<?= $this->e($script['href']) ?>" type="text/javascript"></script>
<?php endforeach; ?>
</body></html>
