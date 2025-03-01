<?= $header ?>
<div id="cms-blog" class="container">
    <?= $breadcrumb ?>
    <div class="row">
        <?= $column_left ?>
        <div id="content" class="col">
            <?= $content_top ?>
            <h1><?= $heading_title ?></h1>
            <?php if ($image): ?>
                <img src="<?= $image ?>" alt="<?= $heading_title ?>" title="<?= $heading_title ?>"
                    class="img-thumbnail mb-2" />
            <?php endif; ?>
            <ul class="list-inline">
                <li class="list-inline-item"><?= $text_by ?> <a href="<?= $filter_author ?>"><?= $author ?></a></li>
                <li class="list-inline-item"><?= $date_added ?></li>
                <li class="list-inline-item"><?= $comment_total ?> <?= $text_comment ?></li>
            </ul>
            <div><?= $description ?></div>
            <?php if ($tags): ?>
                <p><?= $text_tags ?>
                    <?php foreach ($tags as $tag): ?>
                        <a href="<?= $tag['href'] ?>"><?= $tag['tag'] ?></a><?php if (!end($tags) === $tag): ?>,<?php endif; ?>
                    <?php endforeach; ?>
                </p>
            <?php endif; ?>
            <?php if ($comment): ?>
                <hr />
                <div><?= $comment ?></div>
            <?php endif; ?>
            <?= $content_bottom ?>
        </div>
        <?= $column_right ?>
    </div>
</div>
<?= $footer ?>