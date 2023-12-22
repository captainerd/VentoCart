<?=  $header    ?>
<div id="information-sitemap" class="container">
<?=  $breadcrumb  ?>
  <div class="row"><?=  $column_left  ?>
    <div id="content" class="col"><?=  $content_top  ?>
      <h1><?= $this->e($heading_title ) ?></h1>
      <div class="row">
        <div class="col-sm-6">
          <ul>
            <?php foreach ($categories as $category_1): ?>
              <li><a href="<?= $this->e($category_1['href']) ?>"><?= $this->e($category_1['name']) ?></a>
                <?php if (isset($category_2['children'])): ?>
                  <ul>
                    <?php foreach ($category_1['children'] as $category_2): ?>
                      <li><a href="<?= $this->e($category_2['href']) ?>"><?= $this->e($category_2['name']) ?></a>
                        <?php if (isset($category_2['children'])): ?>
                          <ul>
                            <?php foreach ($category_2['children'] as $category_3): ?>
                              <li><a href="<?= $this->e($category_3['href']) ?>"><?= $this->e($category_3['name']) ?></a></li>
                            <?php endforeach; ?>
                          </ul>
                        <?php endif; ?>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="col-sm-6">
          <ul>
            <li><a href="<?= $this->e($special ) ?>"><?= $this->e($text_special ) ?></a></li>
            <li><a href="<?= $this->e($account ) ?>"><?= $this->e($text_account ) ?></a>
              <ul>
                <li><a href="<?= $this->e($edit ) ?>"><?= $this->e($text_edit ) ?></a></li>
                <li><a href="<?= $this->e($password ) ?>"><?= $this->e($text_password ) ?></a></li>
                <li><a href="<?= $this->e($address ) ?>"><?= $this->e($text_address ) ?></a></li>
                <li><a href="<?= $this->e($history ) ?>"><?= $this->e($text_history ) ?></a></li>
                <li><a href="<?= $this->e($download ) ?>"><?= $this->e($text_download ) ?></a></li>
              </ul>
            </li>
            <li><a href="<?= $this->e($history ) ?>"><?= $this->e($text_cart ) ?></a></li>
            <li><a href="<?= $this->e($checkout ) ?>"><?= $this->e($text_checkout ) ?></a></li>
            <li><a href="<?= $this->e($search ) ?>"><?= $this->e($text_search ) ?></a></li>
            <li><?= $this->e($text_information ) ?>
              <ul>
                <?php foreach ($informations as $information): ?>
                  <li><a href="<?= $this->e($information['href']) ?>"><?= $this->e($information['title']) ?></a></li>
                <?php endforeach; ?>
                <li><a href="<?= $this->e($contact ) ?>"><?= $this->e($text_contact ) ?></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <?=  $content_bottom  ?></div>
    <?=  $column_right  ?></div>
</div>
<?=  $footer  ?>