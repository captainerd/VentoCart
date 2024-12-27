<nav id="menu" class="navbar  menu-vento border   navbar-expand-lg navbar-light ">

    <div class="container" style="padding: 0; min-width: 272px;">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <?php if (isset($categories)): ?>

                    <?php foreach ($categories as $category): ?>
                        <?php if (!empty($category['children'])): ?>
                            <li class="nav-item dropdown">
                                <a href="<?= $category['href'] ?>" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <?= $category['name'] ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php foreach ($category['children'] as $childKey => $child): ?>
                                        <li class="dropdown-item">
                                            <a href="<?= $child['href'] ?>" class="dropdown-item"><?= $child['name'] ?></a>
                                            <!-- VentoCart menu -->
                                            <!-- Check if child has children (grandchildren) -->
                                            <?php if (!empty($child['children'])): ?>
                                                <ul
                                                    class="submenu dropdown-menu <?php if (count($categories) / 2 < $childKey): ?>submenu-left<?php endif; ?>">
                                                    <?php foreach ($child['children'] as $grandChildKey => $grandChild): ?>
                                                        <li><a class="dropdown-item"
                                                                href="<?= $grandChild['href'] ?>"><?= $grandChild['name'] ?></a></li>

                                                        <!-- Check if grandchild has children (grand-grandchildren) -->
                                                        <?php if (!empty($grandChild['children'])): ?>
                                                            <li class="dropdown-submenu">
                                                                <a class="dropdown-item" href="#" data-bs-toggle="dropdown">
                                                                    <?php if (count($categories) / 2 > $childKey): ?>
                                                                        «
                                                                    <?php endif; ?>
                                                                    <?= $grandChild['name'] ?>
                                                                    <?php if (count($categories) / 2 < $childKey): ?>
                                                                        »
                                                                    <?php endif; ?>
                                                                </a>
                                                                <ul
                                                                    class="submenu dropdown-menu <?php if (count($categories) / 2 > $childKey): ?>submenu-left<?php endif; ?>">
                                                                    <?php foreach ($grandChild['children'] as $grandGrandChild): ?>
                                                                        <li><a class="dropdown-item"
                                                                                href="<?= $grandGrandChild['href'] ?>"><?= $grandGrandChild['name'] ?></a>
                                                                        </li>
                                                                    <?php endforeach; ?>
                                                                </ul>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a href="<?= $category['href'] ?>" class="nav-link"><?= $category['name'] ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>

                <?php endif; ?>



                <!-- Search Dropdown -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="searchDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-search fa-lg"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end p-3" style="min-width: 300px"
                        aria-labelledby="searchDropdown">
                        <?= $search ?>
                    </ul>
                </li>
                <!-- Account Dropdown -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link  " id="accountDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"> <i class="fas fa-user  fa-lg"></i>
                        <?= $this->e($text_account) ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                        <?php if (!$logged): ?>
                            <li><a href="<?= $register ?>" class="dropdown-item"><?= $this->e($text_register) ?></a></li>
                            <li><a href="<?= $login ?>" class="dropdown-item"><?= $this->e($text_login) ?></a></li>
                            <li><a href="<?= $guest_order ?>" class="dropdown-item"><?= $this->e($text_guest_order) ?></a>
                            </li>
                        <?php else: ?>
                            <li><a href="<?= $account ?>" class="dropdown-item"><?= $this->e($text_account) ?></a></li>
                            <li><a href="<?= $order ?>" class="dropdown-item"><?= $this->e($text_order) ?></a></li>
                    </li>
                    <li><a href="<?= $download ?>" class="dropdown-item"><?= $this->e($text_download) ?></a></li>
                    <li><a href="<?= $logout ?>" class="dropdown-item"><?= $this->e($text_logout) ?></a></li>
                <?php endif; ?>
            </ul>
            </li>
            </ul>
        </div>

        <button class="navbar-toggler shadow-none  navbar-button" type="button" style="margin: 0;"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <i class="fas fa-bars fa-lg"></i>
        </button>

        <a href="<?= $home ?>" class="logo-link mx-2 d-block d-md-none">
            <img src="<?= $this->e($logo) ?>" title="<?= $this->e($name) ?>" alt="<?= $this->e($name) ?>"
                class="img-fluid" style="width: 140px" />
        </a>

        <button class="navbar-toggler  float-end ms-3  navbar-button shadow-none d-block" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" style="margin: 0;" aria-controls="offcanvasCart">

            <i class="fas fa-shopping-cart fa-lg"></i>
            <span id="cartbadge" class="cart-badge d-none"> </span>
        </button>




        <ul class="navbar-nav ms-auto mb-2 mx-2 d-none d-sm-block dropdown-menu-start mb-lg-0">
            <?= $currency ?>
        </ul>
        <ul class="navbar-nav  mb-2 d-none d-sm-block dropdown-menu-start mb-lg-0">
            <?= $language ?>
        </ul>
    </div>

</nav>