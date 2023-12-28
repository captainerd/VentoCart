<?php if (count($languages) > 1): ?>
  <div class="dropdown">
    <div  data-bs-toggle="dropdown">
      <?php foreach ($languages as $language): ?>
        <?php if ($this->e($language['code']) == $this->e($code)): ?>
          <img src="<?= $this->e($language['image']) ?>" alt="<?= $this->e($language['name']) ?>" title="<?= $this->e($language['name']) ?>">
        <?php endif; ?>
      <?php endforeach; ?>
      <span class="d-none d-md-inline"><?= $this->e($text_language ) ?></span> <i class="fa-solid fa-caret-down"></i>
    </div>
    <ul class="dropdown-menu">
      <?php foreach ($languages as $language): ?>
        <li><a href="<?= $language['href'] ?>" class="dropdown-item"><img src="<?= $this->e($language['image']) ?>" alt="<?= $this->e($language['name']) ?>" title="<?= $this->e($language['name']) ?>"/> <?= $this->e($language['name']) ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <?php endif; ?>