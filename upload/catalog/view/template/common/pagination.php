<ul class="pagination">
    <?php if ($first): ?>
        <li class="page-item"><a href="<?=  $first  ?>" class="page-link">|&lt;</a></li>
    <?php endif; ?>
    <?php if ($prev): ?>
        <li class="page-item"><a href="<?= $prev  ?>" class="page-link">&lt;</a></li>
    <?php endif; ?>
    <?php foreach ($links as $link): ?>
        <?php if ($link['page'] == $page): ?>
            <li class="page-item active"><span class="page-link"><?=  $link['page']  ?></span></li>
        <?php else: ?>
            <li class="page-item"><a href="<?= $link['href']  ?>" class="page-link"><?=  $link['page']  ?></a></li>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php if ($next): ?>
        <li class="page-item"><a href="<?=  $next  ?>" class="page-link">&gt;</a></li>
    <?php endif; ?>
    <?php if ($last): ?>
        <li class="page-item"><a href="<?= $last ?>" class="page-link">&gt;|</a></li>
    <?php endif; ?>
</ul>
