<?php if (count($currencies) > 1): ?>
  <form action="<?= $this->e($action) ?>" method="post" enctype="multipart/form-data" id="form-currency">
    <div class="dropdown">
      <a href="#" data-bs-toggle="dropdown">
        <?php foreach ($currencies as $currency): ?>
          <?php if ($currency['symbol_left'] && $currency['code'] == $code): ?>
            <strong><?= $this->e($currency['symbol_left']) ?></strong>
          <?php elseif ($currency['symbol_right'] && $currency['code'] == $code): ?>
            <strong><?= $this->e($currency['symbol_right']) ?></strong>
          <?php endif; ?>
        <?php endforeach; ?>
        <span class="d-none d-md-inline"><?= $this->e($text_currency) ?></span>
        <i class="fa-solid fa-caret-down"></i>
      </a>

      <ul class="dropdown-menu">
        <?php foreach ($currencies as $currency): ?>
          <?php if ($currency['symbol_left']): ?>
            <li><a href="<?= $currency['code'] ?>" class="dropdown-item"><?= $this->e($currency['symbol_left']) ?> <?= $this->e($currency['title']) ?></a></li>
          <?php else: ?>
            <li><a href="<?= $currency['code'] ?>" class="dropdown-item"><?= $this->e($currency['symbol_right']) ?> <?= $this->e($currency['title']) ?></a></li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>
    <input type="hidden" name="code" value=""/>
    <input type="hidden" name="redirect" value="<?= $redirect ?>"/>
  </form>
<?php endif; ?>
