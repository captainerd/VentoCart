<?php if (count($currencies) > 1): ?>
  <ul>

    <form action="<?= $action ?>" method="post" enctype="multipart/form-data" class="form-currency">
      <li class="nav-item list-unstyled dropdown">
        <a href="#" class="nav-link dropdown-toggle" id="currencyDropdown" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <?php foreach ($currencies as $currency): ?>
            <?php if ($currency['symbol_left'] && $currency['code'] == $code): ?>
              <span class="font-weight-bold"><?= $currency['symbol_left'] ?>       <?= $currency['code'] ?></span>
            <?php elseif ($currency['symbol_right'] && $currency['code'] == $code): ?>
              <span class="font-weight-bold"><?= $currency['symbol_right'] ?>       <?= $currency['code'] ?></span>
            <?php endif; ?>
          <?php endforeach; ?>
        </a>
        <ul class="dropdown-menu">
          <?php foreach ($currencies as $currency): ?>
            <li>
              <a href="<?= $currency['code'] ?>" class="dropdown-item">
                <?php if ($currency['symbol_left']): ?>
                  <?= $this->e($currency['symbol_left']) ?>
                <?php else: ?>
                  <?= $this->e($currency['symbol_right']) ?>
                <?php endif; ?>
                <?= $this->e($currency['title']) ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </li>
      <input type="hidden" name="code" value="" /> <input type="hidden" name="redirect" value="<?= $redirect ?>" />
    </form>
  </ul>
<?php endif; ?>