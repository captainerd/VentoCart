<?php if (isset($categories)): ?>
    <div class="container">
        <nav id="menu" class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div id="category" class="d-block d-sm-block d-lg-none"><?= $this->e($text_category) ?></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"><i class="fa-solid fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav">
                    <?php foreach ($categories as $category): ?>
                        <?php if ( !empty($category['children'])): ?>
                            <li class="nav-item dropdown">
                                <a href="<?=  $category['href']  ?>" class="nav-link" data-bs-toggle="dropdown"><?=  $category['name'] ?></a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-inner">
                                        <?php foreach (array_chunk($category['children'], ceil(count($category['children']) / $category['column'])) as $children): ?>
                                            <ul class="list-unstyled">
                                                <?php foreach ($children as $child): ?>
                                                    <li><a href="<?= $child['href']  ?>" class="nav-link"><?=   $child['name']  ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endforeach; ?>
                                    </div>
                                    <a href="<?= $category['href']  ?>" class="see-all"><?= $text_all  ?> <?=  $category['name']  ?></a>
                                </div>
                            </li>
                        <?php else: ?>
                            <li class="nav-item"><a href="<?=  $category['href'] ?>" class="nav-link"><?=  $category['name']  ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </nav>
    </div>
<?php endif; ?>
