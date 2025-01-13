<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">

        <div class="offcanvas-title  mx-3">
            <h5 id="offcanvasNavbarLabel"><?= $text_menu ?></h5>
        </div>
        <div class="currency   mx-3">
            <?= $currency ?>
        </div>
        <div class="language pb-2  mx-3">
            <?= $language ?>
        </div>
        <!-- Search Dropdown -->
        <li class="nav-item list-unstyled  mx-3 pb-2 dropdown">
            <a href="#" class="nav-link" id="searchDropdowns" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-search fa-lg"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end p-3" style="min-width: 300px" aria-labelledby="searchDropdown">
                <?= $search ?>
            </ul>
        </li>

        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>


    <div class="offcanvas-body">
        <div class="mobile-menu">
            <div class="accordion" id="menuAccordion">


                <!-- My Account Accordion Section -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingAccount">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseAccount" aria-expanded="false" aria-controls="collapseAccount">
                            <?= $this->e($text_account) ?>
                        </button>
                    </h2>
                    <div id="collapseAccount" class="accordion-collapse collapse" aria-labelledby="headingAccount"
                        data-bs-parent="#menuAccordion">
                        <div class="accordion-body">
                            <?php if (!$logged): ?>
                                <a href="<?= $register ?>" class="d-block"><?= $this->e($text_register) ?></a>
                                <a href="<?= $login ?>" class="d-block"><?= $this->e($text_login) ?></a>
                                <a href="<?= $guest_order ?>" class="dropdown-item"><?= $this->e($text_guest_order) ?></a>
                            <?php else: ?>
                                <a href="<?= $account ?>" class="d-block"><?= $this->e($text_account) ?></a>
                                <a href="<?= $order ?>" class="d-block"><?= $this->e($text_order) ?></a>
                                <a href="<?= $download ?>" class="d-block"><?= $this->e($text_download) ?></a>
                                <a href="<?= $logout ?>" class="d-block"><?= $this->e($text_logout) ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if (isset($categories)): ?>



                    <?php foreach ($categories as $index => $category): ?>
                        <div class="accordion-item">
                            <?php if (!empty($category['children'])): ?>
                                <h2 class="accordion-header" id="heading<?= $index ?>">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse<?= $index ?>" aria-expanded="false"
                                        aria-controls="collapse<?= $index ?>">
                                        <?= $category['name'] ?>

                                    </button>
                                </h2>
                                <div id="collapse<?= $index ?>" class="accordion-collapse collapse"
                                    aria-labelledby="heading<?= $index ?>" data-bs-parent="#menuAccordion">
                                    <div class="accordion-body">
                                        <?php foreach ($category['children'] as $child): ?>
                                            <a href="<?= $child['href'] ?>"><?= preg_replace('/\s*\(.*?\)/', '', $child['name']) ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php else: ?>
                                <h2 class="accordion-header">
                                    <a href="<?= $category['href'] ?>" class="accordion-button"><?= $category['name'] ?></a>
                                </h2>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>


                <?php endif; ?>

            </div>
        </div>
    </div>
</div>